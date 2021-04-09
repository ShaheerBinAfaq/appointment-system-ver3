<!doctype html>
<html lang="en">
<head>
<!-- Time -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script> 

    $(document).ready(function(){
    $('#time').timepicker({
        interval: 15,
        // minTime: new Date().toLocaleTimeString(),
        scrollbar: true,
    })});

</script>

<!-- Date -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
    $("#datepicker").datepicker();
});
</script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>
<body>
<form id="addAppointment" method="POST" action="">
    <div class="app_time_Date_main card card-default container">
        <label>Choose a Doctor:</label>

            <select id="doctors">
                
            </select>
        <label>
            Choose Appointment Date <br>
        </label>
            <input type="text" id="datepicker" name="date" placeholder="Choose Appointment Date">
         <br><br>
        
        <label>
            Choose Appointment Time <br>
        </label>
            
            <input type="text" id="time" name="time" placeholder="Choose Appointment Time">
            <br><br>

        <button id="submitAppointment" type="button" class="btn btn-primary mb-2">Book Appointment</button>
    </div>
</form>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- Firebase Tasks -->
<!-- <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    var uid;
    window.onload = function () {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                uid = params.split('=')[1];
                console.log('params', params);
                console.log('uid', uid);
                
        }
    };
    
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
    firebase.database().ref('appointments/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) { 
            lastIndex = index;
        });
        
        });
    // Add Data
    $('#submitAppointment').on('click', function (){
        var values = $("#addAppointment").serializeArray();
        var date = values[0].value;
        console.log(document.getElementById('doctors').value);
        var time = values[1].value;
        var doc_id = document.getElementById('doctors').value;
        var id = lastIndex + 1;
        
        firebase.database().ref('appointments/' + id).set({
            date: date,
            time: time,
            doc_id: doc_id,
            pat_id: uid,
        });
        lastIndex = id;
        window.location = '/home?uid=' + user.uid;
    });

    // Get Doctors
    firebase.database().ref('doctors/').on('value', function(snapshot){
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index,value){
            if(value) {
                htmls.push('<option value="' + index + '">' + value.Name + '</option>');
            }
        console.log(index);
        });
        document.getElementById('doctors').innerHTML = htmls;
        
    });

    
    // const setupUI = (user) => {
    //     if (user) {
    //         console.log(user.email);
    //     }
    //     else {
    //         console.log('no user');
    //     }
    // }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>