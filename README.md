#Groupe <span style="color:#F0E68C">LAG</span>
###Repository du projet Symfony

# Membres du groupe

####<span style="color:#F0E68C">L</span>iam Davies

####<span style="color:#F0E68C">A</span>lexandre Conrad

####<span style="color:#F0E68C">G</span>eoffrey Bauqué

# Installation du projet :
* Installez un serveur local
    * Ceci peut se faire avec la commande "php -S localhost:8000" par exemple
      * ```bat
        cd path/to/your/project
        php -S localhost:8000
        ```
    * Il est cependant conseillé d'installer Wamp ou tout autre solution
        * [Wamp](https://www.wampserver.com/)

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
* Installez Symfony CLI : [Symfony](https://symfony.com/download)
* Installez Composer : [Composer](https://getcomposer.org/download/)
* Vérifiez les dépendances de Symfony : 
    * ```symfony
      Symfony check:requirements
      ```
    * Note : Si vous utilisez Wamp, il se peut que la commande vous demande de configurer realpath_cache_size et d'installer un accélérateur php. Ceci s'explique par la différence entre le php utilisé pour la version console de Wamp, et la version serveur de Wamp. Vous pouvez ignorer ce message pour le moment, nous ferons un php_info plus tard pour vérifier.
    
