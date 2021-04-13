<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments | Doctor</title>
</head>
<body>
<h5>My Appointments</h5>
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Patient name</th>
            <th width="180" class="text-center">Action</th>
        </tr>
        <tbody id="tbody">

        </tbody>
    </table>
</body>
</html>
{{--Firebase Tasks--}}
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    function getDrId() {
        if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                return params.split('=')[1];                
        }
    }

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

    // Getting Patient Name
    var patients = {};
    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            patients[index] = value.fname + " " + value.lname;
        });
    });

    // Get Data
    firebase.database().ref('appointments/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        var drid = getDrId();
        console.log("running");
        $.each(value, function (index, value) {
            if (value && drid == value.doc_id) {
                console.log(value.pat_id);
                htmls.push('<tr>\
        		<td>' + value.date + '</td>\
        		<td>' + value.time + '</td>\
                <td>' + patients[value.pat_id] + '</td>\
        		<td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Generate Prescription</button>\
        		</td>\
        	</tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitPatient").removeClass('desabled');
    });
    $('body').on('click', '.updateData', function () {
        var app_id = $(this).attr('data-id');
        window.location = '/prescription?appointmentid=' + app_id;
    });


</script>
