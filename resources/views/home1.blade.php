<style><?php include public_path('css/StyleHome.css') ?></style>
<html>
    <head>
           <title>Hospital Appointment System</title>
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
           <meta name="viewport" content="width = device-width, initial-scale =1">
          <link href="https://fonts.googleapis.com/css2?family=Kavivanar&family=Lobster&display=swap" rel="stylesheet">


          <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
	</head>
	<body>
		
		<section id="banner">
			<img src="\images\img\home\LOGO.png" class="LOGO" >
			<div class="banner-text">
				<h1>Hospital Appointment System</h1>
				<p>Find,Book & Consult Doctors</p>
				<div class="banner-btn">
					<a href="#"><span></span>Find out</a>
					<a href="#"><span></span>Read More</a>

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
					<li><a href="#testimonial">TESTIMONIALS</a></li>
					<li><a href="#footer">CONTACT US</a></li>
					
				</ul>
			</nav>
		</div>
		<button onClick="logout()" style=" position: fixed; right: 90px; top: 20px; height: 30px;">Logout</button>
		
		<!--Features-->
		<section id="feature">
			<div class="title-text">
          <p>FEATURES</p>
          <h1> Why Choose Us</h1>
			</div>
			<div class="feature-box">
				<div class="features">
				<h1>Experienced Staff</h1>
				<div class="features-desc">
				<div class="feature-icon">
					<i class="fa fa-shield"></i>
				</div>
				<div class="feature-text">
					<p> Employee experience encapsulates what people encounter and observe over the course of their tenure at an organization.</p>
				</div>
			</div>

					<h1>Pre Booking Online</h1>
				<div class="features-desc">
				<div class="feature-icon">
					<i class="fa fa-check-square-o"></i>
				</div>
				<div class="feature-text">
					<p> Employee experience encapsulates what people encounter and observe over the course of their tenure at an organization.</p>
				</div>
				</div>

					<h1>Afordable Cost</h1>
				<div class="features-desc">
				<div class="feature-icon">
					<i class="fa fa-inr"></i>
				</div>
				<div class="feature-text">
					<p> Employee experience encapsulates what people encounter and observe over the course of their tenure at an organization. </p>
				</div>
				</div>
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
					<img src="\images\img\home\consultdoc.jpg" style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Book Appointment</h3>
						<hr>
						<p>Choose the speciality you want to book your online doctor appointment with in Karachi.We will give you the easiest experience of appointment booking.</p>
					</div>
				</button>
				<button onClick="pharmacy()" class="single-service">
					<img src="\images\img\home\med.png" style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Order Medicine</h3>
						<hr>
						<p>We are digital healthcare innovators, dedicated towards improving your access to healthcare by blending technology and innovation to solve problems associated with modern day pharmacies.</p>
						
					</div>
                </button>
				<button onClick="viewappointments()" class="single-service">
					<img src="\images\img\home\book.jpg"style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>View My Appointments</h3>
						<hr>
						<p>It takes less than 1 minute and Nothing can really give you a feel for whether you’ve selected the right doctor like a face-to-face meeting.</p>
						
					</div>
                </button>
				<button onClick="test()" class="single-service">
					<img src="\images\img\home\cons2.jpg"style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Upload Report</h3>
						<hr>
						<p>Save time & money. Here experienced and specialised  doctors are available. Find a Doctor with expertise that meets your health needs</p>

					</div>
                </button>
				<button onClick="quickConsultation()" class="single-service">
					<img src="\images\img\home\consultdoc.jpg" style="height: 320px">
					<div class="overlay"></div>
					<div class="service-desc">
						<h3>Quick Consultation</h3>
						<hr>
						<p>Choose the speciality you want to book your online doctor appointment with in Karachi.We will give you the easiest experience of appointment booking.</p>
					</div>
				</button>
				
			</div>
		 </section>

         <!-- Testimonial -->
         <section id="testimonial">
         	<div class="title-text">
          <p>TESTIMONIAL</p>
          <h1> What Client Says</h1>
			</div>
           <div class="testimonial-row">
                  <div class="testimonial-col">
                  	<div class="user">
                  		<img src="\images\img\home\man1.png">
                  		<div class="user-info">
                  			<h4>Mubashir Ahmed</h4>
                  			<small>@mubashirahmed<i class="fa fa-twitter"></i></small>
                  		</div>
                  	</div>
                  	<p>We are digital healthcare innovators, dedicated towards improving your access to healthcare by blending technology and innovation to solve problems associated with modern day pharmacies</p>
                  </div>
                  <div class="testimonial-col">
                  		<div class="user">
                  		<img src="\images\img\home\gp1.jpg">
                  		<div class="user-info">
                  			<h4>Syeda Zunaira Ahmed </h4>
                  			<small>@syedazunaira<i class="fa fa-twitter"></i></small>
                  		</div>
                  	</div>
                  	  	<p>We are digital healthcare innovators, dedicated towards improving your access to healthcare by blending technology and innovation to solve problems associated with modern day pharmacies</p>
                  </div>
                  <div class="testimonial-col">
                  		<div class="user">
                  		<img src="\images\img\home\b2.jpg">
                  		<div class="user-info">
                  			<h4>Mohammad Ali</h4>
                  			<small>@mohammadali <i class="fa fa-twitter"></i></small>
                  		</div>
                  	</div>
                  	  	<p>We are digital healthcare innovators, dedicated towards improving your access to healthcare by blending technology and innovation to solve problems associated with modern day pharmacies</p>
                  </div>
           </div>



         </section>
         <!--Footer-->

         <section id="footer">
         	<img src="\images\img\home\imgf.png" class="footer-img">
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
				<p>Address*******<i class="fa fa-map-marker"></i></p>
				<p>Email*********<i class="fa fa-paper-plane"></i></p>
				<p>phone number<i class="fa fa-phone"></i></p>
			</div>
			
		</div>
		<div class="social-links">
			<i class="fa fa-facebook"></i>
			<i class="fa fa-instagram"></i>
			<i class="fa fa-twitter"></i>
			<i class="fa fa-youtube-play"></i>
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

</script>