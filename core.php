<?php
include('config.php');
include('sanitizer.php');
if($_SERVER['REQUEST_METHOD'] =="POST" && $_GET['type']=="ajaxpages"){
    include($_GET['page']);
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_GET['type']=='create'){
                $todo = sanitizer($_GET['val']);
                $page = sanitizer($_GET['page']);
                if(empty($todo)){
                    echo "<div class='error-panel row'>";
                    echo "<p class='col-md-12'>I'm sure you forget something!!</p>";
                    echo "</div>";
                    $query = "select id,".$page." from ".$page;
                    $result = mysqli_query($conn ,$query);
                    while($row = mysqli_fetch_assoc($result))
                    {
                            echo "<div class='todo-panel row'>";
                            echo "<div class='col-md-1'>";
                            echo "<input type='checkbox' oncheck='overline(this.id,".$row['id'].")' id='".$_GET['page']."'>";
                            echo "</div>";
                            echo "<p class='col-md-9'>".$row[$page]."</p>";
                            echo "<div class='col-md-2'>";
                            echo "<span class='del-button' style='float:right;' id='".$page."-del' onclick='del(this.id,".$row['id'].")'>&times;</span>";
                            echo "</div>";
                            echo "</div>";
                    }
                    return false;
                }
                $query = "insert into ".$page."(".$page.") values('".$todo."')";
                mysqli_query($conn , $query);
                $query2 = "select id,".$page." from ".$page;
                $result2 = mysqli_query($conn ,$query2);
                while($row = mysqli_fetch_assoc($result2))
                {
                    echo "<div class='todo-panel row'>";
                        echo "<div class='col-md-1'>";
                        echo "<input type='checkbox' oncheck='overline(this.id,".$row['id'].")' id='".$page."'>";
                        echo "</div>";
                        echo "<p class='col-md-9'>".$row[$page]."</p>";
                        echo "<div class='col-md-2'>";
                        echo "<span class='del-button' style='float:right;' id='".$page."-del' onclick='del(this.id,".$row['id'].")'>&times;</span>";
                        echo "</div>";
                        echo "</div>";
                }
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_GET['type']=="delete"){
    $page = sanitizer($_GET['page']);
    $id = sanitizer($_GET['id']);
    $query = "delete from ".$page." where id='".$id."'";
    mysqli_query($conn , $query);
    $query2 = "select id,".$page." from ".$page;
                $result2 = mysqli_query($conn ,$query2);
                while($row = mysqli_fetch_assoc($result2))
                {
                        echo "<div class='todo-panel row'>";
                            echo "<div class='col-md-1'>";
                            echo "<input type='checkbox' oncheck='overline(this.id,".$row['id'].")' id='".$page."'>";
                            echo "</div>";
                            echo "<p class='col-md-9'>".$row[$page]."</p>";
                            echo "<div class='col-md-2'>";
                            echo "<span class='del-button' style='float:right;' id='".$page."-del' onclick='del(this.id,".$row['id'].")'>&times;</span>";
                            echo "</div>";
                        echo "</div>";
                }
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_GET['type']=="overline")
{
    $page = sanitizer($_GET['page']);
    $id = sanitizer($_GET['id']);    
    $query = "select * from ".$page." where id=".$id;
        
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_GET['type']=="deleteall"){
    $page = sanitizer($_GET['page']);
    $query = "select * from ".$page;
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    if(empty($row)){
        echo "<div class='error-panel message-panel col-md-12'>";
        echo "<p>There is No lists to delete!!</p>";
        echo "</div>";
        return false;
    }
    $query2 = "truncate table ".$page;
    $result2 = mysqli_query($conn , $query2);
    echo "<div class='success-panel message-panel col-md-12'>";
    echo "<p>All lists are deleted!!</p>";
    echo "</div>";
}
if($_SERVER['REQUEST_METHOD']=="POST" && $_GET['type']=="badge")
{   
    $page = sanitizer($_GET['page']);
    $query = "select count(id) as many from $page"; 
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    echo $row['many'];
}
?>