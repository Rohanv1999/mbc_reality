@php
    $contact = getContent('contact_us.content', true);
    $footer = getContent('footer.content', true);
    $policys = getContent('policy_pages.element', false);
     $socialIcons = getContent('social_icon.element', false);
@endphp
<footer class="footer bg_img" style="background-image: url({{getImage('assets/images/frontend/footer/'. @$footer->data_values->background_image, '1920x768')}});">
    <div class="footer__top">
        <div class="container">
            <div class="row footer-support align-items-center">
                <div class="col-xl-6 col-lg-8 col-sm-6">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <div class="footer-support-single">
                                <h6 class="caption"><b>@lang('Free support call us') :</b></h6>
                                <a href="tel:{{__(@$contact->data_values->contact_number)}}" class="text--base mt-2"><i class="las la-phone-volume text--base"></i> {{__(@$contact->data_values->contact_number)}}</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-support-single">
                                <h6 class="caption"><b>@lang('Email') :</b></h6>
                                <a href="mailto:{{__(@$contact->data_values->email_address)}}" class="text--base mt-2"><i class="las la-envelope text--base"></i> {{__(@$contact->data_values->email_address)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-sm-6 mt-sm-0 mt-4">
                    <div class="row gy-3 justify-content-end">
                        <div class="col-xl-3 col-lg-6 text-sm-end">
                            <div class="footer-count-item">
                                <h3 class="footer-count text--base">{{__($footer->data_values->first_count_digits)}}</h3>
                                <p class="caption">{{__($footer->data_values->first_count_title)}}</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 text-sm-end">
                            <div class="footer-count-item">
                                <h3 class="footer-count text--base">{{__($footer->data_values->second_count_digits)}}</h3>
                                <p class="caption">{{__($footer->data_values->second_count_title)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-5 justify-content-between mt-5">
                <div class="col-lg-4 col-md-6 orde-1">
                    <div class="footer-widget">
                        <a href="{{route('home')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('logo')" class="footer-logo"></a>
                        <p class="mt-3">{{__($footer->data_values->short_details)}}</p>
                        <form class="subscribe-form mt-3">
                            <input type="email" name="email" id="emailSub" class="form--control" placeholder="@lang('Enter email address')">
                            <button type="button" class="subscribe-form-btn subscribe-btn"><i class="lab la-telegram-plane"></i></button>
                        </form>
                    </div><!-- footer-widget end -->
                </div>
                <div class="col-lg-2 col-md-6 order-lg-2 order-3">
                    <div class="footer-widget">
                        <h4 class="footer-widget__title">@lang('Short Links')</h4>
                        <ul class="link-list">
                            @foreach($pages as $k => $data)
                                <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- footer-widget end -->
                </div>
                <div class="col-lg-2 col-md-6 order-lg-3 order-4">
                    <div class="footer-widget">
                        <h4 class="footer-widget__title">@lang('Help Link')</h4>
                        <ul class="link-list">
                            <li><a href="{{route('contact')}}">@lang('Support Center')</a></li>
                             @foreach($policys as $policy)
                                <li><a href="{{route('footer.menu', [slug($policy->data_values->title), $policy->id])}}">{{__($policy->data_values->title)}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- footer-widget end -->
                </div>
                <div class="col-lg-3 col-md-6 order-lg-4 order-2">
                    <div class="footer-widget">
                        <h4 class="footer-widget__title">@lang('Contact Information')</h4>
                        <p><b>@lang('Office Address')</b> : {{__(@$contact->data_values->contact_details)}}</p>
                        <ul class="social-link-list mt-3">
                            @foreach($socialIcons as $socialIcon)
                                <li><a href="{{$socialIcon->data_values->url}}" target="_blank">@php echo $socialIcon->data_values->social_icon @endphp</a></li>
                            @endforeach
                        </ul>
                    </div><!-- footer-widget end -->
                </div>
            </div><!-- row end -->
        </div>
    </div><!-- footer__top end -->
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>@lang('Copyrights') © {{Carbon\Carbon::now()->format('Y')}} by <a href="{{route('home')}}" class="text--base">{{$general->sitename}}</a>. @lang('All Rights Reserved').</p>
                </div>
            </div>
        </div>
    </div>
</footer>


@php
    $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
@endphp
@if(@$cookie->data_values->status && !session('cookie_accepted'))
  <!-- cookies default start -->
    <div class="cookies-card bg--default radius--10px text-center style--lg">
      <div class="cookies-card__icon">
        <i class="fas fa-cookie-bite"></i>
      </div>
      <p class="cookies-card__content">@php echo @$cookie->data_values->description @endphp <a href="{{ @$cookie->data_values->link }}" target="_blank">@lang('Cookie Policy')</a></p>
      <div class="cookies-card__btn">
        <button  class="cookies-btn text--dark btn--capsule w-100 policy">@lang('Allow')</button>
      </div>
    </div>
  <!-- cookies default end -->
@endif

@push('script')
<script>
    (function () {
        'use strict';
        $(document).on('click','.subscribe-btn' , function(){
            var email = $("#emailSub").val();
            if(email){
                $.ajax({
                    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}",},
                    url:"{{ route('subscribe') }}",
                    method:"POST",
                    data:{email:email},
                    success:function(response)
                    {
                        if(response.success) {
                            notify('success', response.success);
                            $("#emailSub").val('');
                        }else{
                            $.each(response, function (i, val) {
                                notify('error', val);
                            });
                        }
                    }
                });
            }
            else{
                notify('error', "Please Input Your Email");
            }
        });

        $('.policy').on('click',function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.get('{{route('cookie.accept')}}', function(response){
                $('.cookies-card').addClass('d-none');
                notify('success', response);
            });
        });
    })();
</script>
@endpush