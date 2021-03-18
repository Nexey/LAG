# Groupe LAG

### Repository du projet Symfony

# Membres du groupe

#### Liam Davies

#### Alexandre Conrad

#### Geoffrey Bauqué

# Installation du projet :
* Installez [Symfony CLI](https://symfony.com/download)
* Installez [Composer](https://getcomposer.org/download/)
* Clonez ce git : ```git clone git@github.com:Nexey/LAG.git```
* Installez un serveur local
    * Ceci peut se faire avec la commande "php -S localhost:8000" par exemple
        * ```console
          cd path/to/your/project
          php -S localhost:8000
          ```
    * Il est cependant conseillé d'installer [Wamp](https://www.wampserver.com/) ou tout autre solution
    
    * Il existe aussi une commande avec le client Symfony qui démarre un serveur général (pas seulement limité à Symfony) :
        * ```console
          cd path/to/your/project
          symfony server:start
          ```

* (Recommandé) Configurez votre php.ini
    * Rajoutez les 3 lignes suivantes à votre php.ini :
        * ```php
          zend_extension=php_opcache.dll
          opcache.enable=On
          opcache.enable_cli=On
          ```
    * Changez la valeur de realpath_size :
        * ```php
          realpath_cache_size = 5M
          ```
    * Notes : Si vous utilisez Wamp, référez-vous à la documentation pour trouver le bon fichier php.ini
* Vérifiez les dépendances de Symfony :
    * ```symfony
      Symfony check:requirements
      ```
    * Note : Si vous utilisez Wamp, il se peut que la commande vous demande de configurer realpath_cache_size et d'installer un accélérateur php. Ceci s'explique par la différence entre le php utilisé pour la version console de Wamp, et la version serveur de Wamp. Vous pouvez ignorer ce message pour le moment, nous ferons un php_info plus tard pour vérifier.
    * Installez les dépendances de ce projet, exclues de Github (elles seront téléchargées dans le dossier /vendor)
        * ```console
          cd path/to/your/project
          composer update
          ```
#### Le projet est désormais installé.

# Configuration du .env.local
Le fichier .env sert à définir les variables d'environnement de projet.

Par soucis de sécurité, nos propres données ne sont pas inclues afin de ne pas exposer nos identifiants à la base de données par exemple.

Il faudra donc créer un fichier .env.local, que Symfony utilisera pour "override" les données présentes du fichier .env.

Un exemple d'utilisation :
```env.local
# .env.local
DATABASE_URL="mysql://root:@127.0.0.1:3306/my_database_name"
```

# Créer une base de données
Pour créer une base de données, symfony se basera sur les informations contenues dans le fichier .env.local (à la racine du projet)
```php
php bin/console doctrine:database:create
```

Créer une entity :
```php
php bin/console make:entity
```

Créer des entities à partir des table d'une base de données :
```php
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity
```

Créer les tables d'une base de données à partir des entities du projet :
1) Créer le fichier de migration :
   ```php
   php bin/console make:migration
   ```

2) Exécuter la migration :
   ```php
   php bin/console doctrine:migrations:migrate
   ```
