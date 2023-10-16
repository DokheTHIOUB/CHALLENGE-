<?php
session_start(); // Démarrer la session

// Récupérer le nom du projet depuis le paramètre d'URL
$nomProjet = $_GET['projet'];

// Recherchez le projet sélectionné dans la session
$projetSelectionne = null;
foreach ($_SESSION['projets'] as $projet) {
    if ($projet['nom'] === $nomProjet) {
        $projetSelectionne = $projet;
        break;
    }
}
?>
