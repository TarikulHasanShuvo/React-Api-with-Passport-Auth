<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = ['name','price','size','description'];

    public function getActivitylogOptions()
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
}
