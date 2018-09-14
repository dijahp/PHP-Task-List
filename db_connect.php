<?php 
// Call db function 
function db() {
    global $link; //global function is available outside of the function 

    // mysqli_connect takes in 4 arguements: the servername, username, password and the database
    $link = mysqli_connect("localhost", "root", "", "todolist") or
    die("couldn't connect to the database");
    return $link;
}

// Test if connected 

/* if(db()){
 *    echo "I'm connected";
*/ 