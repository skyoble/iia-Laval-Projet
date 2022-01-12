PHP version 8.1.1
Symfony version 6

Récupérez les dépendances du projet :
```
composer install

npm install
```


Afin de démarrer le serveur il faut exécuter la commande :
```
php -S localhost:8080 -t public
```

Afin de connecter le serveur SMTP de mail il faut ajouter dans le fichier .env rubrique symfony/mailer:
```
MAILER_DSN=gmail+smtp://iia.rapport%40gmail.com:iia-rapport2022@default?verify_peer=0
```