<html>
    <head>
        <title>Create Todo list</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <div class="container">
        <h1 class="listtodo">Create Todo List</h1>
    <form method="post" action="form.php">
           <p class="abouttodo">Title the Todo Task: </p>
            <input name="todoTitle" type="text">
            <p class="abouttodo">Describe the Todo Task: </p>
            <input name="todoDescription" type="text">
            <br>
            <input type="submit" value="Submit" name="submit" class="isubmit">
    </form>

    <button class="available"><a href="index.php">View Available Tasks</a></button>
</div>
    </body>
</html>

<?php

// request db_connect.php 
require_once("db_connect.php");
// Check if user clicks submit

if(isset($_POST['submit'])) { 
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];
   
    //Connect to my database
    db(); // call function to connect to db
    global $link;
    // model query
    $query = "INSERT INTO todo(todoTitle, todoDescription, date) 
             VALUES ('$title', '$description', now() )";
 
                //insert query into db
            $insertTodo = mysqli_query($link, $query);

            //Test success 
            if($insertTodo) {
                echo "<br><h4>Success! You've just added a new task</h4>";
            } else {
                echo mysqli_error($link);
            }
            mysqli_close($link);
}



?>
