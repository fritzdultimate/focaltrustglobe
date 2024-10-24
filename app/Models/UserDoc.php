<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class UserDoc extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'user_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}