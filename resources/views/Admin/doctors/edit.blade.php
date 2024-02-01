@extends('layouts.app')

@section('content')
    <a class="btn btn-primary ms-4 my-4" href="{{ route('admin.dashboard') }}">Go Back</a>
    <div class="container card p-4">
        <form method="POST" action="{{ route('admin.doctors.update', $doctor) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Address</label>
                        <input type="address" class="@error('address') is-invalid @enderror form-control"
                            id="exampleInputAddress" aria-describedby="addressHelp" name="address"
                            value="{{ old('address', $doctor->address) }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Description</label>
                        <textarea id="type" name="description" class=" form-control @error('description') is-invalid @enderror"
                            id="exampleInputDescription" rows="5">{{ old('description', $doctor->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhoto" class="form-label">Photo</label>
                        <input type="file" class="@error('photo') is-invalid @enderror form-control"
                            id="exampleInputPhoto" name="photo" value="{{ old('photo', $doctor->photo) }}">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <img class="img-fluid" src="{{ $doctor->getPhotoUri() }}" id="image_preview">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputService" class="form-label">Servizio</label>
                        <input type="text" class="@error('services') is-invalid @enderror form-control"
                            id="exampleInputService" aria-describedby="emailHelp" name="services"
                            value="{{ old('services', $doctor->services) }}">
                        @error('services')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>Visible</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="visible-true" value= '1'
                                {{ $doctor->visible ? 'checked' : '' }} required>
                            <label class="visible-true" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="visible-false" value= '0'
                                {{ $doctor->visible ? '' : 'checked' }} required>
                            <label class="form-check-label" for="visible-false">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTypologies" class="form-label">Services</label>
                        @foreach ($typologies as $typology)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" for="typology-{{ $typology->id }}"
                                    name="typologies[]" value="{{ $typology->id }}"
                                    {{ in_array($typology->id, old('typologies', [])) ? 'checked' : '' }}>

                                <label class="form-check-label" for="typology-{{ $typology->id }}">
                                    {{ $typology->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>


            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                <button class="btn btn-primary ms-2" type="submit">Edit</button>
            </div>
        </form>
    </div>
@endsection
