<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'id'                  => $this->id,
            'name'                => $this->name,
            'address'             => ($this->student?$this->student->address:'N/a'),
            'profile_picture'     => ($this->student?$this->student->image_url:'N/a'),
            'current_school'      => ($this->student?$this->student->current_school:'N/a'),
            'previous_shool'      => ($this->student?$this->student->previous_shool:'N/a'),
            'parents_details'     => ($this->student?$this->student->parents_details:'N/a'),
            'assigned_teacher'    => ($this->student && $this->student->assigned_teacher?$this->student->teacher->name:'Not Assigned'),
        ];
    }
}
