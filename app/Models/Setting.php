<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Milebits\Eloquent\Filters\Concerns\Enableable;
use Milebits\Eloquent\Filters\Concerns\Filterable;
use Milebits\Eloquent\Filters\Concerns\Nameable;
use Milebits\Eloquent\Filters\Concerns\Sluggable;

/**
 * @mixin IdeHelperSetting
 */
class Setting extends Model
{
    use HasFactory, SoftDeletes, Nameable, Sluggable, Enableable, Filterable;
}
