	<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyB5WA2se2-gCfhRA6TpGlUUyG_xxkQl41Y",
    authDomain: "sampledb-463a2.firebaseapp.com",
    databaseURL: "https://sampledb-463a2-default-rtdb.firebaseio.com",
    projectId: "sampledb-463a2",
    storageBucket: "sampledb-463a2.appspot.com",
    messagingSenderId: "108015086112",
    appId: "1:108015086112:web:209abd321f4a2d45ca6a45",
    measurementId: "G-1L2RG26KEE"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyB5WA2se2-gCfhRA6TpGlUUyG_xxkQl41Y",
    authDomain: "sampledb-463a2.firebaseapp.com",
    databaseURL: "https://sampledb-463a2-default-rtdb.firebaseio.com",
    projectId: "sampledb-463a2",
    storageBucket: "sampledb-463a2.appspot.com",
    messagingSenderId: "108015086112"
  };
  firebase.initializeApp(config);
</script>
	<script type="text/javascript">
	$(function() {

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {

  /* student */
  var table = $('#accountsData').DataTable();
var database = firebase.database().ref().child("Users");
   database.orderByChild("type").equalTo("admin").once('value', function(snapshot){
   table.clear();
        if(snapshot.exists()){
            var content = '';
            snapshot.forEach(function(data){

                var val = data.val();
				table.row.add( $(
				"<tr>"+
				"<td style='text-align:center;'> <button type='button' class='btn btn-xs btn-warning'>"+ val.type+"</button></td>"+
				"<td>" + val.email + "</td>"+
				"<td>" + val.name + "</td>"+
				"</tr>"
				)[0] ).draw();
            });

        }
    });

$(document).on('click', '#register', function () {
var email =$('#email').val();
var name =$('#name').val();
var password =$('#password').val();
var cpassword =$('#cpassword').val();

 if(password==cpassword){

 var database = firebase.database().ref().child("Users");
   database.orderByChild("email").equalTo(email).once('value', function(snapshot){
        if(snapshot.exists()){
          // window.alert("User Email Exists!");
				$("#errortxt").text("User Email Exists!");
				$('#errorModal').modal('show');
        }else{
				// window.alert("User Email Valid!");
				firebase.auth().createUserWithEmailAndPassword(email,password).then(function(user){

				var userVal = user.uid;
				firebase.database().ref('Users/' + userVal).set({
				email: email,
				name: name,
				password : password,
				type:"admin"
				});
				$("#errortxt").text("New Admin Created!");
				$('#errorModal').modal('show');

		//	window.alert("New Admin Created!");
				$('#email').val("");
				$('#name').val("");
				$('#password').val("");
				$('#cpassword').val("");
				}).catch(function(error) {
				console.log('there was an error');
				var errorCode = error.code;
				var errorMessage = error.message;
				console.log(errorCode + ' - ' + errorMessage);
				});
		}
    });
 }else{
  //window.alert("Password not the same.");
  $("#errortxt").text("Password not the same.");
				$('#errorModal').modal('show');
 }

});


  }  else {
    window.location="login/index.html";
  }
});




	});

	</script>
	<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$('#accountsData').DataTable({
   	"paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
   });
</script>
