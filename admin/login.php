<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iPoint</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
     
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
   <center> <img src="../images/ipointlogo1.png" alt="ipoint Logo"
           height="40px" width="170px" > </center>
      <p class="login-box-msg">ADMINISTRATOR LOGIN</p>

      <form >
        <div class="input-group mb-3">
          <input type="email" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" id="loginbtn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<br/>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
<script>

$(document).on('click', '#loginbtn', function () {

  var username = $("#username").val();
  var password = $("#password").val();

   if(username==""){
      showAlert('error','Empty Fields','Please enter username! ');
      return;
    }
  if(password==""){
     showAlert('error','Empty Fields','Please enter password! ');
     return;
   }

  var values = {
  "username": username,
  "password": password
  }

  $.ajax({
    type: "POST",
    url: "php_operation/logincode.php",
    data: values,
    dataType: 'JSON',
    success: function(response){

      var status = response[0].status;
      var error = response[0].error;

      if(status=="success")  showAlert('success','Success','Login Success');
      if(status=="error")  showAlert('error','Error',error);

    }




  });

});

function showAlert(icon, title, content){
  Swal.fire({
  icon: icon,
  title: title,
  text: content,
  confirmButtonText: 'CONTINUE',
  allowEscapeKey: false,
  allowOutsideClick: false,
}).then((result) => {

  if (result.isConfirmed) {
    if(icon=='success') 	window.location="index.php";



  }
})



}

</script>
</html>
