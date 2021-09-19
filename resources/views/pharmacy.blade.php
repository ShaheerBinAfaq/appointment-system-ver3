<style><?php include public_path('css/styles.css') ?></style>
<style><?php include public_path('css/carousel.css') ?></style>
<style><?php include public_path('css/StyleSearch.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="sweetalert2.min.js"></script> -->
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-database.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/8.3.3/firebase-storage.js"></script>
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

    <title>CareX Pharmacy</title>
</head>
<body onload="SelectAllData()">
    <div id="loading"></div>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success text-white">
        <a class="text-white navbar-brand" href="#">
                <i class="fas fa-laptop-medical"></i> CareX Pharmacy 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto menu">
                    <li class="nav-item active">
                        <a class="nav-link" onClick="goToIndex()">Home</a>
                    </li>
                    
                </ul>
        
        <!-- <a class="text-white navbar-brand" onClick="goToIndex()">
                Home
            </a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    
            </button>
                    
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="text-white nav-link" onClick="goToCart()">
                        <i class="text-warning fas fa-shopping-cart"></i> Shopping Cart <i style="color:yellow;" id="cart_n"></i>
                    </a>
                    <a class="nav-link disabled text-white" href="login.html">
                    </a>
                </form>

            </div>
        </nav>
    </header>

<main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li style="z-index:102;" data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li style="z-index:102;" data-target="#myCarousel" data-slide-to="1"></li>
            <li style="z-index:102;" data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="imgFilter first-slide" src="images/img/pharmacy/carrusel/slide2.jpg" alt="First Slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>careX Pharmacy</h1>
                        <p>Dont worry about going outside for taking medicines in your any situation. </p>
                    </div>
                </div>

            </div>

            <div class="carousel-item ">
                <img class="imgFilter second-slide" src="images/img/pharmacy/carrusel/slide3.jpg" alt="Second Slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>careX Pharmacy</h1>
                        <p>We are here for you whenever life takes you</p>
                    </div>
                </div>
                
            </div>
            <div class="carousel-item ">
                <img class="imgFilter third-slide" src="images/img/pharmacy/carrusel/slide2.jpg" alt="Third Slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>careX Pharmacy</h1>
                        <p>We serve high quality medicine stored in temperature controlled environment, and deliver these medicines at your doorstep.</p>
                    </div>
                </div>   
            </div>
        </div>
        <a style="z-index:101;" class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a style="z-index:101;" class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="search_wrap search_wrap_6">
        <div class="search_box">
            <input id="SValue" type="text" class="input" placeholder="search...">
            <div class="btn" onclick="search()">
                <p>Search</p>
            </div>
        </div>
    </div>

    <div class="container marketing">
        <ul>
        <hr>
        <div class="row" id="searchDIV"></div>
        <hr class="featurette-divider">
        <br>
        <h2 id="fruit">Medications</h2>
        <hr>
        <div class="row" id="fruitDIV"></div>
        <hr class="featurette-divider">
        </ul>
    </div>



    <footer class="container">
        <p class="float-right">
            <a href="#">TOP</a>
        </p>
        <div class="row">
            CAREX PHARMACY
        </div>
    </footer>
</main>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
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



// GLOBAL

  var products=[];

  var SV;
  var keys = 0;
  var TRY = [];
  var abc = 0;
  var cartItems=[];
  var cart_n = document.getElementById('cart_n');
//DIVS
var abc = 0;
var fruitDIV = document.getElementById("fruitDIV");
var searchDIV = document.getElementById("searchDIV");
var uid;
//INFORMATION

function SelectAllData(){
    if (window.location.search.split('?').length > 0) {
			var params = window.location.search.split('?')[1];
			uid = params.split('=')[1];                                
        }
    var counter = 0;
    firebase.database().ref('Medicines').on('value', 
    function(AllRecords){
        AllRecords.forEach(
            function(CurrentRecord){
                var id = CurrentRecord.val().Id;
                var link = CurrentRecord.val().Link;
                var name = CurrentRecord.val().Name;
                var power = CurrentRecord.val().Power;
                var price = CurrentRecord.val().Price;
                var quantity = CurrentRecord.val().Quantity;
                var cartQuantity = 1;
                var cart = false;
                var total = 0;
                AddItemsToTabke(counter,id, link, name, power, price,quantity, cartQuantity,cart,total);
       //         TRY[counter] = {name: name, price: price, quantity: quantity};
                counter++;
            }
        );

        console.log('call');
       // console.log(AllRecords.length);
       setTimeout(call,3000);
     //   while (abc < ) {
            
     //   }

    });
}
function AddItemsToTabke(count,id,link,name,power ,price, quantity, cartQuantity,cart,total){
    TRY[count] = {id:id, name: name, link: link, power: power, price: price, quantity: quantity, cartQuantity: cartQuantity,cart:cart,total:total};
}
function call(){
    console.log(TRY[0].name);
    datadb();
    console.log('keys length');
    console.log(keys.length);
    stack();
    //setTimeout(stack,1000);
}
function stack(){
    for (var index = 1; index <= keys.length; index++) {
        if (TRY[index-1].quantity > 0) {

            fruitDIV.innerHTML+=`${HTMLTRYProduct(index)}`;
        }

    }
//    for (let index = 1; index <= 18; index++) {
//        fruitDIV.innerHTML+=`${HTMLfruitProduct(index)}`;
//    }
    render();
    //setTimeout(render,500);

}

function search(){
    searchDIV.innerHTML = "";
    var str = "AAA";
    var abc = str.toLowerCase();
    console.log(abc);
    
    var SearchValue = document.getElementById("SValue");
    
    var temporary = SearchValue.value;
    

    SearchValue.value = SearchValue.value.toLowerCase();
  //  var SV = document.getElementById("SValue");
 //   console.log(SV);
 //   SearchValue = SV.toLowerCase();
    
 //   console.log(SV.value);
 //   console.log(SearchValue.value);
 //   console.log('search click');

    //search code

    for (var index = 1; index <= keys.length; index++) {
        if (TRY[index-1].quantity > 0) {
            if (TRY[index-1].name == SearchValue.value) {
                console.log('equal names');
                searchDIV.innerHTML+=`${HTMLTRYProduct(index)}`;
            }
        }

    }

    document.getElementById("SValue").value = temporary;
}
//window.onload = SelectAllData;

//console.log(TRY[0]);

function datadb(){
    database = firebase.database();

    var ref = database.ref('Medicines');
    ref.on('value', gotData, errData);
}
function gotData(data){
    //console.log(data.val());

    var scores = data.val();
    keys = Object.keys(scores);
}
function errData(err){
    console.log('Error!');
    console.log(err);
}
    //console.log(keys);

   //for (var i = 0; i < keys.length; i++) {
    //    var k = keys[i];
    //    var name = scores[k].Name;
    //    var power = scores[k].Power;
      //  var price = scores[k].Price;
      //  var quantity = scores[k].Quantity;
        //var check={
        //    name:name,
        //    price:price,
        //    quantity:quantity
        // }
        // console.log(check);
     //   TRY[i] = {name: name, price: price, quantity: quantity};
     //   TRY.push(check);
   // }
    //console.log('hi');
  //  console.log(abc);
  //  while (TRY.length != keys.length-1) {
  //      abc = 0;
  //  }
  //  console.log(abc);

 //   if (TRY.length == keys.length) {
 //       abc = 1;
    
     //   render();
 //   }
    

//console.log(TRY[0]);


//console.log(TRY[0]);

//console.log(TRY);



//HTML 
function HTMLTRYProduct(con){
   // count = con - 1;
    //console.log(count);
  //  console.log(TRY);
  //  console.log('next');
  //  console.log(TRY[0]);
  //  console.log('next');
  //  console.log(TRY[0].name);
    let URL = `${TRY[con-1].link}.png`;
    let btn = `btnFruit${con}`;
    return `
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style="height:16rem;" src="${URL}" alt="Card image cap">
                <div class="card-body">
                    <i style="color:orange;" class="fa fa-star"  ></i>
                    <i style="color:orange;" class="fa fa-star"  ></i>
                    <i style="color:orange;" class="fa fa-star"  ></i>
                    <i style="color:orange;" class="fa fa-star"  ></i>
                    <i style="color:orange;" class="fa fa-star"  ></i>
                    <p class="card-text">${TRY[con-1].name}</p>
                    <p class="card-text">${TRY[con-1].power}</p>
                    <p class="card-text">Price: ${TRY[con-1].price}.00</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" onclick="cart2('${TRY[con-1].id}','${TRY[con-1].name}','${TRY[con-1].power}','${TRY[con-1].price}','${TRY[con-1].quantity}','${URL}','${con}','${btn}','${TRY[con-1].cartQuantity}','${TRY[con-1].cart}','${TRY[con-1].total}')" class="btn btn-sm btn-outline-secondary" ><a onClick="goToCart()" style="color:inherit;">Buy</a></button>
                            <button id="${btn}" type="button" onclick="cart('${TRY[con-1].id}','${TRY[con-1].name}','${TRY[con-1].power}','${TRY[con-1].price}','${TRY[con-1].quantity}','${URL}','${con}','${btn}','${TRY[con-1].cartQuantity}','${TRY[con-1].cart}','${TRY[con-1].total}')" class="btn btn-sm btn-outline-secondary" >Add to cart</button>
                        </div>
                        <small class="text-muted">Free Shipping </small>
                    </div>
                </div>
            </div>
        </div>
    `
}


//ANIMATION
function animation(){
    const toast=swal.mixin({
        toast:true,
        position:'top-end',
        showConfirmButton:false,
        timer:1000
    });
    toast({
        type:'success',
        title: 'Added to shopping cart'
    });
}
// CART FUNCTIONS
function cart(id,name,power,price,quantity,url,con,btncart,cartQuantity,cart,total){
    var item={
        id:id,
        name:name,
        power: power,
        price:price,
        quantity:quantity,
        url:url,
        cartQuantity: cartQuantity,
        cart: cart,
        total:total
    }
    cartItems.push(item);
    let storage= JSON.parse(localStorage.getItem("cart"));
    if (storage==null) {
        products.push(item);
        localStorage.setItem("cart",JSON.stringify(products));
    } else {
        products= JSON.parse(localStorage.getItem("cart"));
        products.push(item);
        localStorage.setItem("cart",JSON.stringify(products));
    }
    products= JSON.parse(localStorage.getItem("cart"));
    cart_n.innerHTML=`[${products.length}]`;
    document.getElementById(btncart).style.display="none";
    animation();
}
function cart2(id,name,power,price,quantity,url,con,btncart,cartQuantity,cart,total){
    var item={
        id:id,
        name:name,
        power: power,
        price:price,
        quantity:quantity,
        url:url,
        cartQuantity: cartQuantity,
        cart: cart,
        total:total
    }
    cartItems.push(item);
    let storage= JSON.parse(localStorage.getItem("cart"));
    if (storage==null) {
        products.push(item);
        localStorage.setItem("cart",JSON.stringify(products));
    } else {
        products= JSON.parse(localStorage.getItem("cart"));
        products.push(item);
        localStorage.setItem("cart",JSON.stringify(products));
    }
    products= JSON.parse(localStorage.getItem("cart"));
    cart_n.innerHTML=`[${products.length}]`;
    document.getElementById(btncart).style.display="none";
}
//RENDER
function myFunction(){
    var preloader = document.getElementById('loading');
    preloader.style.display = 'none';
}

function render(){
    
    //datadb();
   //SelectAllData();
    //console.log(TRY[0]);

    myFunction();

    //console.log(TRY[0]);
 //   if (abc == 1) {
 //       for (let index = 0; index < 10; index++) {
  //          fruitDIV.innerHTML+=`${HTMLTRYProduct(index)}`;
   //     }
    //    for (let index = 1; index <= 18; index++) {
    //        fruitDIV.innerHTML+=`${HTMLfruitProduct(index)}`;
    //    }
   //     for (let index = 1; index <= 18; index++) {
   //         juiceDIV.innerHTML+=`${HTMLjuiceProduct(index)}`;
    //    }
    //    for (let index = 1; index <= 6; index++) {
    //        saladDIV.innerHTML+=`${HTMLsaladProduct(index)}`;
    //    }
  //      if (localStorage.getItem("cart")==null) {
    
    //    } else {
      //      products=JSON.parse(localStorage.getItem("cart"));
        //    cart_n.innerHTML=`[${products.length}]`;
       // }
//    } else {
//        datadb();
//    }
    
    
}
function goToIndex() {
	window.location = '/home?uid=' + uid;
}

function goToCart() {
     window.location = '/cart?uid=' + uid;
}
function goToLogin() {
    window.location = '/pharmacylogin';
}
// function getUid(){
//     if (window.location.search.split('?').length > 0) {
// 			var params = window.location.search.split('?')[1];
// 			return params.split('=')[1];                                
//         }
// }
</script>
