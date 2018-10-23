<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xóa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
	
</body>
</html>
<?php
require 'connection.php'; 
if (isset($_POST['xoa'])) {

		$id=$_POST['xoa'];
		$sql="delete from member where Memberid=".$id;
		 if (mysqli_query($conn, $sql)) {
    echo "Xóa thành công";
    header("Location:list.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	}
else if(isset($_POST['sua'])){
	$id=$_POST['sua'];
		$sql="select * from member where MemberID=".$id;
		  $result = $conn->query($sql);
                    // echo $sql;
// var_dump($result);
if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
     echo '<form action="" method="POST">
                <div class="form-group">
                        <input type="text" name="id" value="'.$row['MemberID'].'" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>USERNAME</label>
                        <input type="text" name="username" value="'.$row['Username'].'" class="form-control" placeholder="Nhập vào họ tên">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="Password" name="Password" value="" class="form-control">
                    </div>
                      <button type="submit" name="save"  class="btn btn-primary">Lưu</button>';

    }
}

else{
	echo 'null';
}
}
else if(isset($_POST['save'])){
	 					 $id=$_POST['id'];
                           $ten=$_POST['username'];
                           $pass=$_POST['Password'];
                          
                            $sql='update member set Username="'.$ten.'",Password="'.md5($pass).'" where Memberid="'.$id.'"';
                            
                            // echo '",ten="'.$ten.'",lop="'.$lop.'",ngaysinh="'.$ns.'" where masv="'.$masv'"';
                             // $conn = new mysqli('localhost', 'root','','ttsv');
                             // mysqli_set_charset($conn, 'UTF8');   
                if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: list.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

 	
  ?>