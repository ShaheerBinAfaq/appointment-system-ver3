<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="LAB.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    

</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title text-primary">MEDICAL REPORT</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>MEDICAL-RECORD : <span id="result-MEDICAL-RECORD" /></li>
                                        <li>PATIENT NAME : <span id="result-PATIENT-NAME" /></li>
                                        <li>CLINICAL INFORMATION/COMMENTS : <span id="result-CLINICAL-INFORMATION" /> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Care X HOSPITAL<span id="result-H-NAME" /></h4>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left">
                                <ul class="list list-unstyled mb-0">
                                   
                                  
                                    <li>REQUESTED ON :<span id="result-REQUESTED-ON" /></li>                                                                       
                                    <li>REPORTED ON :<span id="result-REPORTED-ON" /></li>
                                    
                                </ul>
                            </div>
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                         <h4 style="margin-left: 20px;">TEST DETAILS</h4>
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>TEST</th>
                                    <th>RESULT</th>                    
                                </tr>
                            </thead>
                            <tbody id="test">
                                                           
                            </tbody>
                        </table>
                    </div>                        
            </div>
        </div>
    </div>

    
</body>

</html>
{{--Firebase Tasks--}}
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    window.onload = function () {
  document.getElementById("download")
      .addEventListener("click", () => {
          const invoice = this.document.getElementById("invoice");
          console.log(invoice);
          console.log(window);
          var opt = {
              margin: 1,
              filename: 'Lab-Report.pdf',
              image: { type: 'jpeg', quality: 0.98 },
              html2canvas: { scale: 2 },
              jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
          };
          html2pdf().from(invoice).set(opt).save();
      })
}



//Getting Prescription id
var presid;
    function getRepId() {
        
            if (window.location.search.split('?').length > 0) {
                var params = window.location.search.split('?')[1];
                return params.split('=')[1];                                
        }
    }

window.addEventListener('load', () => {

    // Initialize Firebase
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var repId = getRepId();
    //Getting Prescription Data
    firebase.database().ref('tests/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if (value && repId == index) {
                document.getElementById('result-MEDICAL-RECORD').innerHTML = index;
                document.getElementById('result-PATIENT-NAME').innerHTML = value.pat_name;
                document.getElementById('result-CLINICAL-INFORMATION').innerHTML = value.comment;
                document.getElementById('result-REQUESTED-ON').innerHTML = value.requested_on;
                document.getElementById('result-REPORTED-ON').innerHTML = value.reported_on;
            }
            lastIndex = index;
        });
    });
    //Getting Prescription Test Data
    firebase.database().ref('testResults/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value && repId == value.report_id) {
                htmls.push('<tr>\
        		<td>' + value.name + '</td>\
                <td>' + value.result + '</td>\
                </tr>');
            }
            lastIndex = index;
        });
        $('#test').html(htmls);
    });
})
</script>