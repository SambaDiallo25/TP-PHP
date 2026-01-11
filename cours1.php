<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  echo "<h1> Hello world !</h1>";
  echo '<h1>Hello world !</h1>';
  $a = 10;
  $b = 20;
  echo "a = $a et b = $b <br>"; 
  echo 'a = $a et b = $b <br>'; 
  echo 'a ='. $a .'et b = '.$b.'<br>';
  if($a > $b){
    echo "a est superieur a b";
    
  } elseif($a < $b){
    echo "a est inferieur a b";
  }else{
    echo "a est egal a b";
  }
  echo "<br>";
  for ($i=1;$i<=10;$i++){
      echo"$a *$i = ".$a *$i."<br>";
  }
  ?>
  <table><tr>
    table de prenom </tr>

  </table>
</body>
</html>