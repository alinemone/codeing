<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=> $this->collection->map(function ($item){
                return [
                    'id' => $item->id,
                    "user"=> User::findOrFail($item->user_id),
                    "product_id"=> $item->product_id,
                    "comment"=> $item->comment,
                    "parent_id"=> $item->parent_id,
                    "active"=> $item->active,
                    "created_at" =>jdate($item->created_at)->ago()
                ];
            })
        ];
    }
}
