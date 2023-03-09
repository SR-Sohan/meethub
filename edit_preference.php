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
$page = "Edit Personal";
$id = $_SESSION['userid'];
$db->where("user_id ", $id);
$row = $db->getOne("personal_info");

if (isset($_POST['update'])) {
    $data = [
        'user_id' => $db->escape($_POST['id']),
        'dob' => $db->escape($_POST['dob']),
        'marital_status' => $db->escape($_POST['maritalStatus']),
        'height' => $db->escape($_POST['height']),
        'weight' => $db->escape($_POST['weight']),
        'physical' => $db->escape($_POST['physical']),
        'religion' => $db->escape($_POST['religion']),
        'blood_group' => $db->escape($_POST['bg']),
        'eating_habits' => $db->escape($_POST['eating']),
        'smoking_habits' => $db->escape($_POST['smoking']),
        'drinking_habits' => $db->escape($_POST['drinking']),
        'about' => $db->escape($_POST['about']),
    ];

  
    if ($row) {
        $db->where("user_id", $id);
        if ($db->update("personal_info", $data)) {
            header("location:personal_info.php");
        } else {
            $message = "Update failed!!";
        }
    } else {
        if ($db->insert("personal_info", $data)) {
            header("location:personal_info.php");
        } else {
            $message = "Insert failed!!";
        }
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
                <div class="col-md-8 md-offset-1">
                    <div class="user-info shadow-lg">

                        <form class="" method="post">
                            <h1>Edit Preference Info</h1>
                            <hr>
                            <br>
                            <br>
                            <input type="hidden" name="id" value="<?= $id ?>">

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth: </label>
                                <input name="dob" type="date" class="form-control" id="dob" aria-describedby="emailHelp" value="<?= $row['height'] ?? '' ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="marital" class="form-label">Marital Status: </label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="radio" name="maritalStatus" id="umarried" value="unmarried">
                                    <label class="form-check-label" for="umarried">Unmarried</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="maritalStatus" id="divo" value="divorced">
                                    <label class="form-check-label" for="divo">Divorced</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="maritalStatus" id="widow" value="widow">
                                    <label class="form-check-label" for="widow">Widow</label>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="height" class="form-label">Height: </label>
                                <select class="form-select" name="height" id="height">
                                    <option selected disabled value="-1">Select your height</option>
                                    <option value="4.00">4.00 Feet</option>
                                    <option value="4.01">4.01 Feet</option>
                                    <option value="4.02">4.02 Feet</option>
                                    <option value="4.03">4.03 Feet</option>
                                    <option value="4.04">4.04 Feet</option>
                                    <option value="4.05">4.05 Feet</option>
                                    <option value="4.06">4.06 Feet</option>
                                    <option value="4.07">4.07 Feet</option>
                                    <option value="4.08">4.08 Feet</option>
                                    <option value="4.09">4.09 Feet</option>
                                    <option value="4.10">4.10 Feet</option>
                                    <option value="4.11">4.11 Feet</option>
                                    <option value="5.00">5.00 Feet</option>
                                    <option value="5.01">5.01 Feet</option>
                                    <option value="5.02">5.02 Feet</option>
                                    <option value="5.03">5.03 Feet</option>
                                    <option value="5.04">5.04 Feet</option>
                                    <option value="5.05">5.05 Feet</option>
                                    <option value="5.06">5.06 Feet</option>
                                    <option value="5.07">5.07 Feet</option>
                                    <option value="5.08">5.08 Feet</option>
                                    <option value="5.09">5.09 Feet</option>
                                    <option value="5.10">5.10 Feet</option>
                                    <option value="5.11">5.11 Feet</option>
                                    <option value="6.00">6.00 Feet</option>
                                    <option value="6.01">6.01 Feet</option>
                                    <option value="6.02">6.02 Feet</option>
                                    <option value="6.03">6.03 Feet</option>
                                    <option value="6.04">6.04 Feet</option>
                                    <option value="6.05">6.05 Feet</option>
                                    <option value="6.06">6.06 Feet</option>
                                    <option value="6.07">6.07 Feet</option>
                                    <option value="6.08">6.08 Feet</option>
                                    <option value="6.09">6.09 Feet</option>
                                    <option value="6.10">6.10 Feet</option>
                                    <option value="6.11">6.11 Feet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight: </label>
                                <select class="form-select" name="weight" id="weight">
                                    <option value="-1">Select your weight</option>
                                    <option value="41">41 kg</option>
                                    <option value="42">42 kg</option>
                                    <option value="43">43 kg</option>
                                    <option value="44">44 kg</option>
                                    <option value="45">45 kg</option>
                                    <option value="46">46 kg</option>
                                    <option value="47">47 kg</option>
                                    <option value="48">48 kg</option>
                                    <option value="49">49 kg</option>
                                    <option value="50">50 kg</option>
                                    <option value="51">51 kg</option>
                                    <option value="52">52 kg</option>
                                    <option value="53">53 kg</option>
                                    <option value="54">54 kg</option>
                                    <option value="55">55 kg</option>
                                    <option value="56">56 kg</option>
                                    <option value="57">57 kg</option>
                                    <option value="58">58 kg</option>
                                    <option value="59">59 kg</option>
                                    <option value="60">60 kg</option>
                                    <option value="61">61 kg</option>
                                    <option value="62">62 kg</option>
                                    <option value="63">63 kg</option>
                                    <option value="64">64 kg</option>
                                    <option value="65">65 kg</option>
                                    <option value="66">66 kg</option>
                                    <option value="67">67 kg</option>
                                    <option value="68">68 kg</option>
                                    <option value="69">69 kg</option>
                                    <option value="70">70 kg</option>
                                    <option value="71">71 kg</option>
                                    <option value="72">72 kg</option>
                                    <option value="73">73 kg</option>
                                    <option value="74">74 kg</option>
                                    <option value="75">75 kg</option>
                                    <option value="76">76 kg</option>
                                    <option value="77">77 kg</option>
                                    <option value="78">78 kg</option>
                                    <option value="79">79 kg</option>
                                    <option value="80">80 kg</option>
                                    <option value="81">81 kg</option>
                                    <option value="82">82 kg</option>
                                    <option value="83">83 kg</option>
                                    <option value="84">84 kg</option>
                                    <option value="85">85 kg</option>
                                    <option value="86">86 kg</option>
                                    <option value="87">87 kg</option>
                                    <option value="88">88 kg</option>
                                    <option value="89">89 kg</option>
                                    <option value="90">90 kg</option>
                                    <option value="91">91 kg</option>
                                    <option value="92">92 kg</option>
                                    <option value="93">93 kg</option>
                                    <option value="94">94 kg</option>
                                    <option value="95">95 kg</option>
                                    <option value="96">96 kg</option>
                                    <option value="97">97 kg</option>
                                    <option value="98">98 kg</option>
                                    <option value="99">99 kg</option>
                                    <option value="100">100 kg</option>
                                    <option value="101">101 kg</option>
                                    <option value="102">102 kg</option>
                                    <option value="103">103 kg</option>
                                    <option value="104">104 kg</option>
                                    <option value="105">105 kg</option>
                                    <option value="106">106 kg</option>
                                    <option value="107">107 kg</option>
                                    <option value="108">108 kg</option>
                                    <option value="109">109 kg</option>
                                    <option value="110">110 kg</option>
                                    <option value="111">111 kg</option>
                                    <option value="112">112 kg</option>
                                    <option value="113">113 kg</option>
                                    <option value="114">114 kg</option>
                                    <option value="115">115 kg</option>
                                    <option value="116">116 kg</option>
                                    <option value="117">117 kg</option>
                                    <option value="118">118 kg</option>
                                    <option value="119">119 kg</option>
                                    <option value="120">120 kg</option>
                                    <option value="121">121 kg</option>
                                    <option value="122">122 kg</option>
                                    <option value="123">123 kg</option>
                                    <option value="124">124 kg</option>
                                    <option value="125">125 kg</option>
                                    <option value="126">126 kg</option>
                                    <option value="127">127 kg</option>
                                    <option value="128">128 kg</option>
                                    <option value="129">129 kg</option>
                                    <option value="130">139 kg</option>
                                    <option value="132">132 kg</option>
                                    <option value="131">131 kg</option>
                                    <option value="133">133 kg</option>
                                    <option value="134">134 kg</option>
                                    <option value="135">135 kg</option>
                                    <option value="136">136 kg</option>
                                    <option value="137">137 kg</option>
                                    <option value="138">138 kg</option>
                                    <option value="139">139 kg</option>
                                    <option value="140">140 kg</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="physical" class="form-label">Physical Status: </label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="radio" name="physical" id="inlineRadio1" value="Normal">
                                    <label class="form-check-label" for="inlineRadio1">Normal</label>
                                </div>
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="physical" id="inlineRadio2" value="physically challenged">
                                    <label class="form-check-label" for="inlineRadio2">Physically challenged</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="religion">Religion:</label>
                                <select id="religion" class="form-select" name="religion" aria-label="Default select example">
                                    <option selected>Choose Religion</option>
                                    <option <?php echo isset($row) && $row['religion'] == "islam" ? 'selected' : "" ?> value="islam">Islam</option>
                                    <option <?php echo  isset($row) && $row['religion'] == "hindu" ? 'selected' : "" ?> value="hindu">Hindu</option>
                                    <option <?php echo  isset($row) && $row['religion'] == "christian" ? 'selected' : "" ?> value="christian">Christian</option>
                                    <option <?php echo  isset($row) &&  isset($row) && $row['religion'] == "buddha" ? 'selected' : "" ?> value="buddha">Buddha</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bg">Blood Group:</label>
                                <select id="bg" class="form-select" name="bg" aria-label="Default select example">
                                    <option selected>Choose Blood Group</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "a+" ? 'selected' : "" ?> value="a+">A+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "b-" ? 'selected' : "" ?> value="a-">A-</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "b+" ? 'selected' : "" ?> value="b+">B+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "b-" ? 'selected' : "" ?> value="b-">B-</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "ab+" ? 'selected' : "" ?> value="ab+">AB+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "ab-" ? 'selected' : "" ?> value="ab-">AB-</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "o+" ? 'selected' : "" ?> value="o+">O+</option>
                                    <option <?php echo isset($row) && $row['blood_group'] == "o-" ? 'selected' : "" ?> value="o-">O-</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="eating">Eating Habits:</label>
                                <br>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="radio" name="eating" id="vegetarian" value="vegetarian">
                                    <label class="form-check-label" for="vegetarian">Vegetarian</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="eating" id="nvegetarian" value="non vegetarian">
                                    <label class="form-check-label" for="nvegetarian">Non Vegetarian</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="eating" id="halal" value="halal food always">
                                    <label class="form-check-label" for="halal">Halal Food Always</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="eating" id="restrictions" value="no restrictions">
                                    <label class="form-check-label" for="restrictions">No Restrictions</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="smoking">Smoking Habits:</label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="radio" name="smoking" id="smoking1" value="yes">
                                    <label class="form-check-label" for="smoking1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="smoking" id="smoking2" value="no">
                                    <label class="form-check-label" for="smoking2">NO</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="smoking">Drinking Habits:</label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="radio" name="drinking" id="drink1" value="yes">
                                    <label class="form-check-label" for="drink1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="drinking" id="drink2" value="no">
                                    <label class="form-check-label" for="drink2">NO</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="about">About me:</label>
                                <textarea class="w-100"  name="about" id="about" cols="30" rows="5"></textarea>
                            </div>




                            <button type="submit" name="update" class="form-btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require __DIR__ . '/components/footer.php';
    $db->disconnect();
    ?>