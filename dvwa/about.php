<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'About' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'about';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h2>About</h2>
	<p>Damn Vulnerable Web Application (DVWA) là một ứng dụng mã nguồn PHP/MySQL tập hợp sẵn các lỗi logic về bảo mật ứng dụng web trong mã nguồn PHP. Mục tiêu chính của nó là hỗ trợ các chuyên gia bảo mật kiểm tra kỹ năng và công cụ của họ trong môi trường pháp lý, giúp các nhà phát triển web hiểu rõ hơn về quy trình bảo mật ứng dụng web và để hỗ trợ cả học sinh và giáo viên tìm hiểu về bảo mật ứng dụng web trong môi trường phòng học được kiểm soát.</p>
	<p>Trước tháng 8 năm 2020, Tất cả tài liệu đều có bản quyền 2008-2015 Random Storm & Ryan Dewhurst.</p>
	<p>Hiện tại, tất cả tài liệu thuộc bản quyền Robin Wood và có thể là Ryan Dewhurst.</p>

	<h2>Links</h2>
	<ul>
		<li>Homepage: " . dvwaExternalLinkUrlGet( 'http://www.dvwa.co.uk/' ) . "</li>
		<li>Project Home: " . dvwaExternalLinkUrlGet( 'https://github.com/digininja/DVWA' ) . "</li>
		<li>Bug Tracker: " . dvwaExternalLinkUrlGet( 'https://github.com/digininja/DVWA/issues' ) . "</li>
		<li>Wiki: " . dvwaExternalLinkUrlGet( 'https://github.com/digininja/DVWA/wiki' ) . "</li>
	</ul>

	<h2>Credits</h2>
	<ul>
		<li>Brooks Garrett: " . dvwaExternalLinkUrlGet( 'http://brooksgarrett.com/','www.brooksgarrett.com' ) . "</li>
		<li>Craig</li>
		<li>g0tmi1k: " . dvwaExternalLinkUrlGet( 'https://blog.g0tmi1k.com/','g0tmi1k.com' ) . "</li>
		<li>Jamesr: " . dvwaExternalLinkUrlGet( 'https://www.creativenucleus.com/','www.creativenucleus.com' ) . "</li>
		<li>Jason Jones</li>
		<li>RandomStorm</li>
		<li>Ryan Dewhurst: " . dvwaExternalLinkUrlGet( 'https://wpscan.com/','wpscan.com' ) . "</li>
		<li>Shinkurt: " . dvwaExternalLinkUrlGet( 'http://www.paulosyibelo.com/','www.paulosyibelo.com' ) . "</li>
		<li>Tedi Heriyanto: " . dvwaExternalLinkUrlGet( 'http://tedi.heriyanto.net/','tedi.heriyanto.net' ) . "</li>
		<li>Tom Mackenzie</li>
		<li>Robin Wood: " . dvwaExternalLinkUrlGet( 'https://digi.ninja/','digi.ninja' ) . "</li>
	</ul>
	<ul>
		<li>PHPIDS - Copyright (c) 2007 " . dvwaExternalLinkUrlGet( 'http://github.com/PHPIDS/PHPIDS', 'PHPIDS group' ) . "</li>
	</ul>

	<h2>Giấy phép</h2>
	<p>Damn Vulnerable Web Application (DVWA) là phần mềm miễn phí: bạn có thể phân phối lại và / hoặc sửa đổi nó theo các điều khoản của Giấy phép Công cộng GNU (GNU General Public License) như được xuất bản bởi Tổ chức Phần mềm Miễn phí, phiên bản 3 của Giấy phép, hoặc
(theo tùy chọn của bạn) bất kỳ phiên bản nào sau này.</p>
	<p>Thư viện PHPIDS, thành thật mà nói, với bản phân phối DVWA này. Hoạt động của PHPIDS được cung cấp mà không có sự hỗ trợ từ nhóm DVWA. Nó được cấp phép theo các <a href=\"" . DVWA_WEB_PAGE_TO_ROOT . "instructions.php?doc=PHPIDS-license\">điều khoản riêng </a>cho mã DVWA </p>

	<h2>Phát triển</h2>
	<p>Mọi người đều được hoan nghênh đóng góp và giúp làm cho DVWA thành công nhất có thể. Tất cả những người đóng góp có thể đặt tên và liên kết của họ (nếu họ muốn) trong Credits. Để đóng góp, hãy chọn một Vấn đề từ Trang chủ dự án để giải quyết hoặc gửi bản vá cho danh sách Vấn đề.</p>
</div>\n";

dvwaHtmlEcho( $page );

exit;

?>
