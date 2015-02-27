<?php
try {
    $handler = new PDO('mysql:host=127.0.0.1;dbname=threefive','root','UnPreDic7able');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
