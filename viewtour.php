<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="main.css">
    <title>View Book</title>
</head>
<body>
  <?php
    
   ?>
   <div class="container pt-5">
    <h1 class="text-center pb-5">Danh sách Sách hiện có</h1>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">TourID</th>
        <th scope="col">TourName</th>
        <th scope="col">Price</th>
        <th scope="col">Location</th>
        <th scope="col">Duration</th>
      </tr>

    </thead>
    <tbody>
     <?php 
        include('connection.php');

        $select = 'SELECT * FROM tour';
        $result = $conn->query($select);
          while($row = $result->fetch_assoc()) {
            echo '<tr>
                    <th scope="row">'.$row['TourID'].'</th>
                    <td>'.$row['Tourname'].'</td>
                    <td>'.$row['Price'].'</td>
                    <td>'.$row['Location'].'</td>
                    <td>'.$row['Duration'].'</td>
                  </tr>';
          }
     ?>
   </div>
</body>
</html>