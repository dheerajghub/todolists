<div class="inbox">
            <div class="row">
                        <div class="col-md-5">
                            <h4><span style="color:#a52a2a"><i class="fas fa-basketball-ball"></i></span>&nbsp;Study</h4>
                        </div>
                        <div class="col-md-7">
                            <small class="text-muted" style="float:right;" id="time"></small>
                        </div>
            </div>
            <div class="col-md-12 previous_list">
                <?php 
                    include('config.php');
                    $query = "select id,study from study";
                    $result = mysqli_query($conn , $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div class='todo-panel row'>";
                        echo "<div class='col-md-1'>";
                        echo "<input type='checkbox'>";
                        echo "</div>";
                        echo "<p class='col-md-9'>".$row['study']."</p>";
                        echo "<div class='col-md-2'>";
                        echo "<span class='del-button' style='float:right;' id='study-del' onclick='del(this.id,".$row['id'].")'>&times;</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div class="col-md-12 content_list">
            </div>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" id="STUDY"  placeholder="Todo here..." onkeypress="onenter(event)">
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Add" id="add-btn" onclick="todo('STUDY')">
                </div>
            </div><br>
            <div class="col-md-12 helping-tools">
                    <?php
                        echo '<small id="delete_all_panels" onclick="deleteall(\'study\')">Delete all</small>';
                    ?>
            </div>
</div>