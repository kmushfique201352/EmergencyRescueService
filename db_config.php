<?php

$conn = mysqli_connect('localhost', 'sadik', 'test123', 'online_emergency');
if(!$conn) {
    echo 'Connection Error: ' . mysqli_connect_errno();
}

?>