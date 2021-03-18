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
    * Il est conseillé d'installer [Wamp](https://www.wampserver.com/) pour avoir une base de donnée locale
    * Il faut ensuite exécuter une commande avec le client Symfony qui démarre un serveur général (pas seulement limité à Symfony) :
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
# Liste des tâches
## Page d'accueil **Conrad Alexandre** _alias_ [@Alexandre](https://github.com/AlexandreConrad)
* Accessible à la racine de l'application
* Doit afficher "Bienvenue sur l'application F & BC - RENTAB"
* Cette page d'accueil doit contenir le texte suivant "Le but de cette application est de calculer la rentabilité de nos différentes gammes de produits"
* Cette page d'accueil doit contenir des liens vers les pages de calcul de bénéfice de chacune de nos gammes de produits, après le texte précédent
* Cette page d'accueil doit contenir le texte suivant "Elle permet également de visualiser les prix maximum autorisés pour faire du bénéfice sur nos différentes gammes"
* Cette page d'accueil doit contenir un lien vers la page de calcul des prix maximum pour être rentable, après le texte précédent

## Page par gamme de produit **Bauqué Geoffrey** _alias_ [@Geoffrey](https://github.com/sQmmy)
* Il doit exister une page par gamme de produit, pour les calculs des bénéfices
* Ces pages doivent afficher de manière immédiatement visible la gamme de produits concernée
* Ces pages doivent permettre de modifier le prix des fournitures dont le prix est variable
* Ces pages doivent afficher le prix des fournitures dont le prix est fixe, sans possibilité de les modifier
* Ces pages doivent permettre de choisir les produits à afficher
* Ces pages doivent afficher, pour les produits sélectionnés, les informations suivantes : le nom du produit, la composition du produit, le prix d'achat, le prix de vente, le bénéfice
* Il doit être possible de trier ses informations selon le nom du produit ou le bénéfice (uniquement ces informations)
* Ces pages doivent contenir un bouton permettant de recalculer les informations précédentes, en tenant compte des prix modifiés par l'utilisateur

## Page pour le calcul des prix maximum d'achat des fournitures dont le prix est variable **Conrad Alexandre** _alias_ [@Alexandre](https://github.com/AlexandreConrad)
* Cette page doit afficher le prix des fournitures dont le prix est fixe, sans possibilité de les modifier
* Cette page doit afficher, regroupés par gamme, tous les produits ainsi que le prix d'achat maximum des fournitures pour le produit soit rentable, trié par ordre croissant de ce prix maximum

## Page de Login **Davies Liam** _alias_ [@Liam](https://github.com/Nexey)
* Il doit exister une page de connexion, permettant de s'identifier en tant qu'administrateur
* Une identification sur cette page doit renvoyer vers la page de configuration, un échec doit recharger la page de connexion

## Page de configuration **NON ATTITREE**
* Il doit exister une page de configuration, accessible uniquement aux administrateurs
* Cette page doit permettre de modifier le prix des fournitures dont le prix est fixé
* Cette page doit permettre de modifier les compositions des produits
* Il doit être possible, pour les administrateurs, d'accéder à la page de configuration depuis toutes les pages, exceptée elle-même, la page de connexion et la page "À propos"

## Page "À Propos" **Conrad Alexandre** _alias_ [@Alexandre](https://github.com/AlexandreConrad)
* Il doit être possible d'accéder à la page d'accueil depuis toutes les pages, exceptée elle-même
* Il doit être possible de signaler un bug depuis toutes les pages
* Il doit être possible d'accéder à la page "À propos" depuis toutes les pages, exceptée elle-même
* Il doit être possible d'accéder à la page de connexion depuis toutes les pages, exceptée elle-même et la page de configuration

## L'interface graphique et l'ergonomie de l'application sont au choix des développeurs, tant qu'elles respectent les points précédents


# Références :
[Create your first page in Symfony](https://symfony.com/doc/current/page_creation.html)

[Twig for Template Designers](https://twig.symfony.com/doc/3.x/templates.html)

[Creating and Using Templates](https://symfony.com/doc/4.2/templating.html)

[How to Customize Form Rendering](https://symfony.com/doc/4.0/form/form_customization.html#form-rendering-basics)

[Dashboards](https://symfony.com/doc/current/bundles/EasyAdminBundle/dashboards.html)
