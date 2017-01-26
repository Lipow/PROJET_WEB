<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Formulaire Particulier</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php require("html/header.html"); ?>
  <div>
    <form id="FormPA" name ="formPA" action="traitement.php" method="post" enctype="multipart/form-data" >
      <label for="civilite">Civilité * :  </label>
      <input type= "radio" name="civilite"> Madame
      <input type= "radio" name="civilite"> Monsieur<br/>
      <div class="erreur">Veuillez indiquer votre civilité.</div>
      <label for="prenom">Prénom * :  </label>
      <input type = "text" name="prenom" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer un prénom valide.</div>
      <label for="nom">Nom * :  </label>
      <input type = "text" name="nom" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer un nom valide.</div>
      <label for="adresse1">Adresse1 * :  </label>
      <input type = "text" name="adresse1" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer une adresse.</div>
      <label for="adresse2">Adresse2 * :  </label>
      <input type = "text" name="adresse2" class="form-control"/><br/>
      <label for="codepostal">Code Postal * :  </label>
      <input type = "text" name="codepostal" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer un code postal existant.</div>
      <label for="ville">Ville * :  </label>
      <select name="ville" size="1" class="form-control"></select><br/>
      <div class="erreur">Veuillez choisir une ville de la liste.</div>
      Remplissez au moins un numéro de téléphone *<br/>
      <div class="erreur">Veuillez indiquer au moins un numéro de téléphone.</div>
      <label for="telephonefixe">Téléphone Fixe :  </label>
      <input type = "text" name="telephone fixe" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer un numéro de téléphone valide.</div>
      <label for="telephoneportable">Téléphone Portable :  </label>
      <input type = "text" name="telephoneportable" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer un numéro de téléphone valide.</div>
      <label for="email">Email * :  </label>
      <input type = "text" name="email" class="form-control"/><br/>
      <div class="erreur">Veuillez indiquer un email valide.</div>
      * champs à saisie obligatoire<br/>
      <button class="btn-default form-control" type="submit" name="valider">Valider</button>
    </form>
  </div>
</body>
</html>
