<?php
require_once "connexion.php";
if(isset($_POST['valide'])){
    extract($_POST);
    $sql = "INSERT INTO etudiant(matricule,nom,prenom,daten,sexe,adresse) VALUES('$mat','$nom_etd','$prenom_etd','$date_nais','$sexe','$adresse') ";
    $res = mysqli_query($connect,$sql);
    if($res){
        echo "<p> Etudiant <span style='color:red;'>".$nom_etd .' '.$prenom_etd."</span> est enregistré avec succés</p> ";
        echo "<a href ='liste.php'>Retour a Page D'accueil</a>";
    }else{
        echo "<p> erreur de d'enregistrement d'etudaint <span style='color:red;'>".$nom_etd . $prenom_etd."</span> </p> ";
        echo "<a href ='liste.php'>Retour a Page D'accueil</a>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style='background-color: #fff;'>
    
</body>
</html>