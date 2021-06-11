<style><?php include public_path('css/StyleReportUpload.css') ?></style>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Upload Reports</title>
@laravelPWA
</head>
<body>
<button onClick="home()" class="btn btn-primary mb-2" style=" position: fixed; right: 90px; top: 20px;">Home</button>
    <script>
        function home() {
        window.location = '/home?uid=' + uid;
        }
    </script>
<div class="container" style="margin-top: 50px;">

    <br>

    <h5>My Patient's Reports</h5>
    <table class="table table-bordered">
        <tr>
            <th>Report Id</th>
            <th>Test Name</th>
            <th>Test Result</th>
        </tr>
        <tbody id="tbody">

        </tbody>
    </table>
</div>

<!-- {{--Firebase Tasks--}} -->
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    //Getting User id
    var drid;
    var doctors = {};
    window.onload = function () {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                drid = params.split('=')[1];                                
            }
            
        
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
    function getDoctors() {
        // Get Doctor Data
        firebase.database().ref('doctors/').on('value', function (snapshot) {
            var value = snapshot.val();
            $.each(value, function (index, value) {
                doctors[value.Name] = index;
                console.log(doctors);
            });
        });
    }

    // Get Prescription Data
    firebase.database().ref('testResults/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
        		<td>' + value.report_id + '</td>\
                <td>' + value.name + '</td>\
                <td>' + value.result + '</td>\
        		</tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitPatient").removeClass('desabled');
    });
        
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>