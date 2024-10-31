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
            <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios registrados</h3>
                        <div class="card-tools">
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
                                <output id="list"><img src="{{ asset('storage/' . $company->logo) }}" alt="logo"
                                        width="80%"></output>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <!-- País -->
                                <div class="form-group col-md-4">
                                    <label for="country">País</label>
                                    <select name="country" id="select_country" class="form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $company->country == $country->id ? 'selected' : '' }}>{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- departmento/Provincia/Región -->
                                <div class="form-group col-md-4">
                                    <label for="estados">Estado/Provincia/Región</label>
                                    <select name="department" id="select_department_2" class="form-control">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $company->department == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div id="respuesta_country"></div>
                                </div>
                                <!-- Ciudad -->
                                <div class="form-group col-md-4">
                                    <label for="city">Ciudad</label>
                                    <select name="city" id="select_city_2" class="form-control">
                                        @foreach ($cityes as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $company->city == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div id="respuesta_estado"></div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Nombre de la Empresa -->
                                <div class="form-group col-md-3">
                                    <label for="company_name">Nombre de la Empresa</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        value="{{ $company->company_name }}" required>
                                    @error('company_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Tipo de la Empresa -->
                                <div class="form-group col-md-4">
                                    <label for="company_type">Tipo de la Empresa</label>
                                    <input type="text" class="form-control" id="company_type" name="company_type"
                                        value="{{ $company->company_type }}" required>
                                    @error('company_type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- NIT -->
                                <div class="form-group col-md-3">
                                    <label for="nit">NIT</label>
                                    <input type="text" class="form-control" id="nit" name="nit"
                                        value="{{ $company->nit }}" required>
                                    @error('nit')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Moneda -->
                                <div class="form-group col-md-2">
                                    <label for="currency">Moneda</label>
                                    <select id="currency" name="currency" class="form-control">
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}" {{ $company->currency == $currency->id ? 'selected' : '' }}>
                                                {{ $currency->symbol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Nombre del impuesto -->
                                <div class="form-group col-md-3">
                                    <label for="tax_name">Nombre del impuesto</label>
                                    <input type="text" class="form-control" id="tax_name" name="tax_name"
                                        value="{{ $company->tax_name }}" required>
                                    @error('tax_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Cantidad de impuesto -->
                                <div class="form-group col-md-2">
                                    <label for="tax_amount">Cantidad</label>
                                    <input type="number" class="form-control" id="tax_amount"
                                        name="tax_amount" value="{{ $company->tax_amount }}" required>
                                    @error('tax_amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Teléfonos de la Empresa -->
                                <div class="form-group col-md-4">
                                    <label for="phone">Teléfonos de la Empresa</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $company->phone }}" required>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Correo de la Empresa -->
                                <div class="form-group col-md-3">
                                    <label for="email">Correo de la Empresa</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $company->email }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <!-- Dirección -->
                                <div class="form-group col-md-8">
                                    <label for="address">Dirección</label>
                                    <input id="pac-input" class="form-control" name="address" type="text"
                                        value="{{ $company->address }}" placeholder="Buscar..." required>
                                    <br>
                                    <div id="map" style="width: 100%;height: 400px"></div>
                                </div>
                                <!-- Código Postal -->
                                <div class="form-group col-md-4">
                                    <label for="zip_code">Código Postal</label>
                                    <select id="zip_code" name="zip_code" class="form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->phone_code }}" {{ $company->zip_code == $country->phone_code ? 'selected' : '' }}>
                                                {{ $country->phone_code }}</option>
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
        $('#select_country').on('change', function() {
            var id_country = $('#select_country').val();
            var url = "{{ route('admin.companies.buscar_estado', ':id_country') }}";
            url = url.replace(':id_country', id_country);

            if (id_country) {
                $.ajax({
                    // url: "{{ url('/create-company/estado') }}"+'/'+country,
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#select_department_2').css('display', 'none');
                        $('#respuesta_country').html(data);
                    },
                    error: function() {
                        alert('Error al obtener datos del country');
                    }
                });
            } else {
                $('#respuesta_country').html('Debe selecionar un countrys');

            }
        });
    </script>
    <script>
        $(document).on('change', '#select_state', function() {
            // var id_estado = $('#select_state').val();
            var id_estado = $(this).val();
            // alert(id_estado);
            var url = "{{ route('admin.companies.buscar_city', ':id_estado') }}";
            url = url.replace(':id_estado', id_estado);

            if (id_estado) {
                $.ajax({
                    // url: "{{ url('/create-company/') }}"+'/'+country,
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#select_city_2').css('display', 'none');
                        $('#respuesta_estado').html(data);
                    },
                    error: function() {
                        alert('Error al obtener datos del country');
                    }
                });
            } else {
                $('#respuesta_country').html('Debe selecionar un countrys');

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
