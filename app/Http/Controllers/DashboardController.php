<?php

namespace App\Http\Controllers;

use App\Enums\Countries;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function index()
    {
        $cities = City::query()->doesntHave('users')->orderBy('name')->get();

        $philippinesCities = City::query()->whereHas('users', function (Builder $query) {
                                $query->where('users.id', auth()->user()->id);
                            })->where('country', 'Philippines')->orderBy('name')->get();

        $indiaCities = City::query()->whereHas('users', function (Builder $query) {
                            $query->where('users.id', auth()->user()->id);
                        })->where('country', 'India')->orderBy('name')->get();


        return inertia('Dashboard', [
            'cities' => $cities,
            'countries' => Countries::cases(),
            'indiaCities' => $indiaCities,
            'philippinesCities' => $philippinesCities
        ]);
    }
}
