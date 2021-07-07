<?php

namespace App\Http\Controllers\API\Training;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Theory;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteTrainingController extends Controller
{
    public function delete(Training $training)
    {
        
        $cek_registration = $training->registration()->count();
        if($cek_registration > 0)  {
            return ResponseFormatter::error([
                'message' => 'cannot delete this training because there is already participant data'
            ], 'error delete training data', 422);
        }

        Storage::disk('public')->delete($training->poster_path);
        $result = $training->delete();
        return ResponseFormatter::success(
            $result,
            'success delete this training data'
        );
    }

    public function delete_theory(Theory $theory)
    {
        $result = $theory->delete();
        return ResponseFormatter::success(
            $result,
            'success delete theory data'
        );
    }
}
