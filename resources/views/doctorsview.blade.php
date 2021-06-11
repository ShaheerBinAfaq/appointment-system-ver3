<style><?php include public_path('css/Docview.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's View</title>
</head>
<body>
    
<div class="container">
<br>
    <h6>SELECT DOCTOR</h6>
    <hr>
    <br><br>
     <label>Choose a Doctor:</label>

    <select id="doctors">
        
    </select>
    <button onClick="selectDr()" style="width: 200px; height: 50px;">Select</button>
    <button onClick="appointment()" style="width: 200px; height: 50px;">View My Appointments</button>
    <button onClick="testreport()" style="width: 200px; height: 50px;">View Test Reports</button>
    </div>
</body>
</html>
{{--Firebase Tasks--}}
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
    var lastIndex = 0;
</script>
<script>
var doctors = {};
    firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        console.log(value);
        $.each(value, function (index, value) {
            if(value) {
                console.log(index + " " + value.Name);
                htmls.push('<option value="' + index + '"/>' + value.Name + '</option>')
            }
        });
        document.getElementById('doctors').innerHTML = htmls;
    });
    var drid;
    function selectDr() {
        drid = document.getElementById('doctors').value;
        console.log("in func ", drid);
    }
    function appointment(){ 
        window.location = "drviewappointment?drid=" + drid;
    }
    function testreport() {
        window.location = '/drviewreport?drid=' + drid;
    }
</script>