<?php
try {
    $handler = new PDO('mysql:host=127.0.0.1;dbname=DATABASE_NAME_GOES_HERE','DATABASE_USER_GOES_HERE','DATABASE_PASSWORD_GOES HERE');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}