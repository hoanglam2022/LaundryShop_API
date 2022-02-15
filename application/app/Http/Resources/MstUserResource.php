<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class MstUserResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'username'     => $this->username,
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'email'        => $this->email,
            'phone_number' => $this->phone_number,
            'created_user' => $this->created_at,
        ];
    }
}
