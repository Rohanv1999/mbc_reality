@php
    $cta = getContent('cta.content', true);
@endphp
<section class="cta-section">
    <div class="container">
        <div class="cta-wrapper bg_img" style="background-image: url({{getImage('assets/images/frontend/cta/'. @$cta->data_values->background_image, '1920x768')}});">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft text-lg-start text-center" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <h2 class="title text-white">{{__(@$cta->data_values->heading)}}</h2>
                    <p class="text-white mt-3">{{__(@$cta->data_values->sub_heading)}}</p>
                </div>
                <div class="col-lg-6 text-lg-end text-center mt-lg-0 mt-4 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <a href="{{url(@$cta->data_values->btn_url)}}" class="btn btn--base">{{__(@$cta->data_values->btn_name)}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
