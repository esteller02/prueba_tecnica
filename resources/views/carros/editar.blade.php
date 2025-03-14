@extends('layouts.app')

@section('content')

<div class = "container">
    <livewire:editar-carro :carro="$carro" />
</div>
@endsection