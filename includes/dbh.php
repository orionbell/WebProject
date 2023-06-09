<?php

$db_server_name = 'localhost';
$db_user_name = 'root';
$db_user_passwd = 'MysqlServer#yishai';
$db_name = 'CS israel';


// Creating connection to the database
$conn = mysqli_connect($db_server_name,$db_user_name,$db_user_passwd,$db_name);

// the sql statment that needs to run
$sql_stmt = '';

//running the statment in the database
$result = mysqli_query($conn,$sql_stmt);


/* ***************  retriving the data  ****************** */

//returns the number of lines in the result
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    //returns the data from the database and itrating through it
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['column_name'];
    }
}

/// NEED TO LEARN PREPERD STATMENTS

