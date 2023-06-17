<?php

namespace App\Builders\Shared;

use Illuminate\Support\Facades\Auth;

trait SharedScopes
{
    public function scopeWhereUUIDmatches($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }

    public function scopeWithImages($query)
    {
        return $query
            ->with(['attachments' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'id',
                )
                    ->where('type', 'image')
                    ->latest('id');
            },
            ]);
    }

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

    public function scopeWithDocuments($query)
    {
        return $query
            ->with(['documents' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'uuid',
                    'title',
                    'id'
                )

                    ->latest('id');
            },
            ]);
    }

    public function scopeWithTrashedImages($query)
    {
        return $query
            ->with(['trashed_attachments' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'id',
                    'deleted_at'
                )
                    ->where('type', 'image')
                    ->latest('id');
            },
            ]);
    }

    public function scopeWithTrashedDocuments($query)
    {
        return $query
            ->with(['trashed_documents' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'id',
                    'uuid',
                    'deleted_at',
                    'title',
                )
                    ->latest('id');
            },
            ]);
    }
   
    public function scopeWhereCurrencyIs($query,string $currency)
    {
        return $query->whereRelation('price','prices.currency',$currency);
    }

    public function scopeGetTotalOf($query,string $currency)
    {
        return $query->whereCurrencyIs($currency)->with('price')->get()->sum('price.amount');
    }
}
