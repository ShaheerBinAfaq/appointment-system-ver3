<style><?php include public_path('css/StylePres.css') ?></style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prescription Form</title>
    <!-- <link rel="stylesheet" href="Stylepp.css" /> -->
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    
  </head>
  <body>

    <div class="container">
      <span class="big-circle"></span>
      <div class="form">
  
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
  
          <form action="index.html" id="prescription" autocomplete="off">
            <h3 class="title" style="font-size: 40px">Medical Prescription</h3>
            <hr>
            <div class="input-container">
              <input type="date" id="DATEWRITTEN" name="DATEWRITTEN" class="input" />
              <label for="">DATEWRITTEN</label>
              <span>DATEWRITTEN</span>
            </div>
            <div class="input-container">
              <input type="text" id="patient" name="PATIENT" class="input" > </input>
              <label for="">PATIENT</label>
              <span>PATIENT</span>
            </div>
  
            <div class="input-container">
              <input type="text" id="PRESCRIBER" name="PRESCRIBER" class="input" />
              <label for="">PRESCRIBER</label>
              <span>PRESCRIBER</span>
            </div>
            <div class="input-container textarea">
              <textarea style="color: aliceblue;" id="REASON" placeholder="REASON" class="input"></textarea>
              <label for=""></label>
              <span></span>
            </div>
          </form>
        </div>
            <!-- <input type="submit" value="Generate Report" class="btn"/> -->
            <button id="save" class="btn">Save</button>
            <button onclick="medicine()" class="btn">Enter Medicines</button>
            <button onclick="test()" class="btn">Enter Tests</button>
            <button onclick="surgery()" class="btn">Enter Surgery</button>
            <button onclick="SubmitAll()" class="btn"><a href="pdf.html">Generate Report</a></button>
          </form>
        </div>
      </div>
    </div>
 
  </body>
</html>
<script>
var uid;
var presID;
  function getId () {
      
        if (window.location.search.split('?').length > 0) {
            var params = window.location.search.split('?')[1];
            return params.split('=')[1];                              
      }
  };
  
  function getDrname(id) {
      firebase.database().ref('doctors/' + id).on('value', function (snapshot) {
        var value = snapshot.val();
      
        document.getElementById('PRESCRIBER').value = value.Name; 
      });
    }
  function getPatName(id) {
    firebase.database().ref('users/' + id).on('value', function (snapshot) {
      var value = snapshot.val();
      console.log('value', value);
      document.getElementById('patient').value = value.fname + " " + value.lname; 
    });
  }
</script>
  {{--Firebase Tasks--}}
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
  <script>
    //Getting Appointment id
  

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
    var presId;
    var drname;
    lastIndex = 0;
    uid = getId();
        // Get Data
        firebase.database().ref('prescriptions/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if (value && uid == value.appointment_id) {
                document.getElementById('DATEWRITTEN').innerHTML = value.date_written;
                document.getElementById('patient').innerHTML = value.pat_name;
                document.getElementById('PRESCRIBER').innerHTML = value.doc_name;
                document.getElementById('REASON').innerHTML = value.reason;
            }
            lastIndex = index;
            console.log(lastIndex,'getting');
        });
    });
    
    
    console.log('uid', uid);
    // Get Appointment Data
    firebase.database().ref('appointments/' + uid).on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        getDrname(value.doc_id);
        getPatName(value.pat_id);
        console.log(value); 
        $('#patient').html(htmls);
        $("#submitPatient").removeClass('desabled');
    });
    
    // Add Prescription Data
    $('#save').on('click', function () {
        
        var values = $("#prescription").serializeArray();
        var appointment_id = uid;
        var date_written = values[0].value;
        var pat_name = values[1].value;
        var doc_name = values[2].value;
        var reason = document.getElementById('REASON').value;
        console.log(lastIndex);
        presID = lastIndex + 1;
        console.log(values);
        firebase.database().ref('prescriptions/' + presID).set({
            appointment_id: appointment_id,
            date_written: date_written,
            pat_name: pat_name,
            doc_name: doc_name,
            reason: reason,
        });
        // Reassign lastID value
        lastIndex = presID;
    });
    function medicine() {
    window.location = 'presMedicine?presId=' + lastIndex;
  }
  function test() {
    window.location = 'presTest?presId=' + lastIndex;
  }
  function surgery() {
    window.location = 'presSurgery?presId=' + lastIndex;
  }
// ----------------------------------------------
const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});



function SubmitAll() {
  const IDENTIFIER = document.getElementById("IDENTIFIER").value;
  const DATEWRITTEN = document.getElementById("DATEWRITTEN").value;
  const STATUS = document.getElementById("STATUS").value;
  const PATIENT = document.getElementById("PATIENT").value;
  const PRESCRIBER = document.getElementById("PRESCRIBER").value;
  const REASON = document.getElementById("REASON").value;
  const ENCOUNTER = document.getElementById("ENCOUNTER").value;
  const MEDICATION = document.getElementById("MEDICATION").value;
  const ADDITIONALINSTRUCTIONS = document.getElementById("ADDITIONALINSTRUCTIONS").value;
  const TIMING = document.getElementById("TIMING").value;
  const ASNEEDED = document.getElementById("ASNEEDED").value;
  const SITE = document.getElementById("SITE").value;
  const METHOD = document.getElementById("METHOD").value;
  const DOSEQUANTITY = document.getElementById("DOSEQUANTITY").value;
  const MAX_DOSE_PER_PERIOD = document.getElementById("MAX_DOSE_PER_PERIOD").value;
  const RATE = document.getElementById("RATE").value;
  const MEDICATION2 = document.getElementById("MEDICATION2").value;
  const VALIDITY_PERIOD = document.getElementById("VALIDITY_PERIOD").value;
  const QUANTITY = document.getElementById("QUANTITY").value;
  const REPEATS_ALLOWED = document.getElementById("REPEATS_ALLOWED").value;
  const EXPECTED_SUPPLY_DURATION = document.getElementById("EXPECTED_SUPPLY_DURATION").value;
  
  
  localStorage.setItem("IDENTIFIER", IDENTIFIER);
  localStorage.setItem("DATEWRITTEN", DATEWRITTEN);
  localStorage.setItem("STATUS", STATUS);
  localStorage.setItem("PATIENT", PATIENT);
  localStorage.setItem("PRESCRIBER", PRESCRIBER);
  localStorage.setItem("REASON", REASON);
  localStorage.setItem("ENCOUNTER", ENCOUNTER);
  localStorage.setItem("MEDICATION", MEDICATION);
  localStorage.setItem("ADDITIONALINSTRUCTIONS", ADDITIONALINSTRUCTIONS);
  localStorage.setItem("TIMING", TIMING);
  localStorage.setItem("ASNEEDED", ASNEEDED);
  localStorage.setItem("SITE", SITE);
  localStorage.setItem("METHOD", METHOD);
  localStorage.setItem("DOSEQUANTITY", DOSEQUANTITY);
  localStorage.setItem("MAX_DOSE_PER_PERIOD", MAX_DOSE_PER_PERIOD);
  localStorage.setItem("RATE", RATE);
  localStorage.setItem("MEDICATION2", MEDICATION2);
  localStorage.setItem("VALIDITY_PERIOD", VALIDITY_PERIOD);
  localStorage.setItem("QUANTITY", QUANTITY);
  localStorage.setItem("REPEATS_ALLOWED", REPEATS_ALLOWED);
  localStorage.setItem("EXPECTED_SUPPLY_DURATION", EXPECTED_SUPPLY_DURATION);
}

</script>