```
composer install
```

Afin de connecter le serveur SMTP de mail il faut ajouter dans le fichier .env rubrique symfony/mailer:
```
MAILER_DSN=gmail+smtp://iia.rapport%40gmail.com:iia-rapport2022@default?verify_peer=0
```