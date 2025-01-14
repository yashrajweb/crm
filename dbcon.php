<?php

    $con = mysqli_connect('localhost','root','','webmirchi_crm');

    if (!$con) {
        error_log("Connection Failed: ".mysqli_connect_error());
        die("Unable to connect");
    }

?>