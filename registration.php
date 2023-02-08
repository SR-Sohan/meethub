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
    <form class="common-form shadow-lg">
      <h1>Registration Form</h1>
      <hr>
      <br>
      <br>
      <div class="mb-3">
        <label for="fname" class="form-label">First Name: </label>
        <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">Last Name: </label>
        <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" />
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address:
        </label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone:
        </label>
        <input type="number" class="form-control" id="phone" />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password:
        </label>
        <input type="password" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="mb-3">
          <label for="gender">Gender: </label>
          <input type="radio" name="gender" id="male" value="male">
          <label for="male">Male</label>
          <input type="radio" name="gender" id="female" value="female">
          <label for="female">Female</label>
      </div>

      

      <button type="submit" class="form-btn">Sign Up</button>
    </form>
  </div>

  <?php require __DIR__ . '/components/footer.php'; ?>