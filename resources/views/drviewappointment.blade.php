<style><?php include public_path('css/StyleViewAppointment.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Appointments | Doctor</title>
</head>
<body>
<h5>Appointments</h5>
<label>Choose a Doctor:</label>
    <select id="doctors">
        
    </select>
    <button onClick="loadTable()">Select</button>
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
    var DocId;
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
    function loadTable(){
        console.log("running..");
        // Get Data
        firebase.database().ref('appointments/').on('value', function (snapshot) {
            var value = snapshot.val();
            var htmls = [];
            var drid = $("#doctors").val();
            console.log("running ",DocId);
            $.each(value, function (index, value) {
                if (value && value.doc_id==drid) {
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
    }
    // Get Doctors
    firebase.database().ref('doctors/').on('value', function(snapshot){
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index,value){
            if(value) {
                htmls.push('<option value="' + index + '" fromtime='+value.startTime+' endtime='+value.endTime+'>' + value.Name + '</option>');
            }
        // console.log(index);
        });
        document.getElementById('doctors').innerHTML = htmls;
        DocId = $("#doctors").val();    
    });


</script>
