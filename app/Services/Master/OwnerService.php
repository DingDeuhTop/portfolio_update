<?php

namespace App\Services\Master;

use App\Models\Owner;

class OwnerService
{
    public function __construct()
    {
        //
    }

    public function store($request)
    {
        $owner = Owner::create($request->all());

        return $owner;
    }

    public function update($request)
    {
        $request->validate([
            'name' => 'required| min:3',
            'skill_id' => 'required',
            'project_id' => 'required'
        ]);
    }
}
