<?php include "includes/header.php";?>
<head><link type="text/css" rel="stylesheet" href="css/index.css"/></head>

        <div id="all">
        <div class="search_box">
            <form action="search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control box" name="search_input" placeholder="search">
                    <span class="input-group-btn">
                        <button type="submit" name="search_btn" class="box_btn">search</button>
                    </span>
                </div>
            </form>
        </div>
            <?php

            $per_page = 3;
                            
            if(isset($_GET['page'])){
                
                $page = $_GET['page'];
            }else{
                $page = "";
            }

            if($page =="" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page*$per_page)-$per_page;
            }
            $query = "SELECT * FROM records";
            $count_posts = mysqli_query($connection, $query);
            $count = mysqli_num_rows($count_posts);
            
            $show_count = ceil($count/$per_page);


                $query = "SELECT * FROM records LIMIT $page_1, $per_page";
                $select_records = mysqli_query($connection, $query);
                confirm($select_records);

                while($row = mysqli_fetch_assoc($select_records)){
                    $record_id = $row['record_id'];
                    $record_name = $row['record_name'];
                    $record_mobile = $row['record_mobile'];
                    $record_email = $row['record_email'];
                    $record_dob = $row['record_dob'];
                    $record_date = $row['record_date'];
                    ?>
                <div class="show_name">
                <div class="display_name" id="name_<?php echo $record_id;?>"><h1><?php echo $record_name;?></h1></div>
                <div class="display_icon" id="icon_<?php echo $record_id;?>"><h1><i id="down" class="fas fa-angle-down"></i><i id="up" style="display:none;" class="fas fa-angle-up"></i></h1></div>
                </div>
                <div class="show_detail" id="detail_<?php echo $record_id;?>">
                    <div class="name">
                        <h1> Name: <span><?php echo $record_name;?></span><br>DOB:  <span><?php echo $record_dob;?></span></h1>
                    </div>
                    <div class="name_btn">
                        <!-- <input type="button" value="up" class="icon_btn"> -->
                        <a href="edit_record.php?edit_id=<?php echo $record_id;?>"><input type="button" value="Edit" class="edit_btn"></a>
                        <a href="index.php?delete_id=<?php echo $record_id;?>"><input type="button" value="Remove" class="remove_btn"></a>
                    </div>
                    <div class="name_mob">
                        <div class="mobile"><h1>Mobile: <span><?php echo $record_mobile;?></span></h1></div>
                        <div class="email"><h1>Email: <span><?php echo $record_email;?></span></h1></div>
                    </div>
                </div>
                    
            <?php
                }
            ?>
        </div>
<?php
    if(isset($_GET['delete_id'])){
        $the_delete_id = $_GET['delete_id'];
        $query = "DELETE FROM records WHERE record_id=$the_delete_id";
        $delete_record = mysqli_query($connection, $query);
        confirm($delete_record);

        header("Location: index.php");
    }
?>


<?php include "includes/footer.php";?>