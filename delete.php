<?php 
require_once("db_connect.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    db();
    global $link;
    $query = "DELETE FROM todo WHERE id = '$id'";
    $delete = mysqli_query($link, $query); 

    if($delete) {
        echo "Todo has been deleted";
        
    }
} ?>

<html>
<title></title>
<body>
    <br><button type="button"><a href="index.php">Return to Todo List</a></button>
</body>
</html>