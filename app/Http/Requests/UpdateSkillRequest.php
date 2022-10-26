<?php

namespace App\Http\Requests;

use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Skill $skill)
    {
        // $image = $skill->image;
        
        // if (request()->hasFile('image')) {
        //     // Storage::delete($skill->image);
        //     $image = request()->file('image')->store('skills', ['disk' => 'public']);
        // }

        return [
            'image' => ['required', 'image'],
            'name' => ['required', 'min:3 ']
        ];


    }
}
