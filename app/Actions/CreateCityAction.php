<?php

namespace App\Actions;

use App\Models\City;
use App\Models\State;

class CreateCityAction
{

    /**
     * @param State $state
     * @param array  $request
     *
     * @return City
     */
    public function execute(State $state, array $request)
    {
        $city = City::create([
            'name' => $request['name'],
            'slug' => $request['name'],
            'state_id' => $state->id,
        ]);

        return $city->fresh();
    }
}
