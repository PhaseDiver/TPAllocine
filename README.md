# TPAllocine
--------------------

#Pre-requis:
#symfony 4.3 

#composer require maker/bundle


#composer require easycorp/easyadmin-bundle


#composer require -dev doctrine/doctrine-fixtures-bundle 

#composer require symfony/web-server-bundle --dev

#composer require symfony/twig-bundle


# Relations entres les différentes entités 

Film a une relation  OnetoMany avec Acteurs et ManyToMany pour genre
 Ville a une relation OneToMany avec Cinema   Une ville posséde un ou plisuers cinemeas 
Cinema a une relation OneToMany avec Films (Un cinemé projette un ou plusieurs films



#Aide complémentaire 

 https://stackoverflow.com/questions/32607641/set-datetime-and-time-in-symfony2-from-string(pas à jour)
https://stackoverflow.com/questions/50467271/symfony-4-set-datetime


#Difficultés et Erreurs
#Erreur dans VilleFixtures à cause du mauvaise placement des acollades
#manipulation des objet datetimes
#quelques erreurs de synaxe

#Questions

Le genre/civilité on le stocke dans boolean 0=Homme et 1=Femme ou une chaine de caractères? J'ai vu enum mais on a pas ce type dans la liste des type de champs de Doctrine



#Les Entités et Les Datafixtures sont termines, elle sont codés les champs vides ont une valeur null(ça permet d'éviter les erreurs)


#Les fixtures ont un ordre d'appel .

D'abord  Films -> Acteurs -> Cinémas-> Ville -> Genre



#Prochiane étape  paramétrage interface graphique avec twig et easy admin.


#commande pour generer un controlleur 
php bin/console make:controller ControllerName

# Commit  4 Controller ville et ses templates ont été ajoutés 




#changements dernier commit 

#Le controller de ville est fait toutefois je n'utilise que une seule des méthodes codés.
#partie graphique a retravailler car pas de css , donc l'affichage estsous forme d' une simple liste 

![Capture_Villes](https://user-images.githubusercontent.com/23719686/61573316-b76d4800-aaac-11e9-9c87-09bd5873682b.PNG)



#database crée nom  allociné , la configuration se trouve dans le .env

#migration faites 
