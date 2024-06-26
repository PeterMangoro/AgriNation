<?php
namespace App\Builders\Finance;

use Illuminate\Database\Eloquent\Builder;

class DebitBuilder extends Builder
{
    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                // ->where('title_normalized', 'like', $term)
                ->where('detail', 'like', $term)
                ->orWhereHas('gardenDebit.garden.plant',function(Builder $query) use($term){
                    $query->where('title_normalized','like',$term);
                })
                ;
                
        });
    }
}