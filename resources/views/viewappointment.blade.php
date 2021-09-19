<style><?php include public_path('css/StyleViewAppointment.css') ?></style>
<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <title>View Appointments</title>
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

                <!-- Delete Model -->
        <form action="" method="POST" class="patients-remove-record-model">
            <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                            <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                                    aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to delete this record?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                                    data-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                    // Get Data
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
                            <td><button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' + index + '">Cancel Appointment</button></td>\
                        </tr>');
                        }
                        lastIndex = index;
                    });
                    $('#tbody').html(htmls);
                    });
                
            }
    };
    // function getDoctor(id) {
        
    //     console.log('doc id',id);
    //     firebase.database().ref('doctors/' + id).on('value', function (snapshot) {
    //     var value = snapshot.val();
    //     console.log(value.Name);
    //     return value.Name;
    // });

    // Remove Appointment Data
    $("body").on('click', '.removeData', function () {
        var id = $(this).attr('data-id');
        $('body').find('.patients-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
    });
    $('.deleteRecord').on('click', function () {
        var values = $(".patients-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('appointments/' + id).remove();
        $('body').find('.patients-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.patients-remove-record-model').find("input").remove();
    });
    function goToIndex() {
	window.location = '/home?uid=' + uid;
    }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>