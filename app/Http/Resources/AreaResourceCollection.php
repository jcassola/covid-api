<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AreaResourceCollection extends ResourceCollection
{
    public static $wrap = 'areas';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return[
        // 'count' => $this->count(),
        // 'total' => $this->total(),
        // 'prev'  => $this->previousPageUrl(),
        // 'next'  => $this->nextPageUrl(),

        // 'areas' => $this->collection
        // ];
    }
}
