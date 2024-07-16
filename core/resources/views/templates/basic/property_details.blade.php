@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
<section class="pt-100 pb-100">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-6 col-md-9">
                <div class="property-details-header text-md-start text-center">
                    <h2 class="title fw-bold">{{__($property->title)}}</h2>
                    <ul class="property-details-meta justify-content-md-start justify-content-center mt-2">
                        <li>
                            <i class="las la-map-marked-alt"></i>
                            <span>{{__($property->location->name)}}, {{__($property->city->name)}}</span>
                        </li>
                        <li>
                            <i class="las la-door-open"></i>
                            <span>@lang('Available From') :{{showDateTime($property->propertyInfo->available_time, 'd M Y')}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 text-md-end text-center mt-md-0 mt-3">
                <div class="property-details-price">{{__($general->cur_sym)}}{{getAmount($property->propertyInfo->price)}}</div>
                <p><i class="las la-calendar"></i> {{showDateTime($property->created_at, 'd M Y')}}</p>
            </div>
        </div><!-- row end -->
        <div class="row">
            <div class="col-lg-9">
                <div class="property-details-thumb-slider">
                    <div class="details-thumb-slider">
                        <div class="single-slide">
                            <div class="thumb-item">
                                <img src="{{getImage(imagePath()['property']['path'] .'/'.$property->image,imagePath()['property']['size'])}}" alt="@lang('image')">
                            </div>
                        </div>
                         @if(!empty($property->propertyInfo->propertyOptionalImage))
                            @foreach($property->propertyInfo->propertyOptionalImage as $value)
                                <div class="single-slide">
                                    <div class="thumb-item">
                                        <img src="{{getImage(imagePath()['property']['path'] .'/'.$value->image,imagePath()['property']['size'])}}" alt="@lang('image')">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <ul class="nav nav-tabs custom--nav-tabs style--two mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">@lang('Overview')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="contact" aria-selected="false">@lang('Description')</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="amenities-tab" data-bs-toggle="tab" data-bs-target="#amenities" type="button" role="tab" aria-controls="amenities" aria-selected="false">@lang('Amenities')</button>
                    </li>
                </ul>
                    <div class="tab-content" id="propertDetailsContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="property-details-box mt-5">
                                <h4 class="title">@lang('Overview')</h4>
                                <ul class="property-meta">
                                    

                                    <li>
                                        <i class="las la-bed"></i>
                                        <span>{{__($property->propertyInfo->room)}} @lang('Rooms')</span>
                                    </li>
                                    <li>
                                        <i class="las la-bath"></i>
                                        <span>{{__($property->propertyInfo->bathroom)}} @lang('Bathrooms')</span>
                                    </li>
                                    <li>
                                        <i class="las la-car"></i>
                                        <span>{{__($property->propertyInfo->car_parking)}} @lang('Parkings')</span>
                                    </li>
                                    <li>
                                        <i class="las la-expand-arrows-alt"></i>
                                        <span>{{getAmount($property->propertyInfo->square_feet)}} @lang('Sqft')</span>
                                    </li>

                                     <li>
                                        <i class="las la-pager"></i>
                                        <span>{{__($property->propertyInfo->unit)}} @lang('Unit')</span>
                                    </li>

                                    <li>
                                        <i class="las la-hospital-alt"></i>
                                        <span>{{__($property->propertyInfo->kitchen)}} @lang('Kitchen')</span>
                                    </li>

                                    <li>
                                        <i class="las la-expand-arrows-alt"></i>
                                        <span>{{__($property->propertyInfo->floor)}} @lang('Floor')</span>
                                    </li>

                                    <li>
                                        <i class="las la-chevron-left"></i>
                                        <span>{{__($property->propertyInfo->lefts)}} @lang('Left')</span>
                                    </li>

                                </ul>
                            </div><!-- property-details-box end -->

                            @php 
                                echo advertisements('830x220') 
                            @endphp

                            <div class="property-details-box mt-4">
                                <h4 class="title">@lang('Property Overview Video')</h4>
                                <iframe width="100%" height="450" src="{{__($property->video_link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div><!-- property-details-box end -->
                            
                            @php 
                                echo advertisements('830x220') 
                            @endphp
                        </div>
                        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                             @php 
                                echo advertisements('830x220') 
                            @endphp
                            <div class="mt-4">
                                @php echo $property->propertyInfo->description @endphp
                            </div>
                        </div>
                        <div class="tab-pane fade" id="amenities" role="tabpanel" aria-labelledby="amenities-tab">
                                 @php 
                                    echo advertisements('830x220') 
                                @endphp
                                <div class="property-details-box mt-4">
                                    <h4 class="title">@lang('Amenities')</h4>
                                    <ul class="amenities-list">
                                         @if(!empty($property->propertyInfo->propertyAmenities))
                                            @foreach($property->propertyInfo->propertyAmenities as $value)
                                                <li>{{__($value->name)}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div><!-- property-details-box end -->
                                 @php 
                                    echo advertisements('830x220') 
                                @endphp
                        </div>
                    </div>
            </div>

            <div class="col-lg-3">
                <div class="property-sidebar">
                    <div class="property-widget">
                        <div class="agent">
                            <div class="agent__content">
                                <h6 class="name">{{__($property->name)}}</h6>
                                
                                <ul class="d-flex flex-wrap align-items-center agent-social-list">
                                    <li><a href="{{@$property->social_media->facebook}}" target="__blank"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="{{@$property->social_media->twitter}}" target="__blank"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="{{@$property->social_media->linkedinIn}}" target="__blank"><i class="lab la-linkedin-in"></i></a></li>
                                    <li><a href="{{@$property->social_media->instagram}}" target="__blank"><i class="lab la-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- agent end -->

                        <form method="POST" action="{{route('contact.property.owner')}}" class="agent-form mt-4">
                            @csrf
                            <input type="hidden" name="property_id" value="{{$property->id}}">
                            <div class="form-group">
                                <input type="text" name="name" autocomplete="off" placeholder="@lang('Full name')" class="form--control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" autocomplete="off" placeholder="@lang('Email address')" class="form--control">
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="@lang('Your Message')" class="form--control"></textarea>
                            </div>
                            <button type="submit" class="btn btn--base">@lang('Send Message')</button>
                        </form><!-- agent-form end -->

                         @php 
                            echo advertisements('272x269') 
                        @endphp
                    </div><!-- property-widget end -->
                </div><!-- property-sidebar end -->
            </div>
        </div>
    </div>
</section>
@endsection

