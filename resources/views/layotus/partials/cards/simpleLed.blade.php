<script type="text/javascript" src="{{url('assets/js/simpleLed_card.js')}}"></script>

@extends('layotus.partials.cards.component.cardContainer', ['yieldRequest' => 'simpleLed','defaultSize' =>'w-25'])
<?php $titleCard = "SimpleLed"; ?>

@section('simpleLed')
    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">
            <button type="button" id="btn-toggle-led" class="btn btn-danger">Endencer</button>
        </div>
    </div>
@endsection