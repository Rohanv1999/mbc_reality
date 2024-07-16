@php
    $location = getContent('location.content', true);
    $cities = App\Models\City::where('status', 1)->with('property')->inRandomOrder()->limit(6)->get();
@endphp
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="section-header text-center">
                    <h2 class="section-title">{{__($location->data_values->heading)}}</h2>
                    <p class="mt-3">{{__($location->data_values->sub_heading)}}</p>
                </div>
            </div> 
        </div><!-- row end -->


        <div class="row">
            <div class="col-lg-12">
                <div class="row gy-4">
                    @foreach($cities as $city)
                        <div class="col-lg-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="location-card bg_img has--link" style="background-image: url({{getImage('assets/images/city/'. $city->image, '768x550')}});">
                                <a href="{{route('property.city', $city->id)}}" class="item--link"></a>
                                <h4 class="place-name">{{__($city->name)}}</h4>
                                <span class="list-amount">{{$city->property->count()}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

