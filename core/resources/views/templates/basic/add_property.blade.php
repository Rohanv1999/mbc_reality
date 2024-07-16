@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
<section class="pt-100 pb-100 section--bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{route('property.add.store')}}" class="apply-form p-sm-5 p-3 rounded-3 box--shadow" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb-3">@lang('Property information')</h4>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="title">@lang('Title') <sup class="text--danger">*</sup></label>
                            <input type="text" id="title" name="title" value="{{old('title')}}" placeholder="@lang('Enter Title')" autocomplete="off" class="form--control" required="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="property_type">@lang('Property Type') <sup class="text--danger">*</sup></label>
                            <select class="form--control" name="property_type" id="property_type" required="">
                                <option value="">@lang('Select One')</option>
                                @foreach($propertyTypes as $propertyType)
                                    <option value="{{$propertyType->id}}">{{__($propertyType->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                       <div class="form-group col-lg-6">
                            <label for="city">@lang('City') <sup class="text--danger">*</sup></label>
                            <select name="city" id="city"  class="form--control" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="location">@lang('Location') <sup class="text--danger">*</sup></label>
                            <select name="location" id="location"  class="form--control"  required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="type">@lang('Property Purpose') <sup class="text--danger">*</sup></label>
                            <select name="type" id="type" class="form--control" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                                <option value="1">@lang('For Rent')</option>
                                <option value="2">@lang('For Sale')</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="video_link">@lang('Property Video Link') <sup class="text--danger">*</sup></label>
                            <input type="text" id="video_link" name="video_link" value="{{old('video_link')}}" autocomplete="off" placeholder="@lang('https://www.youtube.com/embed/example')" class="form--control">
                        </div>


                         <div class="form-group col-lg-12">
                            <label for="file">@lang('Image') <sup class="text--danger">*</sup></label>
                            <input type="file" id="file" name="image" class="form--control custom-file-upload" required="">
                        </div>

                        <div class="col-lg-12 mt-5">
                            <h4 class="mb-3">@lang('Property other information')</h4>
                        </div>
                        <div class="form-group col-lg-3">
                            <label>@lang('Total Unit') <sup class="text--danger">*</sup></label>
                            <input type="number" name="unit"  autocomplete="off" value="{{old('unit')}}" placeholder="@lang('Enter Total Unit')" class="form--control" required="">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Total Room') <sup class="text--danger">*</sup></label>
                            <input type="number" name="room"  autocomplete="off" value="{{old('room')}}" placeholder="@lang('Enter Total Room')" class="form--control" required="">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Total Bathroom') <sup class="text--danger">*</sup></label>
                            <input type="number" name="bathroom"  autocomplete="off" value="{{old('bathroom')}}" placeholder="@lang('Enter Total Bathroom')" class="form--control" required="">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Total Kitchen') <sup class="text--danger">*</sup></label>
                            <input type="number" name="kitchen"  autocomplete="off" value="{{old('kitchen')}}" placeholder="@lang('Enter Total Kitchen')" class="form--control" required="">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Total Car Parkings') <sup class="text--danger">*</sup></label>
                            <input type="number" name="car_parking"  autocomplete="off" value="{{old('car_parking')}}" placeholder="@lang('Enter Total Car Parkings')" class="form--control" required="">
                        </div>


                         <div class="form-group col-lg-3">
                            <label>@lang('Total Price') <sup class="text--danger">*</sup></label>
                            <input type="text" name="price"  autocomplete="off" value="{{old('price')}}" placeholder="@lang('Enter Total Price')" class="form--control" required="">
                        </div>


                        <div class="form-group col-lg-3">
                            <label>@lang('Total Square Feet') <sup class="text--danger">*</sup></label>
                            <input type="text" name="square_feet"  autocomplete="off" value="{{old('square_feet')}}" placeholder="@lang('Enter Property Square Feet')" class="form--control" required="">
                        </div>

                         <div class="form-group col-lg-3">
                            <label>@lang('Available Time') <sup class="text--danger">*</sup></label>
                            <input type="text" name="available_time"  autocomplete="off" value="{{old('available_time')}}" placeholder="@lang('Enter Available Time')" class="form--control datepicker-here" required="">
                        </div>


                       <div class="col-lg-">
                        <h4 class="mt-5 mb-3">@lang('Property Owner Information')</h4>
                       </div>

                        <div class="form-group col-lg-4">
                            <label>@lang('Name') <sup class="text--danger">*</sup></label>
                            <input type="text" name="name"  autocomplete="off" value="{{old('name')}}" placeholder="@lang('Enter Name')" class="form--control" required="">
                        </div>

                         <div class="form-group col-lg-4">
                            <label>@lang('Email') <sup class="text--danger">*</sup></label>
                            <input type="email" name="email"  autocomplete="off" value="{{old('email')}}" placeholder="@lang('Enter Email')" class="form--control" required="">
                        </div>

                         <div class="form-group col-lg-4">
                            <label>@lang('Phone') <sup class="text--danger">*</sup></label>
                            <input type="text" name="phone"  autocomplete="off" value="{{old('phone')}}" placeholder="@lang('Enter Phone')" class="form--control" required="">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Facebook Url')</label>
                            <input type="text" name="facebook"  autocomplete="off" value="{{old('facebook')}}" placeholder="@lang('Enter Facebook Url')" class="form--control">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Twitter Url ')</label>
                            <input type="text" name="twitter"  autocomplete="off" value="{{old('twitter')}}" placeholder="@lang('Enter Twitter Url ')" class="form--control">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Linkedin Url')</label>
                            <input type="text" name="linkedinIn"  autocomplete="off" value="{{old('linkedinIn')}}" placeholder="@lang('Enter Linkedin Url')" class="form--control">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>@lang('Instagram Url')</label>
                            <input type="text" name="instagram"  autocomplete="off" value="{{old('instagram')}}" placeholder="@lang('Enter Instagram Url')" class="form--control">
                        </div>

                        <div class="form-group col-lg-12">
                            <label>@lang('Description') <sup class="text--danger">*</sup></label>
                            <textarea name="description" placeholder="@lang('Enter Property Description')" class="form--control" required="">{{old('description')}}</textarea>
                        </div>
                      
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn--base">@lang('Submit Now')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
 @include($activeTemplate . 'sections.faq')
@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/datepicker.min.css')}}">
@endpush
@push('script-lib')
    <script src="{{asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
@endpush

@push('script')
  <script>
        "use strict";
        $('.datepicker-here').datepicker({
            autoClose: true,
            dateFormat: 'yyyy-mm-dd',
        });

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