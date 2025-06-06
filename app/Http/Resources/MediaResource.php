<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \Spatie\MediaLibrary\MediaCollections\Models\Media
 */
class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'collection_name' => $this->collection_name,
            'file_name' => $this->name,
            'original' => $this->getUrl(),
            'md' => $this->getUrl('md'),
        ];
    }
}
