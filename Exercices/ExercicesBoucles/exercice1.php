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