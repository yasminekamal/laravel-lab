<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "post_id"=>$this->id,
            "post_title"=>$this->title,
            "post_body"=>$this->body,
            "post_image"=>$this->image,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            "post_author"=> new UserResource($this->user),

        ];
    }
}
