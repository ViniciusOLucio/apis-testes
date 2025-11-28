<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ApiSearchName extends Component
{

    public $apiName = '';

    public $results = [];

    public function searchName()
    {
        $data = Http::get('https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json')
            ->json();

        $apiName = $this->apiName;

        $filtered = array_filter($data['members'], function ($member) use ($apiName) {
            return str_starts_with(strtolower($member['name']), strtolower($apiName));
        });

        $this->results = array_values($filtered);
    }


    public function render()
    {
        return view('livewire.api-search-name');
    }
}
