<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Milebits\Eloquent\Filters\Concerns\Enableable;
use Milebits\Eloquent\Filters\Concerns\Filterable;
use Milebits\Eloquent\Filters\Concerns\Nameable;
use Milebits\Eloquent\Filters\Concerns\Sluggable;

class PanelTheme extends Model
{
    use HasFactory, SoftDeletes, Nameable, Sluggable, Enableable, Filterable;

    /**
     * @return HasMany
     */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }
}
