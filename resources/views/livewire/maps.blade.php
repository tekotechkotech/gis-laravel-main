<div class="my-5">
    
    

    {{-- <div class="shadow" style="border-radius: 10px"> --}}
        
      {{-- <div id="map" style="height: 600px;border-radius: 10px;" ></div> --}}
  {{-- </div> --}}
  <div class="container fixed-bottom ">
    <div class="card  border mb-3" style="border-radius: 10px;">
<div class="card-header">
  <b>Data Maps</b>
</div>
    <div class="card-body table-responsive p-0" style="height: 150px;">

      <table class="table table-head-fixed table-hover text-nowrap " >
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Latitude</th>
            <th>Longitude</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($maps as $data)
            <tr 
            wire:click="selected('{{ $data->id_map }}')" 
              class="map" style="cursor: pointer">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->latitude }}</td>
                <td>{{ $data->longitude }}</td>
            </tr>                
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

  </div>

    @push('scripts')
          <script>
        $(document).ready(function(){
          // $('.map').click(function() {
            // $('#collapseUser').collapse('show');
            let map = L.map('map').setView([{{$map->latitude??'-7.8285884'}}, {{ $map->longitude??'110.3780195' }}], 12);
          // });

            // osm
            let osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // satelite
            let sat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);

            // terrain
            let ter = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);

            // layer control

            var baseMaps = {
                "OpenStreetMap": osm,
                "GoogleSatellite": sat,
                "GoogleTerrain": ter,
            };

            var layerControl = L.control.layers(
              baseMaps, 
              // overlayMaps
            ).addTo(map);

          });


            // const marker = L.marker([51.5, -0.09]).addTo(map);

            // const circle = L.circle([51.508, -0.11], {
            //     color: 'red',
            //     fillColor: '#f03',
            //     fillOpacity: 0.5,
            //     radius: 500
            // }).addTo(map);

            // const polygon = L.polygon([
            //     [51.509, -0.08],
            //     [51.503, -0.06],
            //     [51.51, -0.047]
            // ]).addTo(map);

            // Menggunakan fetch() untuk memuat file GeoJSON secara dinamis
          // fetch("{{ asset('/geojson/RBI25K/RBI25K_ADMINISTRASI_AR.json') }}")
          //   .then(response => response.json())
          //   .then(data => {
          //     // Gunakan data GeoJSON yang dimuat untuk menambahkan GeoJSON ke peta
          //     L.geoJSON(data).addTo(map);
          //   })
          //   .catch(error => {
          //     console.error('Error loading GeoJSON:', error);
          //   });

        
        </script>
        @if ($map)
            <script>

        $(document).ready(function(){
          fetch("{{ asset('/geojson/'.$map->geojson.'.geojson') }}")
            .then(response => response.json())
            .then(data => {
              // Gunakan data GeoJSON yang dimuat untuk menambahkan GeoJSON ke peta
              L.geoJSON(data).addTo(map);
            })
            .catch(error => {
              console.error('Error loading GeoJSON:', error);
            });

          });

          </script>
      @endif
    @endpush
</div>
