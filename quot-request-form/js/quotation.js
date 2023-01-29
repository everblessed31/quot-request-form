//Add quote details

var addQuote = document.getElementById("add-quote");
addQuote.addEventListener("click", submitQuote);

function submitQuote(e) {
  var requestor = document.getElementById("requestor").value;
  var company = document.getElementById("company").value;
  var location = document.getElementById("location").value;
  var request_date = document.getElementById("request_date").value;
  var required_date = document.getElementById("required_date").value;
  var items = document.getElementsByName("item_status");
  var model = document.getElementsByName("model_availability");

  for (let i = 0; i < items.length; i++) {
   if(items[i].checked){
    item_status = items[i].value;
   }
  }

  for (let i = 0; i < model.length; i++) {
    if(model[i].checked){
     model_availability = model[i].value;
    }
   }

  if(requestor !== '' && company !== '' && location !== '' && request_date !== '' && required_date !== '' && item_status !== '' && model_availability !== ''){
 
e.preventDefault();

        document.getElementById("add-quote").disabled = true;
        document.getElementById("add-quote").innerHTML = '<img src="images/loader.gif" width="20px" height="20px"> Processing';

setTimeout(function () {
  document.getElementById("item-box").style.display = "block";
  document.getElementById("add-quote").disabled = false;
      document.getElementById("item-box").style.display = "block";
      document.getElementById("add-quote").style.display = "none";
      document.getElementById("add-quote").innerHTML = 'Proceed';
}, 800);

  }

}


//Add quote items
var addItem = document.getElementById("add-item");
var quoteTable = document.getElementById('quoteTable').getElementsByTagName('tbody')[0];
addItem.addEventListener("click", submitItem);
descArr = [];
codeArr = [];
quantityArr = [];

function submitItem(e) {

  var descriptions = document.getElementById("descriptions").value;
  var code = document.getElementById("code").value;
  var quantity = document.getElementById("quantity").value;
  var quantity = document.getElementById("images").value;

  if(descriptions !== '' && code !== '' && quantity !== '' && images !== ''){

   descArr.push(descriptions);
   codeArr.push(code);
   quantityArr.push(quantity);
   imagesArr.push(images);

    e.preventDefault();

    
      document.getElementById("add-item").disabled = true;
      document.getElementById("add-item").innerHTML = '<img src="images/loader.gif" width="20px" height="20px"> Processing';

    setTimeout(function () {
      document.getElementById("item-form").reset();

            var row = quoteTable.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell4 = row.insertCell(4);
    
            cell1.innerHTML = "<input type='checkbox' value='d' name='record'>";
            cell2.innerHTML = descriptions;
            cell3.innerHTML = code;
            cell4.innerHTML = quantity;
            cell4.innerHTML = images;
            
      document.getElementById("add-item").disabled = false;
      document.getElementById("add-item").innerHTML = 'Add item';

    var checkboxes = document.getElementsByName('record');
    if(checkboxes.length > 0) {
      document.getElementById('submit-quote').disabled = false;
    }else{
      document.getElementById('submit-quote').disabled = true;
    }
    }, 500);

  }
}

//Submit quotations
var submitQuotation = document.getElementById("submit-quote");
submitQuotation.addEventListener("click", submitQuotations);

function submitQuotations() {

  var requestor = document.getElementById("requestor").value;
  var company = document.getElementById("company").value;
  var location = document.getElementById("location").value;
  var request_date = document.getElementById("request_date").value;
  var required_date = document.getElementById("required_date").value;
  var items = document.getElementsByName("item_status");
  var model = document.getElementsByName("model_availability");

  for (let i = 0; i < items.length; i++) {
    if(items[i].checked){
     item_status = items[i].value;
    }
   }
 
   for (let i = 0; i < model.length; i++) {
     if(model[i].checked){
      model_availability = model[i].value;
     }
    }


  var description = descArr.toString();
  var code = codeArr.toString();
  var quantity = quantityArr.toString();
  
  $.ajax({
      url: 'ajaxfile.php',
      type: 'post',
      beforeSend: function () {
        document.getElementById("submit-quote").disabled = true;
        document.getElementById("submit-quote").innerHTML = '<img src="images/loader.gif" width="20px" height="20px"> Processing';
      },
      data: {
        request: 1, requestor: requestor, company: company, location: location, request_date: request_date, required_date: required_date, item_status: item_status, model_availability: model_availability, description: description, code: code, quantity: quantity
      },
      dataType: 'json',
      success: function (response) {
        if (response.status == 1) {
          alert("Quotation submitted successfully"); 
          
          setTimeout(function () {
            window.location = 'quotations/'+response.ref_no;
          }, 1000);

        } else {
          alert(response.message);
        }
      },
      complete: function (data) {
        document.getElementById("add-quote").disabled = false;
        document.getElementById("item-box").style.display = "block";
        document.getElementById("add-quote").style.display = "none";
        document.getElementById("add-quote").innerHTML = 'Proceed';
      },
  
    });

}

//Delete quote item
var delItem = document.getElementById("delete-row");
delItem.addEventListener("click", deleteItem);

function deleteItem() {
  
  var checkboxes = document.getElementsByName('record');
  var itemArray = [];
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      itemArray.push(i);
    }
  }

  itemArray.forEach(myFunction);

  function myFunction(item){
    quoteTable.deleteRow(item);
  }

  var checkboxes = document.getElementsByName('record');
  if(checkboxes.length > 0) {
    document.getElementById('submit-quote').disabled = false;
  }else{
    document.getElementById('submit-quote').disabled = true;
  }
}

