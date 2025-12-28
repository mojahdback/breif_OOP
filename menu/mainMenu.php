<?php

require_once __DIR__ . '/patientMenu.php';

while(true){

    function afficherMenuPrincipal() {
    echo "=== Unity Care CLI ===\n";
    echo "1. Gérer les patients\n";
    echo "2. Gérer les médecins\n";
    echo "3. Gérer les départements\n";
    echo "4. Statistiques\n";
    echo "5. Quitter\n";
    echo "Choix : ";
}

    echo afficherMenuPrincipal();

    $choix = trim(fgets(STDIN));

    switch ($choix) {

        case 1:
            menuPatients();
            break;
        case 2:
            menuMedecins();
            break;
        case 3:
            menuDepartements();
            break;
        case 4:
            echo "Statistiques \n";
            break;
        case 5:
            echo "Au revoir \n";
            exit;
        default:
            echo "Choix invalide\n";
    }



}
