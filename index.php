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

//route pour afficher l'accueil
$app->get('/',function(){
    $controler = new CatControler();
    $controler->afficherAccueil();
})->name("Home");

//route pour afficher le catalogue de produits
$app->get('/afficherProduits',function(){
    $controler = new CatControler();
    $controler->afficherProduits();
})->name("afficherProduits");

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



//route pour se connecter
$app->get('/connexion',function(){
    $controler = new ConnControler();
    $controler->connexion();
})->name("loginSeller");

$app->post('/inscriptionClient',function(){
  $controler = new ConnControler();
  $controler->inscriptionClient();
})->name("registerClient");

$app->post('/inscriptionVendeur',function(){
    $controler = new ConnControler();
    $controler->inscriptionVendeur();
})->name("registerSeller");

$app->post('/connexionUtilisateur',function(){
    $controler = new ConnControler();
    $controler->connexionUtilisateur();
})->name("loginClient");

$app->get('/supprimer/:id',function($id){
   $controler = new Gescontroler();
   $controler->supprimerProduit($id);
});

$app->get('/gerer/:id',function($id){
   $controler = new Gescontroler();
   $controler->gererProduit($id);
});

$app->post('/modificationProduit/:id',function($id){
    $controler = new Gescontroler();
    $controler->modifierProduit($id);
});

$app->get('/ajouterProduit',function(){
   $controler = new Gescontroler();
   $controler->ajouterProduit();
});

$app->post('/ajoutProduit',function (){
    $controler = new Gescontroler();
    $controler->ajoutProduit();
});

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

$app->get('/recupererCategorie',function(){
    $controler = new Gescontroler();
    $controler->recupererCategorie();
});

$app->post('/supprCategorie',function(){
   $controler = new Gescontroler();
   $controler->supprCategorie();
});

$app->get('/ajouterCategorie',function(){
   $controler = new Gescontroler();
   $controler->ajouterCategorie();
});

$app->post('/ajoutCategorie', function(){
   $controler = new Gescontroler();
   $controler->ajoutCategorie();
});

$app->get('/ajouterProduit/:id',function($id){
   $controler = new PanierControler();
   $controler->ajoutProduit($id);
});

$app->get('/afficherPanier/:id',function($id){
   $controler = new PanierControler();
   $controler->afficherPanier($id);
});

$app->run();