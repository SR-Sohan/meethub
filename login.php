<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Login";
if (isset($_POST['login'])) {
  $db = new MysqliDb();

  $db->where("email", $_POST['email']);

  $row = $db->getOne("users");

  if ($row) {
    if (password_verify($_POST['password'], $row['password'])) {

      // Update Session
      $_SESSION['loggedin'] = true;
      $_SESSION['userid'] = $row['id'];
      $_SESSION['fname'] = $row['first_name'];
      $_SESSION['lname'] = $row['last_name'];
      $_SESSION['role'] = $row['role'];

      //Role Check
      if ($row['role'] == "2") {
        header('Location:'.settings()['homepage'].'admin/');
      } elseif ($row['role'] == "1") {
        header('Location:index.php');
      } else {
        header('Location:index.php');
      }

    } else {
      $message = "Passwords do not match";
    }
  } else {
    $message = "Invalid Account";
  }
}
?>

<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
  <?php require __DIR__ . '/components/menubar.php'; ?>
  <?php require __DIR__ . '/components/dismissalert.php'; ?>
  <!--  -->
  <div class="container">
    <form data-aos="fade-up" data-aos-duration="1000" class="common-form shadow-lg" method="post">
      <h1>Login </h1>
      <hr>
      <br>
      <br>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address: </label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password: </label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>

      <button type="submit" name="login" class="form-btn">Sign In</button>

    </form>

  </div>
  <?php require __DIR__ . '/components/footer.php'; ?>