<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2 Form & Table</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <h1 class="text-center text-primary">TP Form & Table</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <form method="post">
                        <div class="card-header">Ajout Personne</div>
                        <div class="card-body">
                            <div>
                                <label for="prenom">Prénom</label>
                                <input class="form-control" type="text" name="prenom" id="prenom">
                            </div>
                            <div>
                                <label for="nom">Nom</label>
                                <input class="form-control" type="text" name="nom" id="nom">
                            </div>
                            <div>
                                <label for="adr">Adresse</label>
                                <input class="form-control" type="text" name="adr" id="adr">
                            </div>
                            <div>
                                <label for="tel">Téléphone</label>
                                <input class="form-control" type="text" name="tel" id="tel">
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liste des personnes</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>