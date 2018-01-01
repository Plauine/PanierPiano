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
});

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
   $controler = new GesControler();
   $controler->supprimerProduit($id);
});

$app->get('/gerer/:id',function($id){
   $controler = new Gescontroler();
   $controler->gererProduit($id);
});

$app->run();