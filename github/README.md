# FUT

FUT est le projet d'un site de réservation de joueur de Tennis de Table.

Conseil d'utilisation:

0.  $ git clone 'adresse_du_repo' (première fois seulement)
1.  $ git pull origin class
2.  $ git checkout -b 'nom_de_la_branche'
3.  _modifier/ajouter/supprimer_
4.  $ git status
5.  $ git add .
6.  $ git status
7.  $ git commit -m "message_du_commit"
8.  $ git status
9.  $ git push origin 'nom_de_la_branche'
10. créer une "pull request" de votre branche sur la branche class
11. comparer les branches
12. fusionner les branches

Faire un "dump" de la base de donnée:

1. Créer un fichier vide 'exemple.sql'
2. Ouvrir le Terminal
3. $ mysqldump -u root nom_de_la_base_de_donnée > chemin/du/fichier/exemple.sql
