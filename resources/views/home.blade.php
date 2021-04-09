<html>
    <head>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
        <title>Home</title>
    </head>
    <body>
    <button onClick="bookAppointment()" id="bookApp">Book Appointment</button>
    <button onClick="viewAppointment()" id="viewApp">View Appointments</button>
    <button onClick="pharmacy()" id="pharmacy">Pharmacy</button>
    <br/>
    <br/>
    <h3>Doctor's role</h3>
    <button onClick="prescription()" id="prescription">Generate Prescription</button>
    </body>
</html>
<script>
    //Getting User id
    var uid;
    window.onload = function () {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                uid = params.split('=')[1];
                console.log('params', params);
                console.log('uid', uid);
                
        }
    };
    function bookAppointment(){
		window.location = '/appointment?uid=' + uid;
        
	}
    function viewAppointment(){
		window.location = '/viewappointment?uid=' + uid;
	}
    function pharmacy(){
		window.open('http://127.0.0.1:8887/index.html');
	}
    function prescription() {
        var url = 'http://127.0.0.1:8887/Presc.html';
        window.open(url);
    }
    
    

</script>