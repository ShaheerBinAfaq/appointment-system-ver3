<style><?php include public_path('css/styleAdd.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ADMIN</title>
</head>
<title>Upload Medication</title>

<body>
<nav class="navbar navbar-dark navbar-expand-md bg-success text-white">
        <a class="text-white navbar-brand" href="#">
            CareX Pharmacy
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto menu">
                <li class="nav-item">
                    <a class="nav-link" onClick="goToAdmin()">Orders</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" onClick="goToMedication()">Medication</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link" >Add New</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link" target="_blank" onClick="goToUpdateMedication()">Update/Delete</a>
                </li>

            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <a class="text-white nav-link" href="index.html">
                    EXIT
                </a>
                
            </form>
        </div>
    </nav>
    <style>
        img{height: 120px; width: 120px; border: 2px solid white; margin-left: 250px; } </style>

   <div class="container">
        
    <h2 class="title">Add New Medication</h2>

     <div class="user-details">
         <div class="input-box">
            <label for="">Medicine Id</label>
            <input type="text"  id="idbox" placeholder="Medicine id" required>
          </div>
          <br>
        
          <div class="input-box">
            <label for="">Medicine Name</label>
            <input type="text"  id="namebox" placeholder="Medicine Name" required>
          </div>
          <br>
          <div class="input-box">
               <label for="">Medicine Power</label>
            <input type="text" id="powerbox" placeholder="Medicine Power" required>
          </div>
          <br>
          <div class="input-box">
               <label for="">Medicine Price</label>
            <input type="text"  id="pricebox" placeholder="Medicine Price" required>
          </div>
          <br>
          <div class="input-box">
                <label for="">Medicine Stock</label>
            <input type="text" id="stockbox" placeholder="Medicine Stock" required>
          </div>
          <br>
            <div class="input-box">
             <label for="" style="margin-left: 250px;">Product Image</label>
         </div>
      </div>

    <img id="myimg" > <label id="UpProgress"> </label> <br><br>


     <div class="button">
         <input style="margin-left: 100px;"type="submit" id="select" value="Select Image">
         <input style="margin-left: 20px;" type="submit" id="upload" value="Upload Medicine"> 
        </div>
   </div>


    <!-- Firebase Libraries-->
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-database.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-storage.js"></script>
    
    <!-- Firebase Libraries-->
    <script id="MainScript">
        var ImgId, ImgName, ImgPower, ImgStock, ImgPrice, ImgUrl;
        var files = [];
        var reader;
        //FIREBASE

        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCwL-AtDqq-jdMBYNi1nTo5NNAtHwMhhHc",
            authDomain: "appointment-sys-3fb2e.firebaseapp.com",
            databaseURL: "https://appointment-sys-3fb2e-default-rtdb.firebaseio.com",
            projectId: "appointment-sys-3fb2e",
            storageBucket: "appointment-sys-3fb2e.appspot.com",
            messagingSenderId: "167244005815",
            appId: "1:167244005815:web:ea60f2c06b25a4660ce832"
        };
        
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);


        document.getElementById("select").onclick = function(e){

            var input = document.createElement('input');
            input.type = 'file';
            
            input.onchange = e => {
                files = e.target.files;
                reader = new FileReader();
                reader.onload = function(){
                    document.getElementById("myimg").src = reader.result;
                }
                reader.readAsDataURL(files[0]);
            }
            input.click();
        }

//Upload picture to storage
        document.getElementById('upload').onclick = function(){
            ImgId = document.getElementById('idbox').value;
            ImgName = document.getElementById('namebox').value;
            ImgPower = document.getElementById('powerbox').value;
            ImgStock = document.getElementById('stockbox').value;
            ImgPrice = document.getElementById('pricebox').value;

            var uploadTask = firebase.storage().ref('Images/'+ImgId+".png").put(files[0]);

            uploadTask.on('state_changed', function(snapshot){
                var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                document.getElementById('UpProgress').innerHTML = 'Upload'+progress+'%';
            },

//Error handling
            
            function(error){
                alert('error in saving the image');
            },

//Submit image url to database

            function(){
                uploadTask.snapshot.ref.getDownloadURL().then(function(url){
                    ImgUrl = url;
                
//Firebase database url saving

                    firebase.database().ref('Medicines/'+ImgId).set({
                        Id: ImgId,
                        Name: ImgName,
                        Power: ImgPower,
                        Quantity: ImgStock,
                        Price: ImgPrice,
                        Link: ImgUrl
                    });
                alert('image added successfully!');
                }
            );
            });
        }
    
//Update Process
function goToAdmin(){
        window.location = '/pharmacyadmin';
}
function goToMedication(){
        window.location = '/medication';
}
function goToUpdateMedication(){
        window.location = '/updatemedication';
}
    </script>
    

</body>
</html>