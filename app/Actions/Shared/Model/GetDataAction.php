<?php

namespace App\Actions\Shared\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetDataAction
{
    public static function fetchUnpaginatedModels(
        object $model,
        ?int $limit = 50
    ): Collection {
        return $model            
            ->limit($limit)
            ->get()
            ->shuffle();
    }

    public static function fetchDisplayModelByUUID(
        object $model,
        string $uuid
    ): Model {
        $display = $model
            ->whereUUIDmatches($uuid)
            ->withUserSocialAccounts()
            ->withRatings()
            ->withActiveDiscountPrice()          
            ->withImages()
            ->withDocuments()
            ->first();

        $display->increment('page_visits'); #page visit counter

        return $display;
    }

    public static function fetchEditModelByUUID(
        object $model,
        string $uuid
    ): Model {
        return $model
            ->whereUUIDmatches($uuid)
            // ->selectDetailAttributes()            
            // ->belongsToAuthUser()
            ->first();
    }

    public static function fetchPaginatedModels(
        object $model,
        int $per_page = 9
    ): LengthAwarePaginator {
        $paginate = request('per_page') ?: $per_page;
        return $model
            ->latest('id')
            ->sort()
            ->search(request('search'))
            ->paginate($paginate)
            ->withQueryString();
    }
  
}
