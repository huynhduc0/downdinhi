<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="3;url=list.php">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<title>Kết quả</title>
</head>
<body>

<?php 
if (isset($_POST['signup'])) {
	if (isset($_POST['user_name']) &&isset($_POST['user_name']) &&isset($_POST['user_name'])) {
		if($_POST['password']!=$_POST['repassword']){
		echo '<div class="alert alert-warning" role="alert">
		    <strong>PASSWORD CẦN PHẢI GIỐNG NHAU</strong>
		</div>';
	}
		else{
			require 'connection.php';
			$sql='insert into  `member`( `Username`, `Password`) values ("'.$_POST['user_name'].'","'.md5($_POST['password']).'")';
			// echo $sql;
		    if (mysqli_query($conn, $sql)) {
			    echo '<div class="alert alert-success" role="alert">
			    	<strong>Thêm tài khoản thành công</strong>
			    </div>';
			}

			else{
				echo '<div class="alert alert-warning" role="alert">
				    Lỗi server...
				</div>';
			}
}
}
else{
	echo '<div class="alert alert-warning" role="alert">
	    <strong>Nhập thiếu gì đó rồi bạn trẻ ạ</strong>
	</div>';
}
}
 ?>

</body>
</html>