@extends('layouts.app')

@section('content')
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse px-0 shadow h-100 w-20">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark {{Route::currentRouteName() == 'home' ? 'bg-black text-white' : ''}}" aria-current="page" href="{{route('home')}}">
                    <i class="fa-regular fa-chart-bar"></i>
                    {{__('Home')}}
                </a>
                <a class="nav-link text-dark" aria-current="page" href="#">
                    <i class="fa-regular fa-chart-bar"></i>
                    {{__('Messages')}}
                </a>
                <a class="nav-link text-dark" aria-current="page" href="#">
                    <i class="fa-regular fa-chart-bar"></i>
                    {{__('Reviews')}}
                </a>
                <a class="nav-link text-dark" aria-current="page" href="#">
                    <i class="fa-regular fa-chart-bar"></i>
                    {{__('Sponsor')}}
                </a>
                <a class="nav-link text-dark" aria-current="page" href="#">
                    <i class="fa-regular fa-chart-bar"></i>
                    {{__('Statistics')}}
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="container home w-80 overflow-y-scroll">
    <div class="row justify-content-center h-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <span>Hey {{$username}},</span>
                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection