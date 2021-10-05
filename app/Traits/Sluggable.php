<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Sluggable
{
    /**
     * Boot the sluggable trait for a model.
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::saving(function (Model $model) {
            if (empty($model->getSlug())) {
                $model->setSlug(Str::slug($model->getSluggableString()));
            }
        });
    }

    /**
     * The name of the column to use for slugs.
     *
     * @return string
     */
    public function getSlugColumnName()
    {
        return $this->column_name;
    }

    /**
     * Get the current slug value.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->getAttribute($this->getSlugColumnName());
    }

    /**
     * Set the slug to the given value.
     *
     * @param string $value
     * @return $this
     */
    public function setSlug($value)
    {
        $this->setAttribute($this->getSlugColumnName(), $value);

        return $this;
    }

    /**
     * Get the string to create a slug from.
     *
     * @return string
     */
    public function getSluggableString()
    {
        $newValue = $this->slugValue != null
            ? $this->slugValue
            : $this->getAttribute($this->attributeName);

        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $newValue)));
    }
}

