<?php

  session_start();
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $db = 'devzone';

  //database connection
  $connection = new mysqli($host, $username, $password, $db);

 ?>
