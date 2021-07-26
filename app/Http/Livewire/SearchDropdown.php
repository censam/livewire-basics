<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];

    public function updatedSearch($newValue)
    {
        if(strlen($newValue) < 3){
            $this->searchResults = [];
            return ;
        }
            $response = Http::get('https://itunes.apple.com/search/?term='.$newValue.'&limit=3');
            $this->searchResults = $response->json()['results'];

    }

    public function render()
    {

        return view('livewire.search-dropdown');
    }
}
