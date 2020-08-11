@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @else
                <form id="form" action="{{ route('messages.store') }}" method="post">
                    @csrf
                    @include('messages.partials.form')

                    <button type="submit" class="btn btn-success">
                        {{ __('Enviar') }}
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
