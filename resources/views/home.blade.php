@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido a la APP del concesionario') }}
                    <a class = "btn btn-primary fw-semibold ms-2" href="{{route('carros.index')}}">
                        Visualizar Carros
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
