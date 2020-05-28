<?php include "includes/header.php"?>
<head><link type="text/css" rel="stylesheet" href="css/add_record.css"/></head>


<?php

    if(!isset($_GET['edit_id'])){
        header("Location: index.php");
    }else{
        $the_record_id = $_GET['edit_id'];
    }

    if(isset($_POST['record_update'])){
        $record_name = $_POST['record_name'];
        $record_mobile = $_POST['record_mobile'];
        $record_email = $_POST['record_email'];
        $record_dob = $_POST['record_dob'];
        
        if(empty($record_name) || empty($record_mobile) || empty($record_email)){
            $message1 = "*All Fields need to be filled!";
        }else{
            $query = "UPDATE records SET record_name='$record_name', record_mobile='$record_mobile', record_email='$record_email', record_dob='$record_dob' WHERE record_id=$the_record_id";
            $update_record = mysqli_query($connection, $query);

            confirm($update_record);

            $message2 = "Record Updated successfully!";
        }
    }
?>

        <div id="all">
            <div class="fill_form">
                <h1 class="form_heading">Edit Record Record</h1>
                <?php
                    if(isset($message1)){
                        echo "<h1 style='margin:2px;color:red;font-size:16px;font-family:'Raleway', sans-serif'>$message1</h1>";
                    }else if(isset($message2)){
                        echo "<h1 style='margin:2px;color:#00cd66;font-size:16px;font-family:'Raleway', sans-serif'>$message2</h1>";
                    }
                ?>
                <?php
                    $query = "SELECT * FROM records WHERE record_id = $the_record_id";
                    $select_record = mysqli_query($connection, $query);
                    confirm($select_record);
    
                    while($row = mysqli_fetch_assoc($select_record)){
                        $record_id = $row['record_id'];
                        $record_name = $row['record_name'];
                        $record_mobile = $row['record_mobile'];
                        $record_email = $row['record_email'];
                        $record_dob = $row['record_dob'];
                        $record_date = $row['record_date'];
                    }
                ?>
                <form action="" method="post">
                    <label for="record_name">Name</label><br>
                    <input type="text" class="fill_box" placeholder="Enter name" name="record_name" 
                    value="<?php if(isset($_GET['edit_id'])){echo $record_name;}?>"><br>

                    <label for="record_dob">DOB</label><br>
                    <input type="date" class="fill_box" placeholder="Enter dob" name="record_dob"
                    value="<?php if(isset($_GET['edit_id'])){echo $record_dob;}?>"><br>

                    <label for="record_mobile">Mobile Number</label><br>
                    <input type="text" class="fill_box" placeholder="Enter mobile" name="record_mobile"
                    value="<?php if(isset($_GET['edit_id'])){echo $record_mobile;}?>"><br>

                    <label for="record_email">Email</label><br>
                    <input type="email" class="fill_box" placeholder="Enter email" name="record_email"
                    value="<?php if(isset($_GET['edit_id'])){echo $record_email;}?>"><br>
                    

                    <input type="submit" class="fill_btn" value="Update" name="record_update"><br>
                    <a href="index.php"><input type="button" class="fill_btn2" value="Home" name="home"><br></a>
                </form>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $(".display_name").click(function(){
            $(".show_detail").toggle(700);
        })
    })
</script>
</body>
</html>