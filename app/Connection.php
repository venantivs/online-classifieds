<?php
    try
    {
        $pdo = new PDO("mysql:host=localhost;dbname=AUTO_CLASSIFIEDS_DB;", "root", "");
    }
    catch(PDOException $e)
    {
        echo 'Ocorreu um erro com o banco de dados.' . $e;
        exit();
    }
?>