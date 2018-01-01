<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 01/01/2018
 * Time: 19:43
 */

namespace panierpiano\models;

use \Illuminate\Database\Eloquent\Model as Model;

class Contient extends Model{

    protected $table = 'contient';
    protected $primaryKey = 'id_contient';
    public $timestamps = false;

}