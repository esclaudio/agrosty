@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">{{ __('Informe') }}</h4>
            </div><!-- card-header -->

            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Asunto') }}</th>
                        <th class="text-right">{{ __('Cantidad') }}</th>
                        <th class="text-right">{{ __('Porcentaje') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group => $messages)
                        <tr>
                            <td>{{ $group }}</td>
                            <td class="text-right">{{ count($messages) }}</td>
                            <td class="text-right">{{ round(count($messages)/$total*100, 2) }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- card -->
    </div><!-- container -->
@endsection
