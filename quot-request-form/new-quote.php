<?php
require "db.php";

if (isset($_POST["submit"])) {
  $descriptions = $_POST["descriptions"];
  $code = $_POST["code"];
  $quantity = $_POST["quantity"];
  $images = $_POST["images"];

  $insert = mysqli_query($conn, "INSERT INTO quote_items(descriptions, code,quantity, images) VALUES('$descriptions','$code','$quantity','images')");
  if ($insert) {
    // echo "successfully inserted";
  } else {
    echo "failed to insert";
  }
  if($insert){
    // echo "success";
    // header('location:display.php');
 }else{
    echo "error";
 }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>


 <div class="container">
           <!-- <h1>Price Quote Request</h1> -->

<div id="item-box" >
  <form method="post" id="item-form" class="row g-3" name="submit">
    
 <!-- <div class="col-md-3">
    <input type="text" id="description" name="descriptions" class="form-control" placeholder="Enter item description" required><div class="invalid-feedback">
      Looks good!
    </div>
</div>

<div class="col-md-3">
    <input type="text" id="code" name="code" class="form-control" placeholder="Enter item code number" required>
    <div class="invalid-feedback">
      Looks good!
    </div>
</div>

<div class="col-md-3">
    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" required>
    <div class="invalid-feedback">
      Looks good!
    </div>
</div>

<div class="col-md-3">
      <input type="file" accept="image/png, image/gif, image/jpeg" id="myimage" name="images" class="form-control" placeholder="Input Image" required>
      <div class="invalid-feedback">
        Looks good!
      </div>
  </div> --> 

    <div class="col-12">
    <button class="btn btn-primary mb-3" type="button" id="add-item">Add item</button>
    </div>
 

    <div class="col-12">
              <button class="btn btn-primary mb-3" type="submit" name="submit" id="submit-quote">Submit Quotation</button>
            </div>
  
    </form>
</div>
    <br/>
  

    <!-- <div class="table-responsive">
  <table class="table table-bordered" id="quoteTable">
    <thead>
      <thead>
        <tr>
          <th></th>
          <th>ITEM DESCRIPTION</th>
          <th>ITEM CODE</th>
          <th>QUANTITY</th>
          <th>ITEM IMAGE</th>
        </tr>
      </thead>
      <tbody id="tableBody">
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"><button class="btn btn-primary" type="button" id="delete-row" >Delete
              Row</button></td>
  </tr>
      </tfoot>
    </table>
    </div>
   -->


  
  </div>
  
  </div>
      </div>
  </div>
  
  
 
    <script src="js/jquery-3.6.3.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/quotation.js"></script> -->
       <script src="js/bootstrap.min.js"></script> 

<script>
  $(document).ready(function(){
    $('#add-item').click(function(e){
      e.preventDefault()
      var newField = $('<div class="col-md-3"><input type="text" id="description" name="descriptions" class="form-control" placeholder="Enter item description" required><div class="invalid-feedback">Looks good!</div></div>')
      newField.addClass('col-md-3')
      var seField = $('<div class="col-md-3"><input type="text" id="code" name="code" class="form-control" placeholder="Enter item code number" required><div class="invalid-feedback">Looks good!</div></div>')
      seField.addClass('col-md-3')
      var tdField = $('<div class="col-md-3"><input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" required><div class="invalid-feedback">Looks good!</div></div>')
      tdField.addClass('col-md-3')
      var ftField = $('<div class="col-md-3"><input type="file" accept="image/png, image/gif, image/jpeg" id="myimage" name="images" class="form-control" placeholder="Input Image" required><div class="invalid-feedback">Looks good!</div></div>')
      ftField.addClass('col-md-3')
      newField.appendTo('#item-form').last()
      seField.appendTo('#item-form').last()
      tdField.appendTo('#item-form').last()
      ftField.appendTo('#item-form').last()
    })
  })
</script>


</body>
</html>