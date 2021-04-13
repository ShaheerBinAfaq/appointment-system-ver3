<style><?php include public_path('css/StylePresPdf.css') ?></style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    
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
                        <h6 class="card-title text-primary">MEDICAL PRESCRIPTION</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>IDENTIFIER: <span id="IDENTIFIER" /></li>
                                        <li>DATE-WRITTEN: <span id="DATEWRITTEN" /></li>                                        
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">HOSPITAL NAME:<span id="result-H-NAME" /></h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>LOCATION: <span id="result-LOCATION" /></li>
                                            <li>DEPARTMENT: <span id="result-DEPARTMENT" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left">
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h6 class="my-2">PATIENT NAME:<span id="PATIENT" /></h6>
                                    </li>
                                  
                                    <!-- <li>ENCOUNTER:<span id="result-ENCOUNTER" /></li> -->
                                    <li>REASON:<span id="REASON" /></li>
                                    <!-- <li>MEDICATION:<span id="result-MEDICATION" /></li> -->
                                    <h6 class="my-2">PRESCRIBER:<span id="PRESCRIBER" /></h6>
                                   
                                </ul>
                            </div>
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                         <h4 style="margin-left: 20px;">DOSAGE-INSTRUCTIONS</h4>
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Medicine Name</th>
                                    <th>Power (mg)</th>
                                    <th>Timing</th>                                                                                            
                                </tr>
                            </thead>
                            <tbody id="medicine">
                            </tbody>
                            <tr>
                                    <th>Test Name</th>                           
                            </tr>
                            <tbody id="test">                                    
                                                                    
                            </tbody>
                            <tr >
                                    <th>Surgery</th>                           
                            </tr>
                            <tbody id="surgery">                                    
                                
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
                filename: 'Prescription.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
//Getting Prescription id
var presid;
    function getPresId() {
        
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
    var presId = getPresId();
    //Getting Prescription Data
    firebase.database().ref('prescriptions/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if (value && presId == index) {
                document.getElementById('DATEWRITTEN').innerHTML = value.date_written;
                document.getElementById('PATIENT').innerHTML = value.pat_name;
                document.getElementById('PRESCRIBER').innerHTML = value.doc_name;
                document.getElementById('REASON').innerHTML = value.reason;
                document.getElementById('IDENTIFIER').innerHTML = index;
            }
            lastIndex = index;
        });
    });
    //Getting Prescription Medicine Data
    firebase.database().ref('presMedicine/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value && presId == value.pres_id) {
                htmls.push('<tr>\
                <td>' + value.name + '</td>\
        		<td>' + value.power + '</td>\
                <td>' + value.timing + '</td>\
                <tr>');
            }
            lastIndex = index;
        });
        $('#medicine').html(htmls);
    });
    //Getting Prescription Test Data
    firebase.database().ref('presTest/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value && presId == value.pres_id) {
                htmls.push('<tr>\
        		<td>' + value.name + '</td>\
                </tr>');
            }
            lastIndex = index;
        });
        $('#test').html(htmls);
    });
    //Getting Prescription Surgery Data
    firebase.database().ref('presSurgery/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];    
        $.each(value, function (index, value) {
            if (value && presId == value.pres_id) {
                htmls.push('<tr>\
        		<td>' + value.name + '</td>\
                </tr>');
            }
            lastIndex = index;
        });
        $('#surgery').html(htmls);
    });



    // const IDENTIFIER = localStorage.getItem("IDENTIFIER");
    // const DATEWRITTEN = localStorage.getItem("DATEWRITTEN");
    // const STATUS = localStorage.getItem("STATUS");
    // const PATIENT = localStorage.getItem("PATIENT");
    // const PRESCRIBER = localStorage.getItem("PRESCRIBER");
    // const REASON = localStorage.getItem("REASON");
    // const ENCOUNTER = localStorage.getItem("ENCOUNTER");
    // const MEDICATION = localStorage.getItem("MEDICATION");
    // const ADDITIONALINSTRUCTIONS = localStorage.getItem("ADDITIONALINSTRUCTIONS");
    // const TIMING = localStorage.getItem("TIMING");
    // const ASNEEDED = localStorage.getItem("ASNEEDED");
    // const SITE = localStorage.getItem("SITE");
    // const METHOD = localStorage.getItem("METHOD");
    // const DOSEQUANTITY = localStorage.getItem("DOSEQUANTITY");
    // const MAX_DOSE_PER_PERIOD = localStorage.getItem("MAX_DOSE_PER_PERIOD");
    // const RATE = localStorage.getItem("RATE");
    // const MEDICATION2 = localStorage.getItem("MEDICATION2");
    // const VALIDITY_PERIOD = localStorage.getItem("VALIDITY_PERIOD");
    // const QUANTITY = localStorage.getItem("QUANTITY");
    // const REPEATS_ALLOWED = localStorage.getItem("REPEATS_ALLOWED");
    // const EXPECTED_SUPPLY_DURATION = localStorage.getItem("EXPECTED_SUPPLY_DURATION");
    
    // document.getElementById('result-IDENTIFIER').innerHTML = IDENTIFIER;
    // document.getElementById('result-DATE-WRITTEN').innerHTML = DATEWRITTEN;
    // document.getElementById('result-STATUS').innerHTML = STATUS;
    // document.getElementById('result-PATIENT').innerHTML = PATIENT;
    // document.getElementById('result-PRESCRIBER').innerHTML = PRESCRIBER;
    // document.getElementById('result-REASON').innerHTML = REASON;
    // document.getElementById('result-ENCOUNTER').innerHTML = ENCOUNTER;
    // document.getElementById('result-MEDICATION').innerHTML = MEDICATION;
    // document.getElementById('result-ADDITIONAL-INSTRUCTIONS').innerHTML = ADDITIONALINSTRUCTIONS;
    // document.getElementById('result-TIMINGS').innerHTML = TIMING;
    // document.getElementById('result-AS-NEEDED').innerHTML = ASNEEDED;
    // document.getElementById('result-SITE').innerHTML = SITE;
    // document.getElementById('result-METHOD').innerHTML = METHOD;
    // document.getElementById('result-DOSE-QUANTITY').innerHTML = DOSEQUANTITY;
    // document.getElementById('result-MAX-DOSE-PER-PERIOD').innerHTML = MAX_DOSE_PER_PERIOD;
    // document.getElementById('result-RATE').innerHTML = RATE;
    // document.getElementById('result-MEDICATION2').innerHTML = MEDICATION2;
    // document.getElementById('result-VALIDITY-PERIOD').innerHTML = VALIDITY_PERIOD;
    // document.getElementById('result-QUANTITY').innerHTML = QUANTITY;
    // document.getElementById('result-REPEATS-ALLOWED').innerHTML = REPEATS_ALLOWED;
    // document.getElementById('result-EXPECTED-SUPPLY-DURATION').innerHTML = EXPECTED_SUPPLY_DURATION;

})
</script>