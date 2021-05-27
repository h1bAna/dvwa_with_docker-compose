<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'DVWA Security' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'security';

$securityHtml = '';
if( isset( $_POST['seclev_submit'] ) ) {
	// Anti-CSRF
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'security.php' );

	$securityLevel = '';
	switch( $_POST[ 'security' ] ) {
		case 'low':
			$securityLevel = 'low';
			break;
		case 'medium':
			$securityLevel = 'medium';
			break;
		case 'high':
			$securityLevel = 'high';
			break;
		default:
			$securityLevel = 'impossible';
			break;
	}

	dvwaSecurityLevelSet( $securityLevel );
	dvwaMessagePush( "Security level set to {$securityLevel}" );
	dvwaPageReload();
}

if( isset( $_GET['phpids'] ) ) {
	switch( $_GET[ 'phpids' ] ) {
		case 'on':
			dvwaPhpIdsEnabledSet( true );
			dvwaMessagePush( "PHPIDS is now enabled" );
			break;
		case 'off':
			dvwaPhpIdsEnabledSet( false );
			dvwaMessagePush( "PHPIDS is now disabled" );
			break;
	}

	dvwaPageReload();
}

$securityOptionsHtml = '';
$securityLevelHtml   = '';
foreach( array( 'low', 'medium', 'high', 'impossible' ) as $securityLevel ) {
	$selected = '';
	if( $securityLevel == dvwaSecurityLevelGet() ) {
		$selected = ' selected="selected"';
		$securityLevelHtml = "<p>Security level hiện tại: <em>$securityLevel</em>.<p>";
	}
	$securityOptionsHtml .= "<option value=\"{$securityLevel}\"{$selected}>" . ucfirst($securityLevel) . "</option>";
}

$phpIdsHtml = 'PHPIDS is currently: ';

// Able to write to the PHPIDS log file?
$WarningHtml = '';

if( dvwaPhpIdsIsEnabled() ) {
	$phpIdsHtml .= '<em>enabled</em>. [<a href="?phpids=off">Disable PHPIDS</a>]';

	# Only check if PHPIDS is enabled
	if( !is_writable( $PHPIDSPath ) ) {
		$WarningHtml .= "<div class=\"warning\"><em>Cannot write to the PHPIDS log file</em>: ${PHPIDSPath}</div>";
	}
}
else {
	$phpIdsHtml .= '<em>disabled</em>. [<a href="?phpids=on">Enable PHPIDS</a>]';
}

// Anti-CSRF
generateSessionToken();

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>DVWA Security <img src=\"" . DVWA_WEB_PAGE_TO_ROOT . "dvwa/images/lock.png\" /></h1>
	<br />

	<h2>Security Level</h2>

	{$securityHtml}

	<form action=\"#\" method=\"POST\">
		{$securityLevelHtml}
		<p>Bạn có thể đặt security level ở mức low, medium, high hoặc impossible. Security level thay đổi độ khó của việc khai thác những lỗ hổng:</p>
		<ol>
			<li> Low - Cấp độ bảo mật này hoàn toàn dễ bị tấn công và <em> không có biện pháp bảo mật nào </em>. Nó được sử dụng như một ví dụ về cách các lỗ hổng ứng dụng web biểu hiện thông qua các đoạn code xấu và dùng làm nền tảng để dạy hoặc học cơ bản kỹ thuật khai thác.</li>
			<li> Medium - Cài đặt này chủ yếu là để đưa ra ví dụ cho người dùng về <em> các phương pháp bảo mật không tốt </em>, trong đó nhà phát triển đã cố gắng nhưng không bảo mật được ứng dụng. Nó cũng hoạt động như một thách thức đối với người dùng để tinh chỉnh các kỹ thuật khai thác của họ.</li>
			<li> High - Tùy chọn này là một phần mở rộng cho độ khó trung bình, với sự kết hợp của <em> các phương pháp khó hơn hoặc thay thế những đoạn code xấu </em> bằng những đoạn code \"đẹp\". Lỗ hổng bảo mật có thể không cho phép mức độ khai thác như nhau, tương tự trong các cuộc thi Capture The Flags (CTFs)  .</li>
			<li> Impossible - Cấp độ này phải được <em> bảo mật trước tất cả các lỗ hổng bảo mật </em>. Nó được sử dụng để so sánh mã nguồn dễ bị tấn công với mã nguồn an toàn.<br />
				Trước phiên bản DVWA v1.9, cấp độ này được gọi là 'cao'.</li>
		</ol>
		<select name=\"security\">
			{$securityOptionsHtml}
		</select>
		<input type=\"submit\" value=\"Submit\" name=\"seclev_submit\">
		" . tokenField() . "
	</form>

	<br />
	<hr />
	<br />

	<h2>PHPIDS</h2>
	{$WarningHtml}
	<p>" . dvwaExternalLinkUrlGet( 'https://github.com/PHPIDS/PHPIDS', 'PHPIDS' ) . " v" . dvwaPhpIdsVersionGet() . " (PHP-Intrusion Detection System) một lớp bảo mật cho các ứng dụng web dựa trên PHP.</p>
	<p>PHPIDS hoạt động bằng cách lọc bất kỳ dữ liệu đầu vào nào do người dùng cung cấp có trong danh sách đen chứa mã độc hại tiềm ẩn. Nó được sử dụng trong DVWA để làm ví dụ trực tiếp về cách Tường lửa ứng dụng web (WAF) có thể giúp cải thiện bảo mật và trong một số trường hợp, WAF có thể bị vượt qua.</p>
    <p> Bạn có thể bật PHPIDS trên trang web này trong suốt phiên của mình.</p>

	<p>{$phpIdsHtml}</p>
	[<a href=\"?test=%22><script>eval(window.name)</script>\">Simulate attack</a>] -
	[<a href=\"ids_log.php\">View IDS log</a>]
</div>";

dvwaHtmlEcho( $page );

?>
