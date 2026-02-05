<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

<?php
$taches = [];

if (file_exists("taches.json")) {
    $contenu = file_get_contents("taches.json");
    $taches = json_decode($contenu, true);
}
if (isset($_POST['btnAjout'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];
    $responsable = $_POST['responsable'];
    
    $nouvelleTache = [
        "nom" => $nom,
        "description" => $description,
        "statut" => $statut,
        "responsable" => $responsable
    ];
    
    $taches[] = $nouvelleTache;
    
    $json = json_encode($taches, JSON_PRETTY_PRINT);
    file_put_contents("taches.json", $json);
}

if (isset($_POST['btnSupprimer'])) {
    $position = $_POST['position'];
    array_splice($taches, $position, 1);
    
    $json = json_encode($taches, JSON_PRETTY_PRINT);
    file_put_contents("taches.json", $json);
}

$tacheModif = [];
$positionModif = [];

if (isset($_POST['btnModifier'])) {
    $positionModif = $_POST['position'];
    $tacheModif = $taches[$positionModif];
}

if (isset($_POST['btnEnregistrer'])) {
    $position = $_POST['position'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];
    $responsable = $_POST['responsable'];
    
    $taches[$position]['nom'] = $nom;
    $taches[$position]['description'] = $description;
    $taches[$position]['statut'] = $statut;
    $taches[$position]['responsable'] = $responsable;
    
    $json = json_encode($taches, JSON_PRETTY_PRINT);
    file_put_contents("taches.json", $json);
}
?>

<div class="container-fluid mt-4">
      <div class="row">
  <div class="col-md-4">
  <div class="card">
  <div class="card-header bg-primary text-white h5">
  <?php if ($tacheModif): ?>
    Modifier Tâche
    <?php else: ?>
      Ajout Tâche
    <?php endif; ?>
     </div>
   <div class="card-body">
    <form method="post">
                            
    <?php if ($tacheModif): ?>
      <input type="hidden" name="position" value="<?= $positionModif ?>">
      <?php endif; ?>
      <!-- Nom -->
      <div class="mb-3">
        <label class="form-label">Nom</label>
       <input type="text" name="nom" class="form-control" value="<?= $tacheModif ? $tacheModif['nom'] : '' ?>" required>
        </div>
                            
          <!-- Description -->
      <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="4" required><?= $tacheModif ? $tacheModif['description'] : '' ?></textarea>
      </div>
                            
      <!-- Statut -->
      <div class="mb-3">
      <label class="form-label">Statut</label>
       <select name="statut" class="form-select">
      <option value="En cours" <?= ($tacheModif && $tacheModif['statut'] == 'En_cours') ? 'selected' : '' ?>>En cours</option>
      <option value="Termine" <?= ($tacheModif && $tacheModif['statut'] == 'Termine') ? 'selected' : '' ?>>Terminé</option>
       </select>
      </div>
      <div class="mb-3">
      <label class="form-label">Responsable (Prénom & Nom)</label>
      <input type="text" name="responsable" class="form-control" value="<?= $tacheModif ? $tacheModif['responsable'] : '' ?>"  required>
      </div>

      <?php if ($tacheModif): ?>
      <button type="submit" name="btnEnregistrer" class="btn btn-warning w-100">Enregister</button>
       <button type="submit" class="btn btn-secondary w-100 mt-2">Annuler</button>
        <?php else: ?>
    <button type="submit" name="btnAjout" class="btn btn-primary w-100"> Enregistrer</button>
    <?php endif; ?>
 
</form>
  </div>
 </div>
</div>
 <div class="col-md-8">
  <div class="card">
  <div class="card-header bg-success text-white h5">Liste des Tâche</div>
  <div class="card-body">
    <?php if (empty($taches)): ?>
    <div class="alert alert-info text-center"> Aucune tâche enregistrée. Ajoutez-en une !</div>
      <?php else: ?>
    <div class="row">
     <?php foreach ($taches as $position => $t): ?>
      <div class="col-lg-4 col-md-6 mb-3">
      <div class="card h-100 border-primary">
   <div class="card-header bg-info text-white"><strong>Nom de la tâche</strong> </div>
  <div class="card-body">
    <h6 class="text-primary mb-3"> <?= $t['nom'] ?></h6>
    <p class="text-muted small mb-3"> <?= $t['description'] ?></p>
    <div class="mb-2">
      <strong>Statut :</strong>
     <?php if ($t['statut'] == 'Terminé'): ?>
    <span class="badge bg-success"> <?= $t['statut'] ?></span>
    <?php else: ?>
    <span class="badge bg-warning text-dark"><?= $t['statut'] ?></span>
    <?php endif; ?>
 </div>
  <div class="mb-3">
      <strong>Responsable :</strong><br>
    <span class="text-primary"><?= $t['responsable'] ?></span>
  </div>
 <div class="d-grid gap-2">
      <form method="post" class="d-inline">
      <input type="hidden" name="position" value="<?= $position ?>">
<button type="submit" name="btnModifier" class="btn btn-warning btn-sm w-100">Modifier </button>
</form>
<form method="post" class="d-inline" onsubmit="return confirm('Supprimer cette tâche ?')">
<input type="hidden" name="position" value="<?= $position ?>">
 <button type="submit" name="btnSupprimer" class="btn btn-danger btn-sm w-100"> Supprimer</button>
</form>
  </div>
     </div>
       </div>
         </div>
          <?php endforeach; ?>
              </div>
         <?php endif; ?>
      </div>
      </div>
    </div>

    </div>
    </div>
</body>

</html>