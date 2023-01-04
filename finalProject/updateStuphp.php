
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit form</title>
    <link rel="stylesheet" href="form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <?php
        include "connect.php";
        session_start();
        $stnRoll = $_SESSION['rollNo'];

        $name = "";
        $rollN = "";
        $email = "";
        $password = "";
        $dept = "";
        $course = "";
        $semester = "";
        $self_reg = "";


            $sql = "SELECT name, rollNo , email, password, department, course, semester, self_reg FROM studentsinfo WHERE rollNo = '$stnRoll'";

            $result =  $conn->query($sql);

            if($result->num_rows > 0){
            
                while( $row = $result->fetch_assoc())
                {
                    $name = $row["name"];
                    $rollN = $row["rollNo"];
                    $email = $row["email"];
                    $password = $row["password"];
                    $dept = $row["department"];
                    $course = $row["course"];
                    $semester = $row["semester"];        
                    $self_reg = $row["self_reg"];
                }
            }
            else {
                echo " no record";
            }
    ?>
</head>
<script>
    function getDept(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("department").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "getDeptphp.php", true);
            xmlhttp.send();
    }
    function getCourses(str) {
            console.log(str)
            if (str == "") {
                document.getElementById("courses").append = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("courses").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "getCoursesphp.php?q=" + str, true);
            xmlhttp.send();
        }
</script>
<body>
    <div class="testback"
        style="width: 100%; height: 100px; background-color: rgba(0, 0, 0, 0.4); position: fixed; top: 0px; display: none;">
    </div>
    <div class="mainDiv">

        <div class="navbar">
            <div class="row">
                <div class="log">
                    <img onclick="location.href='index.html'" src="icons/Timely logo/timely full logo .png" style="cursor: pointer;" width="130px" alt="logo">
                </div>
                <div class="menuOption">
                    <ul>
                        <li id="features" class="items">Features</li>
                        <li id="howItWorks" class="items">How it Works</li>
                        <li id="price" class="items">Price</li>
                        <li id="fAQ" class="items">FAQ</li>
                        <li id="contact" class="items">Contact</li>
                        <li id="login" onclick="location.href='loginPage.html'" class="items">Login</li>
                    </ul>
                </div>
                <div class="menuBTN">
                    <h4 class="menu">MENU</h4>
                    <div class="menuBars">
                        <div class="hbarger"></div>
                        <div class="hbarger"></div>
                        <div class="hbarger"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Form">
            <form onclick="btnSubmitClicked()" name="myform" method="post" action="updateSTNphp.php">
                <h1 id="st">Student Registeration</h1>
                <h4>Personel information</h4>

                <input class="matchParent requiredField" type="text" placeholder="Name" title="3 or 12 characters" value="<?php echo $name;?>"
                    name="name"><br><br>
                <input id="rollNo" class="matchParent requiredField" type="text" placeholder="Roll no" value="<?php echo $rollN;?>"
                    title="BSSE51F20S069" name="rollNo"><br><br>
                <input class="matchParent requiredField" type="email" placeholder="Email" name="email" autocomplete="off" value="<?php echo $email;?>"><br><br>
                <input id="txt_password" class="matchParent requiredField" type="password" name="password" autocomplete="off" value="<?php echo $password;?>"
                    placeholder="Password"
                    title="too week, enter one upper case character and one lowerver case and password lenght should be 6 or more characters ">
                <div id="show">
                    <input type="checkbox" onclick="show_pass()" id="show_pas">Show Password
                </div>
                <br>

                <div class="couDiv">
                    <label for="department">Department:</label>
                    <select id="department" name="department" ondblclick="getDept()" onchange="getCourses(this.value)" required>
                        <option selected><?php echo $dept;?></option>
                    </select>
                </div>

                <div class="couDiv">
                    <label for="courses">Courses :</label>
                    <select id="courses" name="course" required>
                        <option value="<?php echo $course;?>" selected > <?php echo $course;?></option>
                    </select>
                </div>
                <div class="couDiv">
                    <label for="semester">Semester :</label>
                    <select id="semester" name="semester" required>
                        <option <?php if($semester == 1) echo 'selected = "selected"' ?> value="1">1</option>
                        <option <?php if($semester == 2) echo 'selected = "selected"' ?> value="2">2</option>
                        <option <?php if($semester == 3) echo 'selected = "selected"' ?>value="3">3</option>
                        <option <?php if($semester == 4) echo 'selected = "selected"' ?>value="4">4</option>
                        <option <?php if($semester == 5) echo 'selected = "selected"' ?>value="5">5</option>
                        <option <?php if($semester == 6) echo 'selected = "selected"' ?>value="6">6</option>
                        <option <?php if($semester == 7) echo 'selected = "selected"' ?>value="7">7</option>
                        <option <?php if($semester == 8) echo 'selected = "selected"' ?>value="8">8</option>
                    </select>
                </div>

                <div class="SorR">
                    <input type="radio" name="s_r" value="Regular" <?php if($self_reg == 'Regular') echo 'checked = "checked"' ?> >Regular
                    <input type="radio" name="s_r" value="Self" <?php if($self_reg == 'Self') echo 'checked = "checked"' ?> >Self
                </div>

                <div class="click_btn"><button class="" id="btn_update" name="update">Update</button></div>
            </form>
                <div class="alreadyUser" onclick="location.href='loginPage.html'"> <button>Cancel</button></div>
        </div>

        <!-- <button class="matchParent" id="btn_submit" onclick="btnSubmitClicked">Submit</button> -->
        <p id="error_area"></p>

    </div>
    
</body>

<script src="fromjS.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.menuBTN').children().click(function () {
            $('.menuOption').css('visibility', 'visible').slideToggle();
            $('.testback').slideToggle();
        }
        )

    })
</script>
</html>
