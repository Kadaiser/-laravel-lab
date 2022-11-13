<script type="text/javascript" src="{{url('assets/js/simpleLed_card.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/card.js')}}"></script>

<div class="container container-card mt-4 p-2 w-50 border">
    
    @include('layotus.partials.cards.component.dropdownCornerMenu')

    <div class="row justify-content-center">
        <div class="col d-flex">
            <button type="button" id="btn-toggle-led" class="btn btn-danger">Endencer</button>
        </div>
    </div>
    <div class="row">
        <canvas  id="chart_temphum"></div>
    </div>
</div>