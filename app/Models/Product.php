<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory, LogsActivity, Sluggable;

    protected $fillable = ['name', 'price', 'size', 'description'];

    // This variables need Sluggable traits
    protected $column_name   = "slug";
    protected $attributeName = "name";
    protected $slugValue     = null;

    public function getActivitylogOptions()
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(function (string $eventName) {
                return "This model has been {$eventName}";
            })
            ->logOnlyDirty();
    }

}
