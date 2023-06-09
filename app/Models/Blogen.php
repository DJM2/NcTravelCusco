<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Blogen
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Blogsen[] $blogsens
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Blogen extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogsens()
    {
        return $this->hasMany('App\Models\Blogsen', 'categoria_id', 'id');
    }
    

}
