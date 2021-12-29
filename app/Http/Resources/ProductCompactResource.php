<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCompactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $image = [];

        if ($this->files->count() > 0) {
            $firstFile = $this->files->first();
            $image = [
                'id' => $firstFile->id,
                'name' => $firstFile->name,
                'extension' => $firstFile->fileExtension->extension
            ];
        } else {
            $image = (object)[];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'parameters' => $this->parameters,
            'condition' => $this->condition,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $image,
            'product_category' => $this->productCategory->category,
            'product_category_id' => $this->productCategory->id
        ];
    }
}
