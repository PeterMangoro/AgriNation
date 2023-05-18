<?php

namespace App\DataObjects\Plant;

class PlantUpdateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $detail,
        public readonly string $stage,
        public readonly string $date,
        public readonly string $batch,
        public readonly string $total_plants,
        public readonly ?array $document,
        public readonly ?array $images,
        public readonly array $locations,

    ) {
    }
    public static function fromRequest($request)
    {
        $discount = [
            'price' => $request->discount,
            'exp_date' => $request->date,
        ];

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
            $request->total_plants,
            $document,
            $request->images,
            $request->locations,
        );
    }
}
