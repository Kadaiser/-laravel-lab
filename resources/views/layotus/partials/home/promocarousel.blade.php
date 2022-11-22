<!-- Carousel wrapper -->
<div id="crossfade_promo" class="carousel slide carousel-fade" data-mdb-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-mdb-target="#crossfade_promo" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-mdb-target="#crossfade_promo" data-mdb-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-mdb-target="#crossfade_promo" data-mdb-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Inner -->
    <div class="carousel-inner rounded-2 shadow-4-strong">
        
        <!-- Single item -->
        <div class="carousel-item active" data-mdb-interval="8000">
            <img src="{{url('assets/images/jpg/promo/carousel1.jpg')}}" class="d-block w-100" alt="Breadboard for Raspberry"/>
            <div class="carousel-caption d-none d-md-block">
                <div>
                    <h4>Personaliza tus pruebas</h4>
                    <p>Una raspberry, un sensor y un actuador para empezar.</p>
                </div>
            </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item" data-mdb-interval="5000">
            <img src="{{url('assets/images/jpg/promo/carousel2.jpg')}}" class="d-block w-100" alt="Esp32 with led"/>
            <div class="carousel-caption d-none d-md-block">
                <div>
                    <h4>Microcontroladoras en remoto</h4>
                    <p>Dispositivos remotos para supervisar otras estancias.</p>
                </div>
            </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item" data-mdb-interval="5000">
            <img src="{{url('assets/images/jpg/promo/carousel3.jpg')}}" class="d-block w-100" alt="Kadaiser presenting"/>
            <div class="carousel-caption d-none d-md-block">
                <div>
                    <h4>Open Source & Free</h4>
                    <p>Uso de tecnologías open source y disponibles en la red.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner -->

</div>
<!-- Carousel wrapper -->