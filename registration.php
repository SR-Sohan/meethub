<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Registration";
if (isset($_POST['reg'])) {

  $db = new MysqliDb();

  //Store Data in Array
  $data = [
    'first_name' => $db->escape($_POST['fname']),
    'last_name' => $db->escape($_POST['lname']),
    'phone' => $db->escape($_POST['phone']),
    'email' => $db->escape($_POST['email']),
    'gender' => $db->escape($_POST['gender']),
    'marital_status' => $db->escape($_POST['marital']),
    'age' => $db->escape($_POST['age']),
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'role' => "1",
    'status' => "1",
  ];

  if ($db->insert("users", $data)) {
    header("location:login.php");
  } else {
    $message = "Regitration failed!!";
  }
}
?>

<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
  <?php require __DIR__ . '/components/menubar.php'; ?>

  <div class="container">
    <form data-aos="fade-up" data-aos-duration="1000" class="common-form shadow-lg" method="post">
      <h1>Registration Form</h1>
      <h2><?= $message ?? '' ?></h2>
      <hr>
      <br>
      <br>
      <div class="mb-3">
        <label for="fname" class="form-label">First Name: </label>
        <input type="text" name="fname" class="form-control" id="fname" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">Last Name: </label>
        <input type="text" name="lname" class="form-control" id="lname" aria-describedby="emailHelp" />
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address:
        </label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone:
        </label>
        <input type="number" name="phone" class="form-control" id="phone" />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password:
        </label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">Age:
        </label>
        <input type="number" name="age" class="form-control" id="age" />
      </div>

      <div class="mb-3">
        <label for="gender">Gender: </label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
      </div>
      <div class="mb-3">
        <select class="form-select" name="marital" aria-label="Default select example">
          <option selected>Select Marital Status</option>
          <option value="unmarried">Unmarried</option>
          <option value="divorced">Divorced</option>
          <option value="widow">Widow</option>
        </select>
      </div>


      <button type="submit" name="reg" class="form-btn">Sign Up</button>
    </form>
  </div>

  <?php require __DIR__ . '/components/footer.php'; ?>