# 🏥 Unity Care Clinic – PHP 8 CLI (OOP)

Application **Console (CLI)** développée en **PHP 8 orienté objet**, permettant la gestion des données d’une clinique médicale :
- Patients
- Médecins
- Départements

Les données sont persistées dans une base **MySQL** via **MySQLi en approche OOP**.

---

## 📌 Objectifs du projet

- Refactoriser une logique procédurale vers une architecture **OOP**
- Appliquer les principes :
  - Encapsulation
  - Héritage
  - Interfaces
  - Méthodes statiques
- Mettre en place un **menu CLI interactif**
- Implémenter un **CRUD complet**
- Calculer et afficher des **statistiques**
- Respecter les bonnes pratiques PHP & SQL

---

## 🛠️ Technologies utilisées

- PHP 8 (OOP)
- MySQL
- MySQLi (orienté objet)
- CLI (Console)
- Git / GitHub
- UML
- SQL

---

## 📂 Structure du projet


unity-care-cli/
│
├── config/
│ └── database.php
│
├── classes/
│ ├── BaseModel.php
│ ├── Personne.php
│ ├── Patient.php
│ ├── Doctor.php
│ ├── Department.php
│ ├── Validator.php
│ ├── ConsoleTable.php
│ └── Database.php
│
├── interfaces/
│ └── Displayable.php
│
├── cli/
│ ├── menu.php
│ ├── patientMenu.php
│ ├── doctorMenu.php
│ └── departmentMenu.php
│
├── sql/
│ └── unity_care.sql
│
├── index.php
└── README.md
