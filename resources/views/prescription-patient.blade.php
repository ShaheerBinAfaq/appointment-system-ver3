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
    <header>
        <nav class="navbar navbar-dark navbar-expand-md bg-success text-white">
            <a class="text-white navbar-brand" onClick="goToIndex()">
                Home
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    
            </button>
        </nav>
    </header>

    <body>
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
                var appids = [];
                // Get prescription Data
                firebase.database().ref('prescriptions/').on('value', function (snapshot) {
                    var value = snapshot.val();
                                       
                    $.each(value, function (index, value) {
                        if (value) {                                
                            appids.push(value.appointment_id);
                        }                        
                    });
                    console.log(appids);
                    });
                // Get Appointment Data
                firebase.database().ref('appointments/').on('value', function (snapshot) {
                    var doc_name;
                    var value = snapshot.val();
                    var htmls = [];
                    var flag;                
                    $.each(value, function (index, value) {
                        flag = false;
                        if (value && value.pat_id == uid) {    
                            appids.forEach(function(apid){
                                if(apid==index) {
                                    flag = true;
                                }
                            });
                            if(flag) {
                                htmls.push('<tr>\
                                <td>' + doctors[value.doc_id] + '</td>\
                                <td>' + value.date + '</td>\
                                <td>' + value.time + '</td>\
                                <td><button data-toggle="modal" data-target="#remove-modal" class="btn removeData" data-id="' + index + '">View Prescription</button></td>\
                                </tr>');
                            }
                            else {
                                htmls.push('<tr>\
                                <td>' + doctors[value.doc_id] + '</td>\
                                <td>' + value.date + '</td>\
                                <td>' + value.time + '</td>\
                                </tr>');
                            }
                        }
                        lastIndex = index;
                    });
                    $('#tbody').html(htmls);
                    });
                
            }
    };

    $("body").on('click', '.removeData', function () {
        var appid = $(this).attr('data-id');
        var presid;
        // Get Prescription Data
        firebase.database().ref('prescriptions/').on('value', function (snapshot) {
                    var value = snapshot.val();                                       
                    $.each(value, function (index, value) {
                        if (value && value.appointment_id == appid) {    
                            presid = index;
                            window.location = 'presPdf?presid=' + presid;
                        }
                        lastIndex = index;
                    });
                    });
                    
    });
    
    function goToIndex() {
	window.location = '/home?uid=' + uid;
}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>