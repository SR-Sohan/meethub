<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Registration";
if (isset($_POST['reg'])) {
    $db = new MysqliDb();
    if ($_POST['pass1'] == $_POST['pass2']) {
        $data = [
            'name' => $db->escape($_POST['firstname']) . " " . $db->escape($_POST['lastname']),
            'email' => $db->escape($_POST['email']),
            'password' => password_hash($_POST['pass1'], PASSWORD_DEFAULT),
            'role' => "1"
        ];
        if ($db->insert("users", $data)) {
            header("location:login.php");
        } else {
            $message = "Regitration failed!!";
        }
    }
}
?>

<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="container">
        <form data-aos="fade-up" data-aos-duration="1000" class="common-form shadow-lg">
            <h1>Contact Form</h1>
            <hr>
            <br>
            <br>
            <div class="mb-3">
                <label for="uname" class="form-label">Your Name: </label>
                <input type="text" class="form-control" id="uname">
            </div>
            <div class="mb-3">
                <label for="umail" class="form-label">Your email : </label>
                <input type="email" class="form-control" id="umail">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject: </label>
                <input type="text" class="form-control" id="subject">
            </div>
            <div class="mb-3">
                <label for="umessage" class="form-label d-block">Your message: </label>
                <textarea class="form-control w-100 rounded-4" name="umessage" id="umessage" cols="30" rows="5"></textarea>
            </div>


            <button type="submit" class="form-btn">Send</button>

        </form>
    </div>

    <?php require __DIR__ . '/components/footer.php'; ?>