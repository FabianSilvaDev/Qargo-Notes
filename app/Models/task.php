<?php
// model
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'title', 'label', 'description', 'priority'];

    protected $attributes = [
        'label' => 'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
