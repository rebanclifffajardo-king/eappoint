<!DOCTYPE html>
<html lang="en">
<head>

     <title>E-Appoint</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
      <link rel="stylesheet" href="css/modal-login.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to Clinic Appointment System</p>
                    </div>

                 

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->

                          <img src="images/ipointlogo1.png" alt="ipoint Logo"
                               height="40px" width="120px"  >
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#top" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About Us</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#loginmodal" data-backdrop="static" data-keyboard="false" >Login</a></li>
                         <li class="appointment-btn"><a href="#appointment">Create your account</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's make your work easier</h3>
                                             <h1>Easy Appointment</h1>
                                             <a href="#appointment" class="section-btn btn btn-default smoothScroll">Get Started</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>You don't need to wait too long</h3>
                                             <h1>Be Updated</h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Our best doctors are here</h3>
                                             <h1>Quality Professionals</h1>
                                             <a href="#team" class="section-btn btn btn-default btn-blue smoothScroll">Meet our Doctors</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Clinic Appointment System</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>If you are from Trento, Agusan Del Sur, this is your easy way to schedule an appointment to one of the best clinics in the province.</p>
                                   <p>As of today, we have registered (5) five clinics in the province that offers online appointments based on their available doctors.</p>
                              </div>
                             
                         </div>
                    </div>

               </div>
          </div>
     </section>


     

     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="#">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Create your Account</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control has" id="firstname" name="firstname" placeholder="First Name">

                                   </div>
                                   <!--
                                   <div class="col-md-6 col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                   </div>
                                 -->
                                   <div class="col-md-6 col-sm-6">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                   </div>
                                   <div class="col-md-6 col-sm-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                   </div>
                                   <div class="col-md-6 col-sm-6">
                                        <label for="password">Confirm Password</label>
                                        <input type="cpassword" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                        <label for="telephone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">

                                            <div id="div_error">

                                            </div>
                                        <button type="button" class="form-control" id="cf-submit" name="register">REGISTER</button>
                                          <a href="#" data-toggle="modal" data-target="#loginmodal" style="float:right;">I already have an account</a>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

<!--
 
     <section id="google-map">
     How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
 
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
     </section>
          -->


     <!-- Modal login -->
   <div id="loginmodal" class="modal fade">
   	<div class="modal-dialog modal-login">
   		<div class="modal-content">
   			<div class="modal-header">
   				<div class="avatar">
   					<img src="images/avatar.png" alt="Avatar">
   				</div>
   				<h4 class="modal-title">Member Login</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   			</div>
   			<div class="modal-body">
   				<form action="/examples/actions/confirmation.php" method="post">
   					<div class="form-group">

   						<input type="text" class="form-control" name="username" id="log_username" placeholder="Username" required="required">
   					</div>
   					<div class="form-group">

   						<input type="password" class="form-control" name="password" id="log_password" placeholder="Password" required="required">
   					</div>

            <div id="divlog_error">

            </div>
   					<div class="form-group">
   						<button type="button" id="loginbtn" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
   					</div>
   				</form>
   			</div>
   			<div class="modal-footer">
   				<a href="#">Forgot Password?</a>
   			</div>
   		</div>
   	</div>
   </div>
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">
 

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text">
                                   <p>Copyright &copy; 2022 E-Appoint </p>
                              </div>
                         </div>
                     
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn">
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
     <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <script>

     //datatable







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
         if(icon=='success')
          	window.location="client/index.php";


       }
     })



     }



     $(document).on('click', '#loginbtn', function () {

       var username = $("#log_username").val();
       var password = $("#log_password").val();


       $('#divlog_error').html("<div class='alert alert-danger'><ul id='log_error'></ul> </div> ");

       var errors = false;
        if(username==""){
        $('#log_error').append("<li>Please enter username.</li>");
        errors = true;
        }
        if(password==""){
        $('#log_error').append("<li>Please enter password.</li>");
        errors = true;
        }


        if(!errors){
           $('#divlog_error').html("");

        var values = {
        "username": username,
        "password": password
        }

        login(values);
      }


     });

     function login(data){
       $.ajax({
              type: "POST",
              url: "client/php_operation/loginaccount.php",
              data: data,
              cache: false,
              success:  function(data){
          //alert(data);
              if(data=="success"){
                showAlert('success','Success','You successfully login your account!');
              }if(data=="invalid"){
                showAlert('error','Invalid Account!','The account doesnt exist!');
              }if(data=="empty"){
                showAlert('error','Empty Fields!','Please complete all the necessary fields! ');
              }

              }
              });

     }

     $(document).on('click', '#cf-submit', function () {
       var email = $("#email").val();
       var username = $("#username").val();
       var password = $("#password").val();
       var cpassword = $("#cpassword").val();
       var firstname = $("#firstname").val();
       var lastname = $("#lastname").val();
       var phone = $("#phone").val();
       $('#div_error').html("<div class='alert alert-danger'><ul id='reg_error'></ul> </div> ");
       var errors = false;
        if(username==""){
        $('#reg_error').append("<li>Please enter username.</li>");
        errors = true;
        }
        if(password==""){
        $('#reg_error').append("<li>Please enter password.</li>");
        errors = true;
        }
        if(password!=cpassword){
        $('#reg_error').append("<li>Your passwords must be the same.</li>");
        errors = true;
        }
        if(email==""){
        $('#reg_error').append("<li>Please enter a valid email.</li>");
        errors = true;
        }
        if(firstname==""){
        $('#reg_error').append("<li>Please enter firstname.</li>");
        errors = true;
        }
        if(lastname==""){
        $('#reg_error').append("<li>Please enter lastname.</li>");
        errors = true;
        }
        if(phone==""){
        $('#reg_error').append("<li>Please enter phone number.</li>");
        errors = true;
        }



        if(!errors){
           $('#div_error').html("");

        var values = {
        "email": email,
        "username": username,
        "password": password,
        "firstname": firstname,
        "lastname": lastname,
        "phone": phone,
        }

        register(values);
      }

     });


function register(data){
  $.ajax({
         type: "POST",
         url: "client/php_operation/registeraccount.php",
         data: data,
         cache: false,
         success:  function(data){
     //alert(data);
         if(data=="success"){
           showAlert('success','Success','You successfully created your account!');
         }if(data=="exist"){
           showAlert('error','Account Exist!','The email address is already associated to another account! ');
         }if(data=="empty"){
           showAlert('error','Empty Fields!','Please complete all the necessary fields! ');
         }

         }
         });

}


     </script>
</body>
</html>
