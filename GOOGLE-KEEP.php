<!doctype html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="design.css">
    <title>Liste des notes</title>
</head>
<body class="container">
<form action="GOOGLE-KEEP.php" method="post">
    <label for="nom"> <b>Nom</b></label><input name="nom" class="form-control" id="nom" type="text">
    <label for="note"><b>Note</b></label><input name="note" class="form-control" id="note" type="text"><br>
    <input type="submit" value="Envoyer" class="btn btn-primary"><br>
</form> <br>
<?php
session_start();
if (isset($_POST['nom'])) {
    if (isset($_SESSION['mesNotes'][$_POST['nom']])) {
        $_SESSION['error'] = "Note existante impossible de l'ajouter";
    } else {
        $_SESSION['mesNotes'][$_POST['nom']] = $_POST['note'];
        $_SESSION['succes'] = "Note " . $_SESSION['mesNotes'][$_POST['nom']] . " ajoutée avec succés";
    }
}
?>

<?php
if (!isset($_SESSION['mesNotes'])){
    ?>
    <div class="alert alert-danger">Liste Vide</div>
    <?php
} else {
?>
<?php if (isset($_SESSION['error'])) {
    ?>
    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
    <?php
    unset($_SESSION['error']);
}
?>

<?php if (isset($_SESSION['succes'])) {
    ?>
    <div class="alert alert-success"><?= $_SESSION['succes'] ?></div>
    <?php
    unset($_SESSION['succes']);
}
?>
<br> <h1>Liste des notes</h1>
<div class="row ">
    <?php foreach ($_SESSION['mesNotes'] as $titre => $contenu) { ?>

        <ul>
            <li>
                <a href="#">
                    <h2> <?= $titre ?></h2>
                    <p> <?= $contenu ?></p>

                </a>

            </li>

        </ul>
        <div class="text"> <a  href="deleteNote.php?key=<?=$titre ?>">X</a> </div>


    <?php } ?>
</div>

</body>
<?php } ?>

