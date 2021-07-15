<?php

namespace App\Http\Controllers\API\Registration;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Registration\RegistrationResource;
use App\Models\Registration;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateRegistrationController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'training_code' => [
                'required',
                Rule::exists('trainings', 'code')->where(function ($query) {
                    $query->where('status', 'publish');
                })
            ],
            'role_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    $query->where('category', 'role');
                })
            ]
        ]);

        $training = Training::where('code', $request->training_code)->first();
        $max_qrcode = Registration::max('qrcode');
        $input['training_id'] = $training->id;
        $input['user_id'] = $request->user()->id;
        $input['role_id'] = $request->role_id;
        $input['qrcode'] = $max_qrcode + 1;

        $cek_registration = Registration::where([ ['user_id', $input['user_id']], ['training_id', $input['training_id']] ])->count();
        if($cek_registration > 0) {
            return ResponseFormatter::error([
                'message' => 'user with this training already exists'
            ], 'error create registration data', 422);
        }

        $registration = Registration::create($input);
        return ResponseFormatter::success(
            new RegistrationResource($registration),
            'success create registration'
        );

    }
}
