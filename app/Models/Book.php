<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() 
    {
        return $this->belongsTo('App\Models\Author');
    }

}