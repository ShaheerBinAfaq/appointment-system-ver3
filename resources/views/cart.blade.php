
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
    <title>CareX Pharmacy</title>
</head>
    
<body onload="render()">
    <header>
        <nav class="green accent-4">
            <div class="nav-wrapper">
                <a onClick="goToIndex()" class="navbar-brand nav-link disabled text-white">
                      CareX Pharmacy
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="container mt-3">
        <main role="main">
            <div class="row">
                <div class="col">
                    <div id="" class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Remove</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Power</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody id="table">
                                
                            </tbody>
                            <tfoot id="total">

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="featurette-divider">

        </main>
    
    </div>




    <!-- Modal -->
<div id="modal1" class="modal">
    <div class="model-content">
        <div class="row">
            <form id="formCart" class="col s12">
                
                    <div class="input-field col s12">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="text" required id="PatientId" class="validate">
                        <label for="icon_prefix">User Id</label>
                    </div>
                
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" required id="userName" class="validate">
                        <label for="icon_prefix">First Name</label>
                    </div>
                
                
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" required id="userEmail" class="validate">
                        <label for="icon_prefix">Email</label>
                    </div>
                
                
                    <div class="input-field col s12">
                        <i class="material-icons prefix">add_location</i>
                        <input type="text" required id="userAddress" class="validate">
                        <label for="icon_prefix">Address</label>
                    </div>
                
                
                    <div class="input-field col s12">
                        <select id="userSelect" class="browser-default">
                            <option value="Cash On Delivery">Cash On Delivery</option>
                        </select>
                    </div>
                
                    <div class="input-field col s12">
                        <button id="select" class="btn modal-close waves-effect waves-light" type="submit" name="action" >Submit
                            <i class="material-icons right">send</i>
                        </button>
                        
                    </div>
                    
                
            </form>
            
        </div>

    </div>

</div>

<!-- End Modal -->





    <footer class="container">
        <p class="float-right">
            <a href="#">TOP</a>
        </p>
        <div class="row">
            CARE X PHARMACY
        </div>
    </footer>






    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <!-- <script src="./cart.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script> -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br><br><br><br><br><br>

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
 
 //GLOBAL
//var products=JSON.parse(localStorage.getItem('cart'));

var products=JSON.parse(localStorage.getItem('cart'));
var TRY = [];
var TRY2 = [];
var tota = 0;
var cartItems=[];
var cart_n = document.getElementById('cart_n');
var table= document.getElementById("table");
var Quantity = 1;
var tot=0;
var check;
var temp2;
var FireQuan=[];
var Quan=[];
var counter = 0;
var holder;
var RemainingQuantity;
var temper;
var updater;
var FQuan;
var uid;

console.log(products);
var con=0;
var con2=[]; // POSITION AT TABLE
//console.log(TRY.length);
//console.log(products[0].id);

//start
function SelectAllData(){
    var counter2 = 0;
    firebase.database().ref('Medicines').on('value', 
    function(AllRecords){
        AllRecords.forEach(
            function(CurrentRecord){
                var id = CurrentRecord.val().Id;
                var name = CurrentRecord.val().Name;
                var quantity = CurrentRecord.val().Quantity;
                AddItemsToTabke(counter2,id,name,quantity);
       //         TRY[counter] = {name: name, price: price, quantity: quantity};
                counter2++;
            }
        );

    //    console.log('call');
       // console.log(AllRecords.length);
    //   setTimeout(call,3000);
     //   while (abc < ) {
            
     //   }

    });
}
function AddItemsToTabke(count2,id,name,quantity){
    TRY2[count2] = {id:id, name:name , quantity: quantity};
}

//end





//HTML
function newData(){
    console.log(products.length);
    console.log(products);
    for (let index = 0; index < products.length; index++) {
        

        var id = products[index].id;
        var name = products[index].name;
        var power = products[index].power;
        var price = products[index].price;
        var quantity = products[index].cartQuantity;
        var T = products[index].price*quantity;
        var total = T;
        TRY[index] = {id,name,power,price,quantity,total};
    }
    console.log('Try wala array');
    console.log(TRY);
}


function tableHTML(i){
//    console.log(products);
    return `
            <tr class="">
            <th scope="row">${i+1}</th>
            <td><button class="btn btn-danger" onclick="remove(${products[i].id})">X</button></td>
            <td><img style="width:90px;" src="${products[i].url}" ></td>
            <td>${products[i].name}</td>
            <td>${products[i].power}</td>
            <td>
            <button class="btn btn-primary" onclick="reduceAmount(${products[i].id})">-</button>
            <input style="width: 2rem;" id="${products[i].id}" value="${products[i].cartQuantity}" disabled>
            <button class="btn btn-primary" onclick="addAmount(${products[i].id})">+</button>
            </td>
            <td>${products[i].total = products[i].price*products[i].cartQuantity}</td>
            </tr>
    `;
}


//form Cart

document.getElementById('formCart').addEventListener('submit',function(e){
    e.preventDefault();
    userName=document.getElementById('userName');
    userEmail=document.getElementById('userEmail');
    userAddress=document.getElementById('userAddress');
    userSelect=document.getElementById('userSelect');
    var d = new Date();
    var t = d.getTime();
    var order = t-300;
    // Get User Data
    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value && uid == index) {
                document.getElementById('PatientId').value = index;
                document.getElementById('userName').value = value.fname + " " + value.lname;
                document.getElementById('userEmail').value = value.email;
                document.getElementById('userAddress').value = value.address;
            }
            // lastIndex = index;
        });
        // $('#tbody').html(htmls);
        // $("#submitPatient").removeClass('desabled');
    });
    firebase.database().ref('orders/'+order).set({
        id: t+1,
        order:order,
        userName:userName.value,
        userEmail:userEmail.value,
        userAddress:userAddress.value,
        payment: userSelect.value,
        date: d.getDate() + '/' + (d.getMonth()+1) + '/' + d.getFullYear(),
        hour: d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds(),
        year: d.getFullYear(),
        products: TRY,
        total:tota
    });
    
    //mailing();
    $.ajax({
            method: 'POST',
            url: 'email.php',
            data: {user_email: userEmail.value, orderi: order},           
            success: function(data) {
                // alert(data);
            }
            });

    check=JSON.parse(localStorage.getItem('cart'));
    for (var index = 0; index < check.length; index++) {
        console.log("check array ");
        console.log(check[index]);
        console.log(check[index].cartQuantity);
    }
//    console.log("check array");
//    console.log(check);
//    console.log(check.length);
//    console.log("check array[0]");
//    console.log(check[0]);
//    console.log(check[0].cartQuantity);
//    console.log("check array[1]");
//    console.log(check[1]);
//    console.log(check[1].cartQuantity);
//    console.log("check array[2]");
//    console.log(check[2]);
//    console.log(check[2].cartQuantity);
    for (var index = 0; index < check.length; index++) {
        var temp = check[index].id;
        console.log('temp');
        console.log(temp);
        //var temp2 = 0;
        temper = temp;
        firebase.database().ref('Medicines/'+temp).on('value',function(snapshot){
            console.log('temp in');
            console.log(temper);

            temp2 = snapshot.val().Quantity;
            console.log('ye dekho');
            console.log(temp2);

            console.log('check array');
            console.log(counter);
            console.log(check[counter]);
            console.log('bought quantity');
            console.log(check[counter].cartQuantity);
            holder = check[counter].cartQuantity;
            RemainingQuantity = parseInt(temp2) - parseInt(holder);
            console.log('RemainingQuantity');
            console.log(RemainingQuantity);

            Quan[counter] = RemainingQuantity;

            console.log('calling update function');
            

//updating medicine stock on firebase
            //firebase.database().ref('Medicines/'+temp).update({
//                Quantity: RemainingQuantity
            //});
//            console.log(holder);
            counter++;
 //           FireQuan[index] = snapshot.val().Quantity;
            //newData();
 //           FireQuan[index] = temp2;

//            console.log('cart quantity');
//            console.log(check[index].cartQuantity);
            
//            setTimeout(call,3000);
//           console.log(FireQuan);

//           var RemainingQuantity = parseInt(FireQuan) - parseInt(check[index].cartQuantity);
//           console.log('RemainingQuantity');
//           console.log(RemainingQuantity);
        });
//        updating();
        
        console.log('loop k andar medicine quantity in array');
        console.log(temp2);
        setTimeout(call2,3000);
    }


    setTimeout(call,3000);
    console.log('medicine quantity');
    console.log(FireQuan);

    console.log('After print');

    console.log('place');
    
    
    swal.fire({
        position: 'center',
        type: 'success',
        title: 'Purchase made successfully!',
        text: `Your purchase order is: ${order}`,
        showConfirmButton: true,
        timer:50000
    });



//    console.log('try 0 pos');
//    for (var index = 0; index < TRY.length; index++) {
//        firebase.database().ref('Medicines/'+TRY[0].id).on('value',function(snapshot){
//            FireQuan = snapshot.val().Quantity;
//            newData();
//            console.log('cart quantity');
 //          console.log(products[index].cartQuantity);
            
//            setTimeout(call,3000);
         
//           console.log(FireQuan);
//           var RemainingQuantity = parseInt(FireQuan) - parseInt(TRY[index].quantity);
//           console.log('RemainingQuantity');
//           console.log(RemainingQuantity);
//        });
        
//    }
    
    
 //   console.log('cart ye he TRY wala');
 //   console.log(TRY);
 //   console.log(TRY.length);
//    setTimeout(updating,10000);
    
    clean();
    //updating();
    setTimeout(updating,5000);
    // goToindex();
    window.location = 'invoice?orderid=' + order;
});



function wait(){
    console.log('waiting');
}

function call(){
    console.log('call me he');
    console.log('FireQuan ye he');
    console.log(FireQuan);

    console.log('check ye he');
    console.log(check);
    
//    setTimeout(call2,2000);


}
function call2(){
    console.log('call2 me he');
}

function updating(){

    console.log('program end');

    console.log('dekho check');
    console.log(check);

    console.log('dekho Quan');
    console.log(Quan);

    
    console.log('dekho check length');
    console.log(check.length);

    for (var i = 0; i < check.length; i++) {
        updater = check[i].id;
        FQuan = Quan[i];
        
        console.log('updating me ids');
        console.log(updater);

        console.log('Final FQuantity values');
        console.log(FQuan);
        firebase.database().ref('Medicines/'+updater).update({
            Quantity: FQuan
        });
        
        console.log('updated');
    }
    console.log('Finalized');
//    console.log('updating me he');
//    console.log(check);
//    console.log('parameters');
//    console.log(counter2);
//    console.log(RemainingQuantity2);

 //   updater = check[counter2].id;

 //   console.log('updating me ids');
 //   console.log(updater);

//    console.log('updating me remaining quantity array');
//    console.log(Quan);

//    setTimeout(wait,10000);
//updating medicine stock on firebase

//    firebase.database().ref('Medicines/'+updater).update({
//        Quantity: RemainingQuantity
//    });


        

}


function total(){
    var productsLocal = JSON.parse(localStorage.getItem('cart'));
    for (let index = 0; index < productsLocal.length; index++) {
        tota+= products[index].price*products[index].cartQuantity;
    }
    console.log(tota);
    return tota
}

var con3 = JSON.parse(localStorage.getItem('cart'));

function remove(id){
    var productsLocal = JSON.parse(localStorage.getItem('cart'));
    for (let index = 0; index < productsLocal.length; index++) {
        if (productsLocal[index].id == id)  {
            var x = productsLocal[index].id;
            productsLocal.splice(index,1);
            localStorage.setItem('cart',JSON.stringify(productsLocal));

            total();
            for (let index2 = 0; index2 < con3.length; index2++) {
                if (x == con3[index2]) {
                    con3.splice(index2,1);
                    localStorage.setItem('cart',JSON.stringify(con2));
                } else {

                }
            }
           // updateCart();
        }else {
         //   updateCart();
        }
        newData();
        console.log('hi');
        console.log(TRY);
        
    }
    window.location.reload();
}

function reduceAmount(id){
    var productsLocal = JSON.parse(localStorage.getItem('cart'));
    for (let index = 0; index < productsLocal.length; index++) {
        if (productsLocal[index].id == id) {
            if(productsLocal[index].cartQuantity > 1){
                productsLocal[index].cartQuantity = parseInt(productsLocal[index].cartQuantity)-1;
                localStorage.setItem("cart",JSON.stringify(productsLocal));
             //   updateCart();
             total();
             
            } else {

            }
            
        } else{

        }
    }
    window.location.reload();
}

function addAmount(id){
    var productsLocal = JSON.parse(localStorage.getItem('cart'));
    console.log('addd Amount me Quan');
    console.log(TRY2);
    for (let index = 0; index < productsLocal.length; index++) {
        if (productsLocal[index].id == id) {
            if (TRY2[index].quantity > 0) {
                console.log('addd Amount me Quan');
                console.log(TRY2[index]);
            }

            if(productsLocal[index].cartQuantity > 0){
                productsLocal[index].cartQuantity = parseInt(productsLocal[index].cartQuantity)+1;
                localStorage.setItem("cart",JSON.stringify(productsLocal));
             //   updateCart();
            } else {

            }
            
        } else{
            
        }
    }
    window.location.reload();
}

function updateCart() {
    con = 0;
    
    var cartn = document.getElementById('cart_n');
    var productsLocal = JSON.parse(localStorage.getItem('cart'));
    
    console.log(productsLocal[0]);
    console.log(productsLocal.length);
    var abc = productsLocal.length;
    console.log(abc);

    cartn.innerHTML=`[${abc}]`;
    document.getElementById('table').innerHTML='';
    for (let index = 0; index < con2.length; index++) {
        var position = con2[index];
        for (let index3 = 0; index3 < productsLocal.length; index3++) {
            if (position == productsLocal[index3].id) {
                document.getElementById('table').innerHTML+=`
                <tr>
                <th >${con+1}</th>
                <td><button class="waves-effect waves-light btn red darken-4" onclick="remove(${productsLocal[index3].id})">X</button></td>
                <td><img style="width: 5rem;" src="${productsLocal[index3].url}"></td>
                <td>${productsLocal[index3].name}</td>
                <td>
                <button class="waves-effect waves-light btn purple darken-4" onclick="reduceAmount(${productsLocal[index3].id})">-</button>
                <input style="width: 2rem;" id="${productsLocal[index3].id}" value="${productsLocal[index3].cartQuantity}" disabled>
                <button class="waves-effect waves-light btn purple darken-4" onclick="addAmount(${productsLocal[index3].id})">+</button>
                </td>
                <td>Rs. ${productsLocal[index3].price*productsLocal[index3].cartQuantity}</td>
                </tr>               
                `

                productsLocal[index3].total=productsLocal[index3].price*productsLocal[index3].cartQuantity
                localStorage.setItem('cart',JSON.stringify(productsLocal));
            } else {

            }
        }
        con = con + 1;
    }
    if (total()==0) {
        document.getElementById('total').innerHTML='';        
    } else {
        document.getElementById('table').innerHTML=`
        <tr>
        <th ></th>
        <td></td>
        <td></td>
        <td></td>

        <td>
            <h5>Total: </h5>
        </td>
        <td>
            Rs. ${tota}.00
        </td>
        </tr>
        <tr>
        <th ></th>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <buton onclick="clean()" class="yellow accent-4 waves-effect waves-light btn">Clean</button>
        </td>
        <td>
        <button data-toggle="modal" data-target="#modal" class="modal-trigger green accent-4 waves-effect waves-light btn">Buy</button>
        </td>
        </tr>

        `
    }
}

//Clean

function clean() {
    localStorage.clear();
    for (let index = 0; index < products.length; index++) {
        table.innerHTML+=tableHTML(index);
        tot=tot+parseInt(products[index].price);
    }
    tot=0;
    table.innerHTML=`
    <tr>
    <th ></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    </tr> 
    `;
//    cart_n.innerHTML=``;
//    document.getElementById("btnBuy").style.display="none";
//    document.getElementById("btnClean").style.display="none";
}

 //RENDER
 function render(){
    if (window.location.search.split('?').length > 0) {
			var params = window.location.search.split('?')[1];
			uid = params.split('=')[1];                                
        }
        
    SelectAllData();
    total();
    for (let index = 0; index < products.length; index++) {
        table.innerHTML+=tableHTML(index);
        tot=tot+parseInt(products[index].price);
    }
    table.innerHTML+=`
    <tr>
    <th scope="col" ></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col">Total: Rs.${tota}.00</th>
    </tr>
    <tr>
    <th scope="col" ></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col">
        <button id="btnClean" onclick="clean()" class="btn yellow darken-4">Clean Shopping Cart</button>
    </th>
    <th scope="col"></th>
    <th scope="col"><button id="btnBuy" onclick="moda()" class="modal-trigger waves-effect waves-light btn">Buy</button>
    </th>
    </tr>
    `;
    console.log('calling');
    newData();
}
function moda(){
    // Get User Data
    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        console.log('uid', uid);
        $.each(value, function (index, value) {
            if (value && uid == index) {
                console.log('value', value);
                document.getElementById('PatientId').value = index;
                document.getElementById('userName').value = value.fname + " " + value.lname;
                document.getElementById('userEmail').value = value.email;
                document.getElementById('userAddress').value = value.address;
            }
            // lastIndex = index;
        });
        // $('#tbody').html(htmls);
        // $("#submitPatient").removeClass('desabled');
    });
//     $(window).load(function() {
//     $('#prizePopup').modal('show');
// });
    $(document).ready(function(){
    $('.modal').modal();
});
}

function goToIndex() {
    window.location = 'pharmacy?uid=' + uid;
}
//import * as nodemailer from 'nodemailer';
// var nodemailer= require('nodemailer');
// function mailing(){
//     //var nodemailer= require('nodemailer');
//     var transporter= nodemailer.createTransport({
//         // host:'smtp.gmail.com',
//         // port:587,
//         // secure:false,
//         // requireTLS:true,
//         service: 'gmail',
//         auth:{
//             user:'shaheerafaq@gmail.com',
//             pass:"kaam karo"
//         }
//     });
//     var mailOptions={
//         from:'shaheerafaq@gmail.com',
//         to: 'shaheerafaq@gmail.com',
//         subject:"Java ki mail",
//         text:"Hi Amma! "
//         // html: `
//         // <h1>CareX Pharmacy</h1>
    
//         // `,
        
//     }
//     transporter.sendMail(mailOptions,function(error,info){
//         if (error) {
//             console.log(error);
            
//         } else {
//             console.log("email has been sent",info.response);
//             console.log(arr);
//         }
//     })
// }
</script>


<!-- // //Import PHPMailer classes into the global namespace        
// //These must be at the top of your script, not inside a function
//         use PHPMailer\PHPMailer\PHPMailer;
//         use PHPMailer\PHPMailer\SMTP;
//         use PHPMailer\PHPMailer\Exception;
//         if(array_key_exists('action', $_POST)) {
//             mailing();
//         }
//     function mailing(){
        
//         //Load Composer's autoloader
//         require '../vendor/autoload.php';
        
//         //Create an instance; passing `true` enables exceptions
//         $mail = new PHPMailer(true);
        
//         try {
//             //Server settings
//         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'shaheerafaq@gmail.com';                     //SMTP username
//         $mail->Password   = 'kaam karo';                               //SMTP password
//         $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
//         $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//         //Recipients
//         $mail->setFrom('shaheerafaq@gmail.com', 'Shaheer Afaq');
//         $mail->addAddress('mubashirahmed324@gmail.com', 'Mubashir');

//         //Content
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = 'Order Confirmation';
//         $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

//         $mail->send();
//         echo 'Message has been sent';
//         } catch (Exception $e) {
//             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         }
//     }
// ?> -->

<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
//array_key_exists('action', $_POST)
// if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction'])) {
//         mailing();
//     }

    //Create a new PHPMailer instance
    // $mail = new PHPMailer();

    // //Tell PHPMailer to use SMTP
    // $mail->isSMTP();

    // //Enable SMTP debugging
    // //SMTP::DEBUG_OFF = off (for production use)
    // //SMTP::DEBUG_CLIENT = client messages
    // //SMTP::DEBUG_SERVER = client and server messages
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // //Set the hostname of the mail server
    // $mail->Host = 'smtp.gmail.com';
    // //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
    // //if your network does not support SMTP over IPv6,
    // //though this may cause issues with TLS

    // //Set the SMTP port number:
    // // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
    // // - 587 for SMTP+STARTTLS
    // $mail->Port = 465;

    // //Set the encryption mechanism to use:
    // // - SMTPS (implicit TLS on port 465) or
    // // - STARTTLS (explicit TLS on port 587)
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    // //Whether to use SMTP authentication
    // $mail->SMTPAuth = true;

    // //Username to use for SMTP authentication - use full email address for gmail
    // $mail->Username = 'shaheerafaq@gmail.com';

    // //Password to use for SMTP authentication
    // $mail->Password = 'kaam karo';

    // //Set who the message is to be sent from
    // //Note that with gmail you can only use your account address (same as `Username`)
    // //or predefined aliases that you have configured within your account.
    // //Do not use user-submitted addresses in here
    // $mail->setFrom('shaheerafaq@example.com', 'Shaheer Afaq');

    // //Set an alternative reply-to address
    // //This is a good place to put user-submitted addresses
    // $mail->addReplyTo('shaheerafaq@gmail.com', 'Shaheer Afaq');

    // //Set who the message is to be sent to
    // $mail->addAddress('shaheerafaq@gmail.com', 'Shaheer Afaq');

    // //Set the subject line
    // $mail->Subject = 'PHPMailer GMail SMTP test';

    // //Read an HTML message body from an external file, convert referenced images to embedded,
    // //convert HTML into a basic plain-text alternative body
    // $mail->msgHTML(file_get_contents('EmailHTML.html'), __DIR__);

    // //Replace the plain text body with one created manually
    // $mail->AltBody = 'This is a plain-text message body';

    // //Attach an image file
    // // $mail->addAttachment('images/phpmailer_mini.png');

    // //send the message, check for errors
    // if (!$mail->send()) {
    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     echo 'Message sent!';
    //     //Section 2: IMAP
    //     //Uncomment these to save your message in the 'Sent Mail' folder.
    //     #if (save_mail($mail)) {
    //     #    echo "Message saved!";
    //     #}
    // }


