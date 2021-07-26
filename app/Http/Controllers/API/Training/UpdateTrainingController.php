<?php

namespace App\Http\Controllers\API\Training;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Training\TheoryResource;
use App\Http\Resources\Training\TrainingResource;
use App\Models\Theory;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class UpdateTrainingController extends Controller
{
    public function update(Request $request, Training $training)
    {
        $this->validate($request, [
            'unit_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'unit');
                })
            ],
            'sub_unit_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'sub_unit');
                })
            ],
            'poster' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'topic' => ['required', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
            'finish_date_option' => ['required', 'in:0,1'],
            'finish_date' => [
                Rule::requiredIf($request->finish_date_option == 1),
                'date'
            ],
            'description' => ['required', 'string'],
            'ttd_id' => ['required', 'exists:ttds,id'],
            'status' => ['required','in:publish,unpublish,finish'],
        ]);

        $input = $request->all();
        if($request->finish_date_option == 0) { $input['finish_date'] = null; }
        if($request->file('poster')) {
            $photo_name = Str::random(30) .'.'. $request->poster->getClientOriginalExtension();
            $input['poster_path'] = FileHelpers::upload_image_resize($request->poster, 'training_poster', $photo_name);
            Storage::disk('public')->delete($training->poster_path);
        }

        $training->update($input);
        return ResponseFormatter::success(
            new TrainingResource($training),
            'success update training'
        );
    }

    public function update_theory(Request $request, Theory $theory)
    {
        $this->validate($request, [
            'theory' => ['required', 'string']
        ]);

        $theory->update($request->all());
        return ResponseFormatter::success(
            new TheoryResource($theory),
            'success update theory data in training'
        );

    }
}
