<!doctype html>
<html lang="en">
<head>
<!-- Time -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script> 

    $(document).ready(function(){
    $('#time').timepicker({
        interval: 15,
        minTime: new Date().toLocaleTimeString()
    })});

</script>

<!-- Date -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
    $("#datepicker").datepicker();
});
</script>
</head>
<body>
<div class="app_time_Date_main card card-default container">
    <label>
        Choose Appointment Date <br>
        <input type="text" id="datepicker" placeholder="Choose Appointment Date">
    </label> <br><br>
    
    <label>
        Choose Appointment Time <br>
    </label>
        
        <input type="text" id="time" placeholder="Choose Appointment Time">
        <br><br>

    <div class="details_btn">
        <button>Book Appointment (Dr.)</button>
    </div>
    
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
</html>