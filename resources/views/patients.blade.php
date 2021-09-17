<style><?php include public_path('css/StyleViewAppointment.css') ?></style>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <title>Patient | Admin</title>
@laravelPWA
</head>
<body>

<div class="container" style="margin-top: 50px;">
    <!-- <span class="big-circle"></span> -->
    <img src="\images\patients\shape.png" class="square" alt="" />
    <!-- <h4 class="text-center">Laravel RealTime CRUD Using Google Firebase</h4><br> -->

    <!-- <h5># Add Patient</h5>
    <div class="card card-default">
        <div class="contact-form">
        <span class="circle one"></span>
          <span class="circle two"></span>
            <form id="addPatient" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email"
                           required autofocus>
                </div>
                <button id="submitPatient" type="button" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div> -->

    <br>

    <h5># Patients</h5>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone #</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>CNIC #</th>
           
            <!-- <th width="180" class="text-center">Action</th> -->
        </tr>
        <tbody id="tbody">

        </tbody>
    </table>
</div>

<!-- Update Model -->
<form action="" method="POST" class="patients-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success updatePatient">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
    var lastIndex = 0;
    // Get Data
    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
        		<td>' + value.fname + " " + value.lname + '</td>\
        		<td>' + value.email + '</td>\
                <td>' + value.phone + '</td>\
                <td>' + value.address + '</td>\
                <td>' + value.gender + '</td>\
                <td>' + value.dob + '</td>\
                <td>' + value.nic + '</td>\
        	</tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitPatient").removeClass('desabled');
    });
    // Add Data
    $('#submitPatient').on('click', function () {
        var values = $("#addPatient").serializeArray();
        var name = values[0].value;
        var email = values[1].value;
        var userID = lastIndex + 1;
        console.log(values);
        firebase.database().ref('patients/' + userID).set({
            name: name,
            email: email,
        });
        // Reassign lastID value
        lastIndex = userID;
        $("#addPatient input").val("");
    });
    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('users/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Name</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.fname + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">CNIC #</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.lname + '" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Email</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.email + '" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Phone #</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.phone + '" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Address</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.address + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Gender</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.gender + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Date of birth</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.dob + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">CNIC #</label>\
		        <div class="col-md-12">\
		            <input id="last_name" type="text" class="form-control" name="email" value="' + values.nic + '" required autofocus>\
		        </div>\
		    </div>\
            <div class="form-group">\
		        <div class="col-md-12">\
		            <input id="last_name" type="hidden" class="form-control" name="email" value="' + values.id + '" required autofocus>\
		        </div>\
		    </div>';
            $('#updateBody').html(updateData);
        });
    });
    $('.updatePatient').on('click', function () {
        var values = $(".patients-update-record-model").serializeArray();
        var postData = {
            fname: values[0].value,
            lname: values[1].value,
            email: values[2].value,
            phone: values[3].value,
            address: values[4].value,
            gender: values[5].value,
            dob: values[6].value,
            nic: values[7].value,
            id: values[8].value,
        };
        var updates = {};
        updates['/users/' + updateID] = postData;
        firebase.database().ref().update(updates);
        $("#update-modal").modal('hide');
    });
    // Remove Data
    $("body").on('click', '.removeData', function () {
        var id = $(this).attr('data-id');
        $('body').find('.patients-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
    });
    $('.deleteRecord').on('click', function () {
        var values = $(".patients-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('users/' + id).remove();
        $('body').find('.patients-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.patients-remove-record-model').find("input").remove();
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>