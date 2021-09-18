<style><?php include public_path('css/StyleDashboard.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Admin</title>
    
</head>
<body> 
<div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card" id="invoice">
                   
                    <div class="card-body">
                        <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
        Current Users Registered: <p id="countuser"></p>
        </div>
        <div class="slide">
        Current Doctors Registered: <p id="countdoctor"></p>
        </div>
        <div class="slide">
        Total Appointments: <p id="countappointment"></p>
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->
</div>
<div class="table-responsive">
                         
    <table class="table table-lg">
        <thead>
            <tr>
                <th> <input type="submit" id="doctorbtn" value="Manage Doctor Data" class="btn" /></th>
                <th> <input type="submit" id="patientbtn" value="Manage Patient Data" class="btn" /></th>
                <th> <input type="submit" id="appointmentbtn" value="Manage Appointment Data" class="btn" /></th>

            </tr>
                <tr>
                <th> <input type="submit" id="testbtn" value="Manage Tests Data" class="btn" /></th>
            </tr>
        </thead>
    
    </table>
</div>
</div>
</div>
</div>
</body>

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
        location.href = 'http://localhost:8000/doctors';
    });
    const patient = document.getElementById('patientbtn');
    patient.addEventListener('click', event=>{
        location.href = 'http://localhost:8000/patients';
    });
    const appointment = document.getElementById('appointmentbtn');
    appointment.addEventListener('click', event=>{
        location.href = 'http://localhost:8000/appointments';
    });
    const test = document.getElementById('testbtn');
    test.addEventListener('click', event=>{
        location.href = 'http://localhost:8000/tests';
    });
</script>
<script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 3){
        counter = 1;
      }
    }, 5000);
    </script>
</html>