<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    public function fetch(Request $request, $user_id = null)
    {
        $this->validate($request, [
            'limit' => ['nullable', 'numeric']
        ]);

        $limit = $request->input('limit', 15);
        $user = User::query();
        if($user_id) {
            return ResponseFormatter::success(
                new UserResource($user->find($user_id)),
                'success get user data'
            );
        }

        return ResponseFormatter::success(
            UserResource::collection($user->orderBy('name', 'ASC')->paginate($limit)),
            'success get data user'
        );
    }
}
