@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <message :subjects="{{ json_encode($subjects) }}"></message>
</div>
@endsection
