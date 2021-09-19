<style><?php include public_path('css/admin.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <title>Tests | Admin</title>
</head>
    
<body>

    <header>
        <nav class="navbar navbar-dark navbar-expand-md bg-success text-white">
            <a class="text-white navbar-brand" onClick="goToIndex()">
                Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    
            </button>

        </nav>
    </header>

    <div class="container">
        <h1>Prescriptions</h1>
        <br>
        <table id="tableOrders">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Doctor</th>
                    <th>Patient</th>
                    <th>Date Written</th>
                    <th>Appointment ID</th>
                    <th>Prescription ID</th>                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Action</th>
                    <th>Doctor</th>
                    <th>Patient</th>
                    <th>Date</th>           
                    <th>Appointment ID</th>
                    <th>Prescription ID</th>         
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- <script src="./admin.js"></script> -->
</body>
</html>
<script>
function format(d){
    console.log(d);
    return `
        <table>            
            <tr>
                <td>Actions:</td>
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="${d.id}">Add Test</button>
            </tr>
        
        </table>
    `;
}


$(document).ready(function(){
    setTimeout(function(){
        var table = $('#tableOrders').DataTable({
            "data": final.data,
            select: "single",
            "columns":[
                {
                    "className": 'details-control',
                    "orderable":true,
                    "data":null,
                    "defaultContent": '',
                    "render": function(){
                        return '<i aria-hidden="true" id="{"data":"id"}">Add Test</i>';
                    },
                    width:"15px"
                },
                {"data":"doc_name"},
                {"data":"pat_name"},
                {"data":"date_written"},
                {"data":"appointment_id"},
                {"data":"id"}, 
            ],
            
        });

        $('#tableOrders tbody').on('click','td.details-control',function(){
            var tr = $(this).closest('tr');
            var tdi= tr.find('i.fa');
            var row = table.row(tr);
            if (row.child.isShown()) {
                row.child.hide();
                tdi.first().removeClass('material-icons close');
                tdi.first().addClass('material-icons add_box');               
            } else {
                row.child(format(row.data())).show();
                tr.addClass('shown');
                tdi.first().removeClass('material-icons add_box');
                tdi.first().addClass('material-icons close');   
            }
        });
    },5000);
});

$("body").on('click', '.updateData', function () {
        var id = $(this).attr('data-id');
        window.location = 'labform?presid=' + id;
});
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

var appointments = firebase.database().ref('prescriptions');

appointments.on('child_added',function(data){
    var orderValue= data.val();
    fsales(orderValue);
});
function fsales(params){
    final.data.push(params);
}
var final = {
    "data":[]
}
console.log(final);
function goToIndex() {
    window.location = 'dashboard';
}
</script>
