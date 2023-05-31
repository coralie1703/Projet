<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
echo "<table>";
// Boucle externe pour les nombres de 1 à 12
for ($i = 1; $i <= 12; $i++) {
  echo "<tr>";
  // Boucle interne pour les multiples de 1 à 12
  for ($j = 1; $j <= 12; $j++) {
    // Calcul du produit et affichage dans une cellule du tableau
    $produit = $i * $j;
    echo "<td>" . $i . " x " . $j . " = " . $produit . "</td>";
  }
  echo "</tr>";
}
echo "</table>";
?>

</body>
</html>