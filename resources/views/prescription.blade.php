<style><?php include public_path('css/StylePres.css') ?></style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prescription Form</title>
    <!-- <link rel="stylesheet" href="Stylepp.css" /> -->
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    
  </head>
  <body>

    <div class="container">
      <span class="big-circle"></span>
      <div class="form">
  
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
  
          <form action="index.html" autocomplete="off">
            <h3 class="title" style="font-size: 40px">Medical Prescription</h3>
            <hr>
            <div class="input-container">
              <input type="text" id="IDENTIFIER" name="IDENTIFIER" class="input" />
              <label for="">IDENTIFIER</label>
              <span>IDENTIFIER</span>
            </div>
            <div class="input-container">
              <input type="text" id="DATEWRITTEN" name="DATEWRITTEN" class="input" />
              <label for="">DATEWRITTEN</label>
              <span>DATEWRITTEN</span>
            </div>
            <div class="input-container">
              <input type="text" id="STATUS" name="STATUS" class="input" />
              <label for="">STATUS</label>
              <span>STATUS</span>
            </div>
            <div class="input-container">
              <input type="text" id="PATIENT" name="PATIENT" class="input" />
              <label for="">PATIENT</label>
              <span>PATIENT</span>
            </div>
  
            <div class="input-container">
              <input type="text" id="PRESCRIBER" name="PRESCRIBER" class="input" />
              <label for="">PRESCRIBER</label>
              <span>PRESCRIBER</span>
            </div>
            <div class="input-container textarea">
              <textarea id="REASON" name="REASON" class="input"></textarea>
              <label for="">REASON</label>
              <span>REASON</span>
            </div>
            <div class="input-container">
              <input type="text" id="ENCOUNTER" name="ENCOUNTER" class="input" />
              <label for="">ENCOUNTER</label>
              <span>ENCOUNTER</span>
            </div>
            <div class="input-container textarea">
              <textarea id="MEDICATION" name="MEDICATION" class="input"></textarea>
              <label for="">MEDICATION</label>
              <span>MEDICATION</span>
            </div>
  
          </form>
        </div>
  
        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>
  
          <form action="index.html" autocomplete="off" style="margin-top: 55px;">
            <h3 class="title">Dosage-Instructions</h3>
            <hr>
            <div class="input-container">
              <input type="text" name="TEXT" class="input" />
              <label for="">TEXT</label>
              <span>TEXT</span>
            </div>
            <div class="input-container">
              <input id="ADDITIONALINSTRUCTIONS" type="text" name="ADDITIONAL-INSTRUCTIONS" class="input" />
              <label for="">ADDITIONAL-INSTRUCTIONS</label>
              <span>ADDITIONAL-INSTRUCTIONS</span>
            </div>
            <div class="input-container">
              <input id="TIMING" type="text" name="TIMING" class="input" />
              <label for="">TIMING</label>
              <span>TIMING</span>
            </div>
            <div class="input-container">
              <input id="ASNEEDED" type="text" name="AS-NEEDED" class="input" />
              <label for="">AS-NEEDED</label>
              <span>AS-NEEDED</span>
            </div>
  
            <div class="input-container">
              <input id="SITE" type="text" name="SITE" class="input" />
              <label for="">SITE</label>
              <span>SITE</span>
            </div>
            <div class="input-container">
              <input type="text" name="ROUTE" class="input" />
              <label for="">ROUTE</label>
              <span>ROUTE</span>
            </div>
            <div class="input-container">
              <input id="METHOD" type="text" name="METHOD" class="input" />
              <label for="">METHOD</label>
              <span>METHOD</span>
            </div>
  
            <div class="input-container">
              <input id="DOSEQUANTITY" type="text" name="DOSE-QUANTITY" class="input" />
              <label for="">DOSE-QUANTITY</label>
              <span>DOSE-QUANTITY</span>
            </div>
  
            <div class="input-container">
              <input id="RATE" type="text" name="RATE" class="input" />
              <label for="">RATE</label>
              <span>RATE</span>
            </div>
  
            <div class="input-container">
              <input id="MAX_DOSE_PER_PERIOD" type="text" name="MAX-DOSE-PER-PERIOD" class="input" />
              <label for="">MAX-DOSE-PER-PERIOD</label>
              <span>MAX-DOSE-PER-PERIOD</span>
            </div>
  
            <h3 class="title">Dosage-Instructions</h3>
            <hr>
  
            <div class="input-container">
              <input id="MEDICATION2" type="text" name="MEDICATION" class="input" />
              <label for="">MEDICATION</label>
              <span>MEDICATION</span>
            </div>
  
            <div class="input-container">
              <input id="VALIDITY_PERIOD" type="text" name="VALIDITY-PERIOD" class="input" />
              <label for="">VALIDITY-PERIOD</label>
              <span>VALIDITY-PERIOD</span>
            </div>
  
            <div class="input-container">
              <input id="REPEATS_ALLOWED" type="text" name="NUMBER-OF-REPEATS-ALLOWED" class="input" />
              <label for="">NUMBER-OF-REPEATS-ALLOWED</label>
              <span>NUMBER-OF-REPEATS-ALLOWED</span>
            </div>
  
            <div class="input-container">
              <input id="QUANTITY" type="text" name="QUANTITY" class="input" />
              <label for="">QUANTITY</label>
              <span>QUANTITY</span>
            </div>
  
  
            <div class="input-container">
              <input id="EXPECTED_SUPPLY_DURATION" type="text" name="EXPECTED-SUPPLY-DURATION" class="input" />
              <label for="">EXPECTED-SUPPLY-DURATION</label>
              <span>EXPECTED-SUPPLY-DURATION</span>
            </div>
            <!-- <input type="submit" value="Generate Report" class="btn"/> -->
            <button onclick="SubmitAll()" class="btn"><a href="pdf.html">Generate Report</a></button>
          </form>
        </div>
      </div>
    </div>
 
  </body>
</html>
<script>
    const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});



function SubmitAll() {
  const IDENTIFIER = document.getElementById("IDENTIFIER").value;
  const DATEWRITTEN = document.getElementById("DATEWRITTEN").value;
  const STATUS = document.getElementById("STATUS").value;
  const PATIENT = document.getElementById("PATIENT").value;
  const PRESCRIBER = document.getElementById("PRESCRIBER").value;
  const REASON = document.getElementById("REASON").value;
  const ENCOUNTER = document.getElementById("ENCOUNTER").value;
  const MEDICATION = document.getElementById("MEDICATION").value;
  const ADDITIONALINSTRUCTIONS = document.getElementById("ADDITIONALINSTRUCTIONS").value;
  const TIMING = document.getElementById("TIMING").value;
  const ASNEEDED = document.getElementById("ASNEEDED").value;
  const SITE = document.getElementById("SITE").value;
  const METHOD = document.getElementById("METHOD").value;
  const DOSEQUANTITY = document.getElementById("DOSEQUANTITY").value;
  const MAX_DOSE_PER_PERIOD = document.getElementById("MAX_DOSE_PER_PERIOD").value;
  const RATE = document.getElementById("RATE").value;
  const MEDICATION2 = document.getElementById("MEDICATION2").value;
  const VALIDITY_PERIOD = document.getElementById("VALIDITY_PERIOD").value;
  const QUANTITY = document.getElementById("QUANTITY").value;
  const REPEATS_ALLOWED = document.getElementById("REPEATS_ALLOWED").value;
  const EXPECTED_SUPPLY_DURATION = document.getElementById("EXPECTED_SUPPLY_DURATION").value;
  
  
  localStorage.setItem("IDENTIFIER", IDENTIFIER);
  localStorage.setItem("DATEWRITTEN", DATEWRITTEN);
  localStorage.setItem("STATUS", STATUS);
  localStorage.setItem("PATIENT", PATIENT);
  localStorage.setItem("PRESCRIBER", PRESCRIBER);
  localStorage.setItem("REASON", REASON);
  localStorage.setItem("ENCOUNTER", ENCOUNTER);
  localStorage.setItem("MEDICATION", MEDICATION);
  localStorage.setItem("ADDITIONALINSTRUCTIONS", ADDITIONALINSTRUCTIONS);
  localStorage.setItem("TIMING", TIMING);
  localStorage.setItem("ASNEEDED", ASNEEDED);
  localStorage.setItem("SITE", SITE);
  localStorage.setItem("METHOD", METHOD);
  localStorage.setItem("DOSEQUANTITY", DOSEQUANTITY);
  localStorage.setItem("MAX_DOSE_PER_PERIOD", MAX_DOSE_PER_PERIOD);
  localStorage.setItem("RATE", RATE);
  localStorage.setItem("MEDICATION2", MEDICATION2);
  localStorage.setItem("VALIDITY_PERIOD", VALIDITY_PERIOD);
  localStorage.setItem("QUANTITY", QUANTITY);
  localStorage.setItem("REPEATS_ALLOWED", REPEATS_ALLOWED);
  localStorage.setItem("EXPECTED_SUPPLY_DURATION", EXPECTED_SUPPLY_DURATION);
}

</script>