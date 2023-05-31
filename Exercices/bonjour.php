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

 echo "<p>Hello World</p>";
 ?>


<?php // Dire si l'utilisateur est majeur ou non lorsqu'on rentre son age  ---------
    $age=25;

    (($age >=18) ?$reponse="majeur": $reponse="mineur");

    echo"Vous \n êtes ".$reponse.".";

    /*  on pourrait aussi écrire :
    $age=25;
    echo"vous êtes".(($age>=18)?"majeur":"mineur").".";
   */
?> 


<?php

// echo var_dump($_SERVER);
echo $_SERVER["SERVER_NAME"];

echo $_SERVER["REMOTE_ADDR"];

?>

<?php
$min = 0;
$max = 150;
 
$chiffresPairs = '';
 
for ($i = $min; $i <= $max; $i++) {
    if ( $i % 2 == 0 ) {
        $chiffresPairs .= $i.' ';
    }
}
 
echo "Les chiffres pairs compris entre $min et $max sont: $chiffresPairs";
?>


</body>
</html>