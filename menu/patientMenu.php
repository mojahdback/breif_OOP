<?php 

require_once __DIR__ . '/../models/Patient.php';

function menuPatients() {
    while (true) {
        echo "\n------------------------------------\n";
        echo "=== Gestion des Patients ===\n";
        echo "1. Lister tous les patients\n";
        echo "2. Rechercher un patient\n";
        echo "3. Ajouter un patient\n";
        echo "4. Modifier un patient\n";
        echo "5. Supprimer un patient\n";
        echo "6. Retour\n";
        echo "Choix : ";
 $choice = trim(fgets(STDIN));

            switch ($choice) {
                case 1:
                    $patients = Patient::all();
                    foreach ($patients as $p) {
                        echo "{$p['id']} - {$p['full_name']} ({$p['gender']}) {$p['date_of_birth']}  {$p['email']}  {$p['phone']} \n";
                    }
                    break;

                case 2:
                    echo "ID: ";
                    $id = trim(fgets(STDIN));
                    $p = Patient::find($id);
                    print_r($p);
                    break;

                case 3:
                    echo "Full_Name: ";
                    $full_name = trim(fgets(STDIN));
                    echo "Gender: ";
                    $gender = trim(fgets(STDIN));
                    echo "Date_of_birth: ";
                    $date_of_birth = trim(fgets(STDIN));
                    echo "Email: ";
                    $email = trim(fgets(STDIN));
                     echo "Phone: ";
                    $phone = trim(fgets(STDIN));
                    $patient = new Patient($full_name, $gender, $date_of_birth, $email, $phone);
                    $patient->save();
                    echo "Added \n";
                    break;

                case 4:
                    echo "ID: ";
                    $id = trim(fgets(STDIN));
                    echo "Full_Name: ";
                    $full_name = trim(fgets(STDIN));
                    echo "Gender: ";
                    $gender = trim(fgets(STDIN));
                    echo "Date_of_birth: ";
                    $date_of_birth = trim(fgets(STDIN));
                    echo "Email: ";
                    $email = trim(fgets(STDIN));
                     echo "Phone: ";
                    $phone = trim(fgets(STDIN));
                    Patient::update($id, $full_name, $gender, $date_of_birth, $email, $phone);
                    echo "Updated \n";
                    break;

                case 5:
                    echo "ID: ";
                    $id = trim(fgets(STDIN));
                    Patient::delete($id);
                    echo "Deleted \n";
                    break;

                case 6:
                    exit("Bye \n");
            default:
                echo "Choix invalide\n";
        }
    }
}



?>