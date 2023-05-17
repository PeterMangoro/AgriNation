<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class LocationBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'locations.id',            
            'title',
            'area',           
            'created_at'
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'id',            
            'title',
            'area',
            'detail',                  
        );
    }

    public function dontInclude($id)
    {
        return $this->whereNot('locations.id', $id);
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('title_normalized', 'like', $term)
                ->orWhere('detail', 'like', $term);
                
        });
    }

   
}
