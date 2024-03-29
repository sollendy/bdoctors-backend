@extends('layouts.app')

@section('content')
    @if ($doctor)
        <div class="container">
            <div class="title d-flex justify-content-between align-items-center">
                <h2 class="rounded-pill bg-light p-2">Your Profile</h2>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr class="align-middle text-center">
                        <th scope="col">Name</th>
                        <th scope="col">Services</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle text-center">
                        <td scope="row">{{ $user->name }}</td>
                        <td>
                            @foreach ($doctor->typologies as $typology)
                                <span>
                                    {{ $typology->name }}@unless ($loop->last)
                                    ,
                                @endunless
                            </span>
                        @endforeach
                    </td>
                    <td>
                        <div class="d-flex gap-2 flex-wrap justify-content-center text-center align-items-center">

                            <a class="btn btn-success bg-gradient"
                                href="{{ route('admin.doctors.show', $doctor->slug) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{ route('admin.doctors.edit', $doctor) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form class="m-0 p-0 d-inline-block" action="{{ route('admin.doctors.destroy', $doctor) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-secondary delete-button" data-item-title="{{ $doctor->name }}"
                                    type="submit">
                                    <i class="fa-solid fa-eraser"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-black"
                href="{{ route('admin.reviews') }}">Vedi Recensioni</a></button>
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-black"
                href="{{ route('admin.messages') }}">Vedi Messaggi</a></button>

    </div>
@else
    <div class="container d-flex flex-column align-items-center">
        <h1 class="rounded-pill bg-light p-2">You Have No Profile</h1>
        <a class="btn btn-primary mt-3" href="{{ route('admin.doctors.create') }}">Create Profile</a>
    </div>
@endif

<div class="container d-flex flex-column align-items-center">
</div>
@endsection
