<?php
    $projets = [
           ['nom' => 'projet1',
            'description' => 'desc1',
            'activites' => [
                             [
                                    'nom' => 'activiteA',
                                    'description' => 'DescriptionA',
                                    'date' => '2023-10-05'
                            ],
                                  [
                                     'nom' => 'activiteB',
                                     'description' => 'DescriptionB',
                                     'date' => '2023-10-06'
                                  ],
                           ] 
            ],
             ['nom' => 'projet2',
                       'description' => 'desc2',
                       'activites' => [
                  [
                    'nom' => 'activiteA',
                    'description' => 'DescriptionA',
                    'date' => '2023-10-05'
                  ],
                  [ 'nom' => 'activiteB',
                    'description' => 'DescriptionB',
                    'date' => '2023-10-06'
                  ],

                                      ]
        ],
          [     
            'nom' => 'projet3',
            'description' => 'desc3',
            'activites' => [
                [
                    'nom' => 'activiteA',
                    'description' => 'DescriptionA',
                    'date' => '2023-10-05'
                ],
                [
                    'nom' => 'activiteB',
                    'description' => 'DescriptionB',
                    'date' => '2023-10-06'
                ],

            ]
         ]
    ];
    if (isset( $_POST['AJOUTER'])){
        $nomprojet=$_POST["projet"];
        $nomActivites=$_POST["activite"];
        $description=$_POST["description"];
        $date=$_POST=["date"]; 
          for ($i=0; $i<count($projets); $i++){
            if($projets[$i]["nom"]==$nomprojet){
                $projets[$i]["activites"][$nomActivite] 
            }
           }
    }

    // Parcourons la liste des projets 
    foreach ($projets as $projet) {
        echo "<h1>{$projet['nom']}</h1>";
        echo "<p>{$projet['description']}</p>";
        echo "<h5>nombre dactivite ".count($projet["activites"])."</h5>";
        echo "<h2>Liste des activités :</h2>";
         // Parcourons la liste des activites
        foreach ($projet['activites'] as $activite) { 
            echo "<p>Nom de l'activité : {$activite['nom']}</p>";
            echo "<p>Description de l'activité : {$activite['description']}</p>";
            echo "<p>Date de l'activité : {$activite['date']}</p>";
        }
    }

    
    ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Projets</title>
</head>
<body>
<form method="POST" action="">
     <label for="projet">Sélectionnez un pojet:</label>
        <select id="projet" name="projet">
            <option value=""></option>
            <?php 
               foreach ( $projets as $projet ) {
               echo "<option value='{$projet['nom']}'>" .$projet['nom']. "</option>"; }
            ?> 
        </select>
       <input type="text" id=" " value="Activite " name="activite">
       <input type="date" id=" date " value=" date " name="date"  >
       <input type="submit" id=" " value="AFFICHER" name="AJOUTER" >
    </body>
</html>
