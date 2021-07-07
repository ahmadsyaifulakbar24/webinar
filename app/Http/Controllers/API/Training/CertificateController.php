<?php

namespace App\Http\Controllers\API\Training;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Training\TrainingResource;
use App\Models\Registration;
use App\Models\Training;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CertificateController extends Controller
{
    public function create(Training $training)
    {
        $training->update([
            'status' => 'finish'
        ]);

        $training->registration()->where('certificate', 0)->update([
            'certificate' => 1
        ]);

        return ResponseFormatter::success(
            new TrainingResource($training),
            'success create certificate for all participant'
        );
    }
}
