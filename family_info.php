<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';

use App\User;
use App\model\Category;
use App\db;
// $conn = db::connect();
$db = new MysqliDb();
$id = $_SESSION['userid'];
$page = "Family Info";
$db->where("user_id", $id);
$family=$db->get("family_info");
if (isset($_POST['add'])) {
    $data= [
        'user_id' => $db->escape($_POST['user_id']),
        'relation' => $db->escape($_POST['relation']),
        'name' => $db->escape($_POST['name']),
        'profession' => $db->escape($_POST['profession']),
        'status' => $db->escape($_POST['status']),
        'phone' => $db->escape($_POST['phone']),
    ];

    

    if ($db->insert("family_info",$data)) {
        header("location:".$_SERVER['PHP_SELF']);
    }else {
        $message= "Update Failed!!";
    }
}
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>

    <?php require __DIR__ . '/components/menubar.php'; ?>

    <div class="profile-page-area">
        <div class="container-fluid">
            <div class="row">
                <?php require __DIR__ . '/components/profile_sidebar.php'; ?>
                <div data-aos="fade-up" data-aos-duration="1000" class="col-md-8 md-offset-1">
                    <div class="user-info shadow-lg">
                        <div id="addBtn" class="add-family-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <form id="formList" class="mt-4  showHide" action="" method="post">
                            <input type="hidden" name="user_id" value="<?= $id?>">
                            <div class="mb-3">
                                <h1>Edit family info</h1>
                                <select class="form-select" name="relation" aria-label="Default select example">
                                    <option selected>Select Relation</option>
                                    <option value="father">Father</option>
                                    <option value="mother">Mother</option>
                                    <option value="brother">Brother</option>
                                    <option value="sister">Sister</option>
                                    <option value="uncle">Uncle</option>
                                    <option value="aunty">Aunty</option>
                                    <option value="grand father">Grand Father</option>
                                    <option value="grand mother">Grand Mother</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name: </label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession: </label>
                                <input name="profession" type="text" class="form-control" id="profession" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status: </label>
                                <input name="status" type="text" class="form-control" id="status" aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone: </label>
                                <input name="phone" type="number" class="form-control" id="phone" aria-describedby="emailHelp" />
                            </div>
                            <button type="submit" class="form-btn" name="add">Add</button>
                        </form>

                        <div class="family-list mt-4">
                            <table class="table table-danger table-striped w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Relation</th>
                                        <th scope="col">Profession</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($family)) {
                                        
                                        foreach ($family as $key => $value) {

                                       ?>
                                    <tr>
                                        <th scope="row"><?= $value['name']?></th>
                                        <td><?= $value['relation']?></td>
                                        <td><?= $value['profession']?></td>
                                        <td><?= $value['status']?></td>
                                        <td><?= $value['phone']?></td>
                                        <td><a href="" class="btn btn-outline-primary">Edit</a> <a href="<?= settings()['homepage']?>delete_family.php?id=<?= $value['id']?>" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                    <?php
                                        }}
                            
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>