@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                	<form action="{{route('admin.property.update', $property->id)}}" method="POST" enctype="multipart/form-data">
                		@csrf
                		<div class="row">
                             <div class="col-lg-12">
                                <div class="card border--primary mt-2">
                                    <h5 class="card-header bg--primary">@lang('Property Space')</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="image-upload">
                                                        <div class="thumb">
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview" style="background-image: url({{getImage(imagePath()['property']['path'] .'/'.$property->image,imagePath()['property']['size'])}})">
                                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="avatar-edit">
                                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg')</b>. @lang('Image will be resized into') {{imagePath()['property']['size']}}@lang('px'). </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="title" class="font-weight-bold">@lang('Title')</label>
                                                    <input type="text" name="title" id="title" value="{{$property->title}}" class="form-control form-control-lg" placeholder="@lang('Enter Property Title')" maxlength="255" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="property_type" class="font-weight-bold">@lang('Property Type')</label>
                                                    <select name="property_type" id="property_type" class="form-control form-control-lg" required="">
                                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                                        @foreach($propertyTypes as $propertyType)
                                                            <option value="{{$propertyType->id}}" @if($property->property_type == $propertyType->id) selected @endif>{{__($propertyType->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                               <div class="form-group">
                                                    <label for="city" class="font-weight-bold">@lang('City')</label>
                                                    <select name="city" id="city" class="form-control form-control-lg" required="">
                                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}" data-locations="{{ json_encode($city->location) }}" @if($property->city_id == $city->id) selected @endif >{{__($city->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="location" class="font-weight-bold">@lang('Location')</label>
                                                    <select name="location" id="location" class="form-control form-control-lg" required="">
                                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="type" class="font-weight-bold">@lang('Type')</label>
                                                    <select name="type" id="type" class="form-control form-control-lg" required="">
                                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                                        <option value="1" @if($property->type == 1) selected @endif>@lang('For Sale')</option>
                                                        <option value="2" @if($property->type == 2) selected @endif>@lang('For Rent')</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="video_link" class="font-weight-bold">@lang('Property Video Link')</label>
                                                    <input type="text" name="video_link" id="video_link" value="{{$property->video_link}}" class="form-control form-control-lg" placeholder="@lang('https://www.youtube.com/embed/example')" maxlength="255" required="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                             <div class="col-lg-12">
                                <div class="card border--primary mt-2">
                                    <h5 class="card-header bg--primary">@lang('Property Owner Information')</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">@lang('Name')</label>
                                                    <input type="text" name="name" id="name" value="{{$property->name}}" class="form-control form-control-lg" placeholder="@lang('Enter Full Name')" maxlength="80" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="phone" class="font-weight-bold">@lang('Phone')</label>
                                                    <input type="phone" name="phone" id="phone" value="{{$property->phone}}" class="form-control form-control-lg" placeholder="@lang('Enter Phone')" maxlength="40" required="">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email" class="font-weight-bold">@lang('Email')</label>
                                                    <input type="email" name="email" id="email" value="{{$property->email}}" class="form-control form-control-lg" placeholder="@lang('Enter Email Address')" maxlength="60" required="">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="facebook" class="form-control-label font-weight-bold">@lang('Facebook Url')</label>
                                                    <div class="input-group mb-3">
                                                          <input type="text" id="facebook" class="form-control form-control-lg" value="{{@$property->social_media->facebook}}" placeholder="@lang('Enter Facebook Url')" name="facebook" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2"><i class="lab la-facebook-f"></i></span>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="twitter" class="form-control-label font-weight-bold">@lang('Twitter Url')</label>
                                                    <div class="input-group mb-3">
                                                          <input type="text" id="twitter" value="{{@$property->social_media->twitter}}" class="form-control form-control-lg" placeholder="@lang('Enter Twitter Url')" name="twitter" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2"><i class="lab la-twitter"></i></span>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="linkedinIn" class="form-control-label font-weight-bold">@lang('LinkedinIn Url')</label>
                                                    <div class="input-group mb-3">
                                                          <input type="text" id="linkedinIn" value="{{@$property->social_media->linkedinIn}}" class="form-control form-control-lg" placeholder="@lang('Enter LinkedinIn Url')" name="linkedinIn" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2"><i class="lab la-linkedin-in"></i></span>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="instagram" class="form-control-label font-weight-bold">@lang('Instagram Url')</label>
                                                    <div class="input-group mb-3">
                                                          <input type="text" id="instagram"  value="{{@$property->social_media->instagram}}" class="form-control form-control-lg" placeholder="@lang('Enter Instagram Url')" name="instagram" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2"><i class="lab la-instagram"></i></span>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       	<div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg"><i class="fa fa-fw fa-paper-plane"></i> @lang('Create Property')</button>
                        </div>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{route('admin.property.index')}}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush

@push('script')
    <script>
        "use strict";
        $('select[name=city]').change(function() {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                if (item.id == {{$property->location_id}}) {
                    html += `<option value="${item.id}" selected>${item.name}</option>`
                }else{
                    html += `<option value="${item.id}">${item.name}</option>`
                }
            });
            $('select[name=location]').append(html);
        }).change();
    </script>
@endpush


