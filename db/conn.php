<?php
    $host = 'localhost';
    $db = 'ojaswi_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    /*$host = 'remotemysql.com';
    $db = '0uGBFuHa8p';
    $user = '0uGBFuHa8p';
    $pass = 'UTaQR1SXYU';
    $charset = 'utf8mb4';*/

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin", "password");
?>
