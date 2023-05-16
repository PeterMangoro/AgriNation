<?php

namespace App\Models\Shared;

use App\Models\User;
use App\Traits\UUID;
use App\Models\Attachment;
use App\Casts\MakePointsCast;
use App\Builders\Shared\SharedScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SharedModel extends Model
{
    use HasFactory;  
    use SharedScopes;
    use UUID;
    use SoftDeletes;

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

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->where('type', 'image');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->where('type', 'document');
    }

    public function trashed_attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->onlyTrashed();
    }

    public function trashed_documents(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->where('type', 'document')
            ->onlyTrashed();
    }

}
