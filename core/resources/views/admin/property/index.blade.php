@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Title - City - Location')</th>
                                    <th>@lang('Owern Name - Phone - Email')</th>
                                    <th>@lang('Price - Square Feet')</th>
                                    <th>@lang('Featured Property')</th>
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

                                    <td data-label="@lang('Price - Square Feet')">
                                        @if(!empty($propertie->propertyInfo))
                                            <span class="font-weight-bold">{{getAmount($propertie->propertyInfo->price)}} {{$general->cur_text}}</span><br>
                                            <span>{{getAmount($propertie->propertyInfo->square_feet)}} @lang('Sqft')</span>
                                        @else
                                            <span>@lang('N/A')</span>
                                        @endif
                                    </td>

                                     <td data-label="@lang('Featured Property')">
                                        @if($propertie->featured == 1)
                                            <span class="badge badge--success">@lang('Included')</span>
                                            <a href="javascript:void(0)" class="icon-btn btn--info ml-2 notInclude" data-toggle="tooltip" title="" data-original-title="@lang('Not Include')" data-id="{{ $propertie->id }}">
                                                <i class="las la-arrow-alt-circle-left"></i>
                                            </a>
                                        @else
                                            <span class="badge badge--warning">@lang('Not included')</span>
                                            <a href="javascript:void(0)" class="icon-btn btn--success ml-2 include text-white" data-toggle="tooltip" title="" data-original-title="@lang('Include')" data-id="{{ $propertie->id }}">
                                                <i class="las la-arrow-alt-circle-right"></i>
                                            </a>
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
                                    <td class="text-muted text-center" colspan="100%">{{__($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($properties) }}
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

<div class="modal fade" id="includeFeatured" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Featured Item Include')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('admin.property.featured.include') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure include this property featured list?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="NotincludeFeatured" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel">@lang('Featured Item Remove')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('admin.property.featured.remove') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p>@lang('Are you sure remove this property featured list?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--success">@lang('Confirm')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('breadcrumb-plugins')
    <a href="{{route('admin.property.create')}}" class="btn btn-lg btn--primary float-sm-right box--shadow1 text--small mb-2 ml-0 ml-xl-2 ml-lg-0" ><i class="fa fa-fw fa-paper-plane"></i>@lang('Add New Property')</a>

    <form action="{{route('admin.property.search')}}" method="GET" class="form-inline float-sm-right bg--white mb-2 ml-0 ml-xl-2 ml-lg-0">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Property search.....')" value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

    @if(request()->routeIs('admin.property.index'))
        <form action="{{route('admin.property.top.select')}}" method="POST" class="form-inline float-sm-right bg--white mb-2 ml-0 ml-xl-2 ml-lg-0">
            @csrf
            <div class="input-group has_append">
                <select class="form-control" name="property_id">
                    <option>----@lang('Select Top Property')----</option> 
                    @foreach($properties as $property)
                        <option value="{{$property->id}}" @if($property->top_property == 1) selected @endif>{{__($property->title)}}</option> 
                    @endforeach
               </select>
                <div class="input-group-append">
                    <button class="btn btn--primary" type="submit">Select as top</button>
                </div>
            </div>
        </form>
    @endif
@endpush

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

        $('.include').on('click', function () {
            var modal = $('#includeFeatured');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });

        $('.notInclude').on('click', function () {
            var modal = $('#NotincludeFeatured');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });
    </script>
@endpush
