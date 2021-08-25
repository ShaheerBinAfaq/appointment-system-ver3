<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    Current Users Registered: <p id="countuser"></p>
    Current Doctors Registered: <p id="countdoctor"></p>
    Total Appointments: <p id="countappointment"></p>
    <br>
    <a href="">Manage Patient Data</a>
    <a href="">Manage Doctor Data</a>
    <a href="">Manage Appointment Data</a>
    <a href="">Send Notification</a>
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

    // Count users
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

    // Count users
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
</script>
</html>