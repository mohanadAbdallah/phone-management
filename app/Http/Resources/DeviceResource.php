<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          'id'=>$this->id,
          'type'=>$this->type,
          'name'=>$this->name,
          'storage'=>$this->storage,
          'color'=>$this->color,
          'ram'=>$this->ram,
          'image'=>$this->image,
          'created_at'=>$this->created_at,
          'description'=>substr($this->description,'0','50').'...',
        ];
    }
}
