<style><?php include public_path('css/StyleViewAppointment.css') ?></style>
<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <title>View Prescriptions</title>
    </head>
    <body>
    <button onClick="home()" class="btn btn-primary mb-2" style=" position: fixed; right: 90px; top: 20px;">Home</button>
        <div class="container" style="margin-top: 50px;">
            <h5># Appointments</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th width="180" class="text-center">Action</th>
                </tr>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    

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
    //Getting User id
    var uid;
    var doctors = {};
    firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        
            $.each(value, function (index, value) {
                if(value) {
                doctors[index] = value.name;
                // doctors.push(doctor);
            }
            });
        
    });
        
    window.onload = function () {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                uid = params.split('=')[1];
                console.log('params', params);
                console.log('uid', uid);
                // Get Appointment Data
                firebase.database().ref('appointments/').on('value', function (snapshot) {
                    var doc_name;
                    var value = snapshot.val();
                    var htmls = [];                   
                    $.each(value, function (index, value) {
                        if (value && value.pat_id == uid) {    
                            // doc_name = getDoctor(value.doc_id);
                            htmls.push('<tr>\
                            <td>' + doctors[value.doc_id] + '</td>\
                            <td>' + value.date + '</td>\
                            <td>' + value.time + '</td>\
                            <td><button data-toggle="modal" data-target="#remove-modal" class="btn removeData" data-id="' + index + '">View Prescription</button></td>\
                        </tr>');
                        }
                        lastIndex = index;
                    });
                    $('#tbody').html(htmls);
                    });
                
            }
    };

    // Remove Appointment Data
    $("body").on('click', '.removeData', function () {
        var appid = $(this).attr('data-id');
        var presid;
        // Get Prescription Data
        firebase.database().ref('prescription/').on('value', function (snapshot) {
                    var value = snapshot.val();                                       
                    $.each(value, function (index, value) {
                        if (value && value.appointment_id == appid) {    
                            presid = index;
                        }
                        lastIndex = index;
                    });
                    });
                    window.location = 'presPdf?presid=' + presid;
    });
    
    function home() {
        window.location = '/home?uid=' + uid;
    }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>