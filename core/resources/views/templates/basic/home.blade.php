@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $banner = getContent('banner.content', true);
@endphp
<section class="hero bg_img" style="background-image: url({{getImage('assets/images/frontend/banner/'. @$banner->data_values->background_image, '1920x852')}});">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-10">
				<div class="hero-list-item">
					<span class="hero-list-item-badge bg--base">{{__(@$banner->data_values->heading)}}</span>
					@if($property)
					<div class="hero-list-item-top text-center">
						<h3 class="title" data-animation="fadeInUp" data-delay=".5s"><a href="{{route('property.details',[slug(@$property->title), $property->id])}}" class="text-white">{{__(@$property->title)}}</a></h3>
						<ul class="property-details-meta justify-content-center mt-2 text-white">
								<li>
									<i class="las la-map-marked-alt"></i>
									<span>{{__(@$property->city->name)}}, {{__(@$property->location->name)}}</span>
								</li>
								<li>
									<i class="las la-door-open"></i>
									<span>@lang('Available From') :{{showDateTime(@$property->propertyInfo->available_time, 'd M Y')}}</span>
								</li>
						</ul>
					</div>
					@endif
					<div class="hero-list-item-list">
						<div class="single">
							<i class="las la-bed" data-animation="fadeInUp" data-delay=".3s"></i>
							<h6 class="caption" data-animation="fadeInUp" data-delay=".5s">{{__(@$property->propertyInfo->room)}} @lang('ROOMS')</h6>
						</div>
						<div class="single">
							<i class="las la-bath"  data-animation="fadeInUp" data-delay=".3s"></i>
							<h6 class="caption"  data-animation="fadeInUp" data-delay=".5s">{{__(@$property->propertyInfo->bathroom)}} @lang('BATHROOMS')</h6>
						</div>
						<div class="single">
							<i class="las la-car"  data-animation="fadeInUp" data-delay=".3s"></i>
							<h6 class="caption"  data-animation="fadeInUp" data-delay=".5s">{{__(@$property->propertyInfo->car_parking)}} @lang('PARKINGS')</h6>
						</div>
						<div class="single">
							<i class="las la-expand-arrows-alt"  data-animation="fadeInUp" data-delay=".3s"></i>
							<h6 class="caption"  data-animation="fadeInUp" data-delay=".5s">{{getAmount(@$property->propertyInfo->square_feet)}} @lang('SQFT')</h6>
						</div>
					</div>
					<div class="hero-list-item-bottom text-center">
						<div class="price" data-animation="fadeInUp" data-delay=".3s">{{$general->cur_sym}}{{getAmount(@$property->propertyInfo->price)}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="main-search-area">
	<div class="bg-el"><img src="{{getImage('assets/images/frontend/banner/'. @$banner->data_values->search_image, '1024x717')}}" alt="@lang('image')"></div>
	<div class="container">
		<form action="{{route('property.search')}}" method="get">
			<div class="row align-items-end gy-3">
				<div class="col-lg-3 col-sm-6">
					<label class="text-white">@lang('City')</label>
					<select class="select2-basic" name="city">
						<option selected="" disabled="">@lang('Select One')</option>
						@foreach($cities as $city)
							<option value="{{$city->id}}" data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
						@endforeach
						
					</select>
				</div>
				<div class="col-lg-3 col-sm-6">
					<label class="text-white">@lang('Location')</label>
					<select class="select2-basic" name="location">
						<option>@lang('Select One')</option>
						<option selected="" disabled="">@lang('Select One')</option>
					</select>
				</div>
				<div class="col-lg-4 col-md-9">
					<label class="text-white">@lang('Search')</label>
					<input type="text" name="search" placeholder="@lang('Something search here')..." autocomplete="off" class="form--control">
				</div>
				<div class="col-lg-2 col-md-3">
					<button type="submit" class="btn btn--base w-100"><i class="las la-search"></i> @lang('Search')</button>
				</div>
			</div>
		</form>
	</div>
</div>
    @if($sections->secs != null)
        @foreach(json_decode($sections->secs) as $sec)
            @include($activeTemplate.'sections.'.$sec)
        @endforeach
    @endif
@endsection

@push('script')
 <script>
    "use strict";
    $('select[name=city]').on('change',function() {
        $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
        var locations = $('select[name=city] :selected').data('locations');
        var html = '';
        locations.forEach(function myFunction(item, index) {
            html += `<option value="${item.id}">${item.name}</option>`
        });
        $('select[name=location]').append(html);
    });
 </script>
@endpush
