@extends('layouts.app')

@section('content')
    <a class="btn btn-primary ms-4" href="{{ route('admin.dashboard') }}">Torna indietro</a>
    <div class="container-card">
        <div class="card show-card" style="width: 18rem;">
            <img src="{{ $doctor->getPhotoUri() }}" alt="{{ $user->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-subtitle mb-2 my-2"><strong> Address:</strong> {{ $doctor->address }}</p>
                <p class="card-subtitle mb-2 my-2"><strong>Description:</strong>
                    {{ $doctor->description }}
                </p>
                <p class="card-subtitle mb-2 my-2"><strong> Services:</strong></p>
                <ul>
                    @foreach ($doctor['typologies'] as $index => $element)
                        <span
                            class="card-text">{{ $element['name'] }}{{ $index !== count($doctor['typologies']) - 1 ? ',' : '' }}</span>
                    @endforeach
                </ul>
                <p class="card-subtitle mb-2 my-2"><strong> Performance:</strong> {{ $doctor->services }}</p>
            </div>
        </div>
    </div>
@endsection
