<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 13/12/2017
 * Time: 11:34
 */

namespace panierpiano\models;
use \Illuminate\Database\Eloquent\Model as Model;

class Categorie extends Model{
    protected $table = 'categorie';
    protected $primaryKey = 'id_categorie';
    public $timestamps = false;


    public function vendeur(){
        return $this->belongsTo('panierpiano\models\Vendeur','id_vendeur');
    }

    public function produits(){
        return $this->hasMany('panierpiano\models\Produit','id_categorie');
    }
}