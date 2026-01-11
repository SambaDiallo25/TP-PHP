<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="">Entrez le nombre</label>
            <input type="text" name="nb">
            <button type="submit" name="btn1">Afficher table</button>
            <!-- <button type="submit" name="btn2">test</button> -->
        </div> 
    </form>

    <?php
    // Variables Super globales Ex : $_POST, $_GET, $_SESSION, etc...
     if (isset($_POST['btn1'])) {
        $nombre = $_POST['nb']; //Permet de recupérer la valeur saisie dans le champ de name='nb'
        table_mult($nombre);
     }
    // Creation de la fonction
        function table_mult($x){
            if ($x > 0) {
                echo "<div>Table de multiplication de $x</div>";
                for ($i=1; $i <= 10 ; $i++) { 
                    echo "$x x $i = ".$x*$i."<br>";
                }
            }
        }
    // Appel de fonction
    // table_mult(5);
    ?>
</body>
</html>