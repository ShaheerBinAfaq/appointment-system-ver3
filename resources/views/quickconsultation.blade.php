<style><?php include public_path('css/StyleQuickConsultation.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

    <title>Quick Consultation</title>
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
   <main>                 
           <div class="chate">
               <div class="chate-header">
                   <div class="header-content">
                   <div class="sender-avatar">
                       <img src="images\img\avt.png" width="50px" alt="">
                       <label style="font-size: 25px; font-weight: bolder;"> - Quick Consultation </label>

                   </div>
                   
                   
                   
                </div>
               </div>

               <h3>Choose a user:</h3>
                <select class="SendersC" id="senders" size="2"></select>
                    <ul id="messages"></ul>
                
               



               <div class="chate-body">
                
                <div class="message-sender">
                    
                    <div class="message-sender-message  ">
                        
                    </div>
                    
                <div class="message-recever">
                    
                    <div class="message-sender-message rece">
                        
                    </div>
                    

                <!-- <select class="SendersC" id="senders" size="15"></select>
                <ul id="messages"></ul> -->

                </div>
                

                </div>
                 
                
               </div>
               </div>
           </div>
       </div>
   

   
    <div class="msgg">
        <form id="SendMessage">
            <div class="message-box">
            <div class="message-box-aria">
                <input type="text" placeholder="Type a message.." id="message">

            <!--<i class='far fa-smile'></i> -->                      
            <!-- <i class="fa fa-paper-plane" style="color: #009688;max-width: 50px; font-size: 25px;"></i> -->
            <input type="submit" value="Send">
            </div>
        </form>
    </div>
   
</main>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-database.js"></script>
<script>
    function goToIndex() {
        window.history.back();
    }
    //Getting User id
    var uid;
    
    if (window.location.search.split('?').length > 0) {
        var params = window.location.search.split('?')[1];
        uid = params.split('=')[1];                                
    }
    
    // var config = {
    //     apiKey: "{{ config('services.firebase.api_key') }}",
    //     authDomain: "{{ config('services.firebase.auth_domain') }}",
    //     databaseURL: "{{ config('services.firebase.database_url') }}",
    //     storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    // };

    const config = {
        apiKey: "AIzaSyCwL-AtDqq-jdMBYNi1nTo5NNAtHwMhhHc",
        authDomain: "appointment-sys-3fb2e.firebaseapp.com",
        databaseURL: "https://appointment-sys-3fb2e-default-rtdb.firebaseio.com",
        projectId: "appointment-sys-3fb2e",
        storageBucket: "appointment-sys-3fb2e.appspot.com",
        messagingSenderId: "167244005815",
        appId: "1:167244005815:web:ea60f2c06b25a4660ce832"
    };



    firebase.initializeApp(config);
    var database = firebase.database();
    var senderName;
    var adminId = "ZSI2IAfkuUVBW6xZTTT3Qbue3S93";
    var adminName = "Admin";

    firebase.database().ref('users/').on('value', function (snapshot) {
        var value = snapshot.val();
        $.each(value, function (index, value) {
            if (value && index==uid) {
                senderName = value.fname + " " + value.lname;
            }
        });
    });
    var receiverName = adminName;
    var receiverId = adminId;
    // receiverName = document.getElementById("senders").text;
    // receiverId = document.getElementById("senders").value;
    $("#senders").change(function(){
        // alert("change called");
        receiverName = $("#senders option:selected").text();
        receiverId = document.getElementById("senders").value;
        console.log('receiver', receiverName);
        console.log('receiver id', receiverId);        
    });
    const messageForm = document.querySelector("#SendMessage");
    messageForm.addEventListener("submit", (e)=>{
        e.preventDefault();
        //get message
        var message = document.getElementById('message').value;
        document.getElementById('message').value = "";
        //save in database
        database.ref('messages').push().set({
            "senderId" : uid,
            "senderName" : senderName,
            "receiverId" : receiverId,
            "receiverName" : receiverName,
            "message" : message,
        });
    });
    
    if(uid == adminId) {
        $("#senders").change(function(){
            document.getElementById("messages").innerHTML = " ";

        database.ref("messages").on("child_added", function(snapshot){
            // alert("message recalled");
            var html = "";
            
                // document.getElementById("messages").innerHTML = " ";
                if(snapshot.val().senderId == uid && snapshot.val().receiverId == receiverId || snapshot.val().senderId == receiverId && snapshot.val().receiverId == uid) {
                    if(snapshot.val().senderId == uid) {
                        //html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().message + "</li>";
                        html+="<div class='chate-body'><div class='M-s'><div class='message-sender-message'><p>"+ snapshot.val().message + "</p></div></div></div>";
                    }
                    else {
                        // html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().senderName + ": " + snapshot.val().message + "</li>";
                        html+="<div class='chate-body'><div class='M-r'><div class='message-sender-message rece'><p>"+ snapshot.val().senderName + ": " + snapshot.val().message + "</p></div></div></div>";
                    }
                }   
                // html += "</li>";
                document.getElementById("messages").innerHTML += html;
            });
        });
    }  
    else {
        database.ref("messages").on("child_added", function(snapshot){
            var html = "";
            
                // document.getElementById("messages").innerHTML = " ";
                if(snapshot.val().senderId == uid && snapshot.val().receiverId == receiverId || snapshot.val().senderId == receiverId && snapshot.val().receiverId == uid) {
                    if(snapshot.val().senderId == uid) {
                        // html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().message + "</li>";
                        html+="<div class='M-s'><div class='message-sender-message'><p>"+ snapshot.val().message + "</p></div></div>";
                    }
                    else {
                        //html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().senderName + ": " + snapshot.val().message + "</li>";
                        html+="<div class='M-r'><div class='message-sender-message'><p>"+ snapshot.val().senderName + ": " + snapshot.val().message + "</p></div></div>";
                    }
                }   
                // html += "</li>";
                document.getElementById("messages").innerHTML += html;
        });
    }  

    //Giving different view for admin
    
    if(uid == adminId) {
        database.ref("messages").on("value", function(snapshot){
            var value = snapshot.val();
            var senders = [];
            var sendersId = [];
            $.each(value, function(index, value){
                if(value) {
        //             firebase.database().ref('users/').on('value', function (snapshot) {
        // var value = snapshot.val();
                    // database.ref("users/" + value.senderId).on("value", function(snapshot){
                    //     senders.push(snapshot.val().fname + " " + snapshot.val().lname);
                    //     sendersId.push(snapshot.val().id);
                    // });
                   senders.push(value.senderName);
                   sendersId.push(value.senderId);
                }
            });
            console.log(senders);
            var unique = [...new Set(senders)];
            var uniqueId = [...new Set(sendersId)];
            console.log(unique);
            console.log(uniqueId);
            
            var i;
            var htmls = "";

            //<div class="chate">
            //html+="<div class='M-s'><div class='message-sender-message'><p>"+ snapshot.val().message + "</p></div></div>";
            for(i=0;i<unique.length;i++){
                
                    htmls += "<option value='"+ uniqueId[i] + "'>" + unique[i] + "</option></div></div>";
                
            }
            document.getElementById('senders').innerHTML = htmls;
        });
    }

</script>