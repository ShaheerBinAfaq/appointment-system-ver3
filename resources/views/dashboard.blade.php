<style><?php include public_path('css/Styledash1.css') ?></style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="\images\icons\care x logo.png" type="image/icon type">
    <title>Dashboard|Admin</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="Styledash1.css"> -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx  fa fa-user-md'></i>
      <span class="logo_name">CARE-X</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name" >Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name" id="doctorbtn">Manage Doctor data</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name" id="patientbtn">Manage Patient Data</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name" id="appointmentbtn">Appointment Data</span>
          </a>
        </li>
         <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name" id="pharmacybtn">Manage Pharmacy</span>
          </a>
        </li>            
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name" id="quickconsultationbtn">Quick Consultation</span>
          </a>
        </li>            
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <img src="\images\icons\care X logo.png" style="width: 60px;height: 60px;">
     
        <span class="dashboard" style="font-weight: bold; font-size: 30px; margin-left: 5px;">Dashboard-</span>
 <div id="typing" style="margin-left: 10px;">Care-X <span>Appointment System</span></div>
<div id="crow">|</div>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Current Users</div>
            <div><label class="number" id="countuser"></label></div>

          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Current Doctors</div>
            <div><label class="number" id="countdoctor"></label></div>
            
          </div>
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total appointments</div>
            <div><label class="number" id="countappointment"></label></div>
           
          </div>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
      <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="\images\img\1.png" alt="">
        </div>
        <div class="slide">
          <img src="\images\img\2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="\images\img\3.jpg" alt="">
        </div>
        <div class="slide">
          <img src="\images\img\4.jpg" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
        </div>
        <div class="top-sales box">
          <div class="clock">

    <div class="hour">
      <div class="hr" id="hr"></div>
    </div>

    <div class="min">
      <div class="mn" id="mn"></div>      
    </div>

    <div class="sec">
      <div class="sc" id="sc"></div>      
    </div>

  </div>
        </div>
      </div>
    </div>
  </section>


<!-- {{--Firebase Tasks--}} -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    // Count users
    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        var countUsers = 0;
        $.each(value, function (index, value) {
            if (value) {
                countUsers++;
            }
        });
        document.getElementById('countuser').innerHTML = countUsers;
    });

    // Count doctors
    firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        var countDocs = 0;
        $.each(value, function (index, value) {
            if (value) {
                countDocs++;
            }
        });
        document.getElementById('countdoctor').innerHTML = countDocs;
    });

    // Count appointments
    firebase.database().ref('appointments/').on('value', function (snapshot) {
        var value = snapshot.val();
        var countAppointments = 0;
        $.each(value, function (index, value) {
            if (value) {
                countAppointments++;
            }
        });
        document.getElementById('countappointment').innerHTML = countAppointments;
    });

    //Routing
    const doctor = document.getElementById('doctorbtn');
    doctor.addEventListener('click', event=>{
        window.location = 'doctorsa';
    });
    const patient = document.getElementById('patientbtn');
    patient.addEventListener('click', event=>{
        window.location = 'patientsa';
    });
    const appointment = document.getElementById('appointmentbtn');
    appointment.addEventListener('click', event=>{
        window.location = 'appointmentsa';
    });
    const pharmacy = document.getElementById('pharmacybtn');
    pharmacy.addEventListener('click', event=>{
        window.location = 'pharmacyadmin';
    });
    const qc = document.getElementById('quickconsultationbtn');
    qc.addEventListener('click', event=>{
        window.location = 'quickconsultation?uid=ZSI2IAfkuUVBW6xZTTT3Qbue3S93';
    });
</script>

  <script>


const secDiv = document.getElementById('sc');
const minDiv = document.getElementById('mn');
const hourDiv = document.getElementById('hr');

setInterval(updateClock, 1000);

function updateClock(){
  let date = new Date();
  let sec = date.getSeconds() / 60;
  let min = (date.getMinutes() + sec) / 60;
  let hour = (date.getHours() + min) / 12;

  secDiv.style.transform = "rotate(" + (sec * 360) + "deg)";
  minDiv.style.transform = "rotate(" + (min * 360) + "deg)";
  hourDiv.style.transform = "rotate(" + (hour * 360) + "deg)";
}

updateClock();

var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);

 </script>

</body>
</html>

