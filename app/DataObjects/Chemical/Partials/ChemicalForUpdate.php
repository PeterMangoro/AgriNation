<?php

namespace App\DataObjects\Chemical\Partials;

use App\ValueObjects\Attachments;

class ChemicalForUpdate
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

    public static function from(object $chemical)
    {
        return new self(
            $chemical->uuid,
            Attachments::imagesForEdit($chemical->images),
            Attachments::imagesForEdit($chemical->trashed_attachments),
            Attachments::documentsForEdit($chemical->documents),
            Attachments::documentsForEdit($chemical->trashed_documents),            
            $chemical->detail,
            $chemical->id,
            $chemical->title,
            $chemical->type,
        );
    }
}
