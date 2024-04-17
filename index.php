<?php
    $submitted = false;
    $gender_checked = false;
    $male = false;
    $female = false;
    $first_name_valid = false;
    $last_name_valid = false;
    $age_valid = false;
    $sc_checked = false;
    $american = false;
    $italian = false;
    $thai = false;
    $chinese = false;
    $french = false;
    $japanese = false;
    $other = false;
    $food_selected = false;
    

    if(isset($_POST['btnSubmit'])) {
       
        $submitted = true;
        

        $first_name = filter_var($_POST['txtFirstName'], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['txtLastName'], FILTER_SANITIZE_STRING);
        $age = filter_var($_POST['numAge'], FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'slctGender');
        $sc_resident = filter_input(INPUT_POST, 'chkSCResident');
        $fav_food = [];
        $fav_food = filter_input(INPUT_POST, 'lstFavFood');


        if($gender !== null) {
            $gender_checked = true;
        
            if($gender == 'male') {
                $male = true;
            }
            else{
                $female = true;
            }
        }
        if($sc_resident!== null) {
            $sc_checked = true;
        }
        if($fav_food!== null) {
            $food_selected = true;
        }
        if($fav_food == "american") {
            $american = true;
        }
        if($fav_food == "italian") {
            $italian = true;
        }
        if($fav_food == "thai") {
            $thai = true;
        }
        if($fav_food == "chinese") {
            $chinese = true;
        }
        if($fav_food == "french") {
            $french = true;
        }
        if($fav_food == "japanese") {
            $japanese = true;
        }
        if($fav_food == "other") {
            $other = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer2</title>
    <style>
        html {
    background-color: #d3d3d3;
}
header {
    background-color: #333;
    width: 800px;
    margin: auto;
} 
h1 {
    text-align: center;
    margin-bottom: 100px;
    color: #fff;
    height: 50px;
}
form {
    border: 5px solid black;
    border-radius: 15px;
    height: 400px;
    padding-top: 30px;
    width: 900px;
    margin: auto;
}

label {
    display: block;
    float: left;
    clear: left;
    width: 170px;
    text-align: right;
    margin-right: 40px;
}

fieldset {
    margin-left: 120px;
    padding: 0;
    border: 0;
}
legend {
    float: left;
    margin-right: 30px;
}
input[type="text"] {
    width: 340px;
    margin-bottom: 25px;
    border-radius: 5px;
}
input[type="number"] {
    width: 100px;
    margin-bottom: 25px;
    border-radius: 5px;
}
.box {
    margin-bottom: 10px;
}
input[ype="radio"], fieldset label {
    display: inline;
    float: none;
    margin-top: 25px;
    /* margin-left: 20px; */
    
}
.button {
    display: none;
}
.resident {
    margin-top: 25px;
    margin-left: 5px;
    margin-bottom: 25px;
}
.listBox {
    margin-left: 5px;
    margin-bottom: 25px;
}
input[type="submit"] {
    margin-left: 360px;
    border-radius: 5px;
}
select {
    border-radius: 5px;
    width: 100px;
}
.error {
    color: red;
}
.valid {
    border: 5px solid black;
    width: 450px;
    height: 300px;
    border-radius: 5px;
    margin: auto;
    margin-top: 25px;
}
h2 {
    background-color: #333;
    padding-top: 5px;
    margin: 5px auto;
    width: 200px;
    text-align: center;
    color: #fff;
    height: 50px;
}
.info {
    margin-left: 135px;
    font-weight: bold;
    font-size: 21px;
}
    </style>
</head>
    <header>
        <h1>Lawyer Project 2</h1>
    </header>
    <main>
    <form name="userInfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
            method="POST">
        <div class="box">
        <label for="firstName"class="fname" >First Name:</label>
            <input type="text" name="txtFirstName" id="firstName" placeholder="First Name" 
                value="<?php if(isset($first_name)) echo $first_name; ?>">
                <span class="error"><?php ($submitted) && ((empty($first_name)) && 
                    print("Please enter first name") OR (!preg_match('/^[a-zA-Z]+$/', $first_name))
                     ? print("First name can only contain letters.") : $first_name_valid = true)?>
                </span>
        </div>
        <div class="box">
        <label for="lastName">Last Name:</label>
            <input type="text" name="txtLastName" id="lastName" placeholder="Last Name" 
                value="<?php if(isset($last_name)) echo $last_name; ?>">
                <span class="error"><?php ($submitted) && ((empty($last_name)) && 
                        print("Please enter last name") OR (!preg_match('/^[a-zA-Z-]+$/', 
                        $last_name)) ? print("Last name can only contain letters and hyphens.") : 
                        $last_name_valid = true)?>
                </span>
        </div>
        <div class="box">
        <label for="age">Age:</label>
            <input type="number" name="numAge" id="age" placeholder="21 to 99" 
                value="<?php if(isset($age)) echo $age; ?>">
                <span class="error"><?php ($submitted) && ((empty($age)) && 
                            print("Please enter your age") OR (!preg_match('/^[21-99]+$/', $age)) ? 
                            print("Age must be from 21 to 99") : $age_valid = true)?>
                </span>
        </div>
            <fieldset>
            <legend>Gender:</legend>
                <input type="radio" name="slctGender" id="radGenderMale" 
                    value ="male" <?php ($male) && print('checked') ?>>
                    <label for="radGenderMale">Male</label>
                <input type="radio" name="slctGender" id="radGenderFemale" 
                    value ="female" <?php ($female) && print('checked') ?>>
                    <label for="radGenderFemale">Female</label>  
                        <span class="error"><?php ($submitted) && ((!$gender_checked) && 
                            print("Please select a gender."))?>
                        </span>
        </fieldset>
        <div class="resident">
        <input type="checkbox" name="chkSCResident" id="scResident" <?php ($sc_checked) 
            && print('checked')?>>
            <label for="scResident">SC Resident</label>  
            
        </div>
        <div class="listBox">
        <label for="favFood">Favorite Foods</label>
            <select name="lstFavFood" id="favFood" size="4">
                <option value="american" 
                    <?php ($american) && print('selected') ?>
                >American</option>
                <option value="italian"
                    <?php ($italian) && print('selected')?>
                >Italian</option>
                <option value="thai"
                <?php ($thai) && print('selected')?>
                >Thai</option>
                <option value="chinese"
                <?php ($chinese) && print('selected')?>
                >Chinese</option>
                <option value="french"
                    <?php ($french) && print('selected')?>
                >French</option>
                <option value="japanese"
                    <?php ($japanese) && print('selected')?>
                >Japanese</option>
                <option value="other"
                    <?php ($other) && print('selected')?>
                >Other</option>
            </select>
            <span class="error"><?php ($submitted) && ((!$food_selected) && 
                            print("Please select a favorite type of food."))?>
                        </span>
        </div>
        <label for="submit" class="button">Submit</label>
        <input type="submit" value="Submit" id="submit" name="btnSubmit">
    </form>
    <div class=<?php ($first_name_valid && $last_name_valid && $age_valid && $gender_checked) ? 
        print('valid') : print('')?>>
            <?php
                if ($first_name_valid && $last_name_valid && $age_valid && $gender_checked)
                {
                    echo '<h2> Valid Form Info</h2>';
                    echo '<br>';
                    echo '<div class="info">';
                    echo htmlspecialchars ('First Name: '. $first_name);
                    echo '<br>';
                    echo htmlspecialchars ('Last Name: '. $last_name);
                    echo '<br>';
                    echo htmlspecialchars ('Age: '. $age);
                    echo '<br>';
                    echo 'Gender: '. $gender;
                    echo '<br>';
                    echo 'SC Resident: '. $sc_resident;
                    echo '<br>';
                    echo 'Fav Foods: '. $fav_food;
                    echo '</div>';
                }
            ?>
    </div>
    </main>
    <footer>
        

    </footer>
</body>
</html>