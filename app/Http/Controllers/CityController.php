<?php

namespace App\Http\Controllers;

use App\Enums\NotificationType;
use App\Models\City;
use App\Models\UserCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    public function store(Request $request)
    {
        $city = City::query()->findOrFail($request->input('city_id'));

        if ($request->has('country') && $city?->country === $request->input('country'))
        {
            UserCity::updateOrCreate(
                ['user_id' => $request->user()->id, 'city_id' => $request->input('city_id')]
            );
    
            return Redirect::back()->with('notification', [
                'type' => NotificationType::Success,
                'message' => 'Successfully moved.',
            ]);
        }

        return Redirect::back()->with('notification', [
            'type' => NotificationType::Failure,
            'message' => 'Failed to moved. Different country.',
        ]);

    }
}
