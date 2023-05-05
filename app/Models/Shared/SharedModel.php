<?php

namespace App\Models\Shared;

use App\Builders\Shared\SharedScopes;
use App\Casts\MakePointsCast;
use App\Models\Team;
use App\Models\User;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SharedModel extends Model
{
    use HasFactory;  
    // use SoftDeletes;
    use SharedScopes;

    protected $casts = [        
        'detail' => MakePointsCast::class,
    ];

    protected $hidden = [
        'pivot',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

   
}
