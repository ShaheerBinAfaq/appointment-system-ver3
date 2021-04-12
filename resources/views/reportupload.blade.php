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
<button onClick="home()" style=" position: fixed; right: 90px; top: 20px; height: 30px;">Home</button>
    <script>
        function home() {
        window.location = '/home?uid=' + uid;
        }
    </script>
<div class="container" style="margin-top: 50px;">

    <!-- <h4 class="text-center">Laravel RealTime CRUD Using Google Firebase</h4><br> -->

    <h5># Add Report</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addPatient" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                           required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="file" class="sr-only">Choose File</label>
                    <input id="file" type="file" class="form-control">                                      
                </div>
                <button id="submitPatient" type="button" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>

    <br>

    <h5>My Reports</h5>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Link</th>
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
    var uid;
    window.onload = function () {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                uid = params.split('=')[1];                                
        }
    };
    
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
    var fileUrl;

    // Get Data
    firebase.database().ref('reports/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value && value.pat_id==uid) {
                htmls.push('<tr>\
        		<td>' + value.name + '</td>\
        		<td><a href="' + value.fileUrl + '"target="_blank">Open file</a></td>\
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
        var userID = lastIndex + 1;
        
        const ref = firebase.storage().ref();
        const file = document.querySelector("#file").files[0];
        const fname = new Date() + "-" + file.name;
        const metadata = {
            contentType: file.type
        }
        const task = ref.child(fname).put(file,metadata)
        task.on('state_changed', function(snapshot){
            // var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            // document.getElementById('UpProgress').innerHTML = 'Upload'+progress+'%';
        },
        function(error){
                alert('error in saving the image');
            },

            function(){
                task.snapshot.ref.getDownloadURL().then(function(url){
                    fileUrl = url;
                firebase.database().ref('reports/' + userID).set({
                    name: name,
                    fileUrl: fileUrl,
                    pat_id: uid,
                });
        // Reassign lastID value
        lastIndex = userID;
        $("#addPatient input").val("");
            });
        });
    });
        
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>