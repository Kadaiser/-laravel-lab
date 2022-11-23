@extends('layotus.app-master')

@section('content')

<script type="text/javascript" src="{{url('assets/js/websocket_connection_manager.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/card.js')}}"></script>

@include('layotus.partials.cards.addCard')
@include('layotus.partials.cards.chartLine')
@include('layotus.partials.cards.simpleLed')
@include('layotus.partials.cards.rgbLed')

@endsection