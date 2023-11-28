@props(['pets', 'breeds', 'typeOfPets', 'type'])

@foreach ($pets as $pet)
    @if (strtolower($typeOfPets->find($pet->type_id)->type) == strtolower($type) ||
            ($type == '' &&
                strtolower($typeOfPets->find($pet->type_id)->type) != strtolower('Dog') &&
                strtolower($typeOfPets->find($pet->type_id)->type) != strtolower('Cat')))
		@if (isset($_GET['gender']) && $pet->sex != $_GET['gender'])
			@continue
		@endif
		@if (isset($_GET['breed']) && $pet->breed->breed != $_GET['breed'])
			@continue
		@endif
        <div class="col">
            <div class="card">
                <img src="{{ asset('storage/pet_images/placeholder.webp') }}" class="card-img-top" alt="Image of pet">
                <div class="card-body">
                    <h4 class="card-title"><a href="/pet/{{ $pet->id }}"
                            class="text-decoration-none text-dark stretched-link">{{ $pet->name }}</a></h4>
                    <hr>
                    <p clasS="card-text mb-1"><strong>Months old: </strong>{{ $pet->age_in_months }}</p>
                    <p class="card-text mb-1"><strong>Breed: </strong>{{ $breeds->find($pet->breeds_id)->breed }}
                    </p>
                    <p clasS="card-text mb-1"><strong>Sex: </strong>{{ $pet->sex }}</p>
                    <p clasS="card-text mt-3 h6"><strong>Price: </strong>{{ $pet->price }} DKK</p>
                </div>
            </div>
        </div>
    @endif
@endforeach
