<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class ExpenditureBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'expenditures.id',            
            'title',
            'price',           
            'created_at'
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'id',            
            'title',
            'price',
            'detail',
            'user_id',            
        );
    }

    public function dontInclude($id)
    {
        return $this->whereNot('expenditures.id', $id);
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('title_normalized', 'like', $term);
                
        });
    }

    
}
