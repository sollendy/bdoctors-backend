@extends('layouts.app')

@section('content')

    <div class="p-3">
        <h1>Le tue recensioni</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Testo</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $key => $review)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $review->name_ui }}</td>
                        <td>{{ $review->lastname_ui }}</td>
                        <td>{{ $review->email_ui }}</td>
                        <td>{{ $review->text }}</td>
                        <td>
                            @if ($review->created_at)
                                {{ $review->created_at->format('M d, Y') }}
                            @else
                                No date available
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-light"><a href="{{ url('/admin') }}">Torna indietro</a></button>
    </div>
@endsection