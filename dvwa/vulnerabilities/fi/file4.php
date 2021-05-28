<?php

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerability: File Inclusion</h1>
	<div class=\"vulnerable_code_area\">
		<h3>File 4 (Bị ẩn)</h3>
		<hr />
		Ơ mây zing gút chóp em!<br />
		File này không được liệt kê trong dvwa, nếu bạn đọc được dòng này. Chắc hẳn bạn đã làm đúng gì đó ;-)<br />
		<!-- You did an even better job to see this :-)! -->
		<img src=./file4.jpg >
</div>\n";

?>
