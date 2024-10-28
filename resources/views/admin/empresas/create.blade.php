@extends('adminlte::master')

@php($dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home'))

@if (config('adminlte.use_route_url', false))
    @php($dashboard_url = $dashboard_url ? route($dashboard_url) : '')
@else
    @php($dashboard_url = $dashboard_url ? url($dashboard_url) : '')
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="container">

        {{-- Logo --}}
        <img src="{{ asset('/images/logo.jpg') }}" width="200px">
        <div class="row">
            <div class="col-md-12">
                {{-- Card Box --}}
                <div class="card ">

                    {{-- Card Header --}}
                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                        <h3 class="card-title float-none text-center">
                            Registro de una nueva empresa
                        </h3>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body">
                        <form action="{{ route('admin.empresas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Logo -->
                                <div class="form-group col-md-3">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" id="file" name="logo"
                                        accept=".jpg, .jpeg, .png" required>
                                    @error('logo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    {{-- Visualizar la Imagen --}}
                                    <div class="text-center">
                                        <output id="list"></output>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <!-- País -->
                                        <div class="form-group col-md-4">
                                            <label for="pais">País</label>
                                            <select name="pais" id="select_pais" class="form-control">
                                                @foreach ($paises as $pais)
                                                    <option value="{{ $pais->id }}"
                                                        {{ old('pais') == $pais->id ? 'selected' : '' }}>{{ $pais->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pais')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Departamento/Provincia/Región -->
                                        <div class="form-group col-md-4">
                                            <label for="estados">Estado/Provincia/Región</label>
                                            <div id="respuesta_pais"></div>
                                        </div>
                                        <!-- Ciudad -->
                                        <div class="form-group col-md-4">
                                            <label for="ciudad">Ciudad</label>
                                            <div id="respuesta_estado"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Nombre de la Empresa -->
                                        <div class="form-group col-md-3">
                                            <label for="nombre_empresa">Nombre de la Empresa</label>
                                            <input type="text" class="form-control" id="nombre_empresa"
                                                name="nombre_empresa" value="{{ old('nombre_empresa') }}" required>
                                            @error('nombre_empresa')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Tipo de la Empresa -->
                                        <div class="form-group col-md-4">
                                            <label for="tipo_empresa">Tipo de la Empresa</label>
                                            <input type="text" class="form-control" id="tipo_empresa" name="tipo_empresa"
                                                value="{{ old('tipo_empresa') }}" required>
                                            @error('tipo_empresa')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- NIT -->
                                        <div class="form-group col-md-3">
                                            <label for="nit">NIT</label>
                                            <input type="text" class="form-control" id="nit" name="nit"
                                                value="{{ old('nit') }}" required>
                                            @error('nit')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Moneda -->
                                        <div class="form-group col-md-2">
                                            <label for="moneda">Moneda</label>
                                            <select id="moneda" name="moneda" class="form-control">
                                                @foreach ($monedas as $moneda)
                                                    <option value="{{ $moneda->id }}"
                                                        {{ old('moneda') == $moneda->symbol ? 'selected' : '' }}>
                                                        {{ $moneda->symbol }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Nombre del impuesto -->
                                        <div class="form-group col-md-3">
                                            <label for="nombre_impuesto">Nombre del impuesto</label>
                                            <input type="text" class="form-control" id="nombre_impuesto"
                                                name="nombre_impuesto" value="{{ old('nombre_impuesto') }}" required>
                                            @error('nombre_impuesto')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Cantidad de impuesto -->
                                        <div class="form-group col-md-2">
                                            <label for="cantidad_impuesto">Cantidad</label>
                                            <input type="number" class="form-control" id="cantidad_impuesto"
                                                name="cantidad_impuesto" value="{{ old('cantidad_impuesto') }}" required>
                                            @error('cantidad_impuesto')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Teléfonos de la Empresa -->
                                        <div class="form-group col-md-4">
                                            <label for="telefono">Teléfonos de la Empresa</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}" required>
                                            @error('telefono')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Correo de la Empresa -->
                                        <div class="form-group col-md-3">
                                            <label for="correo">Correo de la Empresa</label>
                                            <input type="email" class="form-control" id="correo" name="correo"
                                                value="{{ old('correo') }}" required>
                                            @error('correo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Dirección -->
                                        <div class="form-group col-md-8">
                                            <label for="direccion">Dirección</label>
                                            <input id="pac-input" class="form-control" name="direccion" type="text"
                                                value="{{ old('direccion') }}" placeholder="Buscar..." required>
                                            <br>
                                            <div id="map" style="width: 100%;height: 400px"></div>
                                        </div>
                                        <!-- Código Postal -->
                                        <div class="form-group col-md-4">
                                            <label for="codigo_postal">Código Postal</label>
                                            <select id="codigo_postal" name="codigo_postal" class="form-control">
                                                @foreach ($paises as $pais)
                                                    <option value="{{ $pais->phone_code }}"
                                                        {{ old('codigo_postal') == $pais->phone_code ? 'selected' : '' }}>
                                                        {{ $pais->phone_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Botón de enviar -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Registrar Empresa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    @if (($message = Session::get('message')) && ($icon = Session::get('icon')))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "{{ $icon }}",
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object
            //Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Insertamos la imagen.
                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                            .target
                            .result, '"width="100%" title="', escape(theFile.name), '"/>'
                        ].join('');
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('file').addEventListener('change', archivo, false);
    </script>
    <script>
        $('#select_pais').on('change', function() {
            var id_pais = $('#select_pais').val();
            var url = "{{ route('admin.empresas.buscar_estado', ':id_pais') }}";
            url = url.replace(':id_pais', id_pais);

            if (id_pais) {
                $.ajax({
                    // url: "{{ url('/crear-empresa/estado') }}"+'/'+pais,
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#respuesta_pais').html(data);
                    },
                    error: function() {
                        alert('Error al obtener datos del pais');
                    }
                });
            } else {
                $('#respuesta_pais').html('Debe selecionar un paiss');

            }
        });
    </script>
    <script>
        $(document).on('change', '#select_estado', function() {
            // var id_estado = $('#select_estado').val();
            var id_estado = $(this).val();
            // alert(id_estado);
            var url = "{{ route('admin.empresas.buscar_ciudad', ':id_estado') }}";
            url = url.replace(':id_estado', id_estado);

            if (id_estado) {
                $.ajax({
                    // url: "{{ url('/crear-empresa/') }}"+'/'+pais,
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#respuesta_estado').html(data);
                    },
                    error: function() {
                        alert('Error al obtener datos del pais');
                    }
                });
            } else {
                $('#respuesta_pais').html('Debe selecionar un paiss');

            }
        });
    </script>
    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                // Coordenadas de Monterrey, N.L., México
                center: {
                    lat: 25.685088,
                    lng: -100.327482
                }, //{lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); // determina la posicion

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                /*
                 * Para fines de minimizar las adecuaciones debido a que es este una demostración de adaptación mínima de código, se reemplaza forEach por some.
                 */
                // places.forEach(function(place) {
                places.some(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                    // some interrumpe su ejecución en cuanto devuelve un valor verdadero (true)
                    return true;
                });
                map.fitBounds(bounds);
            });
        }
    </script>
@stop
