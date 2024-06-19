@extends('layouts.frontent')

@section("content")
<!-- banner starts -->
<div class="banner home-banner d-flex align-items-center">


    <div class="container">
        <div class="row no-gutters align-items-center">
            <div class="col-lg-6 text-center text-lg-left">
                <h1> Ilmiy faoliyatni amalga oshiruvchilarni indentifikasiya qilishning yagona tizimi </h1>
                <p class="larger-txt"> Oliy ta'lim muassalari professor-o‘qituvchilari, Ilmiy tadqiqot institutlarixodimlari, Ilmiy faoliyat va innovasiya bilan shug‘ullanuvchi tadqiqotchilar shaxsiy kabineti</p>


            </div>
            <!-- End of .col-lg-5 -->

            <div class="col-lg-6">
                <div class="img-container text-center text-lg-right">
                    <img src="/frontent/assets/images/banner/Новый_проект_2_XpMaJv0.jpg" alt="Home banner image" class="img-fluid">
                </div>
                <!-- End of .img-container -->
            </div>
            <!-- End of .col-lg-7 -->
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</div>
<!-- End of .banner -->

<!-- achievements starts -->
<div class="achievements section-gap theme-bg-d achievement-extra-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="counter-block d-flex align-items-center justify-content-center">
                    <div class="icon-container">
                        <img src="/frontent/assets/images/achievements/counter/counter-icon-1.png" alt="Happy Clients">
                    </div>
                    <!-- End of .icon-container -->

                    <div class="counter-wrapper">
                        <div class="number">
                            <span class="counter">450</span>+
                        </div>
                        <!-- End of .number -->
                        Olimlar soni 
                    </div>
                    <!-- End of .counter-wrapper -->
                </div>
                <!-- End of .counter-block -->
            </div>
            <!-- End of .col-4 -->
            <div class="col-4">
                <div class="counter-block d-flex align-items-center justify-content-center">
                    <div class="icon-container">
                        <img src="/frontent/assets/images/achievements/counter/counter-icon-2.png"
                            alt="Running Projects">
                    </div>
                    <!-- End of .icon-container -->

                    <div class="counter-wrapper">
                        <div class="number">
                            <span class="counter">4510</span>+
                        </div>
                        <!-- End of .number -->
                        Tashkilotlar soni
                    </div>
                    <!-- End of .counter-wrapper -->
                </div>
                <!-- End of .counter-block -->
            </div>
            <div class="col-4">
                <div class="counter-block d-flex align-items-center justify-content-center">
                    <div class="icon-container">
                        <img src="/frontent/assets/images/achievements/counter/counter-icon-3.png"
                            alt="Project Completed">
                    </div>
                    <!-- End of .icon-container -->

                    <div class="counter-wrapper">
                        <div class="number">
                            <span class="counter">2500</span>+
                        </div>
                        <!-- End of .number -->
                        Yangi  qo'shilgan <br> tadqiqotchilar
                    </div>
                    <!-- End of .counter-wrapper -->
                </div>
                <!-- End of .counter-block -->
            </div>
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</div>
<!-- End of .achievements -->
@endsection