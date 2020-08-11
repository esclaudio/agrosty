@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0">{{ __('Mensajes') }}</h4>
            <a href="{{ route('messages.report') }}" class="btn btn-secondary">
                <i class="fa fa-bar-chart"></i>
                Informe
            </a>
        </div>

        <div class="card-body p-0">
            @if(count($messages) === 0)
                <div class="text-center text-muted m-3">{{ __('No se encontraron mensajes') }}</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th class="text-right">
                                    @if(request('order') === 'asc')
                                        <a href="{{ route('messages.index') }}?order=desc">
                                            {{ __('Fecha') }}
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('messages.index') }}?order=asc">
                                            {{ __('Fecha') }}
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                    @endif
                                </th>
                                <th>{{ __('Nombre') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Asunto') }}</th>
                                <th class="text-center">{{ __('Spam') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td class="text-right">{{ $message->date->format('d/m/Y h:i') }}</td>
                                    <td>{{ $message->fromName }}</td>
                                    <td>{{ $message->fromEmail }}</td>
                                    <td>{{ $message->subject->desc }}</td>
                                    <td class="text-center">
                                        @if($message->is_spam)
                                            <span class="badge badge-danger">
                                                Spam
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {!! nl2br(e($message->body)) !!}
                                    </td>
                                    <td class="text-right">
                                        <a href="mailto:{{ $message->fromEmail }}" class="btn btn-sm btn-secondary" title="{{ __('Mostrar') }}">
                                            <div class="fa fa-envelope"></div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex mt-3 justify-content-end">
        {!! $messages->links() !!}
    </div>
</div>
@endsection
