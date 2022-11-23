<script type="text/javascript" src="{{url('assets/js/temphum_card.js')}}"></script>

@extends('layotus.partials.cards.component.cardContainer', ['yieldRequest' => 'tempHum', 'defaultSize' =>'w-50'])
<?php $titleCard = "Temp / Hum"; ?>

@section('tempHum')

    <div class="row justify-content-center">
        <div class="col-3 d-flex justify-content-center text-center">Temperatura (C):</div>
        <div class="col-3 d-flex justify-content-center text-center" id="temp"></div>
        <div class="col-3 d-flex justify-content-center text-center">Humedad (%):</div>
        <div class="col-3 d-flex justify-content-center text-center" id="hum"></div>
    </div>
    <div class="row">
        <canvas  id="chart_temphum"></div>
    </div>
    
@endsection