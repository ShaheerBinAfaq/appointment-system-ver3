<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="carousel.css">
    <link rel="stylesheet" href="styles.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>CareX Pharmacy</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success text-white">
            <a class="text-white navbar-brand" href="#">
                <i class="fas fa-laptop-medical"></i> careX Pharmacy 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#immunity">Immunity Boosters</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#pain">Pain Relief</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#ppe">Personal Protective Equipment</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="text-white nav-link" href="cart.html">
                        <i class="text-warning fas fa-shopping-cart"></i> Shopping Cart <i style="color:yellow;" id="cart_n"></i>
                    </a>
                    <a class="nav-link disabled text-white" href="admin/login.html">
                        <i class="far fa-user"></i> Admin
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
                <img class="imgFilter first-slide" src="img/carrusel/slide2.jpg" alt="First Slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>careX Pharmacy</h1>
                        <p>Dont worry about going outside for taking medicines in your any situation. We are here for you whenever life takes you</p>
                        <p> <a role="button" class="btn btn-lg btn-primary" href="#">Products</a></p>
                    </div>
                </div>

            </div>

            <div class="carousel-item ">
                <img class="imgFilter second-slide" src="img/carrusel/slide3.jpg" alt="Second Slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>careX Pharmacy</h1>
                        <p>Dont worry about going outside for taking medicines in your any situation. We are here for you whenever life takes you</p>
                        <p> <a role="button" class="btn btn-lg btn-primary" href="#">Products</a></p>
                    </div>
                </div>
                
            </div>
            <div class="carousel-item ">
                <img class="imgFilter third-slide" src="img/carrusel/slide2.jpg" alt="Third Slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>careX Pharmacy</h1>
                        <p>Dont worry about going outside for taking medicines in your any situation. We are here for you whenever life takes you</p>
                        <p> <a role="button" class="btn btn-lg btn-primary" href="#">Products</a></p>
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

    <div class="container marketing">
        <ul>
        <br>
        <h2 id="fruit">Immunity Boosters</h2>
        <hr>
        <div class="row" id="fruitDIV"></div>
        <h2 id="juice">Pain Relief</h2>
        <hr>
        <div class="row" id="juiceDIV"></div>
        <h2 id="salad">Personal Protective Equipment</h2>
        <hr>
        <div class="row" id="saladDIV"></div>
        <hr class="featurette-divider">
        </ul>
    </div>
    <footer class="container">
        <p class="float-right">
            <a href="#">TOP</a>
        </p>
        <div class="row">
            XCARE PHARMACY
        </div>
    </footer>
</main>

<!-- Modal -->
<div id="modal1" class="modal">
    <div class="model-content">
        <div class="row">
            <form id="formLogin" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" required id="userName" class="valdate">
                        <label for="icon_prefix">User</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" required id="userName" class="valdate">
                        <label for="icon_prefix">User</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action" >Submit
                        <i class="material-icons right">send</i>
                        </button>
                    </div>
                    
                </div>
            </form>
        </div>

    </div>

</div>


<!-- End Modal -->



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script src="./main.js"></script>
</body>
</html>
