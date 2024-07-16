@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
<section class="pb-100">
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('property.search')}}" method="GET" class="search-form">
                        <div class="row align-items-end gy-3">
                            <div class="col-lg-3 col-sm-6">
                                <label>@lang('City')</label>
                                <select name="city" class="select2-basic">
                                    <option value="">@lang('Select One')</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" @if(@$cityId == $city->id) selected @endif data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <label>@lang('Location')</label>
                                <select name="location" class="select2-basic">
                                    <option value="" selected disabled>@lang('Select One')</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>@lang('Search')</label>
                                <input type="text" name="search" value="{{@$search}}" placeholder="@lang('Something search here')..." autocomplete="off" class="form--control">
                            </div>
                            <div class="col-lg-2 col-6">
                                <button type="submit" class="btn btn--base"><i class="las la-search"></i> @lang('Search')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-50">
        <div class="row">
            <div class="col-lg-3 mb-lg-0 mb-3">
                <button class="action-sidebar-open"><i class="las la-sliders-h"></i> @lang('Filter')</button>
                <div class="action-sidebar">
                    <button class="action-sidebar-close"><i class="las la-times"></i></button>
                    <form action="{{route('property.search')}}" method="GET" class="search-form">
                        <div class="action-widget mt-4">
                            <h6 class="action-widget__title">@lang('Property Type')</h6>
                            <div class="action-widget__body ">
                                @foreach($propertyTypes as $propertyType)
                                    <div class="form-check custom--checkbox">
                                        <input class="form-check-input propertyTypes" name="property_type[]" type="checkbox" value="{{$propertyType->id}}" id="{{$propertyType->id}}" 
                                                @if(!empty($propertyTypeData))
                                                    @foreach($propertyTypeData as $val)
                                                        @if($val == $propertyType->id)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                @endif
                                        >
                                        <label class="form-check-label" for="{{$propertyType->id}}">
                                            {{__($propertyType->name)}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @php 
                            echo advertisements('264x262') 
                        @endphp
                    
                        <div class="action-widget mt-4">
                            <h6 class="action-widget__title">@lang('Property Purpose')</h6>
                            <div class="action-widget__body">
                                <div class="form-check custom--radio">
                                    <input class="form-check-input propertyPurpose" type="radio" value="1" @if(@$propertyPurpose == 1) checked @endif  name="property_purpose" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        @lang('For Rent')
                                    </label>
                                </div>
                                <div class="form-check custom--radio">
                                    <input class="form-check-input propertyPurpose" type="radio" value="2" @if(@$propertyPurpose == 2) checked @endif name="property_purpose" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        @lang('For Sale')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="action-widget mt-4">
                            <h6 class="action-widget__title">@lang('Filter by price')</h6>
                            <div class="action-widget__body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="min_price" placeholder="@lang('min')" value="{{@$minSearch}}" class="form--control form-control-sm">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="max_price" placeholder="@lang('max')" class="form--control form-control-sm">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-sm btn--base w-100">@lang('Filter')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

                @php 
                    echo advertisements('264x450') 
                @endphp


                </div>
            </div>
            <div class="col-lg-9">
                <div class="row align-items-center mb-3">
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <p>@lang('Showing Item') <b>{{$propertys->count()}}</b></p>
                    </div>
                   
                    <div class="col-md-2 col-sm-3 col-5 ms-auto">
                        <div class="card-view-btn-area">
                            <button class="list-view-btn"><i class="las la-bars"></i></button>
                            <button class="grid-view-btn active"><i class="las la-th-large"></i></button>
                        </div>
                    </div>
                </div><!-- row end -->

                <div class="row gy-4 card-view-area grid-view">
                    @forelse($propertys as $property)
                        <div class="col-xl-4 col-md-6 card-view">
                            <div class="property-card">
                                <div class="property-card__thumb">
                                    <a href="{{route('property.details',[slug($property->title), $property->id])}}" class="d-block"><img src="{{getImage(imagePath()['property']['path'] .'/'.$property->image,imagePath()['property']['size'])}}" alt="@lang('image')"></a>
                                    <div class="property-status">@if($property->type == 1)@lang('For Rent') @else @lang('For Sale') @endif</div>
                                    @if($property->featured == 1)
                                        <div class="property-badge">
                                                <i class="las la-fire"></i>@lang('Featured')
                                        </div>
                                    @endif
                                </div>
                                <div class="property-card__content">
                                    <div class="property-card__details">
                                        <div class="price">{{$general->cur_sym}}{{getAmount($property->propertyInfo->price)}}</div>
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
                                                <span>{{getAmount($property->propertyInfo->square_feet)}} @lang('sq.')</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h2 class="text-center">{{__($emptyMessage)}}</h2>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        {{$propertys->links()}}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('script')
<script>
    (function($){
        "use strict";
        $('.propertyTypes').on('click', function(){
            this.form.submit();
        });

        $('.propertyPurpose').on('click', function(){
            this.form.submit();
        });

        $('select[name=city]').on('change',function() {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=location]').append(html);
        })

    })(jQuery)
    </script>
@endpush



