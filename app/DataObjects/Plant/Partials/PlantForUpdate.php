<?php

namespace App\DataObjects\date\Partials;

use App\ValueObjects\Attachments;
use Carbon\Carbon;

class PlantForUpdate
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
        public  readonly string $date,
        public  readonly string $batch,
        public  readonly string $total,
        public  readonly object $locations,
    ) {
    }

    public static function from(object $plant)
    {
        return new self(
            $plant->uuid,
            Attachments::imagesForEdit($plant->images),
            Attachments::imagesForEdit($plant->trashed_attachments),
            Attachments::documentsForEdit($plant->documents),
            Attachments::documentsForEdit($plant->trashed_documents),
            $plant->detail,
            $plant->id,
            $plant->title,
            $plant->date,
            $plant->batch,
            $plant->total_plants,
            (object) $plant->locations,
        );
    }
}
