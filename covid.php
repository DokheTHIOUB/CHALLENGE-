<?php
session_start(); // Démarrez la session

$score = 0; // Initialisez le score à zéro

if (isset($_POST['submit'])) {
    // Calculez le score en fonction des réponses
    $score += ($_POST['q1'] == 'Oui') ? 20 : 0;
    $score += ($_POST['q2'] == 'Oui') ? 20 : 0;
    $score += ($_POST['q3'] == 'Oui') ? 20 : 0;
    $score += ($_POST['q4'] == 'Oui') ? 10 : 0;
    $score += ($_POST['q5'] == 'Oui') ? 10 : 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Test COVID-19</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /*.container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }*/

        h2 {
            font-size: 24px;
            color: #333;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="radio"] {
            width: 40%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        
    </style>
</head>
<body>
<h2>Informations Personnelles</h2>
    <form method="POST" action=" ">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required><br><br>

        <label>Âge :</label><br>
        <input type="radio" name="age[]" value="0-18"> < 18 ans<br>
        <input type="radio" name="age[]" value="19-30"> 19-59 ans<br>
        <input type="radio" name="age[]" value="51+"> > 60ans <br>

        <label for="poids">Poids (en kg) :</label>
        <input type="number" step="0.01" name="poids" id="poids" required><br>
    <h2>Test COVID-19</h2>
    <form method="POST" action=" CHALENGE2 covid.php">
        <!-- Vos champs de formulaire ici -->
        <label for="q1">Question 1: Avez-vous de la fièvre ?</label><br>
        <input type="radio" name="q1" value="Oui"> Oui <br>
        <input type="radio" name="q1" value="Non"> Non<br>

        <label for="q2">Question 2: Avez-vous de la toux ?</label><br>
        <input type="radio" name="q2" value="Oui"> Oui<br>
        <input type="radio" name="q2" value="Non"> Non<br>

        <label for="q3">Question 3: Avez-vous des difficultés à respirer ?</label><br>
        <input type="radio" name="q3" value="Oui"> Oui<br>
        <input type="radio" name="q3" value="Non"> Non<br>

        <label for="q4">Question 4: Avez-vous voyagé récemment à l'étranger ?</label><br>
        <input type="radio" name="q4" value="Oui"> Oui<br>
        <input type="radio" name="q4" value="Non"> Non<br>

        <label for="q5">Question 5: Avez-vous été en contact avec des personnes atteintes du COVID-19 ?</label><br>
        <input type="radio" name="q5" value="Oui"> Oui<br>
        <input type="radio" name="q5" value="Non"> Non<br>

        <input type="submit" name="submit" value="Soumettre"><br>
    </form>

    <?php
    // Affichez le score
    if (isset($_POST['submit'])) {
        echo "<h2>Résultats du Test COVID-19</h2>";
        echo "Votre score est : $score";
        if ($score <= 50)
        {
            echo "Votre situation ne relève probablement pas du Covid-19.";
            echo "N’hésitez pas à contacter votre médecin en cas de doute. Vous pouvez refaire le test en cas de nouveau symptôme pour réévaluer la situation.";
        } else {
            echo "Votre situation peut relever d’un COVID 19.";
            echo "En attendant et pour casser les chaînes de transmission, nous vous conseillons de vous isoler et de respecter les gestes barrières pour protéger vos proches.";
        }
        
        echo "Merci d'avoir utilisé notre évaluation.";
    } 
    
    ?>
</body>
</html>
