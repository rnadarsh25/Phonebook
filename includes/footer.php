
        <div id="page">
            <div class="page_num"></div>
            <div class="page_num">
            <ul class="pager">
            
                <?php
                    
                    for($i=1;$i<=$show_count;$i++){
                        
                        if($i == $page){
                            
                        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";  
                        
                        }else if($page=="" && $i==1){
                        
                            echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                        }else{
                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                        }
                    }
                    
                ?>       
                </ul>
            </div>
            <div class="page_num"><a href="add_record.php"><input type="button" value="+" class="add_btn"></a></div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    <?php
                $query = "SELECT * FROM records";
                $select_records = mysqli_query($connection, $query);
                confirm($select_records);

                while($row = mysqli_fetch_assoc($select_records)){
                    $record_id = $row['record_id'];
                    ?>
                $(document).ready(function(){
                    $("#name_<?php echo $record_id;?>").click(function(){
                        $("#detail_<?php echo $record_id;?>").toggle(700);
                        $("#up").show(700);
                        $("#down").hide();
                    }),
                    $("#icon_<?php echo $record_id;?>").click(function(){
                        $("#detail_<?php echo $record_id;?>").toggle(700);
                        $("#up").show(700);
                        $("#down").hide();
                    })
                }) 
                <?php
                }
                ?>
</script>
</body>
</html>