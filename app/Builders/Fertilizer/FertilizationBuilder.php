<?php

namespace App\Builders\Fertilizer;

use Illuminate\Database\Eloquent\Builder;

class FertilizationBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'fertilizations.id',            
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
        return $this->whereNot('fertilizations.id', $id);
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query               
                ->where('detail', 'like', $term)
                ->orWhereHas('usedFertilizer.fertilizer',function(Builder $query) use($term){
                    $query->where('title_normalized','like',$term);
                })
                ->orWhereHas('fertilizedPlant.plant',function(Builder $query) use($term){
                    $query->where('title_normalized','like',$term);
                })
                ->orWhereHas('fertilizedLocation.location',function(Builder $query) use($term){
                    $query->where('title_normalized','like',$term);
                })
                ;
                
        });
    }

   
}
