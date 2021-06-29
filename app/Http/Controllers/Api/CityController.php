<?php

namespace App\Http\Controllers\Api;

use App\Actions\CreateCityAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Resources\CityResource;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Cache;

class CityController extends Controller
{
    public function index( State $state, Request $request)
    {
        return Cache::remember($request->getRequestUri(), 5, function() use($state) {

            $cities = City::with('state')
                ->filterStateBySlug($state->slug)
                ->orderBy('name')
                ->paginate();

            return CityResource::collection($cities);

        });
    }

    public function store(State $state, CityStoreRequest $request, CreateCityAction $action)
    {
        try {

            $city = $action->execute($state, $request->validated());

            return CityResource::make($city);

        } catch (\Exception $exception) {

        }

    }
}
