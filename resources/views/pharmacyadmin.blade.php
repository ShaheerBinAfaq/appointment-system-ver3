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
    <title>CareX Pharmacy</title>
</head>
    
<body>

    <header>
        <nav class="navbar navbar-dark navbar-expand-md bg-success text-white">
            <a class="text-white navbar-brand" onClick="goToIndex()">
                CareX Pharmacy
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onClick="goToMedication()">Medication</a>
                    </li>
    
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="text-white nav-link" onClick="goToIndex()">
                        EXIT
                    </a>
                    
                </form>
            </div>
        </nav>
    </header>

    <div class="container">
        <br>
        <table id="tableOrders">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Cliend</th>
                    <th>Payment Method</th>
                    <th>Total</th>
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
    return `
        <table>
            <tr>
                <td>Client:</td>
                <td>${d.userName}</td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td>${d.userEmail}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>${d.userAddress}</td>
            </tr>
            <tr>
                <td>Year:</td>
                <td>${d.year}</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>${d.date}</td>
            </tr>
            <tr>
                <td>Time:</td>
                <td>${d.hour}</td>
            </tr>
            <tr>
                <td>Payment Method:</td>
                <td>${d.payment}</td>
            </tr>
            <tr>
                <td>Order:</td>
                <td>${d.order}</td>
            </tr>
            <tr>
                <td>Id:</td>
                <td>${d.id}</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>${d.total}</td>
            </tr>
            <tr>
                <td>Products:</td>
                <td>${d.products.map(function(product){
                    return `<ul>
                            <li>Product ID: ${product.id}</li>
                            <li>Name: ${product.name}</li>
                            <li>Power: ${product.power}</li>
                            <li>Price: ${product.price}</li>
                            <li>Quantity: ${product.quantity}</li>
                            <li>Sub Total: ${product.total}</li>
                        </ul>`;
                    })}</td>
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
                        return '<i class="material-icons" aria-hidden="true">add_box</i>';
                    },
                    width:"15px"
                },
                {"data":"id"},
                {"data":"order"},  
                {"data":"date"},
                {"data":"userName"},
                {"data":"payment"},
                {"data":"total"}
            ],
            "order":[[1,'desc']]
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

var order = firebase.database().ref('orders');

order.on('child_added',function(data){
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
function goToMedication() {
    window.location = 'medication';
}
function goToIndex() {
    window.location = 'pharmacy';
}
</script>
