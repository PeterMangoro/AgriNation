<?php

namespace App\DataObjects\Location;

class LocationCreateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $detail,
        public readonly string $area,     
        public readonly ?array $document,  
        public readonly ?array $images,  
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
            $request->area,      
            $document,    
            $request->images,  
        );
    }
}
