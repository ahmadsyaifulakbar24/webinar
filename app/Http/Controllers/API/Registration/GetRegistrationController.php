<?php

namespace App\Http\Controllers\API\Registration;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Registration\RegistrationDetailResource;
use App\Http\Resources\Registration\RegistrationResource;
use App\Models\Registration;
use Illuminate\Http\Request;

class GetRegistrationController extends Controller
{
    public function fetch(Request $request, $registration_id = null)
    {
        $registration = Registration::query();
        if($registration_id) {
            return ResponseFormatter::success(
                new RegistrationDetailResource($registration->find($registration_id)),
                'success get registration data'
            );
        } else {
            $this->validate($request, [
                'limit' => ['nullable', 'numeric'],
                'training_id' => ['required', 'exists:trainings,id']
            ]);
            
            $limit = $request->input('limit', 15);
            return RegistrationResource::collection($registration->where('training_id', $request->training_id)->orderBy('id', 'DESC')->paginate($limit));
        }
    }

    public function fetch_by_qrcode($qrcode)
    {
        $registration = Registration::where('qrcode', $qrcode)->first();
        return ResponseFormatter::success(
            new RegistrationDetailResource($registration),
            'success get registration data'
        );
    }
}
