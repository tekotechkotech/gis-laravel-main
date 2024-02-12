<div class="my-5">
    <div class="container fixed-bottom ">
        <div class="card  border mb-3" style="border-radius: 30px;">
            <div class="card-body bg-seondary row">

                <div class="col-sm-2 col-md-2 col-lg-2">
                    <div class="py-2 text-center">
                        <b>
                            Maps
                        </b>
                    </div>
                </div>

                <div class="col-sm-10 col-md-10 col-lg-10 ">
                    <div class="bg-secondary  p-2 mx-0 my-0 text-light" id="showMapModal"
                        style="border-radius: 10px;cursor: pointer;">
                        <span>
                            {{ $geojson }}
                        </span>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel"
            aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mapModalLabel" >
                            Data Maps
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive p-0" style="height: 300px;">

                        <table class="table table-head-fixed table-hover text-nowrap ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                </tr>
                            </thead>
                            <tbody wire:ignore.self>
                                @foreach ($maps as $data)
                                    <tr onclick="redirectMap('{{ $data->id_map }}')" id="pilihmap" class="map selectMap"
                                        style="cursor: pointer">
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
        </div>

    </div>

    @push('scripts')
    <script>
        function redirectMap(id) {
            window.location.href = "/maps/" + id;
        }
    </script>
        <script>

            $(document).ready(function() {

                let longitude = "{{ $longitude }}" ;
                let latitude = "{{ $latitude }}";

            $('#showMapModal').click(function() {
                $('#mapModal').appendTo("body") .modal('show');
            });

            let map = L.map('map').setView([latitude ,longitude], 11);

                // osm
                let osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // satelite
                let sat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }).addTo(map);

                // terrain
                let ter = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
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

                let geojson = "{{ $geojson }}";


                    fetch("{{ asset('/geojson/' ) }}"+ '/' + geojson + '.geojson')
                    // fetch("{{ asset('/geojson/' ) }}"+ '/KotaYogyakarta.geojson')
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
    @endpush
</div>
