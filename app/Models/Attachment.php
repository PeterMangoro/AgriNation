<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;    

    protected $fillable = [
        'title',
        'type',
        'mime_type',
        'path',
        'attachmentable_id',
        'attachmentable_type',

    ];
    public function attachmentable(): MorphTo
    {
        return $this->morphTo('attachmentable');
    }
}
