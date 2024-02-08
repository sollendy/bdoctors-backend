@extends('layouts.app')

@section('content')
    <div class="p-3">
        <h1>I tuoi messaggi</h1>
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
                @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{ $message->id }}</th>
                        <td class="text-dark">{{ $message->name_ui }}</td>
                        <td>{{ $message->lastname_ui }}</td>
                        <td>{{ $message->email_ui }}</td>
                        <td>{{ $message->text }}</td>
                        <td class="form-date">{{ $message->created_at }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
