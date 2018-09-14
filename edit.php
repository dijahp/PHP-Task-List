<?php

require_once 'db_connect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT todoTitle, todoDescription FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todoDescription'];
            echo "
                <h2>Edit your Todo</h2>
                
            <form action='edit.php?id=$id' method='post'>
            <p>Title the Todo Task:</p>
             <input type='text' name='title' value='$title'>
             <p>Describe the Todo Task:</p>
             <input type='text' name='description' value='$description'>
             <br>
             <input type='submit' name='submit' value='edit'>
            </form>
            ";
        }
    }else{
        echo "no todo";
    }
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        db();
        $query = "UPDATE todo SET todoTitle = '$title', todoDescription = '$description'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $query);
        if($insertEdited){
            echo "This has been successfully updated. Page will refresh in 5 seconds";
            $page = "index.php";
    $sec = "5";
        header("Refresh: $sec; url=$page");
        }
        else{
            echo mysqli_error($link);
        }
    }
}
