<script type="text/javascript" src="{{url('assets/js/rgbLed_card.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/card.js')}}"></script>

<div class="container container-card mt-4 p-2 w-25 border">
    <?php $titleCard = "Simple Led"; ?>
    @include('layotus.partials.cards.component.dropdownCornerMenu')

    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">
            <button type="button" id="btn-toggle-led" class="btn btn-danger">Endencer</button>
        </div>
    </div>
</div>