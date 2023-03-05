<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;

if (!Admin::Check()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}
$db = new MysqliDb();
$page = "Carousel";
$db->orderBy ("carousel.id","desc");
$carousel = $db->get("carousel");

if (isset($_POST['banner'])) {
    $img = $_FILES['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $allowed = array("image/jpeg", "image/jpg", "image/gif", "image/png", 'image/webp');

    $name = time() . $img['name'];
    if (in_array($img['type'], $allowed)) {
        if (move_uploaded_file($img["tmp_name"], "carousel-image/" . $name)) {
            $data = array(
                "image" => $name,
                "title" => $title,
                "description" => $description
            );
            $pic = $db->insert(' carousel', $data);
            if ($pic) {
                $msg = "Carousel Pic Uploaded";
                header("location:" . $_SERVER['PHP_SELF']);
            } else {
                $msg = "Carousel Pic Uploaded Failed";
            }
        } else {
            $msg = "Carousel Folder Not Found";
        }
    } else {
        $msg = "Please enter image";
    }
}


?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Carousel</li>
                    </ol>
                    <div id="carousel-area">
                        <div id="addBtn" class="add-family-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <form id="formList" action="" method="post" class="showHide shadow-lg" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image-input">Image : </label>
                                <input type="file" id="image-input" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title-input">Title:</label>
                                <input type="text" id="title-input" class="form-control" name="title" placeholder="Enter title">
                            </div>
                            <div class="mb-3">
                                <label for="">Description :</label>
                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="description here....."></textarea>
                            </div>

                            <button type="submit" name="banner" class="btn btn-outline-danger">Upload</button><br>
                        </form>

                        <table class="table table-danger table-striped w-100 mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($carousel)) {

                                    foreach ($carousel as $key => $value) {

                                ?>


                                        <tr>
                                            <th scope="row"><?= strtoupper($value['title']) ?></th>
                                            <td><img width="60px" src="carousel-image/<?= $value['image'] ?? '' ?>" alt=""></td>
                                            <td><?= $value['description'] ?? "" ?></td>

                                            <td> <a data-id="<?= $value['id'] ?? '' ?>" href="javascript:void(0)" class="btn btn-outline-danger deleteBtn">Delete</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- changed content  ends-->
            </main>
            <!-- footer -->

            <script>
                $(document).ready(function() {
                    $(".deleteBtn").click(function() {
                        let btn = $(this);
                        let id = btn.data('id');
                        $.ajax({
                            url: "admin-ajax.php",
                            method: "post",
                            data: {
                                cid: id
                            },
                            complete: function(d) {
                                if (d.responseText) {
                                    btn.parent().parent().remove();
                                    alert(d.responseText);
                                } else {
                                    alert(d.responseText);
                                }
                            }
                        })
                    })
                })
            </script>
            <?php require __DIR__ . '/components/footer.php'; ?>