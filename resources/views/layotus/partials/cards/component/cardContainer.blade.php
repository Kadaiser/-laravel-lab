
<script type="text/javascript" src="{{url('assets/js/card.js')}}"></script>

<div class="container container-card mt-4 p-2 bg-dark rounded {{$defaultSize}} border border-success">
    @include('layotus.partials.cards.component.dropdownCornerMenu')
    @yield($yieldRequest)
</div>