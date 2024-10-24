<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminSettings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'site_name',
        'site_description',
        'site_keywords',
        'on_maintenance',
        'site_title'

    ];
}
