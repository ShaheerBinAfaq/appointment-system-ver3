<style><?php include public_path('css/admin.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <title>Doctors | Admin</title>
</head>
    
<body>

    <header>
        <nav class="navbar navbar-dark navbar-expand-md bg-success text-white">
            <a class="text-white navbar-brand" onClick="goToIndex()">
                Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    
            </button>
            <!-- <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onClick="goToMedication()">Medication</a>
                    </li>
    
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="text-white nav-link" onClick="goToIndex()">
                        EXIT
                    </a>
                    
                </form>
            </div> -->
        </nav>
    </header>

    <div class="container">
        <h1>Doctors</h1>
        <br>
        
        <h5># Add Doctor</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addPatient" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email">Speciality</label>
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
        <table id="tableOrders">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Speciality</th>
                    <th>Charges</th>
                    <th>Duration of Appointment</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Speciality</th>
                    <th>Charges</th>
                    <th>Duration of Appointment</th>
                </tr>
            </tfoot>
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
    <!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- <script src="./admin.js"></script> -->
</body>
</html>
<script>


function format(d){
    console.log(d);
    return `
        <table>
            <tr>
                <td>Name:</td>
                <td>${d.name}</td>
            </tr>
            <tr>
                <td>Speciality:</td>
                <td>${d.speciality}</td>
            </tr>
            <tr>
                <td>Charges:</td>
                <td>${d.charges}</td>
            </tr>
            <tr>
                <td>Duration of appointment:</td>
                <td>${d.duration}</td>
            </tr>
            <tr>
                <td>Schedule:</td>
                <td>
                        <ul>
                            <li><strong>Monday</strong></li>
                            <li>Start Time: ${d.schedule.monday.startTime}</li>
                            <li>End Time: ${d.schedule.monday.endTime}</li>
                            <li><strong>Tuesday</strong></li>
                            <li>Start Time: ${d.schedule.tuesday.startTime}</li>
                            <li>End Time: ${d.schedule.tuesday.endTime}</li>
                            <li><strong>Wednesday</strong></li>
                            <li>Start Time: ${d.schedule.wednesday.startTime}</li>
                            <li>End Time: ${d.schedule.wednesday.endTime}</li>
                            <li><strong>Thursday</strong></li>
                            <li>Start Time: ${d.schedule.thursday.startTime}</li>
                            <li>End Time: ${d.schedule.thursday.endTime}</li>
                            <li><strong>Friday</strong></li>
                            <li>Start Time: ${d.schedule.friday.startTime}</li>
                            <li>End Time: ${d.schedule.friday.endTime}</li>
                            <li><strong>Saturday</strong></li>
                            <li>Start Time: ${d.schedule.saturday.startTime}</li>
                            <li>End Time: ${d.schedule.saturday.endTime}</li>
                            <li><strong>Sunday</strong></li>
                            <li>Start Time: ${d.schedule.sunday.startTime}</li>
                            <li>End Time: ${d.schedule.sunday.endTime}</li>
                        </ul>
                </td>
            </tr>
            <tr>
                <td>Actions:</td>
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="${d.id}">Update</button>
        		<button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="${d.id}">Delete</button></td>
            </tr>
        
        </table>
    `;
}

$(document).ready(function(){
    setTimeout(function(){
        var table = $('#tableOrders').DataTable({
            "data": final.data,
            select: "single",
            "columns":[
                {
                    "className": 'details-control',
                    "orderable":true,
                    "data":null,
                    "defaultContent": '',
                    "render": function(){
                        return '<i class="material-icons" aria-hidden="true">add_box</i>';
                    },
                    width:"15px"
                },
                {"data":"name"},
                {"data":"speciality"},
                {"data":"charges"},  
                {"data":"duration"}                
            ],
            
        });

        $('#tableOrders tbody').on('click','td.details-control',function(){
            var tr = $(this).closest('tr');
            var tdi= tr.find('i.fa');
            var row = table.row(tr);
            if (row.child.isShown()) {
                row.child.hide();
                tdi.first().removeClass('material-icons close');
                tdi.first().addClass('material-icons add_box');               
            } else {
                row.child(format(row.data())).show();
                tr.addClass('shown');
                tdi.first().removeClass('material-icons add_box');
                tdi.first().addClass('material-icons close');   
            }
        });
    },5000);
});



//FIREBASE

  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCwL-AtDqq-jdMBYNi1nTo5NNAtHwMhhHc",
    authDomain: "appointment-sys-3fb2e.firebaseapp.com",
    databaseURL: "https://appointment-sys-3fb2e-default-rtdb.firebaseio.com",
    projectId: "appointment-sys-3fb2e",
    storageBucket: "appointment-sys-3fb2e.appspot.com",
    messagingSenderId: "167244005815",
    appId: "1:167244005815:web:ea60f2c06b25a4660ce832"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
 // firebase.analytics();
var lastIndex = 0;
// Get Data
firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {

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
        var schedule = {monday : { startTime: values[2].value, endTime: values[3].value }, tuesday : { startTime: values[4].value, endTime: values[5].value }, wednesday : { startTime: values[6].value, endTime: values[7].value }, thursday : { startTime: values[8].value, endTime: values[9].value }, friday : { startTime: values[10].value, endTime: values[11].value }, saturday : { startTime: values[12].value, endTime: values[13].value }, sunday : { startTime: values[14].value, endTime: values[15].value }};
        var duration = values[16].value;
        var charges = values[17].value;
        var userID = lastIndex + 1;
        console.log(values);
        firebase.database().ref('doctors/'+userID).set({
            id: userID,
            name: name,
            speciality: speciality,
            schedule: schedule,
            duration: duration,
            charges: charges,
        });
        // Reassign lastID value
        lastIndex = userID;
        $("#addPatient input").val("");
        window.location.reload();
    });

var doctors = firebase.database().ref('doctors');

doctors.on('child_added',function(data){
    var orderValue= data.val();
    fsales(orderValue);
});
function fsales(params){
    final.data.push(params);
}
var final = {
    "data":[]
}
console.log(final);

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
                    <div class="form-group mx-sm-3 mb-2"><label for="day" >Monday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.monday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.monday.endTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Tuesday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.tuesday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.tuesday.endTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Wednesday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.wednesday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.wednesday.endTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Thursday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.thursday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.thursday.endTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Friday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.friday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.friday.endTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Saturday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.saturday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.saturday.endTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="day" >Sunday</label></div><div class="form-group mx-sm-3 mb-2"><label for="startTime" >Start Time  </label><input id="startTime" type="time" class="form-control" name="startTime" value="' + values.schedule.sunday.startTime + '" required autofocus></div><div class="form-group mx-sm-3 mb-2"><label for="endTime" >End Time  </label><input id="endTime" type="time" class="form-control" name="endTime" value="' + values.schedule.sunday.endTime + '" required autofocus></div>\
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
            id: updateID,
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
        window.location.reload();
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
        window.location.reload();
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.patients-remove-record-model').find("input").remove();
    });

function goToIndex() {
    window.location = 'dashboard';
}
</script>
