<style><?php include public_path('css/StyleAppointment.css') ?></style>
<!doctype html>
<html lang="en">
<head>
<!-- Time -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Date -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    
</script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>
<body>
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

<form id="addAppointment" method="POST" action="">
    <div style="top: 10px;" class="app_time_Date_main card card-default container">
        <h2 class="title">BOOK APPOINTMENT</h2>
        <!-- <label>Choose a Doctor:</label> -->
            <select id="doctors" style="visibility: hidden;"> 
                
            </select>
            <br><br>
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
        <div class="button">
            <button id="submitAppointment" type="button" class="btn">Book Appointment</button>
        </div>
    </div>
</form>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Firebase Tasks -->
<!-- <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    var uid;
    var docid;
    var doctorSchedule;
    window.onload = function () {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                uid = params.split('=')[1];
                docid = params.split('=')[2];
                uid = uid.split('&')[0];
                console.log('params', params);
                console.log('uid', uid);
                console.log('docid', docid);
                
        }
    };

    function FilterTime(doctorId){
        
    firebase.database().ref('appointments/').on('value', function(snapshot){
        var value = snapshot.val();
        var Datecs = $("#datepicker").val();
        $.each(value, function(index,value){
            
            if(value){
             if(doctorId == value.doc_id && Datecs == value.date){
                $("#time").focus();
                $(".ui-timepicker li").each(function(){
                    var text = $(this).text();
                    if(text == value.time){
                        $(this).hide();
                    }
                })
            }
        console.log(value);
    }
        });
    })
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

    
    // Get Data
    firebase.database().ref('appointments/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) { 
            lastIndex = index;
        });
        
        });
    // Add Appointment Data
    $('#submitAppointment').on('click', function (){
        var values = $("#addAppointment").serializeArray();
        var date = values[0].value;
        var time = values[1].value;
        var doc_id = document.getElementById('doctors').value;
        var id = lastIndex + 1; 
        var doc_name = doctors[doc_id];
        var pat_name = patients[uid];
        console.log(doc_name, pat_name);
        firebase.database().ref('appointments/' + id).set({
            id: id,
            date: date,
            time: time,
            doc_id: doc_id,
            pat_id: uid,
            doc_name: doc_name,
            pat_name: pat_name,
        });
        lastIndex = id;
        const notification = new Notification("Appointment Booked!", {
            body : "Your appointment with " + doc_name + " has been booked on " + date + " at " + time + "."
        });
        window.location = '/home?uid=' + uid;
    });

    // Get Doctors
    firebase.database().ref('doctors/').on('value', function(snapshot){
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index,value){
            if(value && index==docid) {
                doctorSchedule = value.schedule
                htmls.push('<option value="' + index + '" fromtime='+value.startTime+' endtime='+value.endTime+'>' + value.name + '</option>');
            }
        console.log(index);
        });
        document.getElementById('doctors').innerHTML = htmls;
        var DefStartTime = $("#doctors option:selected").attr("fromtime");
        var DefEndTime = $("#doctors option:selected").attr("endtime");
        var DocId = $("#doctors").val();
        // $('#time').timepicker({
        //     interval: 15,
        //     minTime: DefStartTime,
        //     maxTime: DefEndTime,
        //     // scrollbar: true,
        // });
        // FilterTime(DocId)
        
    });
    // Getting Doctor Name
    var doctors = {};
    firebase.database().ref('doctors/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if(value) {
                doctors[index] = value.name;            
            }
        });
        console.log(doctors[docid]);
    });
    // Getting Patient Name
    var patients = {};
    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            patients[index] = value.fname + " " + value.lname;
        });
        console.log(patients[uid]);
    });
    
    
    
    // const setupUI = (user) => {
    //     if (user) {
    //         console.log(user.email);
    //     }
    //     else {
    //         console.log('no user');
    //     }
    // }

    $("#datepicker").datepicker();
    // $('#datepicker').datepicker().datepicker('setDate', 'today');
    // $("#doctors").change(function(){
    //     var StartTime = $(this).find("option:selected").attr("fromtime");
    //     var endTime = $(this).find("option:selected").attr("endtime");
    //     var DoctorId = $(this).val();
    //     $('#time').timepicker().destroy();
    //     $('#time').timepicker({
    //     interval: 15,
    //     minTime: StartTime,
    //     maxTime: endTime,
    //     scrollbar: true,
    // });
    // FilterTime(DoctorId)
    // })

    var weekday=new Array(7);
    weekday[0]="monday";
    weekday[1]="tuesday";
    weekday[2]="wednesday";
    weekday[3]="thursday";
    weekday[4]="friday";
    weekday[5]="saturday";
    weekday[6]="sunday";

    var DaySelected;
    $('#time').timepicker({
            interval: 15,
            minTime: "",
            maxTime: "",
            scrollbar: true,
        });

    $("#datepicker").change(function(){
        var DefStartTime = $("#doctors option:selected").attr("fromtime");
        var DefEndTime = $("#doctors option:selected").attr("endtime");
        var dat333e = $(this).datepicker('getDate');
        DaySelected = weekday[dat333e.getUTCDay()];
        var DocId = $("#doctors").val();
        if(doctorSchedule){
            if(DaySelected == "monday"){
                DefStartTime = doctorSchedule.monday.startTime
                DefEndTime = doctorSchedule.monday.endTime
            } else if(DaySelected == "tuesday"){
                DefStartTime = doctorSchedule.tuesday.startTime
                DefEndTime = doctorSchedule.tuesday.endTime
            } else if(DaySelected == "wednesday"){
                DefStartTime = doctorSchedule.wednesday.startTime
                DefEndTime = doctorSchedule.wednesday.endTime
            } else if(DaySelected == "thursday"){
                DefStartTime = doctorSchedule.thursday.startTime
                DefEndTime = doctorSchedule.thursday.endTime
            } else if(DaySelected == "friday"){
                DefStartTime = doctorSchedule.friday.startTime
                DefEndTime = doctorSchedule.friday.endTime
            } else if(DaySelected == "saturday"){
                DefStartTime = doctorSchedule.saturday.startTime
                DefEndTime = doctorSchedule.saturday.endTime
            } else if(DaySelected == "sunday"){
                DefStartTime = doctorSchedule.sunday.startTime
                DefEndTime = doctorSchedule.sunday.endTime
            }
        }
        $('#time').timepicker().destroy();
        $('#time').timepicker({
            interval: 15,
            minTime: DefStartTime,
            maxTime: DefEndTime,
            scrollbar: true,
        });
        FilterTime(DocId)
    })

    // $("#datepicker").change(function(){
    //     debugger
    //     var dat333e = $(this).datepicker('getDate');
    //     DaySelected = weekday[dat333e.getUTCDay()];
    //     var DefStartTime;
    //     var DefEndTime;
    //     var DocId = $("#doctors").val();
    //     if(DaySelected == "monday"){
    //         DefStartTime = doctorSchedule.monday.startTime
    //         DefEndTime = doctorSchedule.monday.endTime
    //     } else if(DaySelected == "tuesday"){
    //         DefStartTime = doctorSchedule.tuesday.startTime
    //         DefEndTime = doctorSchedule.tuesday.endTime
    //     } else if(DaySelected == "wednesday"){
    //         DefStartTime = doctorSchedule.wednesday.startTime
    //         DefEndTime = doctorSchedule.wednesday.endTime
    //     } else if(DaySelected == "thursday"){
    //         DefStartTime = doctorSchedule.thursday.startTime
    //         DefEndTime = doctorSchedule.thursday.endTime
    //     } else if(DaySelected == "friday"){
    //         DefStartTime = doctorSchedule.friday.startTime
    //         DefEndTime = doctorSchedule.friday.endTimea
    //     } else if(DaySelected == "saturday"){
    //         DefStartTime = doctorSchedule.saturday.startTime
    //         DefEndTime = doctorSchedule.saturday.endTime
    //     } else if(DaySelected == "sunday"){
    //         DefStartTime = doctorSchedule.sunday.startTime
    //         DefEndTime = doctorSchedule.sunday.endTime
    //     }
    //     console.log(DefStartTime + "&" + DefEndTime)    
    //     $('#time').timepicker({
    //         interval: 15,
    //         minTime: DefStartTime,
    //         maxTime: DefEndTime,
    //         scrollbar: true,
    //     });
    //     FilterTime(DocId)
    // })

    $(document).ready(function(){
        
        
    });
    function home() {
        window.location = '/home?uid=' + uid;
    }
    console.log("notification: ", Notification.permission);
    if(Notification.permission === "granted") {

    } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(permission => {
            console.log(permission);
        });
    }
    function showNotification() {
        const notification = new Notification("New Message", {
            body : "hi"
        });
    }
    function goToIndex() {
        window.location = '/home?uid=' + uid;
}

</script>

</body>
</html>