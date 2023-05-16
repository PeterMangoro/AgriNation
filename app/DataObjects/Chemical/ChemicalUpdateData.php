<?php

namespace App\DataObjects\Chemical;

class ChemicalUpdateData
{
    public function __construct(
        public readonly ?array $images,
        public readonly ?array $document,
        public readonly string $title,
        public readonly string $detail,
        
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
            $request->images,
            $document,
            $request->title,
            $request->detail,            
        );
    }
}
