@php
    $agent = getContent('agent.content', true);
    $agentElements = getContent('agent.element', false);
@endphp
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{__($agent->data_values->heading)}}</h2>
                    <p class="mt-3">{{__($agent->data_values->sub_heading)}}</p>
                </div>
            </div> 
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach($agentElements as $agentElement)
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <div class="agent-card">
                        <div class="agent-card__thumb">
                            <img src="{{getImage('assets/images/frontend/agent/'. @$agentElement->data_values->agent_image, '640x780')}}" alt="@lang('image')" class="rounded-3">
                        </div>
                        <div class="agent-card__content">
                            <h4>{{__($agentElement->data_values->name)}}</h4>
                            <div class="ratings">
                                @if(intval($agentElement->data_values->rating) == 1)
                                    <i class="las la-star"></i>
                                @elseif(intval($agentElement->data_values->rating) == 2)
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                @elseif(intval($agentElement->data_values->rating) == 3)
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                @elseif(intval($agentElement->data_values->rating) == 4)
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                @elseif(intval($agentElement->data_values->rating) == 5)
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                @endif
                                <span>({{__($agentElement->data_values->rating)}})</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>