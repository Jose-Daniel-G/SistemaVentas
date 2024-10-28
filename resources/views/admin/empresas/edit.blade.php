@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de reservas de citas medicas</h1>
@stop

@section('content')

    <div class="row">
        <h1>Modificacion configuracion</h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.empresas.update', $empresa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios registrados</h3>
                        <div class="card-tools">
                            <!-- Botón de enviar -->
                            <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
                        </div>
                    </div>
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
                                <output id="list"><img src="{{ asset('storage/' . $empresa->logo) }}" alt="logo"
                                        width="80%"></output>
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
                                                {{ $empresa->pais == $pais->id ? 'selected' : '' }}>{{ $pais->name }}
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
                                    <select name="departamento" id="select_departamento_2" class="form-control">
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}"
                                                {{ $empresa->departamento == $departamento->id ? 'selected' : '' }}>
                                                {{ $departamento->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div id="respuesta_pais"></div>
                                </div>
                                <!-- Ciudad -->
                                <div class="form-group col-md-4">
                                    <label for="ciudad">Ciudad</label>
                                    <select name="ciudad" id="select_ciudad_2" class="form-control">
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}"
                                                {{ $empresa->ciudad == $ciudad->id ? 'selected' : '' }}>
                                                {{ $ciudad->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div id="respuesta_estado"></div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Nombre de la Empresa -->
                                <div class="form-group col-md-3">
                                    <label for="nombre_empresa">Nombre de la Empresa</label>
                                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                                        value="{{ $empresa->nombre_empresa }}" required>
                                    @error('nombre_empresa')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Tipo de la Empresa -->
                                <div class="form-group col-md-4">
                                    <label for="tipo_empresa">Tipo de la Empresa</label>
                                    <input type="text" class="form-control" id="tipo_empresa" name="tipo_empresa"
                                        value="{{ $empresa->tipo_empresa }}" required>
                                    @error('tipo_empresa')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- NIT -->
                                <div class="form-group col-md-3">
                                    <label for="nit">NIT</label>
                                    <input type="text" class="form-control" id="nit" name="nit"
                                        value="{{ $empresa->nit }}" required>
                                    @error('nit')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Moneda -->
                                <div class="form-group col-md-2">
                                    <label for="moneda">Moneda</label>
                                    <select id="moneda" name="moneda" class="form-control">
                                        @foreach ($monedas as $moneda)
                                            <option value="{{ $moneda->id }}" {{ $empresa->moneda == $moneda->id ? 'selected' : '' }}>
                                                {{ $moneda->symbol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Nombre del impuesto -->
                                <div class="form-group col-md-3">
                                    <label for="nombre_impuesto">Nombre del impuesto</label>
                                    <input type="text" class="form-control" id="nombre_impuesto" name="nombre_impuesto"
                                        value="{{ $empresa->nombre_impuesto }}" required>
                                    @error('nombre_impuesto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Cantidad de impuesto -->
                                <div class="form-group col-md-2">
                                    <label for="cantidad_impuesto">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad_impuesto"
                                        name="cantidad_impuesto" value="{{ $empresa->cantidad_impuesto }}" required>
                                    @error('cantidad_impuesto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Teléfonos de la Empresa -->
                                <div class="form-group col-md-4">
                                    <label for="telefono">Teléfonos de la Empresa</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        value="{{ $empresa->telefono }}" required>
                                    @error('telefono')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Correo de la Empresa -->
                                <div class="form-group col-md-3">
                                    <label for="correo">Correo de la Empresa</label>
                                    <input type="email" class="form-control" id="correo" name="correo"
                                        value="{{ $empresa->correo }}" required>
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
                                        value="{{ $empresa->direccion }}" placeholder="Buscar..." required>
                                    <br>
                                    <div id="map" style="width: 100%;height: 400px"></div>
                                </div>
                                <!-- Código Postal -->
                                <div class="form-group col-md-4">
                                    <label for="codigo_postal">Código Postal</label>
                                    <select id="codigo_postal" name="codigo_postal" class="form-control">
                                        @foreach ($paises as $pais)
                                            <option value="{{ $pais->phone_code }}" {{ $empresa->codigo_postal == $pais->phone_code ? 'selected' : '' }}>
                                                {{ $pais->phone_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
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
                        $('#select_departamento_2').css('display', 'none');
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
                        $('#select_ciudad_2').css('display', 'none');
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
