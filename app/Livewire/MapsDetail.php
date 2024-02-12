<?php

namespace App\Livewire;

use App\Models\Map;
use Livewire\Component;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class MapsDetail extends Component
{
    public $id;

    public function mount($id) {
        $this->id=$id;

        $this->map = Map::where('id_map',$this->id)->first();
    }

    
    public $maps;
    public $map;
    public $latitude;
    public $longitude;
    public $geojson=null;
    

    public function render()
    {
        $this->maps=Map::all();

        // dd($this->map);


        // Set default latitude and longitude jika tidak ada data dari server
        $this->latitude = $this->map->latitude;
        $this->longitude = $this->map->longitude;

        $this->geojson = $this->map->geojson;

        return view('livewire.maps-detail');
    }

    public function exportToPdf()
    {        
        $latitude = $this->map->latitude;
        $longitude = $this->map->longitude;
        $geojson = $this->map->geojson;
        
        $maps=Map::all();
        // Render tampilan Leaflet ke dalam HTML
        $leafletHtml = View::make('livewire.maps-detail',compact('geojson','maps','latitude','longitude'))->render();
    
        // Tambahkan teks di bawah tampilan Leaflet
        $text = "Teks yang ingin Anda tambahkan di bawah tampilan Leaflet.";

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($leafletHtml);

        // Render PDF
        $dompdf->render();

        // Dapatkan halaman terakhir
        $pageCount = $dompdf->getCanvas()->get_page_count();

        // Tambahkan teks di bawah tampilan Leaflet pada setiap halaman
        for ($pageNumber = 0; $pageNumber < $pageCount; $pageNumber++) {
            $dompdf->getCanvas()->page_text(10, 10, $text, null, 8, array(0,0,0), $pageNumber);
        }

        // Ambil konten PDF sebagai string
        $pdfContent = $dompdf->output();

        // Simpan atau kirim file PDF
        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, 'leaflet_map_with_text.pdf');
    }


}
