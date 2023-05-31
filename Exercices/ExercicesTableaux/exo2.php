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

$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
"", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
"Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"),
"19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
"Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage",
"Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""),
"19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
"Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
"Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation")
);

// Inverser ordre des éléments du tableau du groupe 19001 car array_search renvoie la 1ere clé du tableau de la valeur cherché, ici on cherche la dernière
$groupe_19001_inverse = array_reverse($a['19001'], true);

// Recherche dernière occurrence de "Stage" dans le tableau inversé
$position = array_search("Stage", $groupe_19001_inverse);

// Calculer position de "Stage" dans le tableau d'origine
$position_reelle = count($a['19001']) - $position - 1;

echo "La dernière occurrence de 'Stage' pour le groupe 19001 est à la position " . $position_reelle . ".";

?>
    
</body>
</html>