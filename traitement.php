<?php
session_start();
// connexion à ma base de données
// Vérification des champs du formulaire en php en complément du js
function verifText($value,$min)
{
  settype($min,"int");
    if(strlen($value)<$min))
    {
      return false;
    }
    else
    {
      return true;
    }
}

function verifAdresse($value)
{
  preg_match(/^"[0-9a-z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$"/); # tous les chiffres, lettres de l'alphabet et caractères spéciaux possibles de 1 à 50 caractères
  if(!preg_match($value))
  {
    return false;
  }
  else
  {
    return true;
  }
}

function verifNum($value)
{
  preg_match(/^[0-9]{5,5}$/); # Tous les chiffres de 0 à 9 au minimum 5 caracteres et maxi 5 caracteres
  if(!preg_match($value))
  {
      return false;
  }
  else
  {
      return true;
  }
}

function verifMail($value)
{
  preg_match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/); #toutes les minuscules, majuscules, chiffres et .-_ avant le "@" idem apres et toutes les minuscules après le . de 2 à 4 caracteres
  if(!preg_match($value))
  {
  return false;
  }
  else
  {
    return true;
  }
}

function verifTel($value);
{
  preg_match(\^(\d\d\s){4}(\d\d)$\); # 4 premiers nombre, deux chiffres entre 0 et 9 ("d" = raccourci) suivi d'un espace à chaque fois et le dernier nombre, deux chiffres
  if(!preg_match($value))
  {
    return false;
  }
  else
  {
    return true;
  }
}

function verifForm($value)
{
  $compteur=0;
  $civiliteOk=verifRadio($_POST["civilite"]);
  $nomOk=verifText($_POST["nom"],2);
  $prenomOk=verifText($_POST["prenom"],2);
  $adresseOk=verifAdresse($_POST["adresse1"]);
  $codePostalOk=verifNum($_POST["codepostal"]);
  $emailOk=verifMail($_POST["email"]);
  if(!empty($_POST["telephone1"])){
    $telephone1Ok=verifTel($_POST["telephone1"]);
  }
  else if (!empty($_POST["telephone2"])){
    $telephone2Ok=verifTel($_POST["telephone2"]);
  }
  else {
    $telephoneErreur=TRUE;
  }
}

verifForm($_POST);




require('class/bdd.php');

# si l'email de la session correspond à l'email enregistré dans le post et que c'est une société on enregistre les données dans la bdd
if($_SESSION["email"] == $_POST["email"])
{
  if ($_SESSION["isSociete"] == 1)
  {
    $req = $bdd->prepare("INSERT INTO client(id_client, Civilite, Nom, Prenom, Adresse1, Adresse2, CodePostal, Ville, Telephone, Telephone2, Email, Is_Societe, Fonction, id_societe) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $req->execute(array(
      htmlspecialchars($_POST['civilite']),
      htmlspecialchars($_POST['nom']),
      htmlspecialchars($_POST['prenom']),
      htmlspecialchars($_POST['nomSociete']),
      htmlspecialchars($_POST['fonction']),
      htmlspecialchars($_POST['adresse1']),
      htmlspecialchars($_POST['adresse2']),
      htmlspecialchars($_POST['codepostal']),
      htmlspecialchars($_POST["ville"]),
      htmlspecialchars($_POST['telephone1']),
      htmlspecialchars($_POST['telephone2']),
      htmlspecialchars($_POST['email'])
    ));
  }
  else
  {
    # sinon on enregistre les données dans la bdd

    $req = $bdd->prepare("INSERT INTO client(Civilite, Nom, Prenom, Adresse1, Adresse2, CodePostal, Ville, Telephone, Telephone2, Email) VALUES (?,?,?,?,?,?,?,?,?,?)");

    echo $_POST["civilite"];

    $req->execute(array(
      htmlspecialchars($_POST['civilite']),
      htmlspecialchars($_POST['nom']),
      htmlspecialchars($_POST['prenom']),
      htmlspecialchars($_POST['adresse1']),
      htmlspecialchars($_POST['adresse2']),
      htmlspecialchars($_POST['codepostal']),
      htmlspecialchars($_POST['ville']),
      htmlspecialchars($_POST['telephone1']),
      htmlspecialchars($_POST['telephone2']),
      htmlspecialchars($_POST['email'])
    ));
  }

  if ($req)
  {
    header("LOCATION: contactRegister.php");
  }
  else
  {
    header("LOCATION: dontReg.php");
  }
}
else
{
    header("LOCATION: connexionError.php");
}

$enregistrement = $bdd->query('INSERT INTO client ()');

if(isset($_POST["envoyer"])) {


?>
