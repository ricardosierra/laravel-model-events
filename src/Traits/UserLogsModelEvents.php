<?php

namespace Igaster\ModelEvents\Traits;


use Igaster\ModelEvents\LogModelEvent;

/**
 * Note: This trait is Optional
 * Add this trait to the User Model to enable querying logged events for for a user model
 */

trait UserLogsModelEvents
{

    public function modelEvents()
    {
        return $this->hasMany(LogModelEvent::class,'user_id');
    }

    public function getUserModelEvents($count = 0)
    {
        $query = $this->modelEvents()->orderBy('id', 'desc');
        if($count) {
            $query->limit($count);
        }
        return $query->get();
    }

}
