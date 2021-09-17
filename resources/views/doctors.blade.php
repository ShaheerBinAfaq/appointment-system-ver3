<style><?php include public_path('css/StyleViewAppointment.css') ?></style>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Doctors | Admin</title>
@laravelPWA
</head>
<body>

<div class="container" style="margin-top: 50px;">

    <!-- <h4 class="text-center">Laravel RealTime CRUD Using Google Firebase</h4><br> -->

    <h5># Add Doctor</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addPatient" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email" class="sr-only">Speciality</label>
                    <select id="speciality" class="form-control" name="speciality" placeholder="Speciality"
                           required autofocus>
                            <option value="Acupuncture">Acupuncture</option>
                            <option value="Allergy Specialist">Allergy Specialist</option>                        
                            <option value="Anesthetist">Anesthetist</option>
                            <option value="Audiologist">Audiologist</option>
                            <option value="Cancer Specialist">Cancer Specialist</option>
                            <option value="Cancer Surgeon">Cancer Surgeon</option>
                            <option value="Cardiac Surgeon">Cardiac Surgeon</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Chest Surgeon">Chest Surgeon</option>
                            <option value="Chiropractor">Chiropractor</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Dermatologist">Dermatologist</option>
                            <option value="Eye Specialist">Eye Specialist</option>
                            <option value="General Physician">General Physician</option>
                            <option value="General Surgeon">General Surgeon</option>
                            <option value="Gynecologist">Gynecologist</option>
                            <option value="Homeopath">Homeopath</option>
                            <option value="Nephrologist">Nephrologist</option>
                            <option value="Neuro Surgeon">Neuro Surgeon</option>
                            <option value="Neurologist">Neurologist</option>
                            <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
                            <option value="Pediatric Surgeon">Pediatric Surgeon</option>
                            <option value="Pediatrician">Pediatrician</option>
                            <option value="Physiotherapist">Physiotherapist</option>
                            <option value="Plastic Surgeon">Plastic Surgeon</option>
                            <option value="Psychiatrist">Psychiatrist</option>
                            <option value="Psychologist">Psychologist</option>
                            <option value="Radiologist">Radiologist</option>                            
                        </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Monday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Tuesday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Wednesday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Thursday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Friday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Saturday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="day" >Sunday</label>                    
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="startTime" >Start Time  </label>
                    <input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="endTime" >End Time  </label>
                    <input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="duration" >Average Duration of Appointment  </label>
                    <input id="duration" type="number" class="form-control" name="duration" placeholder="15"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="charges" >Charges  Rs.</label>
                    <input id="charges" type="number" class="form-control" name="charges" placeholder="1000"
                           required autofocus>
                </div>
                <button id="submitPatient" type="button" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>

    <br>

    <h5># Doctors</h5>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Speciality</th>
            <th>Charges in Rs.</th>
            <th width="180" class="text-center">Action</th>
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
    firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
        		<td>' + value.name + '</td>\
        		<td>' + value.speciality + '</td>\
                <td>' + value.charges + '</td>\
        		<td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
        		<button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' + index + '">Delete</button></td>\
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
        var speciality = values[1].value;
        // var startTime = values[2].value;
        // var endTime = values[3].value;
        var schedule = {monday : { startTime: values[2].value, endTime: values[3].value }, tuesday : { startTime: values[4].value, endTime: values[5].value }, wednesday : { startTime: values[6].value, endTime: values[7].value }, thursday : { startTime: values[8].value, endTime: values[9].value }, friday : { startTime: values[10].value, endTime: values[11].value }, saturday : { startTime: values[12].value, endTime: values[13].value }, sunday : { startTime: values[14].value, endTime: values[15].value }};
        var duration = values[16].value;
        var charges = values[17].value;
        var userID = lastIndex + 1;
        console.log(values);
        firebase.database().ref('doctors/' + userID).set({
            name: name,
            speciality: speciality,
            // startTime: startTime,
            // endTime: endTime,
            schedule: schedule,
            duration: duration,
            charges: charges,
        });
        // Reassign lastID value
        lastIndex = userID;
        $("#addPatient input").val("");
    });
    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function () {
        updateID = $(this).attr('data-id');
        console.log(updateID);
        firebase.database().ref('doctors/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
		        <label for="first_name" class="col-md-12 col-form-label">Name</label>\
		        <div class="col-md-12">\
		            <input id="first_name" type="text" class="form-control" name="name" value="' + values.name + '" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="last_name" class="col-md-12 col-form-label">Speciality</label>\
		        <div class="col-md-12">\
                <select id="speciality" class="form-control" name="speciality" placeholder="Speciality"\
                           required autofocus>\
                            <option value="Acupuncture">Acupuncture</option><option value="Anesthetist">Anesthetist</option><option value="Audiologist">Audiologist</option><option value="Cancer Specialist">Cancer Specialist</option><option value="Cancer Surgeon">Cancer Surgeon</option><option value="Cardiac Surgeon">Cardiac Surgeon</option><option value="Cardiologist">Cardiologist</option><option value="Chest Surgeon">Chest Surgeon</option><option value="Chiropractor">Chiropractor</option><option value="Dentist">Dentist</option><option value="Dermatologist">Dermatologist</option><option value="Eye Specialist">Eye Specialist</option><option value="General Physician">General Physician</option><option value="General Surgeon">General Surgeon</option><option value="Gynecologist">Gynecologist</option><option value="Homeopath">Homeopath</option><option value="Nephrologist">Nephrologist</option><option value="Neuro Surgeon">Neuro Surgeon</option><option value="Neurologist">Neurologist</option><option value="Orthopedic Surgeon">Orthopedic Surgeon</option><option value="Pediatric Surgeon">Pediatric Surgeon</option><option value="Pediatrician">Pediatrician</option><option value="Physiotherapist">Physiotherapist</option><option value="Plastic Surgeon">Plastic Surgeon</option><option value="Psychiatrist">Psychiatrist</option><option value="Psychologist">Psychologist</option><option value="Radiologist">Radiologist</option></select>\
		        </div>\
		    </div>\
                    <div class="form-group mx-sm-3 mb-2"><label for="day" >Monday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.monday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Tuesday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Wednesday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Thursday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Friday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Saturday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Sunday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" placeholder="start time" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" placeholder="end time" required autofocus></div>\
                   <div class="form-group mx-sm-3 mb-2">\
                    <label for="duration" >Average Duration of Appointment  </label>\
                    <input id="duration" type="number" class="form-control" name="duration" value="' + values.duration + '"\
                           required autofocus>\
                </div>\
                <div class="form-group mx-sm-3 mb-2">\
                    <label for="charges" >Charges  Rs.</label>\
                    <input id="charges" type="number" class="form-control" name="charges" value="' + values.charges + '"\
                           required autofocus>\
                </div>\
            </div>';
            $('#updateBody').html(updateData);
        });
    });
    $('.updatePatient').on('click', function () {
        var values = $(".patients-update-record-model").serializeArray();
        var postData = {
            name : values[0].value,
            speciality : values[1].value,
            schedule : {monday : { startTime: values[2].value, endTime: values[3].value }, tuesday : { startTime: values[4].value, endTime: values[5].value }, wednesday : { startTime: values[6].value, endTime: values[7].value }, thursday : { startTime: values[8].value, endTime: values[9].value }, friday : { startTime: values[10].value, endTime: values[11].value }, saturday : { startTime: values[12].value, endTime: values[13].value }, sunday : { startTime: values[14].value, endTime: values[15].value }},
            duration : values[16].value,
            charges : values[17].value,
        };
        var updates = {};
        updates['/doctors/' + updateID] = postData;
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
        firebase.database().ref('doctors/' + id).remove();
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