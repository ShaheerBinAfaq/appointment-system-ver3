<style><?php include public_path('css/stylesLogin.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="stylesLogin.css"> -->
    <title>Login | Admin</title>
</head>
<body>
    <form autocomplete="off" id="form" class="text-center border border-light p-5">
        <p class="h4 mb-4">Admin Login</p>
        <input type="email" required id="email" class="form-control mb-4" placeholder="Email">
        <input type="password" required id="password" class="form-control mb-4" placeholder="Password">
        <button type="submit" class="btn btn-warning btn-block">Submit</button>
    </form>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="login.js"></script> -->
</body>
</html>
<script>
    var x = document.getElementById("email");
var p = document.getElementById("password");

document.getElementById("form").addEventListener("submit",(ee)=>{
    ee.preventDefault();
    console.log(x.value);
    console.log(p.value);
    if (x.value="admin@gmail.com" && p.value=="qwerty") {
        swal({
            title:'Welcome',
            html:'Access granted',
            type: 'success'
        });
        setTimeout(() => {
            loadPage();
        }, 3000);  
    } else {
        swal({
            title:'ERROR',
            html:'Access denied',
            type: 'error'
        });
    }
    function loadPage(){
        window.location = '/dashboard';
    }
});
</script>