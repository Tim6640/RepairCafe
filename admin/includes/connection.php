<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 31-1-2018
 * Time: 09:03
 */
try {
    $db = new PDO('mysql:host=localhost;dbname=repaircafe', 'root', '');
    foreach($db->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $db = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>
