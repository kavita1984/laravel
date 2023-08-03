<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    public function subCategories()
    {
        return $this->hasMany('App\SubCategorie','category_id');
    }
}
