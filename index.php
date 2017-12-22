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
use \panierpiano\controlers\CatalogueControler as Catcontroler;

//connexion a la base de donnees
$db = new DB();
$array = parse_ini_file('src/conf/conf.ini');
$db->addConnection($array);
$db->setAsGlobal();
$db->bootEloquent();

$app = new Slim();

//route pour afficher l'accueil
$app->get('/',function(){
    $controler = new Catcontroler();
    $controler->afficherAccueil();
})->name("Home");

//route pour afficher le catalogue de produits
$app->get('/afficherProduits',function(){
    $controler = new CatControler();
    $controler->afficherProduits();
})->name("afficherProduits");

//route pour afficher le détail d'un produit
$app->get('/produit/:id',function($id){
   $controler = new Catcontroler();
   $controler->detailProduit($id);
});

$app->run();