<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            "name" => ucfirst($this->name), // Première lettre en majuscule
            "email" => $this->email,
            "firstname" => $this->firstname,
            "address" => $this->address,
            "postal_code" => $this->postal_code,
            "city" => $this->city,
            "country" => $this->country,
            "phone" => $this->phone
        ];
    }
}
