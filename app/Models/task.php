<?php
// model
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    protected $fillable = [
        'title',
        'label',
        'description',
    ];

    // default value
    protected $atributes = [
        'label' => 'pendiente',
    ];
}
