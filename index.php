<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 13/12/2017
 * Time: 11:30
 */

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use \Slim\Slim as Slim;
use \panierpiano\controlers\CatalogueControler as CatControler;
use \panierpiano\controlers\ConnexionControler as ConnControler;
use \panierpiano\controlers\GestionControler as Gescontroler;
use \panierpiano\controlers\PanierControler as PanierControler;


//connexion a la base de donnees
$db = new DB();
$array = parse_ini_file('src/conf/conf.ini');
$db->addConnection($array);
$db->setAsGlobal();
$db->bootEloquent();

$app = new Slim();

session_start();

/** CATALOGUE  */
//route pour afficher l'accueil
$app->get('/',function(){
    $controler = new CatControler();
    $controler->afficherAccueil();
})->name("Home");

//route pour afficher le catalogue de produits pour le vendeur
$app->get('/afficherProduits',function(){
    $controler = new CatControler();
    $controler->afficherProduits();
})->name("afficherProduits");

//route pour afficher le catalogue de produits pour le client
$app->get('/afficherProduitsClient',function (){
   $controler = new CatControler();
   $controler->afficherProduitsClient();
})->name("afficherProduitsClient");

//route pour afficher le détail d'un produit
$app->get('/produit/:id',function($id){
   $controler = new CatControler();
   $controler->detailProduit($id);
});

//route pour afficher le détail d'une catégorie
$app->get('/categorie/:id',function($id){
    $controler = new CatControler();
    $controler->detailCategorie($id);
});

/** CONNEXION */
//route pour se connecter
$app->get('/connexion',function(){
    $controler = new ConnControler();
    $controler->connexion();
})->name("loginSeller");

//route pour qu'un client s'inscrive
$app->post('/inscriptionClient',function(){
  $controler = new ConnControler();
  $controler->inscriptionClient();
})->name("registerClient");

//route pour qu'un vendeur s'inscrive
$app->post('/inscriptionVendeur',function(){
    $controler = new ConnControler();
    $controler->inscriptionVendeur();
})->name("registerSeller");

//route pour qu'un utilisateur se connecte
$app->post('/connexionUtilisateur',function(){
    $controler = new ConnControler();
    $controler->connexionUtilisateur();
})->name("loginVendeur");


/** GESTION */

//route pour supprimer un produit
$app->get('/supprimer/:id',function($id){
   $controler = new Gescontroler();
   $controler->supprimerProduit($id);
});

//route pour gérer un produit
$app->get('/gerer/:id',function($id){
   $controler = new Gescontroler();
   $controler->gererProduit($id);
});

//route pour modifier un produit
$app->post('/modificationProduit/:id',function($id){
    $controler = new Gescontroler();
    $controler->modifierProduit($id);
});

//routes pour ajouter un produit
$app->get('/ajouterProduit',function(){
   $controler = new Gescontroler();
   $controler->ajouterProduit();
});

$app->post('/ajoutProduit',function (){
    $controler = new Gescontroler();
    $controler->ajoutProduit();
});

//routes pour modifier une categorie
$app->get('/modifierCategorie',function(){
   $controler = new Gescontroler();
   $controler->modifierCat();
});

$app->post('/modifCategorie',function(){
   $controler = new Gescontroler();
   $controler->modifCat();
});

$app->get('/modifierCategorie/:id',function($id){
    $controler = new Gescontroler();
    $controler->modifierCategorie($id);
});

$app->post('/enregistrerModif/:id',function($id){
    $controler = new Gescontroler();
    $controler->enregistrerModif($id);
});

//routes pour supprimer une catégorie
$app->get('/recupererCategorie',function(){
    $controler = new Gescontroler();
    $controler->recupererCategorie();
});

$app->post('/supprCategorie',function(){
   $controler = new Gescontroler();
   $controler->supprCategorie();
});

//routes pour ajouter une catégorie
$app->get('/ajouterCategorie',function(){
   $controler = new Gescontroler();
   $controler->ajouterCategorie();
});

$app->post('/ajoutCategorie', function(){
   $controler = new Gescontroler();
   $controler->ajoutCategorie();
});

/** PANIER */
//route pour ajouter un produit au panier
$app->get('/ajouterProduit/:id',function($id){
   $controler = new PanierControler();
   $controler->ajoutProduit($id);
});

//route pour valider le panier par le client
$app->get('/validerPanier/:id',function($id){
   $controler = new PanierControler();
   $controler->validerPanier($id);
});

$app->run();