<?php

namespace App\Http\Controllers\API\Training;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Registration\RegistrationUserResource;
use App\Http\Resources\Training\TheoryResource;
use App\Http\Resources\Training\TrainingRegistrationResource;
use App\Http\Resources\Training\TrainingResource;
use App\Models\User;
use App\Models\Theory;
use App\Models\Training;
use Illuminate\Http\Request;

class GetTrainingController extends Controller
{
    public function fetch(Request $request, $training_id = null)
    {
        $this->validate($request, [
            'limit' => ['nullable', 'numeric'],
            'code' => ['nullable', 'string'],
            'with_registration' => ['nullable', 'boolean']
        ]);

        $limit = $request->input('limit', 15);
        $training = Training::query();

        if($training_id) {
            $training_find = $training->find($training_id);
            $training_result = ($request->with_registration == 1) ? new TrainingRegistrationResource($training_find) : new TrainingResource($training_find);
            return ResponseFormatter::success(
                $training_result,
                'success get training data'
            );
        }

        if($request->code) {
            return $this->training_by_code($training, $request->code);
        }

        return TrainingResource::collection($training->orderBy('id', 'DESC')->paginate($limit));
    }

    public function fetch_theory(Request $request, $theory_id = null)
    {
        $this->validate($request, [
            'training_id' => ['required', 'exists:trainings,id'],
        ]);
        
        $training = Training::find($request->training_id);
        if($theory_id) {
            $theory = Theory::find($theory_id);
            return ResponseFormatter::success(
                new TheoryResource($theory),
                'success get theory data'
            );
        }

        return ResponseFormatter::success(
            TheoryResource::collection($training->theory()->orderBy('id', 'DESC')->get()),
            'success get theory data'
        );
    }

    // get training data where trainin status publish
    public function training_by_code($training, $code)
    {
        $data = $training->where([['code', $code], ['status', 'publish']])->first();
            if($data) {
                return ResponseFormatter::success(
                    new TrainingResource($data),
                    'success get training data'
                );
            }
            return ResponseFormatter::error([
                'message' => 'training data not found'
            ], 'error get training data', 404);
    }

    public function training_by_user(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required', 'exists:users,id']
        ]);

        $user = User::find($request->user_id);
        return ResponseFormatter::success(
            RegistrationUserResource::collection($user->training()->orderBy('id', 'DESC')->get()),
            'success get training data'
        );
    }
}
