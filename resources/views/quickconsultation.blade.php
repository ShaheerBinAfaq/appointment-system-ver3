<style><?php include public_path('css/StyleChat.css') ?></style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Quick Consultation</title>
</head>
<body>
   <main>
       <!-- <div class="container">
           <div class="chate-liste">
<div class="m-info">
    <div class="avatar">
        <img src="appointment-system-ver3\public\images\img\avt.png"
        width="60px" alt="">
    </div>
    <div class="p-info">
        <div class="pname">
            <label class="Head-Name"> Syeda Zunaira Ahmed</label>
            <br>
            <span class="p-disc">Neurologist</span>
        </div>
        <div class="icon">
            <i class='fas fa-bars'></i>
        </div>
    </div>
</div>
<div class="search-box">
    <i class='fas fa-search'></i>
    <input type="text" placeholder="Search for chat">
</div>
<div class="ms-a chat-active">
    <div class="avatar">
        <img src="avt.png" width="50px" alt="">
    </div>
    <div class="mesg-info ">
        <div class="ms-info">
            <span class=" sender-name">Mubashir Ahmed</span>
            <span class="time"> just now <span class="msge-num ms-active ">2</span></span>
        </div>
        <div class="action">
            <span>Typing...</span>
        </div>
    </div>
</div>
<div class="ms-a ">
    <div class="avatar">
        <img src="avt.png" width="50px" alt="">
    </div>
    <div class="mesg-info ">
        <div class="ms-info">
            <span class=" sender-name"> Muhammad Ali</span>
            <span class="time"> Yesterday<span class="msge-num"></span></span>
        </div>
        <div class="action">
            <span>Hi how are you?</span>
        </div>
    </div>
</div>
<div class="ms-a ">
    <div class="avatar">
        <img src="avt.png" width="50px" alt="">
    </div>
    <div class="mesg-info ">
        <div class="ms-info">
            <span class=" sender-name">Shaheer Bin Afaq</span>
            <span class="time"> 20:24 <span class="msge-num"></span></span>
        </div>
        <div class="action">
            <span>Wher are you ?</span>
        </div>
    </div>
</div>
<div class="ms-a ">
    <div class="avatar">
        <img src="avt.png" width="50px" alt="">
    </div>
    <div class="mesg-info ">
        <div class="ms-info">
            <span class=" sender-name"> Hamza Anwer</span>
            <span class="time"> just now <span class="msge-num ms-active">4</span></span>
        </div>
        <div class="action">
            <span>Not done yet</span>
        </div>
    </div>
</div>

<div class="new-chate">
    <span>+</span>
</div> -->


           <!-- </div>
           <div class="chate">
               <div class="chate-header">
                   <div class="header-content">
                   <div class="sender-avatar">
                       <img src="avt.png" width="50px" alt="">
                   </div>
                   <div class="sender-action">
                   <label class="chatname">Mubashir Ahmed</label>
                       <span>Typing...</span>
                   </div>
                   <div class="icons">
                    <i class='fas fa-user-plus'></i>
                    <i class='fas fa-search'></i>
                    <i class='fas fa-ellipsis-v'></i>
                   </div>
                </div>
               </div>
               <div class="chate-body">
                <div class="message-sender">
                    <div class="message-sender-avatar">
                        <img src="avt.png" width="50px" alt="">
                    </div>
                    <div class="message-sender-message  ">
                        <p>This is confirmation that you scheduled an appointment with us for monday at 2:00 pm. We look forward to seeing you then.</p>
                    </div>
                    <div class="message-sender-icon"><i class=></i></div>
                    
                </div>
                <div class="message-recever">
                    <div class="message-sender-avatar">
                        <img src="avt.png" width="50px" alt="">
                    </div>
                    <div class="message-sender-message rece">
                        <p>can i change my appointment timings </p>
                    </div>
                    <div class="message-sender-icon"><i class='fas fa-heart'></i></div> -->

                <select id="senders" size="10"></select>
                <ul id="messages"></ul>

                </div>
                    <form id="SendMessage">
                        <div class="message-box">
                        <div class="message-box-aria">
                            <input type="text" placeholder="Type a message.." id="message">

                        <i class='far fa-smile'></i>                       
                        <!-- <i class="fa fa-paper-plane" style="color: #009688;max-width: 50px; font-size: 25px;"></i> -->
                        <input type="submit" value="Send">
                        </div>
                    </form>

                </div>
                 
                
        </div>
               </div>
           </div>
       </div>
   </main>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-database.js"></script>
<script>

    // //-----------Generate Unique Array------------
    // var arr = ["shaheer", "mubashir", "shaheer"];
    // var unique = [...new Set(arr)];
    // console.log(unique);
    // //---------------------------------------------

    //Getting User id
    var uid;
    
    if (window.location.search.split('?').length > 0) {
        var params = window.location.search.split('?')[1];
        uid = params.split('=')[1];                                
    }
    
    var config = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var senderName;
    var adminId = "HT8NPQ8BaTQClbIn6QWCC29ESx63";
    var adminName = "Ali naeem";

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
    $("#senders").change(function(){
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
            var html = "";
            
                // document.getElementById("messages").innerHTML = " ";
                if(snapshot.val().senderId == uid && snapshot.val().receiverId == receiverId || snapshot.val().senderId == receiverId && snapshot.val().receiverId == uid) {
                    if(snapshot.val().senderId == uid) {
                        html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().message + "</li>";
                    }
                    else {
                        html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().senderName + ": " + snapshot.val().message + "</li>";
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
                        html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().message + "</li>";
                    }
                    else {
                        html += "<li id='message-" + snapshot.key + "'>" + snapshot.val().senderName + ": " + snapshot.val().message + "</li>";
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
            for(i=0;i<unique.length;i++){
                htmls += "<option value='"+ uniqueId[i] + "'>" + unique[i] + "</option>";
            }
            document.getElementById('senders').innerHTML = htmls;
        });
    }

</script>