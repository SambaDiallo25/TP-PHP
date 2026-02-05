<?php
// Déclarer le tableau de toutes les taches
$taches = [];
// Lire le fichier json 
$jsonFileContent = file_get_contents("taches.json");
// Mettre le contenu du fichier json dans le tableau $tabPersonnes
$taches = json_decode($jsonFileContent,true); // Convertir le contenu json en tableau associatif
//Ajout dans le tableau
if (isset($_POST['btnAjout'])) { // Vérifier si la clé btnAjout existe dans le tableau $_POST (Si on a cliqué sur le bouton Ajouter)
    //   Recupération des valeurs des champs du formulaire
    
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];

    //    Créer un tableau associatif pour une seule personne
    $tache = [
        "titre" => $titre,
        "description" => $description,
        "statut" => $statut
    ];
    // Ajouter la nouvelle personne dans le tableau
    $taches[] = $tache;
    
    
    // Reconvertir le tableau en json
    $nouveauJson = json_encode($taches, JSON_PRETTY_PRINT);
    file_put_contents("taches.json", $nouveauJson);

}
    //Suppression dans le tableau
 if (isset($_GET['indice'])) {
    $indice = $_GET['indice'];
   $newtab= array_splice($taches, $indice, 1); //permet de supprimmer un élement au niveau de l'indice spécifié et de rétourner le nouveua tableau

    $nouveauJson = json_encode($taches, JSON_PRETTY_PRINT);
    file_put_contents("taches.json", $nouveauJson);
    //Redirection vers la page
    header("location: TP2.php");
 }
//Modification dans le tableau
$tache_a_modifier=[];
if (isset($_GET['indiceM'])) {
    $indice= $_GET['indiceM']; //récuperer l'indice de la tache
    $tache_a_modifier= $taches[$indice]; //récuperer la tache dans le tableau
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <div class="card col-6 offset-3 mt-5">
        <div class="card-header h2">Ajouter une tache</div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Titre</label>
                    <input value="<?= $tache_a_modifier['titre'] ?? '' ?>" type="text" name="titre" class="form-control" id="exampleFormControlInput1" placeholder="Titre du livre">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea  value="<?= $tache_a_modifier['description'] ?? '' ?>" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                <select value="<?= $tache_a_modifier['statut'] ?? '' ?>" name="statut" id="statut">
                    <option value="en_cours">En cours</option>
                    <option value="termine">Terminé</option>
                </select>
                </div>

                 <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Responsable</label>
                    <input value="<?= $tache_a_modifier['Responsable'] ?? '' ?>" type="text" name="Responsable" class="form-control" id="exampleFormControlInput1">
                </div>
                <button type="submit" name="btnAjout" class="btn btn-primary">ajouter la tache</button>
            </form>
        </div>
    </div>
    <h1>Liste des taches</h1>
    <?php foreach ($taches as $key => $tache) :?>
    <div class="card">
  <div class="card-header">
    
    Tache
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $tache['titre'] ?></h5>
    <p class="card-text"><?= $tache['description'] ?></p>
    <p class="card-text">Statut: <?= $tache['statut'] ?></p>
    <a class="btn btn-warning" href="?indiceM=<?= $key ?>">Modifier</a>
    <a onclick="return confirm('voulez vous supprimmer cette tache ?')" class="btn btn-danger" href="?indice=<?= $key ?>">Supprimer</a>
  </div>
</div>
    <?php endforeach; ?>
</body>

</html>