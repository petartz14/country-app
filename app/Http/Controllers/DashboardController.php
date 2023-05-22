<?php

namespace App\Http\Controllers;

use App\Enums\Countries;
use App\Models\City;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return inertia('Dashboard', [
            'cities' => City::query()->orderBy('name')->get(),
            'countries' => Countries::cases(),
            'indiaCities' => City::query()->where('')->orderBy('name')->get(),
        ]);
    }
}
