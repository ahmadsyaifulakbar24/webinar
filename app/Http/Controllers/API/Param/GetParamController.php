<?php

namespace App\Http\Controllers\API\Param;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Param\CityResource;
use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\Param\ProvinceResource;
use App\Http\Resources\Param\TtdResource;
use App\Models\City;
use App\Models\Param;
use App\Models\Province;
use App\Models\Ttd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\map;

class GetParamController extends Controller
{
    public function province()
    {
        $province = Province::all();
        return ResponseFormatter::success(
            ProvinceResource::collection($province),
            'success get province data'
        );
    }

    public function city(Request $request)
    {
        $this->validate($request, [
            'province_id' => ['required', 'exists:provinces,id']
        ]);

        $city = City::where('province_id', $request->province_id)->get();
        return ResponseFormatter::success(
            CityResource::collection($city),
            'success get city data'
        );
    }

    public function unit()
    {
        return $this->param_response('unit', 'success get unit data');    
    }

    public function sub_unit(Request $request)
    {
        $this->validate($request, [
            'parent_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'unit');
                })
            ]
        ]);

        return $this->param_response('sub_unit', 'success get sub unit data', $request->parent_id);    
    }

    public function role()
    {
        return $this->param_response('role', 'success get role data');
    }

    public function ttd()
    {
        $ttd = Ttd::all();
        return ResponseFormatter::success(
            TtdResource::collection($ttd),
            'success get ttd data'
        );
    }
    
    public function  param_response($category, $message, $parent_id = null)
    {
        $param = Param::query();
        if($parent_id) {
            $param->where('parent_id', $parent_id);
        }

        return ResponseFormatter::success(
            ParamResource::collection($param->where('category', $category)->orderBy('order', 'ASC')->get()),
            $message
        );
    }
}
