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
$row = $db->getOne("partner_preference");

$district = $db->get("districts");


if (isset($_POST['update'])) {
    if(isset($_POST['marital'])){
        $marital =  implode(",",$_POST['marital']) ;
    }
    if(isset($_POST['occupation'])){
        $occupation = implode(",",$_POST['occupation']);
    }
        
    $data = [
        'user_id' => $db->escape($_POST['id']),
        'marital_status' => $db->escape($marital),
        'min_age' => $db->escape($_POST['age1']),
        'max_age' => $db->escape($_POST['age2']),
        'min_height' => $db->escape($_POST['height1']),
        'max_height' => $db->escape($_POST['height2']),
        'physical_status' => $db->escape($_POST['physical']),
        'eating_habits' => $db->escape($_POST['eating']),        
        'drinking_habits' => $db->escape($_POST['drinking']),
        'smoking_habits' => $db->escape($_POST['smoking']),
        'religion' => $db->escape($_POST['religion']),
        'education' => $db->escape($_POST['education']),
        'occupation' => $db->escape($occupation),
        'state' => $db->escape($_POST['state'])
        
    ];
  
    if ($row) {
        $db->where("user_id", $id);
        if ($db->update("partner_preference", $data)) {
            header("location:preference.php");
        } else {
            $message = "Update failed!!";
        }
    } else {
        if ($db->insert("partner_preference", $data)) {
            header("location:preference.php");
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
                                <label for="marital" class="form-label">Marital Status: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="unmarried" value="unmarried" name="marital[]">
                                    <label class="form-check-label" for="unmarried">Un-married</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="divo" value="divorced" name="marital[]">
                                    <label class="form-check-label" for="divo">Divorced</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="widow" value="widow" name="marital[]">
                                    <label class="form-check-label" for="widow">Widow</label>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="age" class="form-label">Age: </label>
                                <select class="px-3 py-1 ms-2" name="age1" id="age">
                                    <option selected disabled value="-1">Select Age</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36t</option>
                                    <option value="37">37</option>
                                    <option value="38">38t</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                </select>
                                <span class="mx-2">To</span>
                                <select class="px-3 py-1 ms-2" name="age2" id="age">
                                    <option selected disabled value="-1">Select Age</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36t</option>
                                    <option value="37">37</option>
                                    <option value="38">38t</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="height" class="form-label">Height: </label>
                                <select class="px-3 py-1 ms-2" name="height1" id="height">
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
                                    <span class="mx-2">To</span>
                                <select class="px-3 py-1 ms-2" name="height2" id="height">
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
                                <label for="education" class="form-label">Education: </label>
                                <select class="form-select" name="education" id="education">
                                    <option selected disabled value="-1">Select Highest Education</option>
                                    <option value="ssc">SSC</option>
                                    <option value="hsc">HSC</option>
                                    <option value="honours">Honours</option>
                                    <option value="masters">Masters</option>
                                    <option value="bba">BBA</option>
                                    <option value="mba">MBA</option>
                                    <option value="mbbs">MBBS</option>
                                    <option value="phd">PHD</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="occupation" class="form-label">Occupation: </label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="eng" value="engineer" name="occupation[]">
                                    <label class="form-check-label" for="eng">Engineer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="doc" value="doctor" name="occupation[]">
                                    <label class="form-check-label" for="doc">Doctor</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="gov" value="govt" name="occupation[]">
                                    <label class="form-check-label" for="gov">Government Job</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="private" value="private" name="occupation[]">
                                    <label class="form-check-label" for="private">Private Job</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="bus" value="business" name="occupation[]">
                                    <label class="form-check-label" for="bus">Business</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="self" value="self employed" name="occupation[]">
                                    <label class="form-check-label" for="self">Self Employed</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="student" value="student" name="occupation[]">
                                    <label class="form-check-label" for="student">Student</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="other" value="student" name="occupation[]">
                                    <label class="form-check-label" for="other">Others</label>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="state">Select District:</label>
                                <select name="state" id="state" class="form-select">
                                    <option value="-1">Select District</option>
                                    <?php 
                                        if(isset($district)){
                                            foreach ($district as $key => $value) {
                                    ?>
                                        <option value="<?= $value['id']?>"><?= $value['name']?></option>
                                    <?php }} ?>
                                </select>
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