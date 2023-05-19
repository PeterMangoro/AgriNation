<?php

namespace App\DataObjects\Plant;

class PlantCreateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $detail,
        public readonly string $stage,
        public readonly string $date,
        public readonly string $batch,
        public readonly ?string $nursery_location,
        public readonly string $total_plants,
        public readonly ?array $document,
        public readonly ?array $images,
        public readonly ?array $locations,
    ) {
    }
    public static function fromRequest($request)
    {
        if ($request->document) {
            $document = [
                'document' => $request->document,
                'title' => $request->document_title,
                'mime_type' => $request->document->getClientMimeType(),
            ];
        } else {
            $document = null;
        }

        return new self(
            $request->title,
            $request->detail,
            $request->stage,
            $request->date,
            $request->batch,
            $request->nursery_location,
            $request->total_plants,
            $document,
            $request->images,
            $request->locations,
        );
    }
}
