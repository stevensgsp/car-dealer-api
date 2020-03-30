<?php

namespace App\Traits;

trait HasPhones
{
    /**
     * Define a polymorphic one-to-many relationship.
     *
     * @param  string  $related
     * @param  string  $name
     * @param  string|null  $type
     * @param  string|null  $id
     * @param  string|null  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    abstract public function morphMany( $related, $name, $type = null, $id = null, $localKey = null );

    /**
     * The model may have many phones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function phones()
    {
        return $this->morphMany( \App\Models\Dashboard\Phone::class, 'phoneable' );
    }
}
