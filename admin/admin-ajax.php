<?php
require __DIR__ . '/../vendor/autoload.php';

use App\db;

$conn = db::connect();

// Status Change
if (isset($_POST['uid'])) {
    $q = "update users set status ='" . $_POST['val'] . "' where id = '" . $_POST['uid'] . "'";

    $conn->query($q);

    if ($conn->affected_rows) {
        echo "Update Successful";
    } else {
        echo "Sometding Is Not working!";
    }
}

// Delete Users
if (isset($_POST['did'])) {
    $q = "delete from users where id='" . $_POST['did'] . "'";
    $conn->query($q);

    if ($conn->affected_rows) {
        echo "Users Deleted";
    } else {
        echo "Not Deleted";
    }
}

// Carousel item Delete
if (isset($_POST['cid'])) {
    $q = "delete from carousel where id='" . $_POST['cid'] . "'";
    $conn->query($q);
    if ($conn->affected_rows) {
        echo "Carousel Deleted";
    } else {
        echo "Not Deleted";
    }
}

// Event item Delete
if (isset($_POST['event_id'])) {
    $q = "delete from event where id='" . $_POST['event_id'] . "'";
    $conn->query($q);
    if ($conn->affected_rows) {
        echo "Event Deleted";
    } else {
        echo "Not Deleted";
    }
}

// all Users

if (isset($_GET['all'])) {
    $q = "select * from users where role= '1' ORDER BY users.id desc";
    $users = $conn->query($q);
    if ($users->num_rows) {
        $html = "<tr>";
        while ($row = $users->fetch_assoc()) {
            static $sl = 1;
            $html .= '<th scope="row">' . $sl . '</th>';
            $html .= '<td scope="row">' . $row['first_name'] . '</td>';
            $html .= '<td scope="row">' . $row['last_name'] . '</td>';
            $html .= '<td scope="row">' . $row['email'] . '</td>';
            $html .= '<td scope="row">+880' . $row['phone'] . '</td>';
            $html .= '<td scope="row">' . $row['marital_status'] . '</td>';
            $html .= '<td scope="row">' . $row['gender'] . '</td>';
            $html .= '<td>
           <select  data-id="' . $row['id'] . '" class="status form-select form-select-lg mb-3" aria-label=".form-select-lg example">             
               <option ' . ($row['status'] == "2" ? "selected" : "") .' value="2">Active</option>
               <option '.($row['status'] == "1" ? "selected" : "").' value="1">Inactive</option>
               
           </select>
       </td>';
            $html .= '<td>
       <a class="btn btn-outline-primary" href="">View</a>
       <a  data-id="' . $row['id'] . '" class="btn btn-outline-danger deleteUsers" href="javascript:void(0)">Delete</a>
   </td>';
   $html .= "</tr>";
            $sl++;
        }
       

        echo json_encode($html);
    } else echo "Users Not Found";
}


// filter users
if (isset($_GET['filter'])) {
    $q = "";
    if($_GET['filter'] == 'all'){
        $q = "select * from users where role= '1' ORDER BY users.id desc";
    }
    if($_GET['filter'] == 'male' || $_GET['filter'] == 'female'){
        $q = "select * from users where role= '1' and gender= '".$_GET['filter']."' ORDER BY users.id desc";
    }
    if($_GET['filter'] == '1' || $_GET['filter'] == '2'){
        $q = "select * from users where role= '1' and status= '".$_GET['filter']."' ORDER BY users.id desc";
    }
    if($_GET['filter'] == 'divorced' || $_GET['filter'] == 'unmarried' || $_GET['filter'] == 'widow' ){
        $q = "select * from users where role= '1' and marital_status= '".$_GET['filter']."' ORDER BY users.id desc";
    }
    
    $users = $conn->query($q);
    if ($users->num_rows) {
        $html = "<tr>";
        while ($row = $users->fetch_assoc()) {
            static $sl = 1;
            $html .= '<th scope="row">' . $sl . '</th>';
            $html .= '<td scope="row">' . $row['first_name'] . '</td>';
            $html .= '<td scope="row">' . $row['last_name'] . '</td>';
            $html .= '<td scope="row">' . $row['email'] . '</td>';
            $html .= '<td scope="row">+880' . $row['phone'] . '</td>';
            $html .= '<td scope="row">' . $row['marital_status'] . '</td>';
            $html .= '<td scope="row">' . $row['gender'] . '</td>';
            $html .= '<td>
           <select  data-id="' . $row['id'] . '" class="status form-select form-select-lg mb-3" aria-label=".form-select-lg example">             
               <option ' . ($row['status'] == "2" ? "selected" : "") .' value="2">Active</option>
               <option '.($row['status'] == "1" ? "selected" : "").' value="1">Inactive</option>
               
           </select>
       </td>';
            $html .= '<td>
       <a class="btn btn-outline-primary" href="">View</a>
       <a  data-id="' . $row['id'] . '" class="btn btn-outline-danger deleteUsers" href="javascript:void(0)">Delete</a>
   </td>';
   $html .= "</tr>";

            $sl++;
        }
        

        
    } else $html = "<p>Users Not Found</p>";
    echo json_encode($html);
}