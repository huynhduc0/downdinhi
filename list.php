<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<title>Danh sách user</title>
</head>
<body><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="login.css">
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Thêm người thêm vui, gấp đôi canxi để làm gì?</h2>
		<form class="login-form" action="signup.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input name="user_name" type="text" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input name="password" type="password" class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">RePassword</label>
    <input name="repassword" type="password" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
    </label>
    <button name="signup" type="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>
	</div>
	<div class="col-md-8">
		<?php  require('connection.php'); ?>
	      <h3 >Danh sách các cháu</h3>
            <?php
            session_start();
           if (isset($_SESSION['user_name'])) {
		echo '<div class="alert alert-success" role="alert">
			Xin chào,<strong>'.$_SESSION['user_name'].'</strong>';
		echo '<a href="out.php" title=""><button type="button" class="float-right btn btn-warning">Đăng Xuất</button></a></div>';
	}
                if ($conn->connect_error) {
                    die("Failed to connect: " . $conn->connect_error);
                }

                $sql = "Select MemberID, Username from member";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên User</th>
                        </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()) {
                        echo 
                            '<form action="delete.php" method="post">
                            <tbody>
                                <tr>
                                 <td>'.$row['MemberID'].'</td>
                                <th scope="row" name="user_name" value="'.$row['Username'].'">'.$row['Username'].'</th>
                                <td><button type=submit name="sua" value="'.$row['MemberID'].'" class="btn btn-success">Sửa</button></td>
                               <td><button type=submit name="xoa" value="'.$row['MemberID'].'" class="btn btn-danger">Xóa</button></td>
                                </tr>
                            </tbody>
                            </form>'
                            ;
                    }

                } 
                else {
                    echo "Null";
                }
            ?>
      </div>
	</div>
</div>
</section>
	 

</body>
</html>4