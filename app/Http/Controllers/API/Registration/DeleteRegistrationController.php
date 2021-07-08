<?php

namespace App\Http\Controllers\API\Registration;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class DeleteRegistrationController extends Controller
{
    public function __invoke(Registration $registration)
    {
        $result = $registration->delete();
        return ResponseFormatter::success(
            $result,
            'success delete registration data'
        );
    }
}
