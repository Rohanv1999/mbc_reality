@extends('admin.layouts.app')
@section('panel')
      @if(@json_decode($general->sys_version)->version > systemDetails()['version'])
        <div class="row">
            <div class="col-md-12">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">
                        <h3 class="card-title"> @lang('New Version Available') <button class="btn btn--dark float-right">@lang('Version') {{json_decode($general->sys_version)->version}}</button> </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">@lang('What is the Update ?')</h5>
                        <p><pre  class="f-size--24">{{json_decode($general->sys_version)->details}}</pre></p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(@json_decode($general->sys_version)->message)
        <div class="row">
            @foreach(json_decode($general->sys_version)->message as $msg)
              <div class="col-md-12">
                  <div class="alert border border--primary" role="alert">
                      <div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>
                      <p class="alert__message">@php echo $msg; @endphp</p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
              </div>
            @endforeach
        </div>
        @endif

    

    <div class="row mt-50 mb-none-30">
        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--10 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="las la-building"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $property['all'] }}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Property')</span>
                    </div>
                    <a href="{{ route('admin.property.index') }}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--18 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="las la-hospital"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $property['pending']  }}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Pending Property')</span>
                    </div>
                    <a href="{{ route('admin.property.pending') }}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--17 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="las la-warehouse"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $property['approved'] }}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Approved Property')</span>
                    </div>

                    <a href="{{route('admin.property.approved')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--14 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="las la-hotel"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $property['cancel'] }}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Cancel Property')</span>
                    </div>

                    <a href="{{ route('admin.property.cancel') }}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--19 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="las la-hospital-alt"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$propertyType}}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Property Type')</span>
                    </div>
                    <a href="{{route('admin.property.index')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--3 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="las la-city"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$city}}</span>
                        <span class="currency-sign">{{__($general->cur_text)}}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total City')</span>
                    </div>
                    <a href="{{route('admin.city.index')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--12 b-radius--10 box-shadow" >
                <div class="icon">
                    <i class="las la-map"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$location}}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Location')</span>
                    </div>

                    <a href="{{route('admin.location.index')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--6 b-radius--10 box-shadow">
                <div class="icon">
                   <i class="lab la-buysellads"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{$ads}}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Advertisements')</span>
                    </div>
                    <a href="{{route('admin.ads.index')}}" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-50 mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Title - City - Location')</th>
                                    <th>@lang('Owern Name - Phone - Email')</th>
                                    <th>@lang('Room - Bathroom - Unit - Kitchen')</th>
                                    <th>@lang('Price - Square Feet')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($properties as $propertie)
                                <tr>
                                    <td data-label="@lang('Title - City - Location')">
                                        <span class="font-weight-bold">{{__($propertie->title)}}</span><br>
                                        <span>{{__($propertie->city->name)}} - {{__($propertie->location->name)}} </span>
                                    </td>
                                    <td data-label="@lang('Owern Name - Phone - Email')">
                                        <span class="font-weight-bold">{{__($propertie->name)}} - {{__($propertie->phone)}}</span><br>
                                        <span>{{__($propertie->email)}}</span>
                                    </td>

                                    <td data-label="@lang('Room - Bathroom - Unit - Kitchen')">
                                        @if(!empty($propertie->propertyInfo))
                                            <span class="font-weight-bold">{{__($propertie->propertyInfo->room)}} @lang('Room') - {{__($propertie->propertyInfo->bathroom)}} @lang('Bathroom')</span><br>
                                            <span>{{__($propertie->propertyInfo->unit)}} @lang('Unit') - {{__($propertie->propertyInfo->kitchen)}} @lang('Kitchen')</span>
                                        @else
                                            <span>@lang('N/A')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Price - Square Feet')">
                                        @if(!empty($propertie->propertyInfo))
                                            <span class="font-weight-bold">{{getAmount($propertie->propertyInfo->price)}} {{$general->cur_text}}</span><br>
                                            <span>{{getAmount($propertie->propertyInfo->square_feet)}} @lang('Sqft')</span>
                                        @else
                                            <span>@lang('N/A')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Status')">
                                        @if($propertie->status == 1)
                                            <span class="badge badge--success">@lang('Approved')</span>
                                        @elseif($propertie->status == 2)
                                            <span class="badge badge--danger">@lang('Cancel')</span>
                                        @elseif($propertie->status == 0)
                                            <span class="badge badge--primary">@lang('Pending')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Action')">
                                        @if($propertie->propertyInfo)
                                            @if($propertie->status == 1)
                                                <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" data-original-title="@lang('Banned')" data-id="{{$propertie->id}}"><i class="las la-times"></i></a> 
                                            @elseif($propertie->status == 2)
                                                <a href="javascript:void(0)" class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-original-title="@lang('Approve')" data-id="{{$propertie->id}}"><i class="las la-check"></i></a>
                                            @elseif($propertie->status == 0)
                                                <a href="javascript:void(0)" class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-original-title="@lang('Approve')" data-id="{{$propertie->id}}"><i class="las la-check"></i></a>
                                                <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" data-original-title="@lang('Banned')" data-id="{{$propertie->id}}"><i class="las la-times"></i></a> 
                                            @endif
                                        @endif
                                        <a href="{{route('admin.property.info', $propertie->id)}}" class="icon-btn bg--10 ml-1" data-toggle="tooltip" data-original-title="@lang('Property Information')"><i class="las la-warehouse"></i></a> 
                                        <a href="{{route('admin.property.edit', $propertie->id)}}" class="icon-btn btn--primary ml-1" data-toggle="tooltip" data-original-title="@lang('Edit')"><i class="las la-pen"></i></a> 
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">@lang('Data not found')</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="approvedby" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Approval Confirmation')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{route('admin.property.status.approved')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to approved this property?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Banned Confirmation')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{route('admin.property.status.banned')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure to cancel this property?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@push('script')
    <script>
        'use strict';
        $('.approved').on('click', function () {
            var modal = $('#approvedby');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });
        $('.cancel').on('click', function () {
            var modal = $('#cancelBy');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });
    </script>
@endpush

