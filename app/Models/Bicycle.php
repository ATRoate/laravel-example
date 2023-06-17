<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Bicycle extends Model
{
    use HasFactory;

    protected $fillable = ['color', 'type', 'speed'];
}
