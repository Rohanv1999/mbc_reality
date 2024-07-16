@php
    $listing = getContent('listing.content', true);
    $properties = App\Models\Property::where('status', 1)->with('location', 'city', 'propertyInfo')->orderBy('id', 'DESC')->limit(3)->get();
@endphp
<section class="pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-header">
                    <h2 class="section-title wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">{{__(@$listing->data_values->heading)}}</h2>
                    <p class="mt-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">{{__(@$listing->data_values->sub_heading)}}</p>
                </div>
            </div> 
        </div><!-- row end -->
        <div class="new-list-slider">
            @foreach($properties as $property)
                <div class="single-slide">
                    <div class="new-list-card has--link">
                        <a href="{{route('property.details',[slug($property->title), $property->id])}}" class="item--link"></a>
                        <div class="new-list-card__thumb">
                            <img src="{{getImage(imagePath()['property']['path'] .'/'.$property->image,imagePath()['property']['size'])}}" alt="@lang('image')">
                        </div>
                        <div class="new-list-card__content">
                            <h4 class="title">{{__($property->title)}}</h4>
                            <p class="location"><i class="las la-map-marked-alt"></i>{{__($property->location->name)}}, {{__($property->city->name)}}</p>
                            <div class="new-list-card__footer">
                                <div class="price">{{$general->cur_sym}}{{getAmount($property->propertyInfo->price)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
