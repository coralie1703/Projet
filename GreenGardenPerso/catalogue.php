<?php include 'header.php';
require 'functions.php';

?>


    
    <form class="recherche" method="post" action="">
        <label for="search_term">Rechercher un produit:</label>
        <input type="text" name="search_term" id="search_term">
        <input type="submit" name="search" value="Rechercher">
    </form>

    <h1>Catalogue</h1>

    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $dbname = "greengarden";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
    } catch (PDOException $e) {
        echo "Connection failed " . $e->getMessage();
    }
    if (isset($_POST['search'])) {
        $search_term = $_POST['search_term'];
        $sql = "select * from t_d_produit WHERE nom_court like :search 
    or nom_Long like :search";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search', '%' . $search_term . '%');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "<p>Résultats de recherche pour : " . $search_term . "</p>";
            echo "<ul  class='boite'>";
            while ($row = $stmt->fetch()) {
                echo "<div class='card'> <img src='img/{$row['Photo']}'<br>
                <h6>Nom produit : <a href='consult_produit.php?id={$row['Id_Produit']}'>
            {$row['Nom_court']}</h6>
            Description produit : {$row['Nom_Long']}<br>
            Prix HT: {$row['Prix_Achat']} € <br>
            </a></li></div>";
            }
            echo "</ul>";
        }
    } else {
        $sql = "select * from t_d_produit";
        $stmt = $conn->query($sql);

        if ($stmt->rowCount() > 0) {
            echo "<ul  class='boite'>";
            while ($row = $stmt->fetch()) {
                echo "<div class='card'> 
                <img class='img' src='img/{$row['Photo']}'<br>
                <h6>Nom produit : <a href='consult_produit.php?id={$row['Id_Produit']}'>
            {$row['Nom_court']}</h6></a></li>
            Description produit : {$row['Nom_Long']}<br>
            Prix {$row['Prix_Achat']} € <br>
            </div>";
            }
            echo "</ul>";

        }
    }

    ?>



<?php
include "footer.php";
?>