<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
</head>
<body>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="login.css">
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		<form class="login-form" action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input name="user_name" type="text" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input name="password" type="password" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input name="save" type="checkbox" class="form-check-input">
      <small>Remember Me</small>
 <div id="capcha" class="form-group">
 	
    
  </div>
    </label>
    <button name="login" type="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>
	</div>
</div>
</section>
<?php 
require 'connection.php';
	session_start();
	error_reporting(0); 
	if (isset($_POST['login'])) {
		$sql= 'select * from member where username="'.$_POST['user_name'].'" and password="'.md5($_POST['password']).'"';
		 $result=mysqli_query($conn, $sql);
		 $count = $result->num_rows;
		    if ($count==1) {
		    		$_SESSION['numwrong']==0;
		    	echo 'chúc mừng, đăng nhập thành công';
		    	if (isset($_POST['save'])) {
		    	// session_start();
		    	$_SESSION['user_name']=$_POST['user_name'];

		    }
		    else{
		    	header("Location: list.php");
				die();
		    }
		
		    	if (isset($_SESSION['user_name'])) {
		echo '<div class="alert alert-success" role="alert">
			Xin chào,<strong>'.$_SESSION['user_name'].'</strong>';
		echo '<a href="out.php" title=""><button type="button" class="btn btn-warning">Đăng Xuất</button></div></a>';
			echo '<a href="listproduct.php" title=""><button type="button" class="btn btn-success">XEM DANH SÁCH THÀNH VIÊN</button></div></a>';
	}
		    } 
		    else{
		    	echo 'tên tài khoản hoặc mật khẩu không đúng <br>';
		    	$_SESSION['numwrong']+=1;
		    	if ($_SESSION['numwrong']>4) {
		    		$_SESSION['capcha']=rand(100,999);
		    		// echo $_SESSION['capcha'];
		    		echo '
		    		<script>
						$(document).ready(function() {
    					var txt;
    						var person = prompt("Nhập: '.$_SESSION['capcha'].' để tiếp tục", "xxxx");
    if (person!='.$_SESSION['capcha'].') {
        alert("sai capcha");
        location.reload();
    } else {
        
    }
   
});
</script>';
		    	}
		    	else
		    	echo 'Nếu sai '.(5-$_SESSION['numwrong']).' lần nữa bạn sẽ phải nhập capcha';
		    }
		}    
	
 ?>