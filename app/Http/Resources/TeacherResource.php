<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'address'               => ($this->teacher?$this->teacher->address:'N/a'),
            'profile_picture'       => ($this->teacher?$this->teacher->image_url:'N/a'),
            'current_school'        => ($this->teacher?$this->teacher->current_school:'N/a'),
            'previous_shool'        => ($this->teacher?$this->teacher->previous_shool:'N/a'),
            'experience'            => ($this->teacher?$this->teacher->experience:'N/a'),
            'expertise_in_subject'  => ($this->teacher?$this->teacher->expertise_in_subject:'N/a'),
        ];
    }
}
