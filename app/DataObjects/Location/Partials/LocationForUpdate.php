<?php

namespace App\DataObjects\Location\Partials;

use App\ValueObjects\Attachments;

class LocationForUpdate
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
        public  readonly string $area,
    ) {
    }

    public static function from(object $location)
    {
        return new self(
            $location->uuid,
            Attachments::imagesForEdit($location->images),
            Attachments::imagesForEdit($location->trashed_attachments),
            Attachments::documentsForEdit($location->documents),
            Attachments::documentsForEdit($location->trashed_documents),            
            $location->detail,
            $location->id,
            $location->title,
            $location->area,
        );
    }
}
