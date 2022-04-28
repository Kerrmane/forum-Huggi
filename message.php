<?php
// connexion à la base de données 
require('connexion.php');

// affichage du sujet 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sujet = $bdd->query("SELECT * FROM sujet WHERE id_sujet = '$id'");
    $sujet->execute();
    $sujets = $sujet->fetchAll();
    // affichage du sujet 
    $message = $bdd->query("SELECT * FROM messages WHERE id_sujet = '$id'");
    $message->execute();
    $messages = $message->fetchAll();


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>forum Huggi</title>
</head>
<body>
    <!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h3><img src="https://clipartmag.com/images/question-and-answer-images-1.jpg" alt="" width="40" height="34" class="d-inline-block align-text-top">
      Forum Huggi</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
  </div>
</nav>
<!-- navbar  -->

<?php  foreach ($sujets as $unSujet):?>
    <div class="container  justify-content-center ">
        <div class="card mt-5 bg-secondary bg-gradient">
            <div class="text-center my-3">
            <img class="bd-placeholder-img rounded-circle" src="https://1.bp.blogspot.com/-eRVNB5_7N5E/XnHMj7MwU8I/AAAAAAAA9Vo/ZbdXmdKCdZwYKwjzrozzFF9HKABGqL0gQCLcBGAsYHQ/s1600/ios-14-code-iphone-3d-sensor.jpg" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></img>
                 <h2><?php echo $unSujet['titre_sujet']; ?></h2>
                 <p><?php echo $unSujet['sujet_contenu']; ?></p>
                 <p class="position-absolute bottom-0 end-0"><?php echo "publié le : " . $unSujet['date_sujet'] . " à ". $unSujet['heure_sujet'] ; ?></p>
            </div>
        </div>
    </div>

<?php  endforeach ;?>


    <div class="container  justify-content-center">
    <div class="card ">
<?php  foreach ($messages as $unMessage):?>
       <div class="d-flex flex-row p-3 mb-2 bg-primary bg-gradient "> <img src="https://th.bing.com/th/id/OIP.T9s09Pl74H7Yzy0Wdj5ZjQHaHa?pid=ImgDet&rs=1" width="30" height="30" class="mx-1"><?php echo $unMessage['message_contenu']; ?></div>
<?php  endforeach ;?>
    <form method="POST">
        <div class="form-group"> <textarea class="form-control" rows="3" placeholder="ecrire ton message ..." name="message"></textarea> </div>
    </div>
    <button type="submit" class="btn btn-primary my-3 " name="envoyer"> Envoyer</button>
    </div>
    </form>



</body>
</html>
<?php
if(isset($_POST['message']) && isset($_POST['envoyer'])){
    $message =$_POST['message'];
    $heure = date("H:i:s");
    $date = date("Y-m-d");
    $id=$_GET['id'];

    try {


        $sql = "INSERT INTO `messages` (`id_message`, `id_util`, `id_sujet`, `dateMessage`, `heureMessage`, `message_contenu`) 
        VALUES
         (NULL, NULL, '$id', '$date', '$heure', '$message')"; 
        $bdd->exec($sql);
        echo "publication de sujet avec succés !";
        header("location:message.php?id=$id");
        
       
        
    }
        
    catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
    }
  
    
} 

 $bdd=null; 

 ?>
