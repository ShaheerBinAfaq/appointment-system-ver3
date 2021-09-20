<style><?php include public_path('css/StyleChooseDr.css') ?></style>
<style><?php include public_path('css/Style.css') ?></style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>OUR DOCTOR</title>
</head>

<body>

    <div class="main_nav_logo">
        <div class="main_nav_logo_flex">
            <div class="logo">
                <!-- <a href="#">
                    <img src="Capture1-.png"
                        class="image-fit" alt="Care X" style="height:120px; top: 1px;">
                </a> -->
            </div>
            
            <!-- <div class="all_nav_btn">
                <button class="search_display_btm"><i class="fa fa-search" aria-hidden="true"></i></button>
                <button class="heart_btn"><i class="fa fa-heart" aria-hidden="true"></i></button>
                <button><i class="fa fa-user" aria-hidden="true"></i></button>
                <button><i class="fa fa-sign-in" aria-hidden="true"></i></button>
            </div> -->
        </div>

        <div class="our_dr_main">
            <div class="our_dr_h">
                <h1>Our Doctors</h1>
            </div>
            <div class="our_dr_text">
                <p>
                    <button class="home_link" onClick="goToIndex()">Back</button>
                    <!-- <a class="dr_link" href="#">Our Doctors</a> -->
                </p>
            </div>
        </div>
    </div>


    <!-- ********** | OUR DOCTORS CARDS ROW 1 | ********** -->
    <table id="doctor" class="main_doctor_card">
                
            
    </table>

    <!-- ********** | JOIN SECTION | ********** -->

    <!-- <div class="main_join">
        <div class="main_join_text">
            <h1>Join Our Newsletter</h1>
            <p>Join our pages and social media link you for using CareX online appointment system</p>
        </div>
        <div class="main_join_input">
            <div>
                <input type="text" placeholder="Email Id">
                <button>Subscriber</button>
            </div>
        </div>
    </div> -->

    <!-- ********** | FOOTER | ********** -->

   <section id="footer">
            <img src="\images\img\care X logo.png" class="footer-img">
            <div class="title-text">
          <p>CONTACT US</p>
          <h1>Feel Free To Contact Us</h1>
            </div>
        <div class="footer-row">
            <div class="footer-left">
                <h1>Opening Hours</h1>
                <p><i class="fa fa-clock-o"></i>Monday to Friday - 9am to 9pm</p>
                <p><i class="fa fa-clock-o"></i>Saturday to Sunday - 8am to 11pm</p>
            </div>
            <div class="footer-right">
                <h1>Get In Touch</h1>
                <p>ST-13 Abul Hasan Isphahani Rd, Block 7 Gulshan-e-Iqbal, Karachi, Karachi City<i class="fa fa-map-marker"></i></p>
                <p>CareXAppointmentSystem70@gmail.com <i class="fa fa-paper-plane"></i></p>
                <p> (021)34994305<i class="fa fa-phone"></i></p>
            </div>
            
        </div>
        <div class="social-links">
            <a href="https://www.facebook.com/Care-X-109315344832188/" target="_blank"><i  class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/_care_x_/" target="_blank"><i class="fa fa-instagram"></i></a>
        <a href="https://twitter.com/CareAppointment" target="_blank">  <i class="fa fa-twitter"></i></a>
            <p>Copyright</p>

        </div>
         </section>

    <!-- ********** | FOOTER END | ********** -->

    <hr>
    <div class="foot_end_main">
        <div class="end_foot_text">
            <p>Care X All Rights Reserved </p>
        </div>
        <div class="end_btns">
            <div>
                <button class="card_btn"><i class="fa fa-facebook" aria-hidden="true"></i></button>
                <button class="card_btn"><i class="fa fa-twitter" aria-hidden="true"></i></button>
                <button class="card_btn"><i class="fa fa-pinterest-p" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>

</body>


<!-- {{--Firebase Tasks--}} -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    function goToIndex() {
	window.history.back();
}

    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var lastIndex = 0;
    // Get Data
    firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td><div id="doctor" class="dr_card_all">\
                <div class="dr card_text"><h3>'+ value.name +'</h3></td>\
                <td><p>'+ value.speciality +'</p></div></div></td>\
                <td><button class="bookapp" data-id="'+ index +'">Book Appointment</button></td>');                
            }
            lastIndex = index;
        });
        document.getElementById("doctor").innerHTML = htmls;
        $("#submitPatient").removeClass('desabled');
    });

    $('body').on('click', '.bookapp', function(){
        var docId = $(this).attr('data-id');
        var uid;

        if (window.location.search.split('?').length > 0) {
			var params = window.location.search.split('?')[1];
			uid = params.split('=')[1];                                
        }

        window.location = 'appointment?uid=' + uid + '&docid=' + docId;
    });
</script>
</html>