<?php

namespace App\DataObjects\Fertilizer\Partials;

use App\ValueObjects\Attachments;

class FertilizerForUpdate
{
    public function __construct(
        public readonly  string $uuid,
        public readonly  ?object $attachments,
        public  readonly ?object $trashed_images,
        public  readonly ?object $documents,
        public  readonly ?object $trashed_documents,      
        public  readonly array $detail,
        public  readonly int $id,       
        public  readonly string $title,
        public  readonly string $type,
    ) {
    }

    public static function from(object $fertilizer)
    {
        return new self(
            $fertilizer->uuid,
            Attachments::imagesForEdit($fertilizer->images),
            Attachments::imagesForEdit($fertilizer->trashed_attachments),
            Attachments::documentsForEdit($fertilizer->documents),
            Attachments::documentsForEdit($fertilizer->trashed_documents),            
            $fertilizer->detail,
            $fertilizer->id,
            $fertilizer->title,
            $fertilizer->type,
        );
    }
}
