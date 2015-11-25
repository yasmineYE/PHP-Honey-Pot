# PHP-Honey-Pot
Un Honeypot en PHP très simple.
Failles connues :
* XSS
* CSRF

# Ce qu'on a fait
* Mise en place d'un container docker pour l'exécution du programme
* Importation du code
* Mise en place de la BDD
  * Script d'installation de la BDD
  * Ajout d'un mysql au container
  * Résolution des connexions à la BDD : `mysql_connect.php`
* Réindentation global du code
* Bug fix

# Utilisation
Après avoir installé `docker` :
```shell
docker build -t phphoneypot .
docker run -d -p 8000:8000 -v $PWD:/go ubuntu-go
```

Le site sera actif au bout de quelques secondes. Vous pourrez alors vous connecter à l'adresse http://localhost:8000/.
> Pour la première connection il faut installer la base de donnée en allant à l'adresse http://localhost:8000/install_db.php.
