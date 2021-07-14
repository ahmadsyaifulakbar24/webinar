<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateUserController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:laki-laki,perempuan'],
            'agency' => ['nullable', 'string'],
            'position' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'province_id' => ['required', 'exists:provinces,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $input['email'] = $request->email;
        $input['date_of_birth'] = $request->date_of_birth;
        $input['gender'] = $request->gender;
        $input['agency'] = $request->agency;
        $input['postition'] = $request->postition;
        $input['address'] = $request->address;
        $input['province_id'] = $request->province_id;
        $input['city_id'] = $request->city_id;
        
        if($request->file('photo')) {
            $photo_name = Str::random(30) .'.'. $request->photo->getClientOriginalExtension();
            $input['photo'] = FileHelpers::upload_image_resize($request->photo, 'user_photo', $photo_name);
            Storage::disk('public')->delete($user->photo);
        }

        $user->update($input);
        return ResponseFormatter::success(
            new UserResource($user),
            'success update user data'
        );
    }
}
