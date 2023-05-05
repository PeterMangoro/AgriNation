<?php

namespace App\Builders\Shared;

use Illuminate\Support\Facades\Auth;

trait SharedScopes
{
    public function scopeBelongsToAuthUser($query)
    {
        return $query->whereRelation('user', 'users.id', Auth::user()->id);
    }

    public function scopeSort($query)
    {
        return $query->when(request('column'), function ($query) {
            $query->orderBy(request('column'), request('direction'));
        });
    }

    public function scopeBelongsToOwner($query, $owner_id)
    {
        return $query->where('user_id', $owner_id);
    }

   
}
