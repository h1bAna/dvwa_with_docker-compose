<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Welcome' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Welcome to Damn Vulnerable Web Application!</h1>
	<p>Damn Vulnerable Web Application (DVWA) là một ứng dụng mã nguồn PHP/MySQL tập hợp sẵn các lỗi logic về bảo mật ứng dụng web trong mã nguồn PHP. Mục tiêu chính của nó là hỗ trợ các chuyên gia bảo mật kiểm tra kỹ năng và công cụ của họ trong môi trường pháp lý, giúp các nhà phát triển web hiểu rõ hơn về quy trình bảo mật ứng dụng web và để hỗ trợ cả học sinh và giáo viên tìm hiểu về bảo mật ứng dụng web trong môi trường phòng học được kiểm soát.</p>
	<p>Mục đích của DVWA là <em>thực hành một số lỗ hổng web phổ biến nhất</em>, ở <em>nhiều mức độ khó khác nhau</em>, với giao diện đơn giản dễ hiểu.</p>
	<hr />
	<br />

	<h2>Hướng Dẫn Chung</h2>
	<p>Cách họ tiếp cận DVWA tùy thuộc vào người dùng. Bằng cách làm việc qua mọi mô-đun ở mức cố định hoặc chọn bất kỳ mô-đun nào và làm việc để đạt đến mức cao nhất mà họ có thể trước khi chuyển sang phần tiếp theo. Không có đối tượng cố định để hoàn thành một mô-đun; tuy nhiên người dùng nên cảm thấy rằng họ đã khai thác thành công hệ thống tốt nhất có thể bằng cách sử dụng lỗ hổng cụ thể đó.</p>
	<p>Xin lưu ý rằng phần mềm này có cả lỗ hổng <em>được lập thành tài liệu và không có tài liệu</em>. Điều này là cố ý. Bạn nên thử và khám phá càng nhiều vấn đề càng tốt.</p>
	<p>DVWA cũng bao gồm Web Application Firewall (WAF), PHPIDS, có thể được bật ở bất kỳ module nào để tăng thêm độ khó. Điều này sẽ chứng minh cách thêm một lớp bảo mật khác có thể chặn một số hành động độc hại. Lưu ý, cũng có nhiều phương pháp công khai khác nhau trong việc bypass các biện pháp bảo vệ này (vì vậy đây có thể được coi là một phần mở rộng cho những người dùng nâng cao hơn)!</p>
	<p>Có một nút trợ giúp ở cuối mỗi trang, cho phép bạn xem các gợi ý và mẹo cho lỗ hổng đó. Ngoài ra còn có các liên kết bổ sung để đọc thêm thông tin cơ bản liên quan đến vấn đề bảo mật đó.</p>
	<hr />
	<br />

	<h2>CẢNH BÁO!</h2>
	<p>Damn Vulnerable Web Application rất dễ bị tấn công! <em>Không tải nó lên thư mục html của nhà cung cấp dịch vụ lưu trữ của bạn hoặc bất kỳ máy chủ nào có Internet</em>, vì chúng sẽ bị khai thác. Bạn nên sử dụng máy ảo (chẳng hạn như " . dvwaExternalLinkUrlGet( 'https://www.virtualbox.org/','VirtualBox' ) . " hoặc " . dvwaExternalLinkUrlGet( 'https://www.vmware.com/','VMware' ) . "), dược đặt thành Chế độ mạng NAT. Bên trong máy khách, bạn có thể tải xuống và cài đặt" . dvwaExternalLinkUrlGet( 'https://www.apachefriends.org/en/xampp.html','XAMPP' ) . " cho máy chủ web và cơ sở dữ liệu.</p>
	<br />
	<h3>Tuyên bố từ chối trách nhiệm</h3>
	<p>Chúng tôi không chịu trách nhiệm về cách thức mà bất kỳ ai sử dụng ứng dụng này (DVWA). Chúng tôi đã làm cho các mục đích của ứng dụng rõ ràng và nó không được sử dụng với mục đích xấu. Chúng tôi đã đưa ra các cảnh báo và thực hiện các biện pháp để ngăn người dùng cài đặt DVWA vào các máy chủ web trực tiếp. Nếu máy chủ web của bạn bị xâm phạm thông qua cài đặt DVWA, chúng tôi không chịu trách nhiệm mà là trách nhiệm của người đã tải lên và cài đặt nó.</p>
	<hr />
	<br />

	<h2>Tìm Hiểu Thêm</h2>
	<p>DVWA nhằm mục đích che phủ các lỗ hổng thường thấy nhất được tìm thấy trong các ứng dụng web hiện nay. Tuy nhiên, có rất nhiều vấn đề khác với các ứng dụng web. Nếu bạn muốn khám phá bất kỳ vectơ tấn công bổ sung nào hoặc muốn có nhiều thử thách khó khăn hơn, bạn có thể muốn xem xét các dự án khác sau:</p>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://github.com/webpwnized/mutillidae', 'Mutillidae') . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project', 'OWASP Broken Web Applications Project
') . "</li>
	</ul>
	<hr />
	<br />
</div>";

dvwaHtmlEcho( $page );

?>
