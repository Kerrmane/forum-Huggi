<?php
try {
    $user="root";
    $pass="";
    $bdd = new PDO('mysql:host=localhost;dbname=forumhuggi', $user, $pass);
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage();
    die();
}
?>