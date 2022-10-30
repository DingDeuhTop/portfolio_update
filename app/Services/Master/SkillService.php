<?php

namespace App\Services\Master;

class SkillService
{
    public function __construct()
    {
        //
    }

    public function upload_image($request)
    {
        $image = $request->file('image')->store('skils', ['disk' => 'public']);
        return $image;
    }
}
