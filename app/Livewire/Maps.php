<?php

namespace App\Livewire;

use App\Models\Map;
use Livewire\Component;

class Maps extends Component
{

    public $maps;
    public $map;
    public $latitude;
    public $longitude;
    public $geojson=null;
    

    public function render()
    {
        $this->maps=Map::all();

        $this->map = Map::where('id_map','03e4972a-c554-11ee-9406-708bcd206598')->first();
        // dd($this->map);


        // Set default latitude and longitude jika tidak ada data dari server
        $this->latitude = $this->map->latitude ?? -7.8285884;
        $this->longitude = $this->map->longitude ?? 110.3780195;

        $this->geojson = $this->map->geojson;

        return view('livewire.maps');
    }

    public function terpilih($id) {
        $this->map = Map::where('id_map','03e4972a-c554-11ee-9406-708bcd206598')->first();
        dd($this->map);


        // Set default latitude and longitude jika tidak ada data dari server
        $this->latitude = $this->map->latitude ?? -7.8285884;
        $this->longitude = $this->map->longitude ?? 110.3780195;

        $this->geojson = $this->map->geojson;
    }
}
