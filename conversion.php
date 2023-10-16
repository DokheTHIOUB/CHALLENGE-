<?php
session_start();

function conversion($montant) {
    $taux_de_change = 0.001524; 
    $valeur_francs = intval($montant); 

    if ($valeur_francs <= 0) {
        return "Entrer un nombre positif";
    }

    $valeur_euro = $taux_de_change * $valeur_francs;
    return $valeur_euro;
}

$resultat = ""; 

if (isset($_GET["submit"])) {
    $valeur_francs = intval($_GET["francs"]);
    
    $resultat = conversion($valeur_francs);
    if (is_numeric($resultat)) {
        $resultat = number_format($resultat, 2); 
    } else {
        echo $resultat;
    }
    
    if (!isset($_SESSION['historiqueMontants'])) {
        $_SESSION['historiqueMontants'] = array();
    }
    
    // Ajouter l'entrée dans l'historique avec la date et l'heure
    $_SESSION['historiqueMontants'][date('Y-m-d')] = $valeur_francs;
}
?>

<html>
<head>
    <title>Convertisseur de Francs en Euros</title>
    
</head>
<body>
    <h2>Convertisseur de Francs en Euros</h2>
    <form method="GET" action="">
        <label for="francs">Montant en Francs :</label>
        <input type="number" step="0.01" name="francs" id="francs" placeholder="Montant en Francs" required><br><br>
        <input type="submit" name="submit" value="Convertir"><br><br>
        <label for="euro">Montant en Euros :</label>
        <input type="text" name="euro" id="euro" placeholder="Montant en Euros" value="<?php echo $resultat; ?>" readonly>
    </form>
    <?php
    if (isset($_SESSION['historiqueMontants']) && count($_SESSION['historiqueMontants']) > 0) {
        echo "<h3>Historique des Montants Convertis :</h3>";
        echo "<ul>";
        foreach ($_SESSION['historiqueMontants'] as $date => $montant) {
            echo "<li>$date : $montant euro </li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
