<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Contact";
$id = $_SESSION['userid'];

?>

<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="container">
        <form data-aos="fade-up" data-aos-duration="1000" class="common-form shadow-lg" method="post">
            <h1>Contact Form</h1>
            <hr>
            <br>
            <br>
            <div class="mb-3">
                <label for="uname" class="form-label">Your Name: </label>
                <input type="text" name="uname" class="form-control" id="uname">
            </div>
            <div class="mb-3">
                <label for="umail" class="form-label">Your email : </label>
                <input type="email" name="email" class="form-control" id="umail">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject: </label>
                <input type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone: </label>
                <input type="number" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="umessage" class="form-label d-block">Your message: </label>
                <textarea class="form-control w-100 rounded-4" name="umessage" id="umessage" cols="30" rows="5"></textarea>
            </div>
            <button id="sendBtn"  type="submit" class="form-btn">Send</button>
        </form>
    </div>

    <script>
       
        $(document).ready(function(){
            $("#sendBtn").click(function(e){
                e.preventDefault();
                let name = $("#uname");
                let email = $("#umail");
                let subject = $("#subject");
                let phone = $("#phone");
                let message = $("#umessage");

                $.ajax({
                    url: "ajaxwork.php",
                    method: "post",
                    data:{
                        msg_id: <?= $id?>,
                        name: name.val(),
                        email: email.val(),
                        subject: subject.val(),
                        phone: phone.val(),
                        message: message.val(),
                    },
                    complete:function(d){
                        alert(d.responseText);
                    }
                })
            });
        })
    </script>

    <?php require __DIR__ . '/components/footer.php'; ?>