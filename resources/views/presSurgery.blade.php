<style><?php include public_path('css/StyleViewAppointment.css') ?></style>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Add Surgery to Prescription</title>
@laravelPWA
</head>
<body>


<div class="container" style="margin-top: 50px;">

    <!-- <h4 class="text-center">Laravel RealTime CRUD Using Google Firebase</h4><br> -->

    <h5># Add Surgery</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addPatient" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="name" class="sr-only">Name</label>
                    <select id="name" class="form-control">
                        <option value="Open heart surgery">Open heart surgery</option>
                        <option value="Colon and Rectal Surgery">Colon and Rectal Surgery</option>
                        <option value="Endocrine surgery">Endocrine surgery</option>
                        <option value="Hand surgery">Hand surgery</option>
                        <option value="Head and neck surgery">Head and neck surgery</option>
                        <option value="Neurosurgery">Neurosurgery</option>
                        <option value="Orthopedic surgery">Orthopedic surgery</option>
                    </select>
                </div>
                
                <button id="submitPatient" type="button" class="btn btn-primary mb-2">Add</button>
            </form>
        </div>
    </div>

    <br>

    <h5># Surgeries</h5>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
        </tr>
        <tbody id="tbody">

        </tbody>
    </table>
    <button class="btn btn-primary mb-2" onClick="home()" style=" position: fixed; right: 90px">Done</button>
</div>

<script>
//Getting Prescription id
var presid;
    function getPresId() {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                return params.split('=')[1];                                
        }
    }
    function home() {
        window.history.go(-1);
    }
</script>
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
    // Get Data
    firebase.database().ref('presSurgery/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        var pid = getPresId();
        $.each(value, function (index, value) {
            if (value && pid == value.pres_id) {
                htmls.push('<tr>\
        		<td>' + value.name + '</td>\
                \
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
        var pId = getPresId();
        var name = document.getElementById('name').value;;        
        var userID = lastIndex + 1;
        console.log(values);
        firebase.database().ref('presSurgery/' + userID).set({
            pres_id: pId,
            name: name,
        });
        // Reassign lastID value
        lastIndex = userID;
        $("#addPatient input").val("");
    });
    
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>