<?php

require "db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 

    <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />

</head>
<body>
    <!-- <div class="container">
        <button class="btn btn-primary my-5"> <a href="user.php" class="text-light">Add User</a></button>
        <table class="table">
 -->



 <div class="container">
           <h1>Price Quote Request</h1>

<div id="item-box" >
  <form method="post" id="item-form" class="row g-3" name="submit">



        <div class="table-responsive">
  <table class="table table-bordered" id="quoteTable">
    <thead>
      <thead>
        <tr>
        <th scope="col">S/N</th>
          <th scope="col">ITEM DESCRIPTION</th>
          <th scope="col">ITEM CODE</th>
          <th scope="col">QUANTITY</th>
          <th scope="col">ITEM IMAGE</th>
        </tr>
      </thead>
      <tbody id="tableBody">

  
    <?php
$result = mysqli_query($conn, "SELECT * FROM quote_items");
if($result){
while($row= mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $descriptions=$row['descriptions'];
    $code=$row['code'];
    $quantity=$row['quantity'];
    $images=$row['images'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$descriptions.'</td>
    <td>'.$code.'</td>
    <td>'.$quantity.'</td>
    <td>'.$images.'</td>

  </tr>';
}
}
    ?>

  </tbody>
</table>
    </div>
   
    
</body>
</html>