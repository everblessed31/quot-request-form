<?php
require "db.php";

if (isset($_POST["submit"])) {
  $requestor = $_POST["requestor"];
  $company = $_POST["company"];
  $locations = $_POST["location"];
  $request_date = $_POST["request_date"];
  $required_date = $_POST["required_date"];
  $item_status = $_POST["item_status"];
  $model_availability = $_POST["model_availability"];

  $insert = mysqli_query($conn, "INSERT INTO quotes(requestor,company,locations,request_date,required_date,item_status,model_availability) VALUES('$requestor','$company','$locations','$request_date','$required_date','$item_status','$model_availability')");
  if ($insert) {
    echo "successfully inserted";
  } else {
    echo "failed to insert";
  }
  if($insert){
    // echo "success";
    header('location:display.php');
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

  <title>Price Quote Request</title>

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>


  <div class="wrapper">
    <div class="main">


      <div class="content">

        <div class="container">
          <h1>Price Quote Request</h1>

          <form method="post" id="quote-form" name="submit" class="row g-3">
            <div class="col-12">
              Requestor: <input type="text" id="requestor" class="form-control" name="requestor" placeholder="Enter your name" required>
              <!-- <div class="invalid-feedback">
                Requestor's name is required!
              </div> -->
            </div>

            <div class="col-md-6">
              Comapany: <input type="text" id="company" class="form-control" name="company" placeholder="Enter the company's name" required>
              <!-- <div class="invalid-feedback">
                Company's name is required!
              </div> -->
            </div>

            <div class="col-md-6">
              Location: <input type="text" id="location" class="form-control" name="location" placeholder="Enter your location" required>
              <!-- <div class="invalid-feedback">
                Location is required
              </div> -->
            </div>

            <div class="col-md-6">
              Requested Date: <input type="date" id="request_date"  value="<?php echo Date("Y-m-d") ?>"  name="request_date" class="form-control" placeholder="Select date" required>
              <!-- <div class="invalid-feedback">
                Date requested is required!
              </div> -->
            </div>

            <div class="col-md-6">
              Required date: <input type="date" id="required_date" name="required_date" class="form-control" placeholder="Select date" required>
              <!-- <div class="invalid-feedback">
                Date required is required!
              </div> -->
            </div>

            <div class="col-md-6">
              <p>Availability Status:</p>
                <input type="radio" id="Yes" name="item_status" value="Yes">
                <label for="html">Yes</label><br>
                <input type="radio" id="Yes" name="item_status" value="No">
                <label for="css">No</label><br>
               

              <div class="invalid-feedback">
                Please select availability status!
              </div> 
            </div>

            <div class="col-md-6 mb-3">
              <p>Replacement model availability:</p>
                <input type="radio" id="html" name="model_availability" value="Yes">
                <label for="html">Yes</label><br>
                <input type="radio" id="css" name="model_availability" value="No">
                <label for="css">No</label><br>
               

              <div class="invalid-feedback">
                Please select replacement model availability status!
              </div>
            </div>

                <div class="col-12">
              <button class="btn btn-primary mb-3" type="submit" name="submit" id="add-quote">Proceed</button>
            </div>

            
          </form> 
      
          

          <br>
          <?php  include_once 'new-quote.php'; ?>

          <!-- <div id="item-box" style="display: none;">
  <form id="item-form" class="row g-3 needs-validation" >
    
<div class="col-md-3">
    <input type="text" id="description" class="form-control" placeholder="Enter item description" required><div class="invalid-feedback">
      Looks good!
    </div>
</div>

<div class="col-md-3">
    <input type="text" id="code" class="form-control" placeholder="Enter item code number" required>
    <div class="invalid-feedback">
      Looks good!
    </div>
</div>

<div class="col-md-3">
    <input type="number" id="quantity" class="form-control" placeholder="Enter quantity" required>
    <div class="invalid-feedback">
      Looks good!
    </div>
</div>

<div class="col-md-3">
      <input type="file" accept="image/png, image/gif, image/jpeg" id="myimage" class="form-control" placeholder="Input Image" required>
      <div class="invalid-feedback">
        Looks good!
      </div>
  </div>

    <div class="col-12">
    <button class="btn btn-primary mb-3" type="submit" id="add-item">Add item</button>
    </div>

    </form>
    <br/>
  


    


    <div class="table-responsive">
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
  
  <div class="col-12">
      <button class="btn btn-primary mb-3" id="submit-quote" type="button" disabled>Submit quotation</button>
  </div>
  
  </div>
  
  </div>
      </div>
  </div> -->









</body>

</html>