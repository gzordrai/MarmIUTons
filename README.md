# MarmIUTons
Projet Tutoré S3

## Installation
Télécharger l'archive au format `.zip`.
```bash
MarmIUTons.zip
```

Extraire l'archive sur votre serveur supportant le `php`.
```bash
D:.
└───MarmIUTons
    ├───conf
    ├───controllers
    ├───fonts
    ├───images
    │   ├───logo
    │   └───paralax
    ├───includes
    ├───models
    ├───scripts
    ├───styles
    └───views
```

Une fois l'archive extraite dirigez vous dans le dossier `conf` puis ouvrez le fichier `Client.php` et insérer vos identifiants de connexion.
```php
private static $database = "";
private static $login = "";
private static $password = "";
```

## Licence
[Apache 2.0](https://www.apache.org/licenses/LICENSE-2.0)