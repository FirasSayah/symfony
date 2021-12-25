# symfony

DOC
firas sayah 


Week 1 :

1 – creation de   DataBase (project).

2- installer le bandel psysh pour manipuler les contenu de base de donner et tester le fonctionalité de code sans l’afficher coté serveur  a partir de cmd , pour l’installer le bandel vous doit tappez : ‘ composer req theofidry/psysh-bundle –dev’.


3- creation de premier controller ‘jobController’ avec son propre entité ‘job’ et faire la migration a la base de données. 

4-créer de differents tamplates comme ‘home’ et ‘show’  page and css file.


5-transformer  ‘.css’ file on ‘.saas’ extention utiliser ‘webpack’  pour facilité letache de designe:
 	*  install webpack bandel par tabez : ‘composer req encore’ entraine de  créer file 		   ‘webpack.coonfig.js’ 
	*  insall npm 
	*  lancer commande ‘npm i ‘ pour créer ‘folders’: ‘node_modules’ .
	*  run command  ‘npm run dev’ pour  créer ‘ bandel’ folder.
	*  change extention for to ‘.saas’ for my css file ‘css1.css’ et decommenter la fonction
	   ‘enableSassLoader()’ in ‘webpack.config.js’ file.
	*   utiliser ‘npm run watch’ pour  update changes.
	 *  insall bandel bootsrap for webpack using ‘npm ii bootstrap --save-dev’  and add 			‘@import 	"~bootstrap/scss/bootstrap";’ to ‘css1.saas’ file.

6-  ajouter les types des methodes utilisée dans les fonctions de ‘jobController’ que ce soit ‘Get’ ou       	‘POST’.
7-   créer  of ‘create’ function par  un manuell form et son  tamplete et  liée avev  ‘home’ function.

8- créer de  ‘edit’ fonction avec automatique  form avec  ‘symfony  make:form’ command et choice the ‘PUT’ method for ‘edit’ function (le choix de PUT method pour  facilite  modifcation de ‘url’ et ajouter  ‘PUT’ to ‘options’  for ‘createForm’ because html just read GET and POST methods).

9- crere un fonction ‘delete’ avec la methode ‘DELETE’ qui va effecuter au nivau code html dans le fichier ‘show’ avec un petit conde de javascript pour gere l’action.

10- utiliser le ‘csrf_token’ pour la fonction delete pour le securisé

11- modifer le tamplete de errror 404 de symfony par : modifier ‘dev’→’prod’ dans le fichier ‘.env’ 
et create tamplete ‘error404’ et lancer ‘composer require symfony/twig-pack’

12- ajouter les flash de notifcation (message) para la fonction ‘addFlash()’ reservé para symfony 

13- ajouter les validation de tous le champ au niveau de formulaire liée au fonction ‘edit’ 

14-ajouter les tampletes de ‘menu’ et ‘footer’

15- ajouter un champ pour l’insertion de l’image par le bandul ‘vichi_uploader’ qui trouver sur git 
‘https://github.com/dustin10/VichUploaderBundle/blob/master/docs/form/vich_image_type.md’ 
16- stoker le nom de l’image dans le base de donner sous le nom ‘imageName’ et set une image par defaut dans le cas que l’utilisateur rater l’insertion
17-creation d’une entité ‘user’  par ‘symfony make:user’ et modifier le contenu del’entité ‘user’ par l’insertion des nouveu champ ‘lastName’,’firstName’
18- créer une relation entre l’entite ‘job’ et l’entité ‘user’ par ‘symfony make:relation’ de type ‘ManytoOne’
  




