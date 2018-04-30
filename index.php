<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <!--jquery cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--myscript-->
    <script src="script.js?1=<?php echo time();?>"></script>
    <!--bootstrap css library-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!--mycss-->
    <link rel="stylesheet" href="todo.css?1=<?php echo time();?>">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12 heading"><h1 class="heading">todolist</h1></div>
        <div class="panelx row col-md-12">
            <div class="col-md-3 navigation-panel">
                    <li class="header" onclick="subnav1()"><b><span style="color:#45d645;"><i class="fas fa-filter"></i></span>&nbsp;Filters</b></li>
                    <div class="subnav" id="subnav1" style="display:none;">
                        <li onclick="ajax(this.id)" id="inbox" path="inbox"><span style="color:#ffc107;"><i class="fas fa-inbox"></i></span>&nbsp;<a>inbox</a>
                            <div id="todo-badge-inbox" style="float:right;">
                            <span class='badge-inbox todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from inbox';
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result); 
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div>
                        </li>
                        <li onclick="ajax(this.id)" id="today" path="today"><span style="color:#7480d0;"><i class="fas fa-file-medical-alt"></i></span>&nbsp;<a>today</a>
                        <div id="todo-badge-today" style="float:right;">
                            <span class='badge-today todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from today'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div>
                        </li>
                        <li onclick="ajax(this.id)" id="next" path="next"><span style="color:#45d645;"><i class="fas fa-angle-double-right"></i></span>&nbsp;<a>next</a>
                        <div id="todo-badge-next" style="float:right;">
                            <span class='badge-next todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from next'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div>                        
                        </li>
                    </div>
                    <li class="header" onclick="subnav2()"><span style="color:#3f51b5;"><i class="fas fa-file-alt"></i></span>&nbsp;<b>Project</b></li>
                    <div class="subnav" id="subnav2" style="display:none;">
                        <li onclick="ajax(this.id)" id="work" path="work"><span style="color:#ffc107;"><i class="fas fa-folder-open"></i></span>&nbsp;<a>Work</a>
                        <div id="todo-badge-work" style="float:right;">
                            <span class='badge-work todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from work'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div> 
                        </li>
                        <li onclick="ajax(this.id)" id="home" path="home"><span style="color:#d01be6;"><i class="fas fa-home"></i></span>&nbsp;<a>Home</a>
                        <div id="todo-badge-home" style="float:right;">
                            <span class='badge-home todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from home'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div> 
                        </li>
                        <li onclick="ajax(this.id)" id="study" path="study"><span style="color:#a52a2a"><i class="fas fa-basketball-ball"></i></span>&nbsp;<a>Study</a>
                        <div id="todo-badge-study" style="float:right;">
                            <span class="badge-study todobadge">
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from study'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div> 
                        </li>
                        <li onclick="ajax(this.id)" id="personal" path="personal"><span style="color:#ffc107;"><i class="fas fa-star"></i></span>&nbsp;<a>Personal</a>
                        <div id="todo-badge-personal" style="float:right;">
                            <span class='badge-personal todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from personal'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div> 
                        </li>
                        <li onclick="ajax(this.id)" id="shoppinglist" path="shoppinglist"><span style="color:#45d645;"><i class="fas fa-shopping-bag"></i></span>&nbsp;<a>Shopping list</a>
                        <div id="todo-badge-shoppinglist" style="float:right;">
                            <span class='badge-shoppinglist todobadge'>
                                    <?php
                                        include('config.php');
                                        $query = 'select count(id) as many from shoppinglist'; 
                                        $result = mysqli_query($conn , $query);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['many'];
                                    ?>
                            </span>
                            </div> 
                        </li>
                    </div>
                    <li class="header"><span style="color:tomato;"><i class="fas fa-plus-circle"></i></i></span>&nbsp;Add new project</li>
                    <li class="header"><span style="color:grey"><i class="fas fa-trash-alt"></i></span>&nbsp;<b>Recycle</b></li>
            </div>
            <div class="col-md-8 changes-panel">
                <p class="text-capitalize display-3">start your todo..</p>
            </div>
        </div>
    </div>
</body>
</html>