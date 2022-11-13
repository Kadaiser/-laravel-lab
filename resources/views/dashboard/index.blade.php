@extends('layotus.app-master')

@section('content')

<script type="text/javascript" src="{{url('assets/js/websocket_connection_manager.js')}}"></script>

@include('layotus.partials.cards.addCard')
@include('layotus.partials.cards.chartLine')
@include('layotus.partials.cards.simpleLed')

@endsection