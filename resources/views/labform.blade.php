<style><?php include public_path('css/StyleLabForm.css') ?></style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lab-Report Form</title>
    <!-- <link rel="stylesheet" href="labform.css" /> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    
    <!-- <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script> -->
    
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
     
      <div class="form">
  
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
  
        <form id="test-form">
            <h3 class="title" style="font-size: 40px">Medical Report</h3>
            <hr>
            <div class="input-container">
              <input type="text" id="PATIENT-NAME" name="PATIENT-NAME" class="input" required />
              <label for="">PATIENT-NAME</label>
              <span>PATIENT-NAME</span>
            </div>
            <div class="input-container">
              <input type="date"type= "hidden" id="REQUESTED-ON" name="REQUESTED-ON" class="input" required/>
              <label for="">REQUESTED-ON</label>
              <span>REQUESTED-ON</span>
            </div>
            <div class="input-container">
              <input type="date" id="REPORTED-ON" name="REPORTED-ON" class="input" required/>
              <label for="">REPORTED-ON</label>
              <span>REPORTED-ON</span>
            </div>
            <div class="input-container textarea">
              <textarea id="CLINICAL-COMMENTS" name="CLINICAL-COMMENTS" class="input" optional></textarea>
              <label for="">CLINICAL-COMMENTS</label>
              <span>CLINICAL-COMMENTS</span>
            </div>
        
        </form>
            <button id="save" class="btn">Save</button>
            <button onclick="addTest()" class="btn">Add Tests</button>
            <button onClick="generate()" class="btn">Generate Report</button>            
        
        </div>
      </div>
    </div>  
  </body>
</html>
{{--Firebase Tasks--}}
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    var presId;
    var lastIndex = 0;

    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    presId = getPresId();
    //Getting Tests Data
    firebase.database().ref('tests/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if (value) {
                
            }
            lastIndex = index;
        });
    });
    //Getting Prescription Data
    firebase.database().ref('prescriptions/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if (value && presId == index) {
                document.getElementById('PATIENT-NAME').value = value.pat_name;
            }
        });
    });



function addTest() {
    window.location = '/addtest?rid=' + lastIndex + "&presid=" + presId;
}
function generate() {
    window.location = '/testPdf?repid=' + lastIndex;
  
}
//Getting Prescription id

function getPresId() {
    
    if (window.location.search.split('?').length > 0) {
        var params = window.location.search.split('?')[1];
        return params.split('=')[1];                                
    }
}
// Add Prescription Data
$('#save').on('click', function () {
        
        var values = $("#test-form").serializeArray();
        var pat_name = values[0].value;
        var requested_on = values[1].value;
        var reported_on = values[2].value;
        var comments = document.getElementById('CLINICAL-COMMENTS').value;
        console.log(lastIndex);
        testID = lastIndex + 1;
        console.log(values);
        firebase.database().ref('tests/' + testID).set({
            prescription_id: presId,
            pat_name: pat_name,
            requested_on: requested_on,
            reported_on: reported_on,
            comments: comments,
        });
    });
</script>
