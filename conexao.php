<?php
$conn = new \PDO('mysql:host=local.focel.com.br;dbname=focel', 'root', '');
$conn->exec("set names utf8");

session_start();