<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['name','id_category','price','id_cashier'];
    public function get_cashier(){
        return $this->belongsTo('\App\cashier','id_cashier');
 }
    public function get_category(){

    return $this->belongsTo('\App\category','id_category');   
    }
}
