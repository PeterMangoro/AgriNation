<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class FertilizerBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'fertilizers.id',            
            'title',
            'type',           
            'created_at'
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'id',            
            'title',
            'type',
            'detail',                  
        );
    }

    public function dontInclude($id)
    {
        return $this->whereNot('fertilizers.id', $id);
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
