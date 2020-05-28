<?php include "includes/header.php"?>
<head><link type="text/css" rel="stylesheet" href="css/add_record.css"/></head>


<?php
    if(isset($_POST['record_submit'])){
        $record_name = $_POST['record_name'];
        $record_mobile = $_POST['record_mobile'];
        $record_email = $_POST['record_email'];
        $record_dob = $_POST['record_dob'];
        
        if(empty($record_name) || empty($record_mobile) || empty($record_email)){
            $message1 = "*All Fields need to be filled!";
        }else{
            $query = "INSERT INTO records VALUES('', '$record_name', '$record_mobile', '$record_email', '$record_dob', now())";
            $insert_record = mysqli_query($connection, $query);

            confirm($insert_record);

            $message2 = "Record Submitted successfully!";
        }
    }
?>

        <div id="all">
            <div class="fill_form">
                <h1 class="form_heading">Add New Record</h1>
                <?php
                    if(isset($message1)){
                        echo "<h1 style='margin:2px;color:red;font-size:16px;font-family:'Raleway', sans-serif'>$message1</h1>";
                    }else if(isset($message2)){
                        echo "<h1 style='margin:2px;color:#00cd66;font-size:16px;font-family:'Raleway', sans-serif'>$message2</h1>";
                    }
                ?>
                <form action="" method="post">
                    <label for="record_name">Name</label><br>
                    <input type="text" class="fill_box" placeholder="Enter name" name="record_name"><br>

                    <label for="record_dob">DOB</label><br>
                    <input type="date" class="fill_box" placeholder="Enter dob" name="record_dob"><br>

                    <label for="record_mobile">Mobile Number</label><br>
                    <input type="text" class="fill_box2" placeholder="Enter mobile" name="record_mobile">
                    <input type="button" value="+" class="add_btn"><br>

                    <label for="record_email">Email</label><br>
                    <input type="email" class="fill_box2" placeholder="Enter email" name="record_email">
                    <input type="button" value="+" class="add_btn"><br>

                    <input type="submit" class="fill_btn" value="Submit" name="record_submit"><br>
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