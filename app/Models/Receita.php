<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Receita
 * @package App\Models
 * @version May 22, 2019, 4:39 pm UTC
 *
 * @property string title
 * @property string procedure
 * @property integer publisher_id
 */
class Receita extends Model
{
    use SoftDeletes;

    public $table = 'receitas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'procedure',
        'publisher_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'procedure' => 'string',
        'publisher_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
