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
    // Add Data
    $('#submitAppointment').on('click', function (){
        var values = $("#addAppointment").serializeArray();
        var date = values[0].value;
        var time = values[1].value;
        var id = lastIndex + 1;
        // try{
        //     var date = document.getElementById('datepicker');
        //     var time = document.getElementById('time');
        //     var id = lastIndex + 1;
        //     console.log(date, time);
        // }
        // catch(e) {
        //     console.log(e);
        // }
        firebase.database().ref('appointments/' + id).set({
            date: date,
            time: time,
        });
        lastIndex = id;
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>