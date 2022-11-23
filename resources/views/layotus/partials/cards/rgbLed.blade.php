<script type="text/javascript" src="{{url('assets/js/rgbLed_card.js')}}"></script>

@extends('layotus.partials.cards.component.cardContainer', ['yieldRequest' => 'rgbLed', 'defaultSize' =>'w-25'])
<?php $titleCard = "Rgb Led"; ?>

@section('rgbLed')
    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">
            <input type="color" class="form-control form-control-color" id="input-rgb-led-color" value="#000000" title="Choose your color">
        </div>
    </div>
@endsection