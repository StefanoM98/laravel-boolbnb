@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row row-col-4">
            <div class="col-md-8 offset-md-2 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        Edit Apartment
                    </div>
                    <div class="card-body">
                        
                        <form action="{{ route('admin.apartments.update', $apartment->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $apartment->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $apartment->description }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="square_meters">Square Meters*</label>
                                <input type="number" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" value="{{ $apartment->square_meters }}">
                                @error('square_meters')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="bed_number">Number of Beds*</label>
                                <input type="number" class="form-control @error('bed_number') is-invalid @enderror" id="bed_number" name="bed_number" value="{{ $apartment->bed_number }}">
                                @error('bed_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="bathroom_number">Number of Bathrooms*</label>
                                <input type="number" class="form-control @error('bathroom_number') is-invalid @enderror" id="bathroom_number" name="bathroom_number" value="{{ $apartment->bathroom_number }}">
                                @error('bathroom_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="room_number">Number of Rooms*</label>
                                <input type="number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" name="room_number" value="{{ $apartment->room_number }}">
                                @error('room_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="border rounded p-3" id="services-container">
                                <div class="row">
                                    @foreach ($services as $item)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input @error('services') is-invalid @enderror"
                                                    type="checkbox" name="services[]" value="{{ $item->id }}"
                                                    id="services-{{ $item->id }}" @checked(in_array($item->id, old('services', [])))>
                                                <label class="form-check-label" for="services-{{ $item->id }}">
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('services')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group mb-3">
                                <label for="address">Address*</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $apartment->address }}" autocomplete="off" placeholder="Street, House Number, Postal Code, City">
                                <div id="hidden_list" class="card position-absolute w-100 radius d-none">
                                    <ul class="list-group">
    
                                    </ul>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="city">City*</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ $apartment->city }}">
                                @error('city')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="state">State*</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $apartment->state }}">
                                @error('state')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 d-none">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $apartment->latitude }}">
                            </div>

                            <div class="form-group mb-3 d-none">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $apartment->longitude }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $apartment->price }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Image*</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ $apartment->image }}" max="5242880">
                                @error('image')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if ($apartment->image)
                                    <div class="mt-3">
                                        <img class="w-50" id="img-prev" src="{{ asset('storage/' . $apartment->image) }}" alt="{{ $apartment->name }}">
                                    </div>
                                @endif
                                <div class="mt-3">
                                    <img class="d-none w-25" id="image-preview" src="" alt="{{ $apartment->name }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="visibility">Visibility*</label>
                                <select class="form-control @error('visibility') is-invalid @enderror" id="visibility" name="visibility">
                                    <option value="1" {{ $apartment->visibility == 1 ? 'selected' : '' }}>Visible
                                    </option>
                                    <option value="0" {{ $apartment->visibility == 0 ? 'selected' : '' }}>Hidden
                                    </option>
                                </select>
                                @error('visibility')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script per gestire la image-preview
        const imageInput = document.getElementById("image");
        const imagePreview = document.getElementById("image-preview");
        const imgPrev = document.getElementById('img-prev');
        // Se l'elemento è trovato
        if (imageInput && imagePreview) {
            // Al change del valore di image input
            imageInput.addEventListener("change", function () {

                // prelevo il file selzionato
                const selectedFile = this.files[0];

                const reader = new FileReader();
                reader.addEventListener("load", function () {
                    //      Metto il file nel src del elemento image-preview
                    //      Visualizzo l'immagine
                    console.log("lettura completata", reader.result);
                    imagePreview.src = reader.result;
                    imagePreview.classList.remove("d-none");
                    imgPrev.classList.add("d-none")
                });

                reader.readAsDataURL(selectedFile);
            });
        };

        // VARIABILI
        const apiKey = 'q6xk75W68NwnmO3Kj5A9ZdBIBFmcbPBJ';

        const search = document.getElementById('address');
        const menuAutoComplete = document.getElementById('hidden_list');
        const menuAutoCompleteClass = menuAutoComplete.classList;
        const ulList = document.querySelector('ul.list-group');
        const city = document.getElementById('city');
        const state = document.getElementById('state');
        const latitude = document.getElementById('latitude');
        const longitude = document.getElementById('longitude');

        // All'input dell' #address
        search.addEventListener('input', function() {
            // se l'input dell'indirizzo non è vuoto
            if (search.value != '') {
                // Faccio chiamata API
                fetchResults(search.value);
            }

            // Gestisco la lista che si autocompleta
            addRemoveClass();
        })

        /**
         * Funzione che crea una lista che si autocompila, a seconda del valore iniziale dell'input #address(se contiene o meno un value)
         */
        function addRemoveClass() {
            if (search.value == '') {
                menuAutoCompleteClass.add('d-none');
            } else {
                menuAutoCompleteClass.remove('d-none');
            }
        }

        /**
         * Funzione che fa una chiamata alle API di TomTomDevelopers, non essendo specificate coordinate e raggio di partenza, la ricerca è globale
         * 
         * @param String {inputAddress} Indirizzo da dare come parametro alla funzione
         */
        function fetchResults(inputAddress) {
            
            fetch(`https://api.tomtom.com/search/2/search/${inputAddress}.json?key=${apiKey}&countrySet=IT`).then(response => response.json()).then(data => {

                // Recupero Array di oggetti 'results', dove sono presenti tutti gli indirizzi che verranno stampati nella lista

                ulList.innerHTML = '';

                // Se arriva il risultato
                if (data.results != undefined) {

                    
                    // Per ogni risultato
                    data.results.forEach(function(currentValue, index, array) {
                            
                        // Creo un elemento HTML <li> della lista autogenerata
                        const li = document.createElement('li');
                        li.classList.add('list-group-item');
                        li.append(currentValue.address.freeformAddress);
                        
                        // Cliccando sull'elemento della lista autogenerata
                        li.addEventListener('click',
                        () => {
                            // Aggiorno campo indirizzo
                            if (currentValue.address.streetNumber) {
                                search.value = currentValue.address.streetName + ", " + currentValue.address.streetNumber +  ", " + currentValue.address.postalCode;
                            } else {
                                search.value = currentValue.address.streetName + ", " + currentValue.address.postalCode;
                            }
                            
                            // Faccio scomparire lista indirizzi consigliati
                            menuAutoCompleteClass.add('d-none');
                            ulList.innerHTML = '';
                            
                            // Cambio i valori degli input invisibili #latitude e #longitute
                            city.value = currentValue.address.localName;
                            state.value = currentValue.address.country;
                            latitude.value = currentValue.position.lat;
                            longitude.value = currentValue.position.lon;
                        })
                        
                        // Infine aggiungo alla lista
                        ulList.appendChild(li);
                    });
                };
            });
        };

        // Verifica se click avviene dentro o fuori dalla lista
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = menuAutoComplete.contains(event.target);

            if (!isClickInsideMenu) {
                menuAutoCompleteClass.add('d-none');
            }
        });
    </script>

<style lang="scss" scoped>

#services-container .form-check {
    margin-bottom: 10px;
}

@media (max-width: 767.98px) {
    #services-container .col-md-4 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

</style>
@endsection
