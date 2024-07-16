@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $contact = getContent('contact_us.content', true);
@endphp
@include($activeTemplate . 'partials.breadcrumb')
<section class="pt-100 pb-100 position-relative z-index">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <span class="subtitle fw-bold text--base font-size--18px border-left">@lang('Contact with us')</span>
                <h2 class="section-title">{{__($contact->data_values->title)}}</h2>
                <ul class="contact-info-list mt-5">
                    <li class="single-info d-flex flex-wrap align-items-center">
                        <div class="single-info__icon text-white d-flex justify-content-center align-items-center rounded-3">
                            <i class="las la-map-marked-alt"></i>
                        </div>
                        <div class="single-info__content">
                            <h4 class="title">@lang('Our Address')</h4>
                            <p class="mt-3">{{__($contact->data_values->contact_details)}}</p>
                        </div> 
                    </li><!-- single-info end -->
                    <li class="single-info d-flex flex-wrap align-items-center">
                        <div class="single-info__icon text-white d-flex justify-content-center align-items-center rounded-3">
                            <i class="las la-envelope"></i>
                        </div>
                        <div class="single-info__content">
                            <h4 class="title">@lang('Email Address')</h4>
                            <p class="mt-3"><a href="mailto:{{__($contact->data_values->email_address)}}" class="text--secondary">{{__($contact->data_values->email_address)}}</a></p>
                        </div> 
                    </li><!-- single-info end -->
                    <li class="single-info d-flex flex-wrap align-items-center">
                        <div class="single-info__icon text-white d-flex justify-content-center align-items-center rounded-3">
                            <i class="las la-phone-volume"></i>
                        </div>
                        <div class="single-info__content">
                            <h4 class="title">@lang('Phone Number')</h4>
                            <p class="mt-3"><a href="tel:{{__($contact->data_values->contact_number)}}" class="text--secondary">{{__($contact->data_values->contact_number)}}</a></p>
                        </div> 
                    </li><!-- single-info end -->
                </ul>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <form method="POST" action="" class="contact-form p-sm-5 p-3 section--bg rounded-3 position-relative box--border box--shadow">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="name">@lang('Name') <sup class="text--danger">*</sup></label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="@lang('Full name')" autocomplete="off" class="form--control" required="">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="email">@lang('Email') <sup class="text--danger">*</sup></label>
                            <input type="text" id="email" name="email" value="{{old('email')}}" autocomplete="off" placeholder="@lang('Email address')" class="form--control">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>@lang('Subject') <sup class="text--danger">*</sup></label>
                            <input type="text" name="subject"  autocomplete="off" value="{{old('subject')}}" placeholder="@lang('Enter Subject')" value="{{old('subject')}}" class="form--control" required="">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>@lang('Message') <sup class="text--danger">*</sup></label>
                            <textarea name="message" placeholder="@lang('Your message')" class="form--control" required="">{{old('message')}}</textarea>
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
@endsection
