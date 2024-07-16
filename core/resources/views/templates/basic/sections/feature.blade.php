@php
    $feature = getContent('feature.content', true);
    $properties = App\Models\Property::where('status', 1)->where('featured', 1)->with('location', 'city', 'propertyInfo')->inRandomOrder()->limit(8)->get();
@endphp
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{__(@$feature->data_values->heading)}}</h2>
                    <p class="mt-3">{{__(@$feature->data_values->sub_heading)}}</p>
                </div>
            </div> 
        </div><!-- row end -->
        <div class="row justify-content-center gy-4">
            @foreach($properties as $property)
                 <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1s">
                    <div class="property-card">
                        <div class="property-card__thumb">
                            <a href="{{route('property.details',[slug($property->title), $property->id])}}" class="d-block"><img src="{{getImage(imagePath()['property']['path'] .'/'.$property->image,imagePath()['property']['size'])}}" alt="@lang('image')"></a>
                            <div class="property-status">
                                @if($property->type == 1)@lang('For Rent') @else @lang('For Sale') @endif
                            </div>
                            @if($property->featured == 1)
                                <div class="property-badge">
                                    <i class="las la-fire"></i> @lang('Featured')
                                </div>
                            @endif
                        </div>
                        <div class="property-card__content">
                            <div class="property-card__details">
                                <div class="price">{{__($general->cur_sym)}}{{getAmount($property->propertyInfo->price)}}</div>
                                <h4 class="title mt-2"><a href="{{route('property.details',[slug($property->title), $property->id])}}">{{__($property->title)}}</a></h4>
                                <p class="location"><i class="las la-map-marked-alt"></i> {{__($property->location->name)}}, {{__($property->city->name)}}</p>
                                <ul class="property-meta">
                                    <li>
                                        <i class="las la-bed"></i>
                                        <span>{{__($property->propertyInfo->room)}} @lang('bd.')</span>
                                    </li>
                                    <li>
                                        <i class="las la-bath"></i>
                                        <span>{{__($property->propertyInfo->bathroom)}} @lang('ba.')</span>
                                    </li>
                                    <li>
                                        <i class="las la-expand-arrows-alt"></i>
                                        <span>{{getAmount($property->propertyInfo->square_feet)}} @lang('Sq.')</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <a href="{{route('property')}}" class="btn btn--base">@lang('View All Featured List')</a>
            </div>
        </div>
    </div>
</section>
