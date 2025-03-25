<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 
  $user = 'mysql';
  $mdp = 'mysql';
  $sql = "SELECT * FROM Contact";
   
  try{
   $PDO = new PDO("mysql:host=localhost;dbname=GRAD", $user, $mdp);
   $a = $PDO->query($sql);
   
   if($a === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
 <h1>Ma base de données </h1>
 <div id="tab">
 <table border="1" >
   <thead>
     <tr>
       <th>Nom</th>
       <th>Prenom</th>
       <th>Mail</th>
       <th>Ville</th>
       <th>Code Postal</th>
       <th>Téléphone</th>
       <th>Message </th>
       <th>Etat</th>
       <th></th>
       <th>id</th>
     </tr>
   </thead>
   <body>
     <?php while($row = $a->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo ($row['Nom']); ?></td>
       <td><?php echo ($row['Prenom']); ?></td>
       <td><?php echo ($row['Mail']); ?></td>
       <td><?php echo ($row['Ville']); ?></td>
       <td><?php echo ($row['Codepostale']); ?></td>
       <td><?php echo ($row['Telephone']); ?></td>
       <td><?php echo ($row['Messag']); ?></td>
       <td id="etat_<?php echo $row['id']; ?>"><?php echo $row['Etat']; ?></td>
       <td><select name="etat" class="etat-select" data-id="<?php echo $row['id']; ?>">
       <option value="Nontraite">Non traité</option>
       <option value="Traite">Traité</option>
       <option value="Encours">En cours</option>
        </select>
      <td><?php echo ($row['id']); ?></td>

     </tr>
     <?php endwhile; ?>
     </table>
     <div id="tab">

    
     <script>
    document.addEventListener("DOMContentLoaded", function () {
        var container = document.getElementById("tab");

        if (container) {
            container.addEventListener("change", function (event) {
                var target = event.target;

                if (target.classList.contains("etat-select")) {
                    var selectedValue = target.value;
                    var dataId = target.getAttribute("data-id");

                    document.getElementById('etat_' + dataId).textContent = selectedValue;

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "update.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4) {
                            console.log("Réponse du serveur : " + xhr.responseText);
                            if (xhr.status == 200) {
                                console.log("Mise à jour réussie pour l'ID : " + dataId);
                            } else {
                                console.error("Erreur lors de la mise à jour pour l'ID : " + dataId);
                            }
                        }
                    };
                    xhr.send("id=" + dataId + "&etat=" + selectedValue);
                }
            });
        } else {
            console.error("L'élément avec l'ID spécifié n'a pas été trouvé.");
        }
    });
</script>
   </body>
   
</body>
</html>