<?php
    // dbconnect.php

    $db = mysqli_connect('localhost', 'root', 'mysql', 'cebu_log')
      or die(mysqli_connect_error());

    mysqli_set_charset($db, 'utf8');
 ?>
