@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection

<!-- Elemen untuk menampilkan peta -->
@section('content')
    <div id="map"></div>

    <!-- Modal Create Point -->
    <div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="PointModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PointModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-point') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-point" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create Polyline --}}
    <div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby="PolylineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PolylineModalLabel">Create Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polyline') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill polyline name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-polyline" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create Polygon --}}
    <div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby="PolygonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PolygonModalLabel">Create Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polygon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill polygon name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygon" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-polygon" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // Membuat peta menggunakan Leaflet
        var map = L.map('map').setView([-6.170180, 106.640324], 12);

        // Menambahkan tile layer (misalnya dari OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Create a GeoJSON layer for polygon data
        var Surabaya = L.geoJson(null, {
            style: function(feature) {
                // Adjust this function to define styles based on your polygon properties
                var value = feature.properties.nama; // Change this to your actual property name
                return {
                    fillColor: getColor(value),
                    weight: 2,
                    opacity: 1,
                    color: "red",
                    dashArray: "3",
                    fillOpacity: 0.5,
                };
            },
            onEachFeature: function(feature, layer) {
                // Adjust the popup content based on your polygon properties
                var content =
                    "KECAMATAN: " +
                    feature.properties.KECAMATAN +
                    "<br>";

                layer.bindPopup(content);
            },
        });

        // Function to generate a random color //
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Load GeoJSON //
        fetch('storage/geojson/tangerang.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            opacity: 1,
                            color: "black",
                            weight: 0.5,
                            fillOpacity: 0.4,
                            fillColor: getRandomColor(),
                        };
                    },
                    onEachFeature: function(feature, layer) {
                        var content = "Kecamatan : " + feature.properties.WADMKC;
                        layer.on({
                            click: function(e) {
                                // Fungsi ketika objek diklik
                                layer.bindPopup(content).openPopup();
                            },
                            mouseover: function(e) {
                                // Tidak ada perubahan warna saat mouse over
                                layer.bindPopup("Kecamatan : " + feature.properties.WADMKC, {
                                    sticky: false
                                }).openPopup();
                            },
                            mouseout: function(e) {
                                // Fungsi ketika mouse keluar dari objek
                                layer.resetStyle(e
                                    .target); // Mengembalikan gaya garis ke gaya awal
                                map.closePopup(); // Menutup popup
                            },
                        });
                    }

                }).addTo(map);
            })
            .catch(error => {
                console.error('Error loading the GeoJSON file:', error);
            });

        // Create a GeoJSON layer for polygon data
        var Surabaya = L.geoJson(null, {
            style: function(feature) {
                // Adjust this function to define styles based on your polygon properties
                var value = feature.properties.nama; // Change this to your actual property name
                return {
                    fillColor: getColor(value),
                    weight: 2,
                    opacity: 1,
                    color: "red",
                    dashArray: "3",
                    fillOpacity: 0.5,
                };
            },
            onEachFeature: function(feature, layer) {
                // Adjust the popup content based on your polygon properties
                var content =
                    "KECAMATAN: " +
                    feature.properties.KECAMATAN +
                    "<br>";

                layer.bindPopup(content);
            },
        });

        // Function to generate a random color //
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }



        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            console.log(objectGeometry);

            if (type === 'polyline') {
                // Set value geometry to input geom
                $("#geom_polyline").val(objectGeometry);

                // Show modal
                $("#PolylineModal").modal('show');
                console.log("Create " + type);
            } else if (type === 'polygon' || type === 'rectangle') {
                $("#geom_polygon").val(objectGeometry);

                // Show modal
                $("#PolygonModal").modal('show');
                console.log("Create " + type);
            } else if (type === 'marker') {

                // Set value geometry to input geom
                $("#geom_point").val(objectGeometry);

                // Show modal
                $("#PointModal").modal('show');
            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        /* GeoJSON Point */
        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row'>" +

                    "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                    "' class='btn btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>" +

                    "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +

                    "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin Anda akan menghapus data ini?\")'><i class='fa-solid fa-trash-can'></i></button>"
                "</form>"

                "</div>"

                ;
                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Line */
        var line = L.geoJson(null, {
            /* Style polyline */
            style: function(feature) {
                return {
                    color: "#3388ff",
                    weight: 3,
                    opacity: 1,
                };
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row'>" +

                    "<a href='{{ url('edit-polyline') }}/" + feature.properties.id +
                    "' class='btn btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>" +

                    "<form action='{{ url('delete-polyline') }}/" + feature.properties.id +
                    "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +

                    "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin Anda akan menghapus data ini?\")'><i class='fa-solid fa-trash-can'></i></button>"
                "</form>"

                "</div>"

                ;
                layer.on({
                    click: function(e) {
                        line.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        line.bindTooltip(feature.properties.name, {
                            sticky: true,
                        });
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            line.addData(data);
            map.addLayer(line);
        });

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            /* Style polygon */
            style: function(feature) {
                return {
                    color: "#3388ff",
                    fillColor: "#3388ff",
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.2,
                };
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row'>" +

                    "<a href='{{ url('edit-polygon') }}/" + feature.properties.id +
                    "' class='btn btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>" +

                    "<form action='{{ url('delete-polygon') }}/" + feature.properties.id + "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +

                    "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin Anda akan menghapus data ini?\")'><i class='fa-solid fa-trash-can'></i></button>"
                "</form>"

                "</div>"

                ;
                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name, {
                            sticky: true,
                        });
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        // Layer Control
        var overlayMaps = {
            "Point": point,
            "Polyline": line,
            "Polygon": polygon
        };

        var layerControl = L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);
    </script>
@endsection