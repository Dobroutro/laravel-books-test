<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Author extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'authors';

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function books() 
    {
      return $this->hasMany('App\Models\Book');
    }

}