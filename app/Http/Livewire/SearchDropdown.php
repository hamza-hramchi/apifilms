<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;



class SearchDropdown extends Component
{
    public $search = '';

    public function render(){
        $result = []; // Tableau des résultats
        if (strlen($this->search) >= 2){
            $result = Http::get('https://api.themoviedb.org/3/search/movie?api_key=ff3d7a37ebce90ac13d25ffeacb9c48d&language=en-US&query='.$this->search)->json()['results'];
        }
        return view('livewire.search-dropdown',['results' => collect($result)->take(6)]); // afficher seulemnt 6 résultats de recherche
    }
}
