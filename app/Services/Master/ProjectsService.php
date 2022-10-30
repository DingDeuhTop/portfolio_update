<?php

namespace App\Services\Master;

use App\Models\Project;

class ProjectsService
{
    public function __construct()
    {
        //
    }

    public function upload_image($request)
    {
        $image = $request->file('image')->store('projects', ['disk' => 'public']);
        return $image;
    }
}
