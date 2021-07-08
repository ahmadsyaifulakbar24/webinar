<?php

namespace App\Http\Controllers\API\Training;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Training\TheoryResource;
use App\Http\Resources\Training\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CreateTrainingController extends Controller
{
    public function create(Request $request)
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
            'poster' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'topic' => ['required', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
            'description' => ['required', 'string'],
            'status' => ['required','in:publish,unpublish'],
        ]);

        $input = $request->all();
        $input['code'] = Str::upper(Str::random(6));
        if($request->file('poster')) {
            $photo_name = Str::random(30) .'.'. $request->poster->getClientOriginalExtension();
            $input['poster_path'] = FileHelpers::upload_image_resize($request->poster, 'training_poster', $photo_name);
        }

        $training = Training::create($input);
        return ResponseFormatter::success(
            new TrainingResource($training),
            'success create training'
        );
    }

    public function create_theory(Request $request)
    {
        $this->validate($request, [
            'training_id' => ['required', 'exists:trainings,id'],
            'theory' => ['required', 'string'],
            'jpl' => ['required', 'numeric']
        ]);

        $training = Training::find($request->training_id);
        $theory = $training->theory()->create([
            'theory' => $request->theory,
            'jpl' => $request->jpl,
        ]);

        return ResponseFormatter::success(
            new TheoryResource($theory),
            'success ada theory data in training'
        );
    }
}
