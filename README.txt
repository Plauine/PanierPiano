README

Instruction pour acceder au site Panier Piano

1. Dans le dossier du serveur (htdocs pour XAMP), mettre le dossier PanierPiano décompréssé

2. Importer la Base de données dans phpmyadmin

3. Dans le dossier src/conf/conf.ini remplacer:
	-le username par le nom d'utilisateur sur phpmyAdmin
	-le password par le mot de passe sur phpmyAdmin
	-la database par le nom de la base de données si elle a été modifiée dans phpmyAdmin

4. Dans un terminal, lancer "composer install"
	-> Cela permet d'installer le framework symfony et le micro-frameworlk Slim.
	-> Un dossier vendor et un fichier composer.lock vont se créer.

  Si vous n'avez pas "composer", il suffit d'abord de l'installer et ensuite de lancer composer install

 5.Il est alors possible de taper l'URL "localhost/*chemin dans le htdocs vers PanierPiano"

6.Toutes les versions des langages sont précisées dans le composer.json
