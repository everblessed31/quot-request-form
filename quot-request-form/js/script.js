// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()


$('#login').click(function (e) {
    var email =  document.getElementById("email").value;
    var password =  document.getElementById("password").value;

    if (email !== '' && password !== '') {
      
e.preventDefault();

      $.ajax({
        url: 'ajaxfile.php',
        type: 'post',
        beforeSend: function () {
          document.getElementById("login").disabled = true;
          document.getElementById("login").innerHTML = '<img src="images/loader.gif" width="20px" height="20px"> Processing...';
        },
        data: {
          request: 2,
          email: email,
          password: password
        },
        dataType: 'json',
        success: function (response) {
          if (response.status == 1) {
            window.location = "./";
            alert(response.message);
          } else {
            alert(response.message);
          }

        },
        complete: function (data) {
          document.getElementById("login").disabled = false;
          document.getElementById("login").innerHTML = 'Login';
        },
      });
    }

  });


 
$('#signup').click(function (e) {
    var name =  document.getElementById("name").value;
    var email =  document.getElementById("email").value;
    var password =  document.getElementById("password").value;

    if(name !== '' && email !== '' && password !== '') {
      
e.preventDefault();

      $.ajax({
        url: 'ajaxfile.php',
        type: 'post',
        beforeSend: function () {
          document.getElementById("signup").disabled = true;
          document.getElementById("signup").innerHTML = '<img src="images/loader.gif" width="20px" height="20px"> Processing...';
        },
        data: {
          request: 3,
          name: name,
          email: email,
          password: password
        },
        dataType: 'json',
        success: function (response) {
          if (response.status == 1) {
            window.location = "./login";
            alert(response.message);
          } else {
            alert(response.message);
          }

        },
        complete: function (data) {
          document.getElementById("signup").disabled = false;
          document.getElementById("signup").innerHTML = 'Signup';
        },
      });
    }

  });


