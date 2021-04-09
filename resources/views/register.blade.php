<style><?php include public_path('css/StyleR.css') ?></style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <!-- <link rel="stylesheet" href="StyleR.css"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
<div class="container">
   
    <div class="content">
      <form id="login-form">
        <h2 class="title">Sign Up</h2>
        <div class="user-details">
          <div class="input-box">
            <input type="text" id="fname" placeholder="First Name" required>
          </div>
          <div class="input-box">
            <input type="text" id="lname" placeholder="Last Name" required>
          </div>
          <div class="input-box">
            <input type="text" id="phone" placeholder="Contact" required>
          </div>
          <div class="input-box">
            <input type="number" onkeyup="nicFunction(this)" id="nic" placeholder="CNIC" required>
          </div>
          <p id="nic-error"></p>
          <!-- <div class="input-box">
            <input type="text" placeholder="Blood Group" required>
          </div> -->
          <div class="input-box">
            <input type="text" id="address" placeholder="Address" required>
          </div>
           <div class="input-box">
            <input type="text" id="email" placeholder="Email" required>
          </div>
            <div class="input-box">
            <input type="date" id="dob" placeholder="Date Of Birth" required>
          </div>
          <!-- <div class="input-box">
            <input type="text" placeholder="Username" required>
          </div> -->
            <div class="input-box">
            <input type="Password" id="password" placeholder="Password" required>
          </div>
        </div>
        <div class="gender-details">        
          <span class="gender-title">Gender</span>
          <select class="input-box" id="gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>
        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
      <p id="error"> </p>
    </div>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>

  function nicFunction(input){
    if (input.value.length > 13) {
      document.getElementById('nic-error').innerHTML = "Please enter 13 digit CNIC number";
      console.log("nic working");
    }
    else {
      document.getElementById('nic-error').innerHTML = "";
    }
  }

    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);


    const loginform = document.querySelector('#login-form');
	loginform.addEventListener('submit', (e)=>{
		e.preventDefault();

		const email= loginform['email'].value;
    	const password= loginform['password'].value;

		firebase.auth().createUserWithEmailAndPassword(email, password).then((userCredential) => {
			// Signed up
			console.log(userCredential);
			
            
            var values = $("#login-form").serializeArray();
            
            var values = $("#login-form").serializeArray();
            var user = firebase.auth().currentUser;
            console.log(user.uid);
            var data = {                              
                email : loginform['email'].value,
                fname : loginform['fname'].value,
                lname : loginform['lname'].value,
                nic : loginform['nic'].value,
                phone : loginform['phone'].value,
                address : loginform['address'].value,
                dob : loginform['dob'].value,
                gender : loginform['gender'].value,
                id:user.uid
            }
            firebase.database().ref('users/' + user.uid).set(data).then(function(ref) {
                console.log("Saved");
                // location.path('/home');
                window.location = '/home?uid=' + user.uid;
            }, function(error) {
                console.log(error); 
            });
            
		}).catch((error) => {
			var errorCode = error.code;
			var errorMessage = error.message;
			document.getElementById('error').innerHTML = errorCode + errorMessage;
		});
	});

    
  
</script>

</html>
