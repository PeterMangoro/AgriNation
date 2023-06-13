<?php
namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class IncomeBuilder extends Builder
{
    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                // ->where('title_normalized', 'like', $term)
                ->where('detail', 'like', $term)
                ->orWhereHas('gardenIncome.garden.plant',function(Builder $query) use($term){
                    $query->where('title_normalized','like',$term);
                })
                ;
                
        });
    }
}