@extends('layouts.app')

@section('content')
    <a class="btn btn-primary ms-4 my-4" href="{{ route('admin.dashboard') }}">Go Back</a>
    <div class="container card p-4">
        <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Address</label>
                        <input type="address" class="@error('address') is-invalid @enderror form-control"
                            id="exampleInputAddress" aria-describedby="addressHelp" name="address">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Description</label>
                        <textarea id="type" name="description" class="@error('description') is-invalid @enderror form-control"
                            id="exampleInputDescription" rows="5"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhoto" class="form-label">Photo</label>
                        <input type="file" class="@error('photo') is-invalid @enderror form-control"
                            id="exampleInputPhoto" name="photo">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputService" class="form-label">Performance</label>
                        <input type="text" class="@error('services') is-invalid @enderror form-control"
                            id="exampleInputService" aria-describedby="emailHelp" name="services">
                        @error('services')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h6>Visible</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="visible-true" value="1"
                                required>
                            <label class="visible-true" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="visible-false" value="0"
                                required>
                            <label class="form-check-label" for="visible-false">No</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputTypologies" class="form-label">Services</label>
                    @foreach ($typologies as $typology)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="typology-{{ $typology->id }}"
                                name="typologies[]" value="{{ $typology->id }}">
                            <label class="form-check-label" for="typology-{{ $typology->id }}">
                                {{ $typology->name }}
                            </label>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                <button class="btn btn-primary ms-2" type="submit">Save</button>
            </div>
    </div>


    </form>
    </div>
@endsection
