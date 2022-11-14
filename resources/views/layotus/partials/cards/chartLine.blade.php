<script type="text/javascript" src="{{url('assets/js/temphum_card.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/card.js')}}"></script>

<div class="container container-card mt-4 p-2 w-50 border">
    <?php $titleCard = "Temp/Hum"; ?>
    @include('layotus.partials.cards.component.dropdownCornerMenu')

    <div class="row justify-content-center">
        <div class="col-3 d-flex justify-content-center text-center">Temperatura (C):</div>
        <div class="col-3 d-flex justify-content-center text-center" id="temp"></div>
        <div class="col-3 d-flex justify-content-center text-center">Humedad (%):</div>
        <div class="col-3 d-flex justify-content-center text-center" id="hum"></div>
    </div>
    <div class="row">
        <canvas  id="chart_temphum"></div>
    </div>
</div>