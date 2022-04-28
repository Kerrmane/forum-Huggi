<?php
// connexion à la base de données 
require('connexion.php');

// appeler tous les sujet dans sujet de la bdd
$sujet = $bdd->query("SELECT * FROM sujet ORDER BY date_sujet");
$sujet->execute();
$sujets = $sujet->fetchAll();

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
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        
        <a class="nav-link" href="ajouteSujet.php">Publier un sujet</a>
        <a class="nav-link" href="#"></a>
        
      </div>
    </div>
  </div>
</nav>
<!-- navbar  -->



    <div class="container my-5 ">
    <div class="row">
    <?php  foreach ($sujets as $unSujet):?>
    <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" src="https://1.bp.blogspot.com/-eRVNB5_7N5E/XnHMj7MwU8I/AAAAAAAA9Vo/ZbdXmdKCdZwYKwjzrozzFF9HKABGqL0gQCLcBGAsYHQ/s1600/ios-14-code-iphone-3d-sensor.jpg" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/></img>
        <h2><?php echo $unSujet['titre_sujet']; ?></h2>
        <p><?php echo $unSujet['sujet_contenu']; ?></p>
        <p>publier le : <?php echo $unSujet['date_sujet']; ?></p>
        <p><a class="btn btn-primary" href="message.php?id=<?php echo $unSujet['id_sujet']; ?>">voir les messages</a></p>
    </div><!-- /.col-lg-4 -->
    <?php  endforeach ;?>

    </div><!-- /.row -->
    </div><!-- /.container -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>