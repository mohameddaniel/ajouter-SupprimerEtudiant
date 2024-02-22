<h1 style="text-align: center;font-family: Arial, Helvetica, sans-serif;background-color: yellow;">Modification D'un Etudiant</h1>
<?php  
require_once "connexion.php";

if(isset($_POST['modif'])){
    extract($_POST);
    $update = "UPDATE etudiant SET  nom = '$nom_etd',  
    prenom = '$prenom_etd',
    daten = '$date_nais',
    sexe = '$sexe',
    adresse = '$adresse' WHERE  matricule='$mat'" ;
    $result = mysqli_query($connect,$update);
    if($result){
        echo "<p style='text-align: center;'>L'etudiant <span style='color:red'>".$nom_etd." ".$prenom_etd."</span> Modifier avec succés</p>";
        echo "<p style='text-align: center'><a href='liste.php' style='color:red;font-size:15px;text-decoration: underline;'>Retour a la page d'accueil</a></p>";
    }
    mysqli_close($connect);
    unset($_GET);
}


if(isset($_GET['mat_mod']))
{
  $matr = $_GET['mat_mod'];
  $sql = "SELECT *FROM etudiant WHERE matricule = '$matr'";
  $res = mysqli_query($connect,$sql);
  $count = mysqli_num_rows($res);
  if($count==0){
      echo "<p style='text-align: center;'>L'etudiant <span style='color:red'>aucun Etudiant avec le matricule".$matr."/p>";
      echo "<p style='text-align: center'><a href ='liste.php'>retour a la page d'ccueil</a></p>";
     
  
}else{
  $data = mysqli_fetch_assoc($res);
     extract($data);
 

?>
  
  <!DOCTYPE html>
  
  <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
    </head>
    <body>
  
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form table {
            width: 100%;
        }

        form table tr td {
            padding: 10px;
        }

        form label {
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="date"],
        form select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form input[type="submit"],
        form input[type="reset"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        form input[type="submit"]:hover,
        form input[type="reset"]:hover {
            background-color: #45a049;
        }

        form input[type="reset"] {
            margin-left: 8px;
            background-color: #f44336;
        }

        form input[type="reset"]:hover {
            background-color: #d32f2f;
        }

        form td.center {
            text-align: center;
        }
    </style>

   
    <form method="post" action="Mod.php">
        <table>
            <tr>
                <td><label for="matricule">Matricule:</label></td>
                <td><input type="text" value='<?php echo $matricule	;?>' name="mat"></td>
            </tr>

            <tr>
                <td><label for="nom_etd">Nom:</label></td>
                <td><input type="text" name="nom_etd" value='<?php echo $nom ;?>'></td>
            </tr>

            <tr>
                <td><label for="prenom_etd">Prenom:</label></td>
                <td><input type="text" name="prenom_etd" value='<?php echo $prenom ;?>'></td>
            </tr>
            <tr>
                <td><label for="date_nais">Date de Naissance:</label></td>
                <td><input type="date" name="date_nais" value='<?php echo $daten;?>'></td>
            </tr>

            <tr>
                <td><label for="sexe">Sexe:</label></td>
                <td>
                    <select name="sexe">
                        <option value="M" <?php if($sexe == 'M') echo 'selected' ?> >Masculin</option>
                        <option value="F" <?php if($sexe == 'F') echo 'selected' ?> >Féminin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse:</label></td>
                <td><input type="text" name="adresse" value='<?php echo $adresse  ;?>' ></td>
            </tr>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" value="Modifier" name="modif">
                   
                    <input type="reset" value="Effacer">
                </td>
            </tr>
        </table>
    </form>
<p style="text-align: center;border-color:aquamarine;"><a href="liste.php" style=" color:red;text-decoration: none;">Retour a la page d'accueil</a></p>
    
</body>
</html>

<?php
}}
if(isset($_GET['mat_sup'])){
    $m=$_GET['mat_sup'];
    $del = "DELETE FROM etudiant WHERE matricule= '$m'";
    $s = mysqli_query($connect,$del);
    if($s){
        header("Location:liste.php?action=ok&sup=$m");
    }else  header("Location:liste.php?action=notok&sup=$m");
    mysqli_free_result($s);
    mysqli_close($connect);
}


?>