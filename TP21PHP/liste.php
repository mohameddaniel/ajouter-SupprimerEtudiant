<?php
  require_once "connexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        
        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #e3e3e3;
        }
        
        td:last-child {
            text-align: center;
        }
        
        a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Liste des étudiants</h1>
    <table border="1">
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Sexe</th>
            <th>Adresse</th>
            <th>Action</th>
        </tr>
        <?php
         $sql = "SELECT *FROM etudiant" ;
         $res = mysqli_query($connect,$sql);
         $count = mysqli_num_rows($res);
         $num = $count;
         while($count>0){
            $data = mysqli_fetch_assoc($res);
            extract($data);
            echo "<tr><td>".$matricule."</td>";
            echo "<td>".$nom."</td>";
            echo "<td>".$prenom."</td>";
            echo "<td>".$daten."</td>";
            if($sexe == 'M')
           { echo "<td>Masculin</td>";}
            else
           { echo "<td>Fiminin</td>";}
           echo "<td>".$adresse."</td>";
           echo "<td><a href='Mod.php?mat_sup=$matricule'>Supprmer</a> / <a href='Mod.php?mat_mod=$matricule''>Modifier</a></td>";
           $count--;
          
         }
         echo "</tr></table><br>";
         echo "<hr><pre>";
         echo "<p style='text-align: center'><a href='form.html'p style='color:red;font-size:15px;text-decoration: underline;'>Ajouter un Etudiant</a>";
         echo " (le nombre des etudiants inscrits est<b>".$num.")</b><br>";
         mysqli_free_result($res);
         mysqli_close($connect);
        ?>
    
</body>
</html>
