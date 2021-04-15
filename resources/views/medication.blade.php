<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CareX Pharmacy</title>
</head>
<body onload="renderTable()">
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
                    <a class="nav-link" href="#">Medication</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link" target="_blank" onClick="goToAddMedication()">Add New</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link" target="_blank" onClick="goToUpdateMedication">Update/Delete</a>
                </li>

            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <a class="text-white nav-link" href="index.html">
                    EXIT
                </a>
                
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="container mt-4">
            <main role="main">
                <div class="row">
                    <div class="col">
                        <h1>MEDICINES</h1>
                        <div class="table-responsive-sm">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">POWER</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">STOCK</th>
                                    </tr>
                                </thead>
                                <tbody id="table">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <hr class="featurette-divider">
    </div>
    
    <footer class="container">
        <div class="row">
            CARE X PHARMACY
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <!-- <script src="medication.js"></script> -->
</body>
</html>
<script>
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
 // firebase.analytics();

function renderTable() {
    var order= firebase.database().ref("Medicines/");
    order.on("child_added",function(data){
        var orderValue =data.val();
        document.getElementById("table").innerHTML+=`
            <tr>
                <td> ${orderValue.Id} </td>
                <td> ${orderValue.Name} </td>
                <td> ${orderValue.Power} </td>
                <td> ${orderValue.Price} </td>
                <td> ${orderValue.Quantity} </td>
            </tr>
        `;
    });
};
function goToAdmin(){
        window.location = '/pharmacyadmin';
}
function goToAddMedication(){
        window.location = '/addmedication';
}
function goToUpdateMedication(){
        window.location = '/updatemedication';
}
</script>