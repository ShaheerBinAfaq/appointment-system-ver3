<style><?php include public_path('css/Style1.css') ?></style>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset( '../../public/css/Style1.css') }}"> -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<img class="wave" src="\images\img/wave.png">
	<div class="container">
		<div class="img">
			<img src= '\images\img\bg.svg'>
		</div>
		<div class="login-content">
			<form id="login-form" >
				<img src="\images\img/avt.png">
				<h2 class="title">Welcome!</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" id="email" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" id="password" class="input">
            	   </div>
            	</div>
            	<input type="submit" class="btnReg" value="Login">
              <button onClick="signUp()" class="btnReg" id="register">Sign Up</button>
			 <br> 
			  <hr>
			  <button onClick="doctorview()" class="btnReg">Doctor</button>
				<button onClick="adminview()" class="btnReg">Admin</button>
            </form>
			<p id="error"> </p>
        </div>
    </div>
    
</body>

<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
</script>
<script>
    const loginform = document.querySelector('#login-form');
	loginform.addEventListener('submit', (e)=>{
		e.preventDefault();

		const email= loginform['email'].value;
    	const password= loginform['password'].value;

		firebase.auth().signInWithEmailAndPassword(email, password).then((userCredential) => {
			// Logged in
			console.log(userCredential);
			var user = firebase.auth().currentUser;
		if(user){
			console.log(user.uid);
			window.location = '/home?uid=' + user.uid;
		}
		else{
			console.log('user does not exist')
		}
		})
		.catch((error) => {
			var errorCode = error.code;
			var errorMessage = error.message;
			document.getElementById('error').innerHTML = errorMessage;
		});
	});
	
    //Route to sign up
	function signUp(){
		window.location = 'signup';
	}
	function doctorview(){
		window.location = 'doctorlogin';
	}
	function adminview(){
		window.location = 'adminlogin';
	}
	const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
</script>

</html>
