<?php
require_once("db_connect.php") ?>
<html lang="en">
<head>
    <title>List of Todos</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="container">
    <h2 class="listtodo">List of Todos</h2>
    <p class="tasks">
    <a href="form.php" class="addtask">Add a Task</a>
    </p>
    <?php
    //READ db
    db();
    global $link;
    $query = "SELECT id, todoTitle, todoDescription, date FROM todo";
    $result = mysqli_query($link, $query);

    //Check if there is data inside the table
    if(mysqli_num_rows($result) >= 1) {
        //fetch in array and assign as variable row, as long as there is data
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $title = $row['todoTitle']; //fetch title
            $date = $row['date']; // fetch date
            ?>

            <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo "$title : $date" ?></a></li>
        <button type="button" class="editdel"><a href="edit.php?id=<?php echo $id?>">Edit</a></button>
        <button type="button" class="editdel"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>
     </ul>
     </div>
<?php
 }
}
?>

</body>
</html>