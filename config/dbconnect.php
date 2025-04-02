<?php
    // Host name, database username, password, and database name
    $conn = mysqli_connect("localhost","root","","bilabilamart");

    // Check connection
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>