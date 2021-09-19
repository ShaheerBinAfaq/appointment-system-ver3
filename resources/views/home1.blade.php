<style><?php include public_path('css/StyleHome.css') ?></style>
<html>
    <head>
	<link rel="icon" href="\images\img\home\care X logo.png" type="image/icon type">
           <title>CareX Appointment System</title>
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <meta name="viewport" content="width = device-width, initial-scale =1">
          <link href="https://fonts.googleapis.com/css2?family=Kavivanar&family=Lobster&display=swap" rel="stylesheet">


          <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
	</head>
	<body>
		
		<section id="banner">
			<img src="\images\img\home\care X logo.png" class="LOGO" >
			<div class="banner-text">
				<h1>CareX Appointment System</h1>
				<p>Find,Book & Consult Doctors</p>
				<div class="banner-btn">
					<a href="#footer"><span></span>Find out</a>
					<a onClick="gotoabout()" target="_blank" >
						<span></span>Read More
					</a>

				</div>
			</div>
		</section>
		<div id="sideNav">
            <button id="closeb" onclick="closebtn()"><img style="width: 20px;  height: 20px;border-radius: 3px; background: #009688;" src="\images\img\home\close-icon.png"   id="MENUICON"></button>
            <div id="menuBtn">
		    <button style=" position: fixed; right: 43px; top: 20px; height: 0px;" id="openb" onclick="openbtn()"><img src="\images\img\home\MENUICON.png"   id="MENUICON"></button>
		  </div>
			<nav>
				<ul>
					
					<li><a href="#banner">HOME</a></li>
					<li><a href="#feature">FEATURES</a></li>
					<li><a href="#service">SERVICES</a></li>
					<li><a href="#footer">CONTACT US</a></li>
					
				</ul>
			</nav>
		</div>
		<button class="logbtn" onClick="logout()">Logout</button>
		
		<!--Features-->
		<section id="feature">
			<div class="title-text">
          <p>FEATURES</p>
          <h1> Why Choose Us</h1>
			</div>
			<div class="feature-box">
				<div class="features">
					<ul>
				<li>	<h1>Less time consuming</h1>
				</li>

				<li><h1>Pre Booking Appointment Online</h1>
				</li>

					<li><h1>Better Customer Experience</h1>
				</li>

					<li><h1>Digital Medical Records</h1>
						
				</li>
				<li><h1>Appointment Reminders</h1>
						
				</li>

				</ul>

				</div>

				<div class="features-img">
				<img src="\images\img\home\Doconline.jpeg">
				</div>

			</div>

			
		</section>

		<!-- Service-->
		<section id="service">
          <div class="title-text">
          <p>SERVICES</p>
          <h1> We Provide Better</h1>
			</div>
			<div class="service-box">
				<button onClick="appointment()" class="single-service">
					<img src="\images\img\home\bookA.jpg" style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Book Appointment</h3>
						<hr>
						<p>Choose the speciality you want to book your online doctor appointment with in Karachi.We will give you the easiest experience of appointment booking.</p>
					</div>
				</button>
				<button onClick="pharmacy()" class="single-service">
					<img src="\images\img\home\pharmacy.jpg" style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Order Medicine</h3>
						<hr>
						<p>We are digital healthcare innovators, dedicated towards improving your access to healthcare by blending technology and innovation to solve problems associated with modern day pharmacies.</p>
						
					</div>
                </button>
				<button onClick="viewappointments()" class="single-service">
					<img src="\images\img\home\Finddoc.jpg"style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>View My Appointments</h3>
						<hr>
						<p>It takes less than 1 minute and Nothing can really give you a feel for whether you’ve selected the right doctor like a face-to-face meeting.</p>
						
					</div>
                </button>
				<button onClick="test()" class="single-service">
					<img src="\images\img\home\QCons.jpg"style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Upload Report</h3>
						<hr>
						<p>Save time & money. Here experienced and specialised  doctors are available. Find a Doctor with expertise that meets your health needs</p>

					</div>
                </button>
				<button onClick="viewprescriptions()" class="single-service">
					<img src="\images\img\test1.png"style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>View My Prescriptions</h3>
						<hr>
						<p>You have consulted the doctor. What now? Get your prescription ASAP.</p>
						
					</div>
                </button>
				<button onClick="quickConsultation()" class="single-service">
					<img src="\images\img\home\cons2.jpg" style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Quick Consultation</h3>
						<hr>
						<p>Save time and consult online with your doctor staying at home.</p>
					</div>
				</button>
				
			</div>
		 </section>

         <!--Footer-->

         <section id="footer">
         	<img src="\images\img\home\care X logo.png" class="footer-img">
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
				<p>ST-13 Abul Hasan Isphahani Rd, Block 7 Gulshan-e-Iqbal, Karachi<i class="fa fa-map-marker"></i></p>
				<p>CareXAppointmentSystem70@gmail.com <i class="fa fa-paper-plane"></i></p>
				<p> (021)34994305<i class="fa fa-phone"></i></p>
			</div>
			
		</div>
		<div class="social-links">
			<a href="https://www.facebook.com/Care-X-109315344832188/" target="_blank"><i  class="fa fa-facebook"></i></a>
			<a href="https://www.instagram.com/_care_x_/" target="_blank"><i class="fa fa-instagram"></i></a>
		<a href="https://twitter.com/CareAppointment" target="_blank">	<i class="fa fa-twitter"></i></a>
			<p>Copyright</p>

		</div>
         </section>


        
        <!-- <script src="web.js"></script> -->
	</body>
</html>
<script>
	//Getting User id
    var uid;
    window.onload = function () {
        
		if (window.location.search.split('?').length > 0) {
			var params = window.location.search.split('?')[1];
			uid = params.split('=')[1];                                
        }
    };
    function pharmacy() {
        window.location = '/pharmacy?uid=' +uid;
    }
	function appointment() {
		window.location = '/choosedoctor?uid=' + uid;
    }
	function test() {
        window.location = '/reportupload?uid=' + uid;
    }
	function viewappointments() {
		window.location = '/viewappointment?uid=' + uid;
	}
	function viewprescriptions() {
		window.location = '/viewprescription?uid=' + uid;
	}
	function quickConsultation() {
		window.location = '/quickconsultation?uid=' + uid;
	}
</script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>

<script>
var close = document.getElementById("closeb")
var open = document.getElementById("openb")

function openbtn() {
    open.style.display = "none"
    var navbar = document.getElementById("sideNav").style.width = "250px"
    
//    open.display:none;
//    close.remove()
    
}

function closebtn() {
    
    var navbar = document.getElementById("sideNav").style.width = "0px"
    open.style.display = "block"
//    open.remove()
}

	var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1000,
	speedAsDuration: true
});


    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);

function logout() {
	firebase.auth().signOut().then(() => {
	// Sign-out successful.
	window.location='/';
	}).catch((error) => {
	// An error happened.
});
}
function gotoabout() {
	window.location = 'aboutus';
}

</script>