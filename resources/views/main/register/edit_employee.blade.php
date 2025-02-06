@extends('layouts.innerpages')

@section('template_title')
    Edit Employee
@endsection

@section('content')
    @include('partials.mainsite_pages.return_function')
    <style>
        .lg3-div {

            -ms-flex: 0 0 25%;
            flex: 1 0 30%;
            max-width: 35%;
            margin-bottom: 30px;

        }

        thead.table-dark {
            border: 1px solid black;
        }

        span.select2-selection.select2-selection--multiple {
            height: 50px;
            overflow-y: scroll;
        }
    </style>
    <div class="page-header">
        <div class="text-secondary text-center text-uppercase w-100">
            <h1 class="my-4"><b>Edit Employee</b></h1>
        </div>
    </div>
    <!--End Page header-->
    <!-- Row -->
    <form action="" id="form" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_id" value="{{ $data2->id }}">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Profile</div>
                    </div>
                    <div class="card-body">
                        <div class="card-title font-weight-bold">Basic info:</div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" value="{{ $data2->name }}" required name="first_name"
                                           class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" value="{{ $data2->last_name }}" name="last_name"
                                           class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Sudo Name</label>
                                    <input type="text" value="{{ $data2->slug }}" name="slug" required
                                           class="form-control" placeholder="Sudo Name">
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" value="{{ $data2->email }}" required name="email"
                                           class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" required name="phone_number" id="phoneNumber"
                                           class="form-control W-100" placeholder="Phone Number" value="{{ $data2->phone }}"
                                           onfocus="$(this).attr('autocomplete', 'off');">
                                </div>
                            </div>
                            {{-- for order taker --}}
                            {{-- @if ($data2->role == 2)
                            <div class="col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Cancellation Amount</label>
                                    <input type="number" required name="cancellation_amount" min="0" id="cancellation_amount"
                                        class="form-control W-100" value="{{ $data2->cancellation_amount }}">
                                </div>
                            </div>
                            @endif --}}
                            {{-- @if ($data2->role == 2)
                            <div class="col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label class="form-label">Cancellation Amount</label>
                                    <input type="number" required name="cancellation_amount" min="0" id="cancellation_amount"
                                        class="form-control W-100" value="{{ $data2->cancellation_amount }}">
                                </div>
                            </div>
                            @endif --}}
                            {{-- for delivery boy --}}
                            @if ($data2->role == 8)
                                <div class="col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Commission Per Delivery</label>
                                        <input type="number" required name="commission" min="0" id="commission"
                                               class="form-control W-100" value="{{ $data2->commission }}">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Per_review</label>
                                        <input type="number" required name="per_review" min="0" id="per_review"
                                               class="form-control W-100" value="{{ $data2->per_review }}">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label class="form-label">Private_pickup</label>
                                        <input type="number" required name="private_pickup" min="0"
                                               id="private_pickup" class="form-control W-100"
                                               value="{{ $data2->private_pickup }}">
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" required>JOB TYPE</label>
                                    <select class="form-control select2" name="job_type">
                                        <option value="" selected disabled="">Select Job Type</option>
                                        @foreach ($data as $val)
                                            <option @if ($data2->role == $val->id) selected @endif
                                            value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Updted Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-4" id="sheet_access">
                                <div class="form-group">
                                    <label class="form-label">Sheet Access</label>
                                    <?php $sd = explode(',', $data2->sheet_access); ?>
                                    <select name="sheet_access[]" class="select2 form-control" multiple>
                                        @foreach ($sheet_data as $key => $val)
                                            <option value="{{ $val->id }}"
                                                    {{ in_array($val->id, $sd) ? 'selected' : '' }}>
                                                {{ date('M-d-Y', strtotime($val->created_at)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            @if ($data2->role == 2)
                                <div class="col-sm-4 my-auto">
                                    <div class="form-group d-flex m-0">
                                        <input type="checkbox" value="1"
                                               @if ($data2->private_OT == 1) checked @endif name="private_OT"
                                               id="private_OT" />
                                        <label class="form-label my-auto mx-1" for="private_OT">Private OT</label>
                                    </div>
                                </div>
                            @endif

                            @php
                                //panel type access
                                $emp_panel_access = $data2->emp_panel_access;
                                $emp_panel_access = explode(',', $emp_panel_access);
                            @endphp

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Employee Access</label>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModa28">Panel Type Access</button>
                                        @if (in_array('1', $emp_panel_access))
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal1">Phone Quotes</button>
                                        @endif
                                        @if (in_array('2', $emp_panel_access))
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal2">Website Quotes</button>
                                        @endif
                                        @if (in_array('3', $emp_panel_access))
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModa20">Testing Quotes</button>
                                        @endif
                                        @if (in_array('4', $emp_panel_access))
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModa24">Panel Type 4 Quotes</button>
                                        @endif
                                        @if (in_array('5', $emp_panel_access))
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModa25">Panel Type 5 Quotes</button>
                                        @endif
                                        @if (in_array('6', $emp_panel_access))
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModa26">Panel Type 6 Quotes</button>
                                        @endif
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal3">Show Data</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal4">Shipment Status</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal5">Profile Access</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal6">Action Access</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal7">Employee Report</button>
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal8">Assigned Data</button> --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal9">Guides</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"
                                 @if (isset($data2->userRole)) @if (
                                    $data2->userRole->name == 'CSR' ||
                                        $data2->userRole->name == 'Seller Agent' ||
                                        $data2->userRole->name == 'Order Taker') style="display:block;" @else style="display:none;" @endif
                                 @else style="display:none;" @endif id="client_number">
                                <div class="form-group">
                                    <label class="form-label">Phone Numbers Access</label>

                                </div>
                            </div>
                            <div class="col-md-12"
                                 @if (isset($data2->userRole)) @if (
                                    $data2->userRole->name == 'CSR' ||
                                        $data2->userRole->name == 'Seller Agent' ||
                                        $data2->userRole->name == 'Order Taker' ||
                                        $data2->userRole->name == 'Manager' ||
                                        $data2->userRole->name == 'Dispatcher') style="display:block;" @else style="display:none;" @endif
                                 @else style="display:none;" @endif id="assign_daily_qoute">
                                <div class="form-group">
                                    <label class="form-label">Assign Daily Qoutes</label>
                                    <input type="text" class="form-control" name="assign_daily_qoute" maxlength="2"
                                           value="{{ $data2->assign_daily_qoute }}"
                                           placeholder="Enter Assign Daily Qoutes" />
                                </div>
                            </div>
                            <div class="col-md-12"
                                 @if (isset($data2->userRole)) @if ($data2->userRole->name != 'Dispatcher') style="display:none;" @endif
                                 @else style="display:none;" @endif id="auto_assigning">
                                <div class="form-group">
                                    <label class="form-label">Auto Assign</label>
                                    <select name="auto_assign" class="form-control">
                                        <option value="0" @if ($data2->auto_assign == 0) selected @endif>No
                                        </option>
                                        <option value="1" @if ($data2->auto_assign == 1) selected @endif>Yes
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"
                                 @if (isset($data2->userRole)) @if (
                                    $data2->userRole->name == 'CSR' ||
                                        $data2->userRole->name == 'Seller Agent' ||
                                        $data2->userRole->name == 'Order Taker' ||
                                        $data2->userRole->name == 'Dispatcher' ||
                                        $data2->userRole->name == 'Delivery Boy' ||
                                        $data2->userRole->name == 'Manager') style="display:block;" @else style="display:none;" @endif
                                 @else style="display:none;" @endif id="qoutes">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Qoutes Assign</label>
                                        <div class="row">
                                            <div class="col-sm-4 my-auto">
                                                <div class="form-group d-flex m-0">
                                                    <input type="radio" value="0"
                                                           @if ($data2->order_taker_qoute == 0) checked @endif
                                                           name="order_taker_quote" id="all_qoute" />
                                                    <label class="form-label my-auto mx-1" for="all_qoute">All
                                                        Qoutes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 my-auto">
                                                <div class="form-group d-flex m-0">
                                                    <input type="radio" value="1"
                                                           @if ($data2->order_taker_qoute == 1) checked @endif
                                                           name="order_taker_quote" id="own_qoute" />
                                                    <label class="form-label my-auto mx-1" for="own_qoute">Own
                                                        Qoutes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 my-auto"
                                                 @if (isset($data2->userRole)) @if (
                                                    $data2->userRole->name == 'CSR' ||
                                                        $data2->userRole->name == 'Seller Agent' ||
                                                        $data2->userRole->name == 'Order Taker') style="display:block;" @else style="display:none;" @endif
                                                 @else style="display:none;" @endif id="manager">
                                                <div class="form-group d-flex m-0">
                                                    <input type="radio" value="2"
                                                           @if ($data2->order_taker_qoute == 2) checked @endif
                                                           name="order_taker_quote" id="group_qoute" />
                                                    <label class="form-label my-auto mx-1" for="group_qoute">Group
                                                        Qoutes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"
                                         @if (isset($data2->userRole)) @if ($data2->userRole->name == 'Dispatcher') style="display:block;" @else style="display:none;" @endif
                                         @else style="display:none;" @endif id="dispatcher_quotes">
                                        <label class="form-label">Qoutes Assign For (Shipment Status Requests)</label>
                                        <div class="row">
                                            <div class="col-sm-6 my-auto">
                                                <div class="form-group d-flex m-0">
                                                    <input type="radio" value="0"
                                                           @if ($data2->shipment_status_quote_assign == 0) checked @endif
                                                           name="shipment_status_quote_assign" id="all_dis_qoute" />
                                                    <label class="form-label my-auto mx-1" for="all_dis_qoute">All
                                                        Qoutes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-auto">
                                                <div class="form-group d-flex m-0">
                                                    <input type="radio" value="1"
                                                           @if ($data2->shipment_status_quote_assign == 1) checked @endif
                                                           name="shipment_status_quote_assign" id="own_dis_qoute" />
                                                    <label class="form-label my-auto mx-1" for="own_dis_qoute">Own
                                                        Qoutes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"
                                         @if ($data2->order_taker_qoute == 2) style="display:block;" @else style="display:none;" @endif
                                         id="manager">
                                        <div class="form-group m-0">
                                            <label class="form-label">Managers</label>
                                            <select name="manager" class="select2 form-control">
                                                @foreach ($managers as $key => $val)
                                                    <option value="{{ $val->id }}"
                                                            @if (isset($data2->ot_manager->id)) @if ($data2->ot_manager->manager_id == $val->id)
                                                                selected @endif
                                                            @endif
                                                    >{{ $val->slug }} ({{ $val->userRole->name }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"
                                 @if (isset($data2->userRole)) @if ($data2->userRole->name == 'Manager') style="display:block;" @else style="display:none;" @endif
                                 @else style="display:none;" @endif id="all_ot">
                                <div class="form-group">
                                    <label class="form-label">CSRs And Seller Agents</label>
                                    <select name="all_ot[]" class="select2 form-control" multiple>
                                        @foreach ($all_ot as $key => $val)
                                            <option value="{{ $val->id }}"
                                                    @if (isset($access[0])) @foreach ($access as $ids)
                                                        @if ($ids->ot_ids == $val->id)
                                                            selected @endif
                                                    @endforeach
                                                    @endif
                                                    @if (isset($diabledAccess[0])) @foreach ($diabledAccess as $ids)
                                                        @if ($ids->ot_ids == $val->id)
                                                            disabled @endif
                                                    @endforeach
                                                    @endif
                                            >{{ $val->slug }} ({{ $val->userRole->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <?php
                            //user access phone quote
                            $emp_access_phone = $data2->emp_access_phone;
                            $emp_access_phone = explode(',', $emp_access_phone);
                            //user access website quote
                            $emp_access_web = $data2->emp_access_web;
                            $emp_access_web = explode(',', $emp_access_web);
                            //user access test quote
                            $emp_access_test = $data2->emp_access_test;
                            $emp_access_test = explode(',', $emp_access_test);
                            //user access panel type 4 quote
                            $panel_type_4 = $data2->panel_type_4;
                            $panel_type_4 = explode(',', $panel_type_4);
                            //user access panel type 5 quote
                            $panel_type_5 = $data2->panel_type_5;
                            $panel_type_5 = explode(',', $panel_type_5);
                            //user access panel type 6 quote
                            $panel_type_6 = $data2->panel_type_6;
                            $panel_type_6 = explode(',', $panel_type_6);
                            //user access show data
                            $emp_show_data = $data2->emp_show_data;
                            $emp_show_data = explode(',', $emp_show_data);
                            //user access shipment status
                            $emp_shipment_status = $data2->emp_access_ship;
                            $emp_shipment_status = explode(',', $emp_shipment_status);
                            //user access profile
                            $emp_profile = $data2->emp_access_profile;
                            $emp_profile = explode(',', $emp_profile);
                            //user access action
                            $emp_action = $data2->emp_access_action;
                            $emp_action = explode(',', $emp_action);
                            //user access action
                            $emp_report = $data2->emp_access_report;
                            $emp_report = explode(',', $emp_report);
                            //user access guide
                            $emp_access_guide = $data2->emp_access_guide;
                            $emp_access_guide = explode(',', $emp_access_guide);
                            //panel type access
                            $emp_panel_access = $data2->emp_panel_access;
                            $emp_panel_access = explode(',', $emp_panel_access);
                            ?>
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 60%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employee Access (Phone Qoutes)
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all1"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all1">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone0"
                                                                   value="0"><label class="ml-2"
                                                                                    for="emp_access_phone0">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_access_phone1">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_access_phone2">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_access_phone3">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_access_phone4">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_access_phone5">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_access_phone6">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_access_phone7">Paymen tMissing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_access_phone8">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('66', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone66"
                                                                   value="66"><label class="ml-2"
                                                                                     for="emp_access_phone66">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_access_phone9">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_access_phone10">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_access_phone11">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_access_phone12">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone13"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_access_phone13">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_access_phone14">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone15"
                                                                   value="15"><label class="ml-2"
                                                                                     for="emp_access_phone15">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone16"
                                                                   value="16"><label class="ml-2"
                                                                                     for="emp_access_phone16">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone17"
                                                                   value="17"><label class="ml-2"
                                                                                     for="emp_access_phone17">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_access_phone18">Car Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_access_phone19">Heavy Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('92', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone92"
                                                                   value="92"><label class="ml-2"
                                                                                     for="emp_access_phone92">Freight Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_access_phone20">Add/Edit Employee</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_access_phone21">Admin Issues</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone22"
                                                                   value="22"><label class="ml-2"
                                                                                     for="emp_access_phone22">Old Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone23"
                                                                   value="23"><label class="ml-2"
                                                                                     for="emp_access_phone23">Transportation Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('73', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone73"
                                                                   value="73"><label class="ml-2"
                                                                                     for="emp_access_phone73">Roro Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone24"
                                                                   value="24"><label class="ml-2"
                                                                                     for="emp_access_phone24">Carriers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone25"
                                                                   value="25"><label class="ml-2"
                                                                                     for="emp_access_phone25">View Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone26"
                                                                   value="26"><label class="ml-2"
                                                                                     for="emp_access_phone26">Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone27"
                                                                   value="27"><label class="ml-2"
                                                                                     for="emp_access_phone27">Sheets</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone28"
                                                                   value="28"><label class="ml-2"
                                                                                     for="emp_access_phone28">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone29"
                                                                   value="29"><label class="ml-2"
                                                                                     for="emp_access_phone29">OnApproval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone30"
                                                                   value="30"><label class="ml-2"
                                                                                     for="emp_access_phone30">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone31"
                                                                   value="31"><label class="ml-2"
                                                                                     for="emp_access_phone31">Payment System</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone32"
                                                                   value="32"><label class="ml-2"
                                                                                     for="emp_access_phone32">Employee Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone33"
                                                                   value="33"><label class="ml-2"
                                                                                     for="emp_access_phone33">Price Per Mile</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone34"
                                                                   value="34"><label class="ml-2"
                                                                                     for="emp_access_phone34">Filtered Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone35"
                                                                   value="35"><label class="ml-2"
                                                                                     for="emp_access_phone35">Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('36', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone36"
                                                                   value="36"><label class="ml-2"
                                                                                     for="emp_access_phone36">Questions/Answers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('37', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone37"
                                                                   value="37"><label class="ml-2"
                                                                                     for="emp_access_phone37">New Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('38', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone38"
                                                                   value="38"><label class="ml-2"
                                                                                     for="emp_access_phone38">Customer</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone39" value="39"><label class="ml-2" for="emp_access_phone39">Messages Center</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone40" value="40"><label class="ml-2" for="emp_access_phone40">Call Logs Center</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('41', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone41"
                                                                   value="41"><label class="ml-2"
                                                                                     for="emp_access_phone41">Update Phone Digits</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('42', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone42"
                                                                   value="42"><label class="ml-2"
                                                                                     for="emp_access_phone42">Show Customer Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('67', $emp_access_phone)) {{ 'checked' }} @endif name="emp_access_phone[]" id="emp_access_phone67" value="67"><label class="ml-2" for="emp_access_phone67">Customer Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('60', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone60"
                                                                   value="60"><label class="ml-2"
                                                                                     for="emp_access_phone60">Show Driver Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('61', $emp_access_phone)) {{ 'checked' }} @endif name="emp_access_phone[]" id="emp_access_phone61" value="61"><label class="ml-2" for="emp_access_phone61">Driver Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('43', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone43"
                                                                   value="43"><label class="ml-2"
                                                                                     for="emp_access_phone43">Flag Employees</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('44', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone44"
                                                                   value="44"><label class="ml-2"
                                                                                     for="emp_access_phone44">Transfer Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('46', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone46"
                                                                   value="46"><label class="ml-2"
                                                                                     for="emp_access_phone46">Revenue</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('47', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone47"
                                                                   value="47"><label class="ml-2"
                                                                                     for="emp_access_phone47">Coupons</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('48', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone48"
                                                                   value="48"><label class="ml-2"
                                                                                     for="emp_access_phone48">Website Links</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('49', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone49"
                                                                   value="49"><label class="ml-2"
                                                                                     for="emp_access_phone49">Feedbacks</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone45" value="45"><label class="ml-2" for="emp_access_phone45">Add Feedback</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('50', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone50"
                                                                   value="50"><label class="ml-2"
                                                                                     for="emp_access_phone50">Managers Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('51', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone51"
                                                                   value="51"><label class="ml-2"
                                                                                     for="emp_access_phone51">Last Activity</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('52', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone52"
                                                                   value="52"><label class="ml-2"
                                                                                     for="emp_access_phone52">Login Ip Address</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('53', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone53"
                                                                   value="53"><label class="ml-2"
                                                                                     for="emp_access_phone53">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('54', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone54"
                                                                   value="54"><label class="ml-2"
                                                                                     for="emp_access_phone54">Shipment Status</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('55', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone55"
                                                                   value="55"><label class="ml-2"
                                                                                     for="emp_access_phone55">Dispatch Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('56', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone56"
                                                                   value="56"><label class="ml-2"
                                                                                     for="emp_access_phone56">Employee Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('57', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone57"
                                                                   value="57"><label class="ml-2"
                                                                                     for="emp_access_phone57">Performance Report</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone58" value="58"><label class="ml-2" for="emp_access_phone58">View Sheets</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone59" value="59"><label class="ml-2" for="emp_access_phone59">View Cancel History</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('62', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone62"
                                                                   value="62"><label class="ml-2"
                                                                                     for="emp_access_phone62">QA Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('63', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone63"
                                                                   value="63"><label class="ml-2"
                                                                                     for="emp_access_phone63">Roles</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('64', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone64"
                                                                   value="64"><label class="ml-2"
                                                                                     for="emp_access_phone64">Update QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('65', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone65"
                                                                   value="65"><label class="ml-2"
                                                                                     for="emp_access_phone65">View QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('68', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone68"
                                                                   value="68"><label class="ml-2"
                                                                                     for="emp_access_phone68">Approaching Number Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('69', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone69"
                                                                   value="69"><label class="ml-2"
                                                                                     for="emp_access_phone69">Approaching Number Website</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('70', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone70"
                                                                   value="70"><label class="ml-2"
                                                                                     for="emp_access_phone70">Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('142', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone142"
                                                                   value="142"><label class="ml-2"
                                                                                     for="emp_access_phone142">Approaching Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('145', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone145"
                                                                   value="145"><label class="ml-2"
                                                                                     for="emp_access_phone145">Auto Approach Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('146', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone146"
                                                                   value="146"><label class="ml-2"
                                                                                      for="emp_access_phone146">Auto Approach  Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('71', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone71"
                                                                   value="71"><label class="ml-2"
                                                                                     for="emp_access_phone71">Booker Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('72', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone72"
                                                                   value="72"><label class="ml-2"
                                                                                     for="emp_access_phone72">Offer Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('74', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone74"
                                                                   value="74"><label class="ml-2"
                                                                                     for="emp_access_phone74">Achievement Sheet View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_phone111">Achievement Sheet Add/Edit
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('107', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone107"
                                                                   value="107"><label class="ml-2"
                                                                                      for="emp_access_phone107">Achievement Sheet View Full
                                                                Screen </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('75', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone75"
                                                                   value="75"><label class="ml-2"
                                                                                     for="emp_access_phone75">Port Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('76', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone76"
                                                                   value="76"><label class="ml-2"
                                                                                     for="emp_access_phone76">Assign To Dispatcher</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('77', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone77"
                                                                   value="77"><label class="ml-2"
                                                                                     for="emp_access_phone77">Move OnApprovalCancel To
                                                                Cancel</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone78" value="78"><label class="ml-2" for="emp_access_phone78">Payment Confirmation</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('79', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone79"
                                                                   value="79"><label class="ml-2"
                                                                                     for="emp_access_phone79">Profile</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone80" value="80"><label class="ml-2" for="emp_access_phone80">Port Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone81" value="81"><label class="ml-2" for="emp_access_phone81">Payment Missing Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone82" value="82"><label class="ml-2" for="emp_access_phone82">Dispatch Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone83" value="83"><label class="ml-2" for="emp_access_phone83">Pickup Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_phone[]" id="emp_access_phone84" value="84"><label class="ml-2" for="emp_access_phone84">Delivered Sheet</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('85', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone85"
                                                                   value="85"><label class="ml-2"
                                                                                     for="emp_access_phone85">Commission Range</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('86', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone86"
                                                                   value="86"><label class="ml-2"
                                                                                     for="emp_access_phone86">Employee Profile Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('87', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone87"
                                                                   value="87"><label class="ml-2"
                                                                                     for="emp_access_phone87">Break Time</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('88', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone88"
                                                                   value="88"><label class="ml-2"
                                                                                     for="emp_access_phone88">Freeze Time History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('89', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone89"
                                                                   value="89"><label class="ml-2"
                                                                                     for="emp_access_phone89">Payment System Advance
                                                                Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('90', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone90"
                                                                   value="90"><label class="ml-2"
                                                                                     for="emp_access_phone90">Demand Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('91', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone91"
                                                                   value="91"><label class="ml-2"
                                                                                     for="emp_access_phone91">Sell Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('93', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone93"
                                                                   value="93"><label class="ml-2"
                                                                                     for="emp_access_phone93">Freight Price checker</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('94', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone94"
                                                                   value="94"><label class="ml-2"
                                                                                     for="emp_access_phone94">Access Auto Approach</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('100', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone100"
                                                                   value="100"><label class="ml-2"
                                                                                      for="emp_access_phone100">Field Labels</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('101', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone101"
                                                                   value="101"><label class="ml-2"
                                                                                      for="emp_access_phone101">Carrier Approaching
                                                                Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('102', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone102"
                                                                   value="102"><label class="ml-2"
                                                                                      for="emp_access_phone102">Carrier Approaching View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('103', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone103"
                                                                   value="103"><label class="ml-2"
                                                                                      for="emp_access_phone103">Carrier Blocking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('104', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone104"
                                                                   value="104"><label class="ml-2"
                                                                                      for="emp_access_phone104">Whatsapp Access</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('105', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone105"
                                                                   value="105"><label class="ml-2"
                                                                                      for="emp_access_phone105">Customer Nature
                                                                (View/Update)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('106', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone106"
                                                                   value="106"><label class="ml-2"
                                                                                      for="emp_access_phone106">Customer Nature
                                                                List/Filter</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="emp_access_phone109">Authorization Form List</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="emp_access_phone110">Testing Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_phone111">Port Tracking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('112', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone112"
                                                                   value="112"><label class="ml-2"
                                                                                      for="emp_access_phone112">Message Chats</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('113', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone113"
                                                                   value="113"><label class="ml-2"
                                                                                      for="emp_access_phone113">Allow Vehicle</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('114', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone114"
                                                                   value="114"><label class="ml-2"
                                                                                      for="emp_access_phone114">Allow Heavy</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('115', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone115"
                                                                   value="115"><label class="ml-2"
                                                                                      for="emp_access_phone115">Allow Freight</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('116', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone116"
                                                                   value="116"><label class="ml-2"
                                                                                      for="emp_access_phone116">Logout Questions (Show Logout
                                                                Questions)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('117', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone117"
                                                                   value="117"><label class="ml-2"
                                                                                      for="emp_access_phone117">Logout Questions Answer
                                                                View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('118', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone118"
                                                                   value="118"><label class="ml-2"
                                                                                      for="emp_access_phone118">Logout Questions
                                                                Comments</label>
                                                        </div>
                                                        {{-- <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                @if (in_array('119', $emp_access_phone)) {{ 'checked' }} @endif
                                                                name="emp_access_phone[]" id="emp_access_phone119"
                                                                value="119"><label class="ml-2"
                                                                for="emp_access_phone119">Logout Questions Answer</label>
                                                        </div> --}}
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('120', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone120"
                                                                   value="120"><label class="ml-2"
                                                                                      for="emp_access_phone120">Logout Questions View &
                                                                Add</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('121', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone121"
                                                                   value="121"><label class="ml-2"
                                                                                      for="emp_access_phone121">Show Pickup Phone </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('122', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone122"
                                                                   value="122"><label class="ml-2"
                                                                                      for="emp_access_phone122">Show Delivery Phone </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('123', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone123"
                                                                   value="123"><label class="ml-2"
                                                                                      for="emp_access_phone123">Request Price Page </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('124', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone124"
                                                                   value="124"><label class="ml-2"
                                                                                      for="emp_access_phone124">Block Phone View </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('125', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone125"
                                                                   value="125"><label class="ml-2"
                                                                                      for="emp_access_phone125">Block Phone Approve </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('128', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone128"
                                                                   value="128"><label class="ml-2"
                                                                                      for="emp_access_phone128">Employee Revenue (OT) </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('127', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone127"
                                                                   value="127"><label class="ml-2"
                                                                                      for="emp_access_phone127">Employee Revenue (DB) </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('129', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone129"
                                                                   value="129"><label class="ml-2"
                                                                                      for="emp_access_phone129">Employee Revenue (DIS) </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('130', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone130"
                                                                   value="130"><label class="ml-2"
                                                                                      for="emp_access_phone130">Employee Revenue (Private OT)
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('131', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone131"
                                                                   value="131"><label class="ml-2"
                                                                                      for="emp_access_phone131">Cpanel Emails
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('132', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone132"
                                                                   value="132"><label class="ml-2"
                                                                                      for="emp_access_phone132">Agents Reports
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('133', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone133"
                                                                   value="133"><label class="ml-2"
                                                                                      for="emp_access_phone133">Customer Reviews
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('134', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone134"
                                                                   value="134"><label class="ml-2"
                                                                                      for="emp_access_phone134">Call/SMS With App
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('135', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone135"
                                                                   value="135"><label class="ml-2"
                                                                                      for="emp_access_phone135">Call/SMS Old
                                                            </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('143', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone143"
                                                                   value="143"><label class="ml-2"
                                                                                      for="emp_access_phone143">Day Dispatch C|S|B | Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('136', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone136"
                                                                   value="136"><label class="ml-2"
                                                                                      for="emp_access_phone136">Day Dispatch C|S|B | Filter <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('137', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone137"
                                                                   value="137"><label class="ml-2"
                                                                                      for="panel_emp_access_phone137">Day Dispatch view  | Shipper <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('138', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone138"
                                                                   value="138"><label class="ml-2"
                                                                                      for="panel_emp_access_phone138">Day Dispatch view | Carrier <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('139', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone139"
                                                                   value="139"><label class="ml-2"
                                                                                      for="panel_emp_access_phone139">Day Dispatch view | Broker <span class="badge badge-warning">New</span></label>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('140', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone140"
                                                                   value="140"><label class="ml-2"
                                                                                      for="panel_emp_access_phone140">Dealer Approaching view <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('144', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone144"
                                                                   value="144"><label class="ml-2"
                                                                                      for="panel_emp_access_phone144">Dealer Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('141', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone141"
                                                                   value="141"><label class="ml-2"
                                                                                      for="emp_access_phone141">Dealer Approaching Filter<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('147', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone147"
                                                                   value="147"><label class="ml-2"
                                                                                      for="emp_access_phone147">Shipa1 Query<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('148', $emp_access_phone)) {{ 'checked' }} @endif
                                                                   name="emp_access_phone[]" id="emp_access_phone148"
                                                                   value="148"><label class="ml-2"
                                                                                      for="emp_access_phone148">Shipa1 Query Assign<span class="badge badge-warning">New</span></label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 60%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employee Access (Webiste
                                                Qoutes)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all2"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all2">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web0"
                                                                   value="0"><label class="ml-2"
                                                                                    for="emp_access_web0">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_access_web1">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_access_web2">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_access_web3">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_access_web4">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_access_web5">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_access_web6">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_access_web7">Paymen tMissing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_access_web8">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('66', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web66"
                                                                   value="66"><label class="ml-2"
                                                                                     for="emp_access_web66">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_access_web9">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_access_web10">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_access_web11">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_access_web12">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web13"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_access_web13">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_access_web14">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web15"
                                                                   value="15"><label class="ml-2"
                                                                                     for="emp_access_web15">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web16"
                                                                   value="16"><label class="ml-2"
                                                                                     for="emp_access_web16">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web17"
                                                                   value="17"><label class="ml-2"
                                                                                     for="emp_access_web17">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_access_web18">Car Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_access_web19">Heavy Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('92', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web92"
                                                                   value="92"><label class="ml-2"
                                                                                     for="emp_access_web92">Freight Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_access_web20">Add/Edit Employee</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_access_web21">Admin Issues</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web22"
                                                                   value="22"><label class="ml-2"
                                                                                     for="emp_access_web22">Old Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web23"
                                                                   value="23"><label class="ml-2"
                                                                                     for="emp_access_web23">Transportation Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('73', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web73"
                                                                   value="73"><label class="ml-2"
                                                                                     for="emp_access_web73">Roro Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web24"
                                                                   value="24"><label class="ml-2"
                                                                                     for="emp_access_web24">Carriers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web25"
                                                                   value="25"><label class="ml-2"
                                                                                     for="emp_access_web25">View Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web26"
                                                                   value="26"><label class="ml-2"
                                                                                     for="emp_access_web26">Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web27"
                                                                   value="27"><label class="ml-2"
                                                                                     for="emp_access_web27">Sheets</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web28"
                                                                   value="28"><label class="ml-2"
                                                                                     for="emp_access_web28">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web29"
                                                                   value="29"><label class="ml-2"
                                                                                     for="emp_access_web29">OnApproval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web30"
                                                                   value="30"><label class="ml-2"
                                                                                     for="emp_access_web30">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web31"
                                                                   value="31"><label class="ml-2"
                                                                                     for="emp_access_web31">Payment System</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web32"
                                                                   value="32"><label class="ml-2"
                                                                                     for="emp_access_web32">Employee Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web33"
                                                                   value="33"><label class="ml-2"
                                                                                     for="emp_access_web33">Price Per Mile</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web34"
                                                                   value="34"><label class="ml-2"
                                                                                     for="emp_access_web34">Filtered Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web35"
                                                                   value="35"><label class="ml-2"
                                                                                     for="emp_access_web35">Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('36', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web36"
                                                                   value="36"><label class="ml-2"
                                                                                     for="emp_access_web36">Questions/Answers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('37', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web37"
                                                                   value="37"><label class="ml-2"
                                                                                     for="emp_access_web37">New Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('38', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web38"
                                                                   value="38"><label class="ml-2"
                                                                                     for="emp_access_web38">Customer</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web39" value="39"><label class="ml-2" for="emp_access_web39">Messages Center</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web40" value="40"><label class="ml-2" for="emp_access_web40">Call Logs Center</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('41', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web41"
                                                                   value="41"><label class="ml-2"
                                                                                     for="emp_access_web41">Update Phone Digits</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('42', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web42"
                                                                   value="42"><label class="ml-2"
                                                                                     for="emp_access_web42">Show Customer Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('67', $emp_access_web)) {{ 'checked' }} @endif name="emp_access_web[]" id="emp_access_web67" value="67"><label class="ml-2" for="emp_access_web67">Customer Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('60', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web60"
                                                                   value="60"><label class="ml-2"
                                                                                     for="emp_access_web60">Show Driver Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('61', $emp_access_web)) {{ 'checked' }} @endif name="emp_access_web[]" id="emp_access_web61" value="61"><label class="ml-2" for="emp_access_web61">Driver Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('43', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web43"
                                                                   value="43"><label class="ml-2"
                                                                                     for="emp_access_web43">Flag Employees</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('44', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web44"
                                                                   value="44"><label class="ml-2"
                                                                                     for="emp_access_web44">Transfer Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('46', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web46"
                                                                   value="46"><label class="ml-2"
                                                                                     for="emp_access_web46">Revenue</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('47', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web47"
                                                                   value="47"><label class="ml-2"
                                                                                     for="emp_access_web47">Coupons</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('48', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web48"
                                                                   value="48"><label class="ml-2"
                                                                                     for="emp_access_web48">Website Links</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('49', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web49"
                                                                   value="49"><label class="ml-2"
                                                                                     for="emp_access_web49">Feedbacks</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web45" value="45"><label class="ml-2" for="emp_access_web45">Add Feedback</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('50', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web50"
                                                                   value="50"><label class="ml-2"
                                                                                     for="emp_access_web50">Managers Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('51', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web51"
                                                                   value="51"><label class="ml-2"
                                                                                     for="emp_access_web51">Last Activity</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('52', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web52"
                                                                   value="52"><label class="ml-2"
                                                                                     for="emp_access_web52">Login Ip Address</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('53', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web53"
                                                                   value="53"><label class="ml-2"
                                                                                     for="emp_access_web53">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('54', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web54"
                                                                   value="54"><label class="ml-2"
                                                                                     for="emp_access_web54">Shipment Status</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('55', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web55"
                                                                   value="55"><label class="ml-2"
                                                                                     for="emp_access_web55">Dispatch Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('56', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web56"
                                                                   value="56"><label class="ml-2"
                                                                                     for="emp_access_web56">Employee Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('57', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web57"
                                                                   value="57"><label class="ml-2"
                                                                                     for="emp_access_web57">Performance Report</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web58" value="58"><label class="ml-2" for="emp_access_web58">View Sheets</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web59" value="59"><label class="ml-2" for="emp_access_web59">View Cancel History</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('62', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web62"
                                                                   value="62"><label class="ml-2"
                                                                                     for="emp_access_web62">QA Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('63', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web63"
                                                                   value="63"><label class="ml-2"
                                                                                     for="emp_access_web63">Roles</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('64', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web64"
                                                                   value="64"><label class="ml-2"
                                                                                     for="emp_access_web64">Update QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('65', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web65"
                                                                   value="65"><label class="ml-2"
                                                                                     for="emp_access_web65">View QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('68', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web68"
                                                                   value="68"><label class="ml-2"
                                                                                     for="emp_access_web68">Approaching Number Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('69', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web69"
                                                                   value="69"><label class="ml-2"
                                                                                     for="emp_access_web69">Approaching Number Website</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('70', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web70"
                                                                   value="70"><label class="ml-2"
                                                                                     for="emp_access_web70">Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('142', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web142"
                                                                   value="142"><label class="ml-2"
                                                                                      for="emp_access_web142">Approaching Search Filter <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('145', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web145"
                                                                   value="145"><label class="ml-2"
                                                                                     for="emp_access_web145">Auto Approach Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('146', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web146"
                                                                   value="146"><label class="ml-2"
                                                                                      for="emp_access_web146">Auto Approach  Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('71', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web71"
                                                                   value="71"><label class="ml-2"
                                                                                     for="emp_access_web71">Booked Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('72', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web72"
                                                                   value="72"><label class="ml-2"
                                                                                     for="emp_access_web72">Offer Price</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('74', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web74"
                                                                   value="74"><label class="ml-2"
                                                                                     for="emp_access_web74">Achievement Sheet</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_web111">Achievement Sheet Add/Edit
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('107', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web107"
                                                                   value="107"><label class="ml-2"
                                                                                      for="emp_access_web107">Achievement Sheet View Full Screen
                                                            </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('75', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web75"
                                                                   value="75"><label class="ml-2"
                                                                                     for="emp_access_web75">Port Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('76', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web76"
                                                                   value="76"><label class="ml-2"
                                                                                     for="emp_access_web76">Assign To Dispatcher</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('77', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web77"
                                                                   value="77"><label class="ml-2"
                                                                                     for="emp_access_web77">Move OnApprovalCancel To
                                                                Cancel</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web78" value="78"><label class="ml-2" for="emp_access_web78">Payment Confirmation</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('79', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web79"
                                                                   value="79"><label class="ml-2"
                                                                                     for="emp_access_web79">Profile</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web80" value="80"><label class="ml-2" for="emp_access_web80">Port Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web81" value="81"><label class="ml-2" for="emp_access_web81">Payment Missing Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web82" value="82"><label class="ml-2" for="emp_access_web82">Dispatch Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web83" value="83"><label class="ml-2" for="emp_access_web83">Pickup Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_web[]" id="emp_access_web84" value="84"><label class="ml-2" for="emp_access_web84">Delivered Sheet</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('85', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web85"
                                                                   value="85"><label class="ml-2"
                                                                                     for="emp_access_web85">Commission Range</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('86', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web86"
                                                                   value="86"><label class="ml-2"
                                                                                     for="emp_access_web86">Employee Profile Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('87', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web87"
                                                                   value="87"><label class="ml-2"
                                                                                     for="emp_access_web87">Break Time</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('88', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web88"
                                                                   value="88"><label class="ml-2"
                                                                                     for="emp_access_web88">Freeze Time History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('89', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web89"
                                                                   value="89"><label class="ml-2"
                                                                                     for="emp_access_web89">Payment System Advance
                                                                Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('90', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web90"
                                                                   value="90"><label class="ml-2"
                                                                                     for="emp_access_web90">Demand Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('91', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web91"
                                                                   value="91"><label class="ml-2"
                                                                                     for="emp_access_web91">Sell Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('93', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web93"
                                                                   value="93"><label class="ml-2"
                                                                                     for="emp_access_web93">Freight Price Checker</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('94', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web94"
                                                                   value="94"><label class="ml-2"
                                                                                     for="emp_access_web94">Access Auto Approach</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('100', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web100"
                                                                   value="100"><label class="ml-2"
                                                                                      for="emp_access_web100">Field Labels</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('101', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web101"
                                                                   value="101"><label class="ml-2"
                                                                                      for="emp_access_web101">Carrier Approaching Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('102', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web102"
                                                                   value="102"><label class="ml-2"
                                                                                      for="emp_access_web102">Carrier Approaching View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('103', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web103"
                                                                   value="103"><label class="ml-2"
                                                                                      for="emp_access_web103">Carrier Blocking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('104', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web104"
                                                                   value="104"><label class="ml-2"
                                                                                      for="emp_access_web104">Whatsapp Access</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('105', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web105"
                                                                   value="105"><label class="ml-2"
                                                                                      for="emp_access_web105">Customer Nature
                                                                (View/Update)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('106', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web106"
                                                                   value="106"><label class="ml-2"
                                                                                      for="emp_access_web106">Customer Nature
                                                                List/Filter</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="emp_access_web109">Authorization Form List</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="emp_access_web110">Testing Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_web111">Port Tracking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('112', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web112"
                                                                   value="112"><label class="ml-2"
                                                                                      for="emp_access_web112">Message Chats</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('113', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web113"
                                                                   value="113"><label class="ml-2"
                                                                                      for="emp_access_web113">Allow Vehicle</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('114', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web114"
                                                                   value="114"><label class="ml-2"
                                                                                      for="emp_access_web114">Allow Heavy</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('115', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web115"
                                                                   value="115"><label class="ml-2"
                                                                                      for="emp_access_web115">Allow Freight</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('116', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web116"
                                                                   value="116"><label class="ml-2"
                                                                                      for="emp_access_web116">Logout Questions (Show Logout
                                                                Questions)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('117', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web117"
                                                                   value="117"><label class="ml-2"
                                                                                      for="emp_access_web117">Logout Questions Answer
                                                                View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('118', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web118"
                                                                   value="118"><label class="ml-2"
                                                                                      for="emp_access_web118">Logout Questions Comments</label>
                                                        </div>
                                                        {{-- <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                @if (in_array('119', $emp_access_web)) {{ 'checked' }} @endif
                                                                name="emp_access_web[]" id="emp_access_web119"
                                                                value="119"><label class="ml-2"
                                                                for="emp_access_web119">Logout Questions Answer</label>
                                                        </div> --}}
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('120', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web120"
                                                                   value="120"><label class="ml-2"
                                                                                      for="emp_access_web120">Logout Questions View &
                                                                Add</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('121', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web121"
                                                                   value="121"><label class="ml-2"
                                                                                      for="emp_access_web121">Show Pickup Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('122', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web122"
                                                                   value="122"><label class="ml-2"
                                                                                      for="emp_access_web122">Show Delivery Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('123', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web123"
                                                                   value="123"><label class="ml-2"
                                                                                      for="emp_access_web123">Request Price Page</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('124', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web124"
                                                                   value="124"><label class="ml-2"
                                                                                      for="emp_access_web124">Block Phone View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('125', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web125"
                                                                   value="125"><label class="ml-2"
                                                                                      for="emp_access_web125">Block Phone Approve</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('128', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web128"
                                                                   value="128"><label class="ml-2"
                                                                                      for="emp_access_web128">Employee Revenue (OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('127', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web127"
                                                                   value="127"><label class="ml-2"
                                                                                      for="emp_access_web127">Employee Revenue (DB)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('129', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web129"
                                                                   value="129"><label class="ml-2"
                                                                                      for="emp_access_web129">Employee Revenue (DIS)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('130', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web130"
                                                                   value="130"><label class="ml-2"
                                                                                      for="emp_access_web130">Employee Revenue (Private
                                                                OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('131', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web131"
                                                                   value="131"><label class="ml-2"
                                                                                      for="emp_access_web131">Cpanel Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('132', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web132"
                                                                   value="132"><label class="ml-2"
                                                                                      for="emp_access_web132">Agents Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('133', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web133"
                                                                   value="133"><label class="ml-2"
                                                                                      for="emp_access_web133">Customer Reviews</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('134', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web134"
                                                                   value="134"><label class="ml-2"
                                                                                      for="emp_access_web134">Call/SMS With App</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('136', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web136"
                                                                   value="136"><label class="ml-2"
                                                                                      for="emp_access_web136">Day Dispatch | Filter <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('143', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web143"
                                                                   value="143"><label class="ml-2"
                                                                                      for="emp_access_web143">Day Dispatch C|S|B | Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('137', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web137"
                                                                   value="137"><label class="ml-2"
                                                                                      for="panel_emp_access_web137">Day Dispatch  | Shipper <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('138', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web138"
                                                                   value="138"><label class="ml-2"
                                                                                      for="panel_emp_access_web138">Day Dispatch  | Carrier <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('139', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web139"
                                                                   value="139"><label class="ml-2"
                                                                                      for="panel_emp_access_web139">Day Dispatch  | Broker <span class="badge badge-warning">New</span></label>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('140', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web140"
                                                                   value="140"><label class="ml-2"
                                                                                      for="panel_emp_access_web140">Dealer Approaching view<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('144', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web144"
                                                                   value="144"><label class="ml-2"
                                                                                      for="panel_emp_access_web144">Dealer Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('141', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web141"
                                                                   value="141"><label class="ml-2"
                                                                                      for="emp_access_web141">Dealer Approaching Filter<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('147', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web147"
                                                                   value="147"><label class="ml-2"
                                                                                      for="emp_access_web147">Shipa1 Query<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('148', $emp_access_web)) {{ 'checked' }} @endif
                                                                   name="emp_access_web[]" id="emp_access_web148"
                                                                   value="148"><label class="ml-2"
                                                                                      for="emp_access_web148">Shipa1 Query Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModa20" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabe20" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 60%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employee Access (Testing
                                                Qoutes)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_al20"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all2">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test0"
                                                                   value="0"><label class="ml-2"
                                                                                    for="emp_access_test0">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_access_test1">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_access_test2">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_access_test3">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_access_test4">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_access_test5">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_access_test6">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_access_test7">Paymen tMissing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_access_test8">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('66', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test66"
                                                                   value="66"><label class="ml-2"
                                                                                     for="emp_access_test66">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_access_test9">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_access_test10">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_access_test11">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_access_test12">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test13"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_access_test13">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_access_test14">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test15"
                                                                   value="15"><label class="ml-2"
                                                                                     for="emp_access_test15">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test16"
                                                                   value="16"><label class="ml-2"
                                                                                     for="emp_access_test16">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test17"
                                                                   value="17"><label class="ml-2"
                                                                                     for="emp_access_test17">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_access_test18">Car Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_access_test19">Heavy Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('92', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test92"
                                                                   value="92"><label class="ml-2"
                                                                                     for="emp_access_test92">Freight Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_access_test20">Add/Edit Employee</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_access_test21">Admin Issues</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test22"
                                                                   value="22"><label class="ml-2"
                                                                                     for="emp_access_test22">Old Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test23"
                                                                   value="23"><label class="ml-2"
                                                                                     for="emp_access_test23">Transportation Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('73', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test73"
                                                                   value="73"><label class="ml-2"
                                                                                     for="emp_access_test73">Roro Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test24"
                                                                   value="24"><label class="ml-2"
                                                                                     for="emp_access_test24">Carriers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test25"
                                                                   value="25"><label class="ml-2"
                                                                                     for="emp_access_test25">View Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test26"
                                                                   value="26"><label class="ml-2"
                                                                                     for="emp_access_test26">Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test27"
                                                                   value="27"><label class="ml-2"
                                                                                     for="emp_access_test27">Sheets</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test28"
                                                                   value="28"><label class="ml-2"
                                                                                     for="emp_access_test28">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test29"
                                                                   value="29"><label class="ml-2"
                                                                                     for="emp_access_test29">OnApproval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test30"
                                                                   value="30"><label class="ml-2"
                                                                                     for="emp_access_test30">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test31"
                                                                   value="31"><label class="ml-2"
                                                                                     for="emp_access_test31">Payment System</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test32"
                                                                   value="32"><label class="ml-2"
                                                                                     for="emp_access_test32">Employee Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test33"
                                                                   value="33"><label class="ml-2"
                                                                                     for="emp_access_test33">Price Per Mile</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test34"
                                                                   value="34"><label class="ml-2"
                                                                                     for="emp_access_test34">Filtered Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test35"
                                                                   value="35"><label class="ml-2"
                                                                                     for="emp_access_test35">Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('36', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test36"
                                                                   value="36"><label class="ml-2"
                                                                                     for="emp_access_test36">Questions/Answers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('37', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test37"
                                                                   value="37"><label class="ml-2"
                                                                                     for="emp_access_test37">New Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('38', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test38"
                                                                   value="38"><label class="ml-2"
                                                                                     for="emp_access_test38">Customer</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test39" value="39"><label class="ml-2" for="emp_access_test39">Messages Center</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test40" value="40"><label class="ml-2" for="emp_access_test40">Call Logs Center</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('41', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test41"
                                                                   value="41"><label class="ml-2"
                                                                                     for="emp_access_test41">Update Phone Digits</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('42', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test42"
                                                                   value="42"><label class="ml-2"
                                                                                     for="emp_access_test42">Show Customer Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('67', $emp_access_test)) {{ 'checked' }} @endif name="emp_access_test[]" id="emp_access_test67" value="67"><label class="ml-2" for="emp_access_test67">Customer Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('60', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test60"
                                                                   value="60"><label class="ml-2"
                                                                                     for="emp_access_test60">Show Driver Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('61', $emp_access_test)) {{ 'checked' }} @endif name="emp_access_test[]" id="emp_access_test61" value="61"><label class="ml-2" for="emp_access_test61">Driver Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('43', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test43"
                                                                   value="43"><label class="ml-2"
                                                                                     for="emp_access_test43">Flag Employees</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('44', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test44"
                                                                   value="44"><label class="ml-2"
                                                                                     for="emp_access_test44">Transfer Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('46', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test46"
                                                                   value="46"><label class="ml-2"
                                                                                     for="emp_access_test46">Revenue</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('47', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test47"
                                                                   value="47"><label class="ml-2"
                                                                                     for="emp_access_test47">Coupons</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('48', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test48"
                                                                   value="48"><label class="ml-2"
                                                                                     for="emp_access_test48">Website Links</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('49', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test49"
                                                                   value="49"><label class="ml-2"
                                                                                     for="emp_access_test49">Feedbacks</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test45" value="45"><label class="ml-2" for="emp_access_test45">Add Feedback</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('50', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test50"
                                                                   value="50"><label class="ml-2"
                                                                                     for="emp_access_test50">Managers Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('51', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test51"
                                                                   value="51"><label class="ml-2"
                                                                                     for="emp_access_test51">Last Activity</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('52', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test52"
                                                                   value="52"><label class="ml-2"
                                                                                     for="emp_access_test52">Login Ip Address</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('53', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test53"
                                                                   value="53"><label class="ml-2"
                                                                                     for="emp_access_test53">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('54', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test54"
                                                                   value="54"><label class="ml-2"
                                                                                     for="emp_access_test54">Shipment Status</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('55', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test55"
                                                                   value="55"><label class="ml-2"
                                                                                     for="emp_access_test55">Dispatch Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('56', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test56"
                                                                   value="56"><label class="ml-2"
                                                                                     for="emp_access_test56">Employee Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('57', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test57"
                                                                   value="57"><label class="ml-2"
                                                                                     for="emp_access_test57">Performance Report</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test58" value="58"><label class="ml-2" for="emp_access_test58">View Sheets</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test59" value="59"><label class="ml-2" for="emp_access_test59">View Cancel History</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('62', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test62"
                                                                   value="62"><label class="ml-2"
                                                                                     for="emp_access_test62">QA Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('63', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test63"
                                                                   value="63"><label class="ml-2"
                                                                                     for="emp_access_test63">Roles</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('64', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test64"
                                                                   value="64"><label class="ml-2"
                                                                                     for="emp_access_test64">Update QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('65', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test65"
                                                                   value="65"><label class="ml-2"
                                                                                     for="emp_access_test65">View QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('68', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test68"
                                                                   value="68"><label class="ml-2"
                                                                                     for="emp_access_test68">Approaching Number Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('69', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test69"
                                                                   value="69"><label class="ml-2"
                                                                                     for="emp_access_test69">Approaching Number Website</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('70', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test70"
                                                                   value="70"><label class="ml-2"
                                                                                     for="emp_access_test70">Approaching Assign</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('142', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test142"
                                                                   value="142"><label class="ml-2"
                                                                                      for="emp_access_test142">Approaching  Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('145', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test145"
                                                                   value="145"><label class="ml-2"
                                                                                      for="emp_access_test145">Auto Approach Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('146', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test146"
                                                                   value="146"><label class="ml-2"
                                                                                      for="emp_access_test146">Auto Approach  Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('71', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test71"
                                                                   value="71"><label class="ml-2"
                                                                                     for="emp_access_test71">Booked Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('72', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test72"
                                                                   value="72"><label class="ml-2"
                                                                                     for="emp_access_test72">Offer Price</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('74', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test74"
                                                                   value="74"><label class="ml-2"
                                                                                     for="emp_access_test74">Achievement Sheet</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_test111">Achievement Sheet Add/Edit
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('107', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test107"
                                                                   value="107"><label class="ml-2"
                                                                                      for="emp_access_test107">Achievement Sheet View Full
                                                                Screen </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('75', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test75"
                                                                   value="75"><label class="ml-2"
                                                                                     for="emp_access_test75">Port Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('76', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test76"
                                                                   value="76"><label class="ml-2"
                                                                                     for="emp_access_test76">Assign To Dispatcher</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('77', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test77"
                                                                   value="77"><label class="ml-2"
                                                                                     for="emp_access_test77">Move OnApprovalCancel To
                                                                Cancel</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test78" value="78"><label class="ml-2" for="emp_access_test78">Payment Confirmation</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('79', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test79"
                                                                   value="79"><label class="ml-2"
                                                                                     for="emp_access_test79">Profile</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test80" value="80"><label class="ml-2" for="emp_access_test80">Port Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test81" value="81"><label class="ml-2" for="emp_access_test81">Payment Missing Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test82" value="82"><label class="ml-2" for="emp_access_test82">Dispatch Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test83" value="83"><label class="ml-2" for="emp_access_test83">Pickup Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="emp_access_test[]" id="emp_access_test84" value="84"><label class="ml-2" for="emp_access_test84">Delivered Sheet</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('85', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test85"
                                                                   value="85"><label class="ml-2"
                                                                                     for="emp_access_test85">Commission Range</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('86', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test86"
                                                                   value="86"><label class="ml-2"
                                                                                     for="emp_access_test86">Employee Profile Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('87', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test87"
                                                                   value="87"><label class="ml-2"
                                                                                     for="emp_access_test87">Break Time</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('88', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test88"
                                                                   value="88"><label class="ml-2"
                                                                                     for="emp_access_test88">Freeze Time History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('89', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test89"
                                                                   value="89"><label class="ml-2"
                                                                                     for="emp_access_test89">Payment System Advance
                                                                Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('90', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test90"
                                                                   value="90"><label class="ml-2"
                                                                                     for="emp_access_test90">Demand Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('91', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test91"
                                                                   value="91"><label class="ml-2"
                                                                                     for="emp_access_test91">Sell Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('93', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test93"
                                                                   value="93"><label class="ml-2"
                                                                                     for="emp_access_test93">Freight Price Checker</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('94', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test94"
                                                                   value="94"><label class="ml-2"
                                                                                     for="emp_access_test94">Access Auto Approach</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('100', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test100"
                                                                   value="100"><label class="ml-2"
                                                                                      for="emp_access_test100">Field Labels</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('101', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test101"
                                                                   value="101"><label class="ml-2"
                                                                                      for="emp_access_test101">Carrier Approaching
                                                                Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('102', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test102"
                                                                   value="102"><label class="ml-2"
                                                                                      for="emp_access_test102">Carrier Approaching View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('103', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test103"
                                                                   value="103"><label class="ml-2"
                                                                                      for="emp_access_test103">Carrier Blocking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('104', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test104"
                                                                   value="104"><label class="ml-2"
                                                                                      for="emp_access_test104">Whatsapp Access</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('105', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test105"
                                                                   value="105"><label class="ml-2"
                                                                                      for="emp_access_test105">Customer Nature
                                                                (View/Update)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('106', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test106"
                                                                   value="106"><label class="ml-2"
                                                                                      for="emp_access_test106">Customer Nature
                                                                List/Filter</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="emp_access_test109">Authorization Form List</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="emp_access_test110">Testing Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_test111">Port Tracking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('112', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test112"
                                                                   value="112"><label class="ml-2"
                                                                                      for="emp_access_test112">Message Chats</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('113', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test113"
                                                                   value="113"><label class="ml-2"
                                                                                      for="emp_access_test113">Allow Vehicle</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('114', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test114"
                                                                   value="114"><label class="ml-2"
                                                                                      for="emp_access_test114">Allow Heavy</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('115', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test115"
                                                                   value="115"><label class="ml-2"
                                                                                      for="emp_access_test115">Allow Freight</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('116', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test116"
                                                                   value="116"><label class="ml-2"
                                                                                      for="emp_access_test116">Logout Questions (Show Logout
                                                                Questions)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('117', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test117"
                                                                   value="117"><label class="ml-2"
                                                                                      for="emp_access_test117">Logout Questions Answer
                                                                View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('118', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test118"
                                                                   value="118"><label class="ml-2"
                                                                                      for="emp_access_test118">Logout Questions Comments</label>
                                                        </div>
                                                        {{-- <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                @if (in_array('119', $emp_access_test)) {{ 'checked' }} @endif
                                                                name="emp_access_test[]" id="emp_access_test119"
                                                                value="119"><label class="ml-2"
                                                                for="emp_access_test119">Logout Questions Answer</label>
                                                        </div> --}}
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('120', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test120"
                                                                   value="120"><label class="ml-2"
                                                                                      for="emp_access_test120">Logout Questions View &
                                                                Add</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('121', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test121"
                                                                   value="121"><label class="ml-2"
                                                                                      for="emp_access_test121">Show Pickup Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('122', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test122"
                                                                   value="122"><label class="ml-2"
                                                                                      for="emp_access_test122">Show Delivery Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('123', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test123"
                                                                   value="123"><label class="ml-2"
                                                                                      for="emp_access_test123">Request Price Page</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('124', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test124"
                                                                   value="124"><label class="ml-2"
                                                                                      for="emp_access_test124">Block Phone View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('125', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test125"
                                                                   value="125"><label class="ml-2"
                                                                                      for="emp_access_test125">Block Phone Approve</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('128', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test128"
                                                                   value="128"><label class="ml-2"
                                                                                      for="emp_access_test128">Employee Revenue (OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('127', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test127"
                                                                   value="127"><label class="ml-2"
                                                                                      for="emp_access_test127">Employee Revenue (DB)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('129', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test129"
                                                                   value="129"><label class="ml-2"
                                                                                      for="emp_access_test129">Employee Revenue (DIS)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('130', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test130"
                                                                   value="130"><label class="ml-2"
                                                                                      for="emp_access_test130">Employee Revenue (Private
                                                                OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('131', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test131"
                                                                   value="131"><label class="ml-2"
                                                                                      for="emp_access_test131">Cpanel Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('132', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test132"
                                                                   value="132"><label class="ml-2"
                                                                                      for="emp_access_test132">Agents Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('133', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test133"
                                                                   value="133"><label class="ml-2"
                                                                                      for="emp_access_test133">Customer Reviews</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('134', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test134"
                                                                   value="134"><label class="ml-2"
                                                                                      for="emp_access_test134">Call/SMS With App</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('135', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test135"
                                                                   value="135"><label class="ml-2"
                                                                                      for="emp_access_test135">Call/SMS Old</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('136', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test136"
                                                                   value="136"><label class="ml-2"
                                                                                      for="emp_access_test136">Day Dispatch | Filter <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('143', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test143"
                                                                   value="143"><label class="ml-2"
                                                                                      for="emp_access_test143">Day Dispatch C|S|B | Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('137', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test137"
                                                                   value="137"><label class="ml-2"
                                                                                      for="panel_emp_access_test137">Day Dispatch  | Shipper <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('138', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test138"
                                                                   value="138"><label class="ml-2"
                                                                                      for="panel_emp_access_test138">Day Dispatch  | Carrier <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('139', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test139"
                                                                   value="139"><label class="ml-2"
                                                                                      for="panel_emp_access_test139">Day Dispatch  | Broker <span class="badge badge-warning">New</span></label>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('140', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test140"
                                                                   value="140"><label class="ml-2"
                                                                                      for="panel_emp_access_test140">Dealer Approaching view<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('144', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test144"
                                                                   value="144"><label class="ml-2"
                                                                                      for="panel_emp_access_test144">Dealer Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('141', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test141"
                                                                   value="141"><label class="ml-2"
                                                                                      for="emp_access_test141">Dealer Approaching Filter<span class="badge badge-warning">New</span></label>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('147', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test147"
                                                                   value="147"><label class="ml-2"
                                                                                      for="emp_access_test147">Shipa1 Query<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('148', $emp_access_test)) {{ 'checked' }} @endif
                                                                   name="emp_access_test[]" id="emp_access_test148"
                                                                   value="148"><label class="ml-2"
                                                                                      for="emp_access_test148">Shipa1 Query Assign<span class="badge badge-warning">New</span></label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModa24" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabe20" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 60%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employee Access (Testing
                                                Qoutes)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_al20"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all2">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_40"
                                                                   value="0"><label class="ml-2"
                                                                                    for="panel_type_40">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_41"
                                                                   value="1"><label class="ml-2"
                                                                                    for="panel_type_41">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_42"
                                                                   value="2"><label class="ml-2"
                                                                                    for="panel_type_42">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_43"
                                                                   value="3"><label class="ml-2"
                                                                                    for="panel_type_43">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_44"
                                                                   value="4"><label class="ml-2"
                                                                                    for="panel_type_44">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_45"
                                                                   value="5"><label class="ml-2"
                                                                                    for="panel_type_45">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_46"
                                                                   value="6"><label class="ml-2"
                                                                                    for="panel_type_46">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_47"
                                                                   value="7"><label class="ml-2"
                                                                                    for="panel_type_47">Paymen tMissing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_48"
                                                                   value="8"><label class="ml-2"
                                                                                    for="panel_type_48">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('66', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_466"
                                                                   value="66"><label class="ml-2"
                                                                                     for="panel_type_466">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_49"
                                                                   value="9"><label class="ml-2"
                                                                                    for="panel_type_49">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_410"
                                                                   value="10"><label class="ml-2"
                                                                                     for="panel_type_410">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_411"
                                                                   value="11"><label class="ml-2"
                                                                                     for="panel_type_411">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_412"
                                                                   value="12"><label class="ml-2"
                                                                                     for="panel_type_412">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_413"
                                                                   value="13"><label class="ml-2"
                                                                                     for="panel_type_413">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_414"
                                                                   value="14"><label class="ml-2"
                                                                                     for="panel_type_414">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_415"
                                                                   value="15"><label class="ml-2"
                                                                                     for="panel_type_415">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_416"
                                                                   value="16"><label class="ml-2"
                                                                                     for="panel_type_416">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_417"
                                                                   value="17"><label class="ml-2"
                                                                                     for="panel_type_417">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_418"
                                                                   value="18"><label class="ml-2"
                                                                                     for="panel_type_418">Car Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_419"
                                                                   value="19"><label class="ml-2"
                                                                                     for="panel_type_419">Heavy Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('92', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_492"
                                                                   value="92"><label class="ml-2"
                                                                                     for="panel_type_492">Freight Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_420"
                                                                   value="20"><label class="ml-2"
                                                                                     for="panel_type_420">Add/Edit Employee</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_421"
                                                                   value="21"><label class="ml-2"
                                                                                     for="panel_type_421">Admin Issues</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_422"
                                                                   value="22"><label class="ml-2"
                                                                                     for="panel_type_422">Old Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_423"
                                                                   value="23"><label class="ml-2"
                                                                                     for="panel_type_423">Transportation Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('73', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_473"
                                                                   value="73"><label class="ml-2"
                                                                                     for="panel_type_473">Roro Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_424"
                                                                   value="24"><label class="ml-2"
                                                                                     for="panel_type_424">Carriers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_425"
                                                                   value="25"><label class="ml-2"
                                                                                     for="panel_type_425">View Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_426"
                                                                   value="26"><label class="ml-2"
                                                                                     for="panel_type_426">Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_427"
                                                                   value="27"><label class="ml-2"
                                                                                     for="panel_type_427">Sheets</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_428"
                                                                   value="28"><label class="ml-2"
                                                                                     for="panel_type_428">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_429"
                                                                   value="29"><label class="ml-2"
                                                                                     for="panel_type_429">OnApproval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_430"
                                                                   value="30"><label class="ml-2"
                                                                                     for="panel_type_430">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_431"
                                                                   value="31"><label class="ml-2"
                                                                                     for="panel_type_431">Payment System</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_432"
                                                                   value="32"><label class="ml-2"
                                                                                     for="panel_type_432">Employee Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_433"
                                                                   value="33"><label class="ml-2"
                                                                                     for="panel_type_433">Price Per Mile</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_434"
                                                                   value="34"><label class="ml-2"
                                                                                     for="panel_type_434">Filtered Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_435"
                                                                   value="35"><label class="ml-2"
                                                                                     for="panel_type_435">Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('36', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_436"
                                                                   value="36"><label class="ml-2"
                                                                                     for="panel_type_436">Questions/Answers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('37', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_437"
                                                                   value="37"><label class="ml-2"
                                                                                     for="panel_type_437">New Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('38', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_438"
                                                                   value="38"><label class="ml-2"
                                                                                     for="panel_type_438">Customer</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_439" value="39"><label class="ml-2" for="panel_type_439">Messages Center</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_440" value="40"><label class="ml-2" for="panel_type_440">Call Logs Center</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('41', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_441"
                                                                   value="41"><label class="ml-2"
                                                                                     for="panel_type_441">Update Phone Digits</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('42', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_442"
                                                                   value="42"><label class="ml-2"
                                                                                     for="panel_type_442">Show Customer Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('67', $panel_type_4)) {{ 'checked' }} @endif name="panel_type_4[]" id="panel_type_467" value="67"><label class="ml-2" for="panel_type_467">Customer Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('60', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_460"
                                                                   value="60"><label class="ml-2"
                                                                                     for="panel_type_460">Show Driver Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('61', $panel_type_4)) {{ 'checked' }} @endif name="panel_type_4[]" id="panel_type_461" value="61"><label class="ml-2" for="panel_type_461">Driver Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('43', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_443"
                                                                   value="43"><label class="ml-2"
                                                                                     for="panel_type_443">Flag Employees</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('44', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_444"
                                                                   value="44"><label class="ml-2"
                                                                                     for="panel_type_444">Transfer Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('46', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_446"
                                                                   value="46"><label class="ml-2"
                                                                                     for="panel_type_446">Revenue</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('47', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_447"
                                                                   value="47"><label class="ml-2"
                                                                                     for="panel_type_447">Coupons</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('48', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_448"
                                                                   value="48"><label class="ml-2"
                                                                                     for="panel_type_448">Website Links</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('49', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_449"
                                                                   value="49"><label class="ml-2"
                                                                                     for="panel_type_449">Feedbacks</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_445" value="45"><label class="ml-2" for="panel_type_445">Add Feedback</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('50', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_450"
                                                                   value="50"><label class="ml-2"
                                                                                     for="panel_type_450">Managers Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('51', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_451"
                                                                   value="51"><label class="ml-2"
                                                                                     for="panel_type_451">Last Activity</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('52', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_452"
                                                                   value="52"><label class="ml-2"
                                                                                     for="panel_type_452">Login Ip Address</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('53', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_453"
                                                                   value="53"><label class="ml-2"
                                                                                     for="panel_type_453">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('54', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_454"
                                                                   value="54"><label class="ml-2"
                                                                                     for="panel_type_454">Shipment Status</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('55', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_455"
                                                                   value="55"><label class="ml-2"
                                                                                     for="panel_type_455">Dispatch Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('56', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_456"
                                                                   value="56"><label class="ml-2"
                                                                                     for="panel_type_456">Employee Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('57', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_457"
                                                                   value="57"><label class="ml-2"
                                                                                     for="panel_type_457">Performance Report</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_458" value="58"><label class="ml-2" for="panel_type_458">View Sheets</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_459" value="59"><label class="ml-2" for="panel_type_459">View Cancel History</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('62', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_462"
                                                                   value="62"><label class="ml-2"
                                                                                     for="panel_type_462">QA Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('63', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_463"
                                                                   value="63"><label class="ml-2"
                                                                                     for="panel_type_463">Roles</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('64', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_464"
                                                                   value="64"><label class="ml-2"
                                                                                     for="panel_type_464">Update QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('65', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_465"
                                                                   value="65"><label class="ml-2"
                                                                                     for="panel_type_465">View QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('68', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_468"
                                                                   value="68"><label class="ml-2"
                                                                                     for="panel_type_468">Approaching Number Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('69', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_469"
                                                                   value="69"><label class="ml-2"
                                                                                     for="panel_type_469">Approaching Number Website</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('70', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_470"
                                                                   value="70"><label class="ml-2"
                                                                                     for="panel_type_470">Approaching Assign</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('142', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4142"
                                                                   value="142"><label class="ml-2"
                                                                                      for="panel_type_4142">Approaching  Filter <span class="badge badge-warning">New</span></label>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('145', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4145"
                                                                   value="145"><label class="ml-2"
                                                                                      for="panel_type_4145">Auto Approach Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('146', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4146"
                                                                   value="146"><label class="ml-2"
                                                                                      for="panel_type_4146">Auto Approach  Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('71', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_471"
                                                                   value="71"><label class="ml-2"
                                                                                     for="panel_type_471">Booked Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('72', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_472"
                                                                   value="72"><label class="ml-2"
                                                                                     for="panel_type_472">Offer Price</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('74', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_474"
                                                                   value="74"><label class="ml-2"
                                                                                     for="panel_type_474">Achievement Sheet</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="panel_type_4111">Achievement Sheet Add/Edit
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('107', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4107"
                                                                   value="107"><label class="ml-2"
                                                                                      for="panel_type_4107">Achievement Sheet View Full
                                                                Screen </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('75', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_475"
                                                                   value="75"><label class="ml-2"
                                                                                     for="panel_type_475">Port Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('76', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_476"
                                                                   value="76"><label class="ml-2"
                                                                                     for="panel_type_476">Assign To Dispatcher</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('77', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_477"
                                                                   value="77"><label class="ml-2"
                                                                                     for="panel_type_477">Move OnApprovalCancel To
                                                                Cancel</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_478" value="78"><label class="ml-2" for="panel_type_478">Payment Confirmation</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('79', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_479"
                                                                   value="79"><label class="ml-2"
                                                                                     for="panel_type_479">Profile</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_480" value="80"><label class="ml-2" for="panel_type_480">Port Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_481" value="81"><label class="ml-2" for="panel_type_481">Payment Missing Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_482" value="82"><label class="ml-2" for="panel_type_482">Dispatch Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_483" value="83"><label class="ml-2" for="panel_type_483">Pickup Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_4[]" id="panel_type_484" value="84"><label class="ml-2" for="panel_type_484">Delivered Sheet</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('85', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_485"
                                                                   value="85"><label class="ml-2"
                                                                                     for="panel_type_485">Commission Range</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('86', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_486"
                                                                   value="86"><label class="ml-2"
                                                                                     for="panel_type_486">Employee Profile Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('87', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_487"
                                                                   value="87"><label class="ml-2"
                                                                                     for="panel_type_487">Break Time</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('88', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_488"
                                                                   value="88"><label class="ml-2"
                                                                                     for="panel_type_488">Freeze Time History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('89', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_489"
                                                                   value="89"><label class="ml-2"
                                                                                     for="panel_type_489">Payment System Advance
                                                                Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('90', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_490"
                                                                   value="90"><label class="ml-2"
                                                                                     for="panel_type_490">Demand Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('91', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_491"
                                                                   value="91"><label class="ml-2"
                                                                                     for="panel_type_491">Sell Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('93', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_493"
                                                                   value="93"><label class="ml-2"
                                                                                     for="panel_type_493">Freight Price Checker</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('94', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_494"
                                                                   value="94"><label class="ml-2"
                                                                                     for="panel_type_494">Access Auto Approach</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('100', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4100"
                                                                   value="100"><label class="ml-2"
                                                                                      for="panel_type_4100">Field Labels</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('101', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4101"
                                                                   value="101"><label class="ml-2"
                                                                                      for="panel_type_4101">Carrier Approaching
                                                                Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('102', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4102"
                                                                   value="102"><label class="ml-2"
                                                                                      for="panel_type_4102">Carrier Approaching View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('103', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4103"
                                                                   value="103"><label class="ml-2"
                                                                                      for="panel_type_4103">Carrier Blocking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('104', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4104"
                                                                   value="104"><label class="ml-2"
                                                                                      for="panel_type_4104">Whatsapp Access</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('105', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4105"
                                                                   value="105"><label class="ml-2"
                                                                                      for="panel_type_4105">Customer Nature
                                                                (View/Update)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('106', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4106"
                                                                   value="106"><label class="ml-2"
                                                                                      for="panel_type_4106">Customer Nature
                                                                List/Filter</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="panel_type_4109">Authorization Form List</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="panel_type_4110">Testing Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="panel_type_4111">Port Tracking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('112', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4112"
                                                                   value="112"><label class="ml-2"
                                                                                      for="panel_type_4112">Message Chats</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('113', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4113"
                                                                   value="113"><label class="ml-2"
                                                                                      for="panel_type_4113">Allow Vehicle</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('114', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4114"
                                                                   value="114"><label class="ml-2"
                                                                                      for="panel_type_4114">Allow Heavy</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('115', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4115"
                                                                   value="115"><label class="ml-2"
                                                                                      for="panel_type_4115">Allow Freight</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('116', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4116"
                                                                   value="116"><label class="ml-2"
                                                                                      for="panel_type_4116">Logout Questions (Show Logout
                                                                Questions)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('117', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4117"
                                                                   value="117"><label class="ml-2"
                                                                                      for="panel_type_4117">Logout Questions Answer
                                                                View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('118', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4118"
                                                                   value="118"><label class="ml-2"
                                                                                      for="panel_type_4118">Logout Questions Comments</label>
                                                        </div>
                                                        {{-- <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                @if (in_array('119', $panel_type_4)) {{ 'checked' }} @endif
                                                                name="panel_type_4[]" id="panel_type_4119"
                                                                value="119"><label class="ml-2"
                                                                for="panel_type_4119">Logout Questions Answer</label>
                                                        </div> --}}
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('120', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4120"
                                                                   value="120"><label class="ml-2"
                                                                                      for="panel_type_4120">Logout Questions View &
                                                                Add</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('121', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4121"
                                                                   value="121"><label class="ml-2"
                                                                                      for="panel_type_4121">Show Pickup Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('122', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4122"
                                                                   value="122"><label class="ml-2"
                                                                                      for="panel_type_4122">Show Delivery Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('123', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4123"
                                                                   value="123"><label class="ml-2"
                                                                                      for="panel_type_4123">Request Price Page</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('124', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4124"
                                                                   value="124"><label class="ml-2"
                                                                                      for="panel_type_4124">Block Phone View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('125', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4125"
                                                                   value="125"><label class="ml-2"
                                                                                      for="panel_type_4125">Block Phone Approve</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('128', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4128"
                                                                   value="128"><label class="ml-2"
                                                                                      for="panel_type_4128">Employee Revenue (OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('127', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4127"
                                                                   value="127"><label class="ml-2"
                                                                                      for="panel_type_4127">Employee Revenue (DB)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('129', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4129"
                                                                   value="129"><label class="ml-2"
                                                                                      for="panel_type_4129">Employee Revenue (DIS)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('130', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4130"
                                                                   value="130"><label class="ml-2"
                                                                                      for="panel_type_4130">Employee Revenue (Private
                                                                OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('131', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4131"
                                                                   value="131"><label class="ml-2"
                                                                                      for="panel_type_4131">Cpanel Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('132', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4132"
                                                                   value="132"><label class="ml-2"
                                                                                      for="panel_type_4132">Agents Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('133', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4133"
                                                                   value="133"><label class="ml-2"
                                                                                      for="panel_type_4133">Customer Reviews</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('134', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4134"
                                                                   value="134"><label class="ml-2"
                                                                                      for="panel_type_4134">Call/SMS With App</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('135', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4135"
                                                                   value="135"><label class="ml-2"
                                                                                      for="panel_type_4135">Call/SMS Old</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('136', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4136"
                                                                   value="136"><label class="ml-2"
                                                                                      for="panel_type_4136">Day Dispatch | Filter <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('143', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4143"
                                                                   value="143"><label class="ml-2"
                                                                                      for="panel_type_4143">Day Dispatch C|S|B | Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('137', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4137"
                                                                   value="137"><label class="ml-2"
                                                                                      for="panel_panel_type_4137">Day Dispatch  | Shipper <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('138', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4138"
                                                                   value="138"><label class="ml-2"
                                                                                      for="panel_panel_type_4138">Day Dispatch  | Carrier <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('139', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4139"
                                                                   value="139"><label class="ml-2"
                                                                                      for="panel_panel_type_4139">Day Dispatch  | Broker <span class="badge badge-warning">New</span></label>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('140', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4140"
                                                                   value="140"><label class="ml-2"
                                                                                      for="panel_panel_type_4140">Dealer Approaching view<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('144', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4144"
                                                                   value="144"><label class="ml-2"
                                                                                      for="panel_panel_type_4144">Dealer Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('141', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4141"
                                                                   value="141"><label class="ml-2"
                                                                                      for="panel_type_4141">Dealer Approaching Filter<span class="badge badge-warning">New</span></label>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('147', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4147"
                                                                   value="147"><label class="ml-2"
                                                                                      for="panel_type_4147">Shipa1 Query<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('148', $panel_type_4)) {{ 'checked' }} @endif
                                                                   name="panel_type_4[]" id="panel_type_4148"
                                                                   value="148"><label class="ml-2"
                                                                                      for="panel_type_4148">Shipa1 Query Assign<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModa25" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabe20" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 60%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employee Access (Testing
                                                Qoutes)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_al20"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all2">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_50"
                                                                   value="0"><label class="ml-2"
                                                                                    for="panel_type_50">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_51"
                                                                   value="1"><label class="ml-2"
                                                                                    for="panel_type_51">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_52"
                                                                   value="2"><label class="ml-2"
                                                                                    for="panel_type_52">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_53"
                                                                   value="3"><label class="ml-2"
                                                                                    for="panel_type_53">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_54"
                                                                   value="4"><label class="ml-2"
                                                                                    for="panel_type_54">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_55"
                                                                   value="5"><label class="ml-2"
                                                                                    for="panel_type_55">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_56"
                                                                   value="6"><label class="ml-2"
                                                                                    for="panel_type_56">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_57"
                                                                   value="7"><label class="ml-2"
                                                                                    for="panel_type_57">Paymen tMissing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_58"
                                                                   value="8"><label class="ml-2"
                                                                                    for="panel_type_58">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('66', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_566"
                                                                   value="66"><label class="ml-2"
                                                                                     for="panel_type_566">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_59"
                                                                   value="9"><label class="ml-2"
                                                                                    for="panel_type_59">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_510"
                                                                   value="10"><label class="ml-2"
                                                                                     for="panel_type_510">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_511"
                                                                   value="11"><label class="ml-2"
                                                                                     for="panel_type_511">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_512"
                                                                   value="12"><label class="ml-2"
                                                                                     for="panel_type_512">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_513"
                                                                   value="13"><label class="ml-2"
                                                                                     for="panel_type_513">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_514"
                                                                   value="14"><label class="ml-2"
                                                                                     for="panel_type_514">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_515"
                                                                   value="15"><label class="ml-2"
                                                                                     for="panel_type_515">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_516"
                                                                   value="16"><label class="ml-2"
                                                                                     for="panel_type_516">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_517"
                                                                   value="17"><label class="ml-2"
                                                                                     for="panel_type_517">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_518"
                                                                   value="18"><label class="ml-2"
                                                                                     for="panel_type_518">Car Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_519"
                                                                   value="19"><label class="ml-2"
                                                                                     for="panel_type_519">Heavy Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('92', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_592"
                                                                   value="92"><label class="ml-2"
                                                                                     for="panel_type_592">Freight Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_520"
                                                                   value="20"><label class="ml-2"
                                                                                     for="panel_type_520">Add/Edit Employee</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_521"
                                                                   value="21"><label class="ml-2"
                                                                                     for="panel_type_521">Admin Issues</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_522"
                                                                   value="22"><label class="ml-2"
                                                                                     for="panel_type_522">Old Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_523"
                                                                   value="23"><label class="ml-2"
                                                                                     for="panel_type_523">Transportation Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('73', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_573"
                                                                   value="73"><label class="ml-2"
                                                                                     for="panel_type_573">Roro Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_524"
                                                                   value="24"><label class="ml-2"
                                                                                     for="panel_type_524">Carriers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_525"
                                                                   value="25"><label class="ml-2"
                                                                                     for="panel_type_525">View Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_526"
                                                                   value="26"><label class="ml-2"
                                                                                     for="panel_type_526">Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_527"
                                                                   value="27"><label class="ml-2"
                                                                                     for="panel_type_527">Sheets</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_528"
                                                                   value="28"><label class="ml-2"
                                                                                     for="panel_type_528">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_529"
                                                                   value="29"><label class="ml-2"
                                                                                     for="panel_type_529">OnApproval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_530"
                                                                   value="30"><label class="ml-2"
                                                                                     for="panel_type_530">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_531"
                                                                   value="31"><label class="ml-2"
                                                                                     for="panel_type_531">Payment System</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_532"
                                                                   value="32"><label class="ml-2"
                                                                                     for="panel_type_532">Employee Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_533"
                                                                   value="33"><label class="ml-2"
                                                                                     for="panel_type_533">Price Per Mile</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_534"
                                                                   value="34"><label class="ml-2"
                                                                                     for="panel_type_534">Filtered Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_535"
                                                                   value="35"><label class="ml-2"
                                                                                     for="panel_type_535">Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('36', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_536"
                                                                   value="36"><label class="ml-2"
                                                                                     for="panel_type_536">Questions/Answers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('37', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_537"
                                                                   value="37"><label class="ml-2"
                                                                                     for="panel_type_537">New Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('38', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_538"
                                                                   value="38"><label class="ml-2"
                                                                                     for="panel_type_538">Customer</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_539" value="39"><label class="ml-2" for="panel_type_539">Messages Center</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_540" value="40"><label class="ml-2" for="panel_type_540">Call Logs Center</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('41', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_541"
                                                                   value="41"><label class="ml-2"
                                                                                     for="panel_type_541">Update Phone Digits</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('42', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_542"
                                                                   value="42"><label class="ml-2"
                                                                                     for="panel_type_542">Show Customer Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('67', $panel_type_5)) {{ 'checked' }} @endif name="panel_type_5[]" id="panel_type_567" value="67"><label class="ml-2" for="panel_type_567">Customer Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('60', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_560"
                                                                   value="60"><label class="ml-2"
                                                                                     for="panel_type_560">Show Driver Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('61', $panel_type_5)) {{ 'checked' }} @endif name="panel_type_5[]" id="panel_type_561" value="61"><label class="ml-2" for="panel_type_561">Driver Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('43', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_543"
                                                                   value="43"><label class="ml-2"
                                                                                     for="panel_type_543">Flag Employees</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('44', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_544"
                                                                   value="44"><label class="ml-2"
                                                                                     for="panel_type_544">Transfer Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('46', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_546"
                                                                   value="46"><label class="ml-2"
                                                                                     for="panel_type_546">Revenue</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('47', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_547"
                                                                   value="47"><label class="ml-2"
                                                                                     for="panel_type_547">Coupons</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('48', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_548"
                                                                   value="48"><label class="ml-2"
                                                                                     for="panel_type_548">Website Links</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('49', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_549"
                                                                   value="49"><label class="ml-2"
                                                                                     for="panel_type_549">Feedbacks</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_545" value="45"><label class="ml-2" for="panel_type_545">Add Feedback</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('50', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_550"
                                                                   value="50"><label class="ml-2"
                                                                                     for="panel_type_550">Managers Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('51', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_551"
                                                                   value="51"><label class="ml-2"
                                                                                     for="panel_type_551">Last Activity</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('52', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_552"
                                                                   value="52"><label class="ml-2"
                                                                                     for="panel_type_552">Login Ip Address</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('53', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_553"
                                                                   value="53"><label class="ml-2"
                                                                                     for="panel_type_553">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('54', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_554"
                                                                   value="54"><label class="ml-2"
                                                                                     for="panel_type_554">Shipment Status</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('55', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_555"
                                                                   value="55"><label class="ml-2"
                                                                                     for="panel_type_555">Dispatch Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('56', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_556"
                                                                   value="56"><label class="ml-2"
                                                                                     for="panel_type_556">Employee Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('57', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_557"
                                                                   value="57"><label class="ml-2"
                                                                                     for="panel_type_557">Performance Report</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_558" value="58"><label class="ml-2" for="panel_type_558">View Sheets</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_559" value="59"><label class="ml-2" for="panel_type_559">View Cancel History</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('62', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_562"
                                                                   value="62"><label class="ml-2"
                                                                                     for="panel_type_562">QA Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('63', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_563"
                                                                   value="63"><label class="ml-2"
                                                                                     for="panel_type_563">Roles</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('64', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_564"
                                                                   value="64"><label class="ml-2"
                                                                                     for="panel_type_564">Update QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('65', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_565"
                                                                   value="65"><label class="ml-2"
                                                                                     for="panel_type_565">View QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('68', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_568"
                                                                   value="68"><label class="ml-2"
                                                                                     for="panel_type_568">Approaching Number Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('69', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_569"
                                                                   value="69"><label class="ml-2"
                                                                                     for="panel_type_569">Approaching Number Website</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('70', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_570"
                                                                   value="70"><label class="ml-2"
                                                                                     for="panel_type_570">Approaching Assign</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('142', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5142"
                                                                   value="142"><label class="ml-2"
                                                                                      for="panel_type_5142">Approaching  Filter <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('145', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5145"
                                                                   value="145"><label class="ml-2"
                                                                                      for="panel_type_5145">Auto Approach Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('146', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5146"
                                                                   value="146"><label class="ml-2"
                                                                                      for="panel_type_5146">Auto Approach  Filter  <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('71', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_571"
                                                                   value="71"><label class="ml-2"
                                                                                     for="panel_type_571">Booked Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('72', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_572"
                                                                   value="72"><label class="ml-2"
                                                                                     for="panel_type_572">Offer Price</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('74', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_574"
                                                                   value="74"><label class="ml-2"
                                                                                     for="panel_type_574">Achievement Sheet</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="panel_type_5111">Achievement Sheet Add/Edit
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('107', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5107"
                                                                   value="107"><label class="ml-2"
                                                                                      for="panel_type_5107">Achievement Sheet View Full
                                                                Screen </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('75', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_575"
                                                                   value="75"><label class="ml-2"
                                                                                     for="panel_type_575">Port Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('76', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_576"
                                                                   value="76"><label class="ml-2"
                                                                                     for="panel_type_576">Assign To Dispatcher</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('77', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_577"
                                                                   value="77"><label class="ml-2"
                                                                                     for="panel_type_577">Move OnApprovalCancel To
                                                                Cancel</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_578" value="78"><label class="ml-2" for="panel_type_578">Payment Confirmation</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('79', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_579"
                                                                   value="79"><label class="ml-2"
                                                                                     for="panel_type_579">Profile</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_580" value="80"><label class="ml-2" for="panel_type_580">Port Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_581" value="81"><label class="ml-2" for="panel_type_581">Payment Missing Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_582" value="82"><label class="ml-2" for="panel_type_582">Dispatch Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_583" value="83"><label class="ml-2" for="panel_type_583">Pickup Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_5[]" id="panel_type_584" value="84"><label class="ml-2" for="panel_type_584">Delivered Sheet</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('85', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_585"
                                                                   value="85"><label class="ml-2"
                                                                                     for="panel_type_585">Commission Range</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('86', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_586"
                                                                   value="86"><label class="ml-2"
                                                                                     for="panel_type_586">Employee Profile Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('87', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_587"
                                                                   value="87"><label class="ml-2"
                                                                                     for="panel_type_587">Break Time</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('88', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_588"
                                                                   value="88"><label class="ml-2"
                                                                                     for="panel_type_588">Freeze Time History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('89', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_589"
                                                                   value="89"><label class="ml-2"
                                                                                     for="panel_type_589">Payment System Advance
                                                                Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('90', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_590"
                                                                   value="90"><label class="ml-2"
                                                                                     for="panel_type_590">Demand Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('91', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_591"
                                                                   value="91"><label class="ml-2"
                                                                                     for="panel_type_591">Sell Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('93', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_593"
                                                                   value="93"><label class="ml-2"
                                                                                     for="panel_type_593">Freight Price Checker</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('94', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_594"
                                                                   value="94"><label class="ml-2"
                                                                                     for="panel_type_594">Access Auto Approach</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('100', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5100"
                                                                   value="100"><label class="ml-2"
                                                                                      for="panel_type_5100">Field Labels</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('101', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5101"
                                                                   value="101"><label class="ml-2"
                                                                                      for="panel_type_5101">Carrier Approaching
                                                                Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('102', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5102"
                                                                   value="102"><label class="ml-2"
                                                                                      for="panel_type_5102">Carrier Approaching View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('103', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5103"
                                                                   value="103"><label class="ml-2"
                                                                                      for="panel_type_5103">Carrier Blocking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('104', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5104"
                                                                   value="104"><label class="ml-2"
                                                                                      for="panel_type_5104">Whatsapp Access</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('105', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5105"
                                                                   value="105"><label class="ml-2"
                                                                                      for="panel_type_5105">Customer Nature
                                                                (View/Update)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('106', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5106"
                                                                   value="106"><label class="ml-2"
                                                                                      for="panel_type_5106">Customer Nature
                                                                List/Filter</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="panel_type_5109">Authorization Form List</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="panel_type_5110">Testing Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="panel_type_5111">Port Tracking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('112', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5112"
                                                                   value="112"><label class="ml-2"
                                                                                      for="panel_type_5112">Message Chats</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('113', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5113"
                                                                   value="113"><label class="ml-2"
                                                                                      for="panel_type_5113">Allow Vehicle</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('114', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5114"
                                                                   value="114"><label class="ml-2"
                                                                                      for="panel_type_5114">Allow Heavy</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('115', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5115"
                                                                   value="115"><label class="ml-2"
                                                                                      for="panel_type_5115">Allow Freight</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('116', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5116"
                                                                   value="116"><label class="ml-2"
                                                                                      for="panel_type_5116">Logout Questions (Show Logout
                                                                Questions)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('117', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5117"
                                                                   value="117"><label class="ml-2"
                                                                                      for="panel_type_5117">Logout Questions Answer
                                                                View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('118', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5118"
                                                                   value="118"><label class="ml-2"
                                                                                      for="panel_type_5118">Logout Questions Comments</label>
                                                        </div>
                                                        {{-- <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                @if (in_array('119', $panel_type_5)) {{ 'checked' }} @endif
                                                                name="panel_type_5[]" id="panel_type_5119"
                                                                value="119"><label class="ml-2"
                                                                for="panel_type_5119">Logout Questions Answer</label>
                                                        </div> --}}
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('120', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5120"
                                                                   value="120"><label class="ml-2"
                                                                                      for="panel_type_5120">Logout Questions View &
                                                                Add</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('121', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5121"
                                                                   value="121"><label class="ml-2"
                                                                                      for="panel_type_5121">Show Pickup Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('122', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5122"
                                                                   value="122"><label class="ml-2"
                                                                                      for="panel_type_5122">Show Delivery Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('123', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5123"
                                                                   value="123"><label class="ml-2"
                                                                                      for="panel_type_5123">Request Price Page</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('124', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5124"
                                                                   value="124"><label class="ml-2"
                                                                                      for="panel_type_5124">Block Phone View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('125', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5125"
                                                                   value="125"><label class="ml-2"
                                                                                      for="panel_type_5125">Block Phone Approve</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('128', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5128"
                                                                   value="128"><label class="ml-2"
                                                                                      for="panel_type_5128">Employee Revenue (OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('127', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5127"
                                                                   value="127"><label class="ml-2"
                                                                                      for="panel_type_5127">Employee Revenue (DB)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('129', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5129"
                                                                   value="129"><label class="ml-2"
                                                                                      for="panel_type_5129">Employee Revenue (DIS)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('130', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5130"
                                                                   value="130"><label class="ml-2"
                                                                                      for="panel_type_5130">Employee Revenue (Private
                                                                OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('131', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5131"
                                                                   value="131"><label class="ml-2"
                                                                                      for="panel_type_5131">Cpanel Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('132', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5132"
                                                                   value="132"><label class="ml-2"
                                                                                      for="panel_type_5132">Agents Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('133', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5133"
                                                                   value="133"><label class="ml-2"
                                                                                      for="panel_type_5133">Customer Reviews</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('134', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5134"
                                                                   value="134"><label class="ml-2"
                                                                                      for="panel_type_5134">Call/SMS With App</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('135', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5135"
                                                                   value="135"><label class="ml-2"
                                                                                      for="panel_type_5135">Call/SMS Old</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('136', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5136"
                                                                   value="136"><label class="ml-2"
                                                                                      for="panel_type_5136">Day Dispatch | Filter <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('143', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5143"
                                                                   value="143"><label class="ml-2"
                                                                                      for="panel_type_5143">Day Dispatch C|S|B | Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('137', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5137"
                                                                   value="137"><label class="ml-2"
                                                                                      for="panel_panel_type_5137">Day Dispatch  | Shipper <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('138', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5138"
                                                                   value="138"><label class="ml-2"
                                                                                      for="panel_panel_type_5138">Day Dispatch  | Carrier <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('139', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5139"
                                                                   value="139"><label class="ml-2"
                                                                                      for="panel_panel_type_5139">Day Dispatch  | Broker <span class="badge badge-warning">New</span></label>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('140', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5140"
                                                                   value="140"><label class="ml-2"
                                                                                      for="panel_panel_type_5140">Dealer Approaching view<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('144', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5144"
                                                                   value="144"><label class="ml-2"
                                                                                      for="panel_panel_type_5144">Dealer Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('141', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5141"
                                                                   value="141"><label class="ml-2"
                                                                                      for="panel_type_5141">Dealer Approaching Filter<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('147', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5147"
                                                                   value="147"><label class="ml-2"
                                                                                      for="panel_type_5147">Shipa1 Query<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('148', $panel_type_5)) {{ 'checked' }} @endif
                                                                   name="panel_type_5[]" id="panel_type_5148"
                                                                   value="148"><label class="ml-2"
                                                                                      for="panel_type_5148">Shipa1 Query Assign<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModa26" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabe20" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 60%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Employee Access (Testing
                                                Qoutes)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_al20"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all2">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_60"
                                                                   value="0"><label class="ml-2"
                                                                                    for="panel_type_60">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_61"
                                                                   value="1"><label class="ml-2"
                                                                                    for="panel_type_61">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_62"
                                                                   value="2"><label class="ml-2"
                                                                                    for="panel_type_62">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_63"
                                                                   value="3"><label class="ml-2"
                                                                                    for="panel_type_63">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_64"
                                                                   value="4"><label class="ml-2"
                                                                                    for="panel_type_64">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_65"
                                                                   value="5"><label class="ml-2"
                                                                                    for="panel_type_65">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_66"
                                                                   value="6"><label class="ml-2"
                                                                                    for="panel_type_66">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_67"
                                                                   value="7"><label class="ml-2"
                                                                                    for="panel_type_67">Paymen tMissing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_68"
                                                                   value="8"><label class="ml-2"
                                                                                    for="panel_type_68">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('66', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_666"
                                                                   value="66"><label class="ml-2"
                                                                                     for="panel_type_666">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_69"
                                                                   value="9"><label class="ml-2"
                                                                                    for="panel_type_69">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_610"
                                                                   value="10"><label class="ml-2"
                                                                                     for="panel_type_610">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_611"
                                                                   value="11"><label class="ml-2"
                                                                                     for="panel_type_611">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_612"
                                                                   value="12"><label class="ml-2"
                                                                                     for="panel_type_612">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_613"
                                                                   value="13"><label class="ml-2"
                                                                                     for="panel_type_613">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_614"
                                                                   value="14"><label class="ml-2"
                                                                                     for="panel_type_614">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_615"
                                                                   value="15"><label class="ml-2"
                                                                                     for="panel_type_615">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_616"
                                                                   value="16"><label class="ml-2"
                                                                                     for="panel_type_616">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_617"
                                                                   value="17"><label class="ml-2"
                                                                                     for="panel_type_617">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_618"
                                                                   value="18"><label class="ml-2"
                                                                                     for="panel_type_618">Car Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_619"
                                                                   value="19"><label class="ml-2"
                                                                                     for="panel_type_619">Heavy Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('92', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_692"
                                                                   value="92"><label class="ml-2"
                                                                                     for="panel_type_692">Freight Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_620"
                                                                   value="20"><label class="ml-2"
                                                                                     for="panel_type_620">Add/Edit Employee</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_621"
                                                                   value="21"><label class="ml-2"
                                                                                     for="panel_type_621">Admin Issues</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_622"
                                                                   value="22"><label class="ml-2"
                                                                                     for="panel_type_622">Old Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_623"
                                                                   value="23"><label class="ml-2"
                                                                                     for="panel_type_623">Transportation Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('73', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_673"
                                                                   value="73"><label class="ml-2"
                                                                                     for="panel_type_673">Roro Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_624"
                                                                   value="24"><label class="ml-2"
                                                                                     for="panel_type_624">Carriers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_625"
                                                                   value="25"><label class="ml-2"
                                                                                     for="panel_type_625">View Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_626"
                                                                   value="26"><label class="ml-2"
                                                                                     for="panel_type_626">Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_627"
                                                                   value="27"><label class="ml-2"
                                                                                     for="panel_type_627">Sheets</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_628"
                                                                   value="28"><label class="ml-2"
                                                                                     for="panel_type_628">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_629"
                                                                   value="29"><label class="ml-2"
                                                                                     for="panel_type_629">OnApproval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_630"
                                                                   value="30"><label class="ml-2"
                                                                                     for="panel_type_630">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_631"
                                                                   value="31"><label class="ml-2"
                                                                                     for="panel_type_631">Payment System</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_632"
                                                                   value="32"><label class="ml-2"
                                                                                     for="panel_type_632">Employee Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_633"
                                                                   value="33"><label class="ml-2"
                                                                                     for="panel_type_633">Price Per Mile</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_634"
                                                                   value="34"><label class="ml-2"
                                                                                     for="panel_type_634">Filtered Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_635"
                                                                   value="35"><label class="ml-2"
                                                                                     for="panel_type_635">Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('36', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_636"
                                                                   value="36"><label class="ml-2"
                                                                                     for="panel_type_636">Questions/Answers</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('37', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_637"
                                                                   value="37"><label class="ml-2"
                                                                                     for="panel_type_637">New Show Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('38', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_638"
                                                                   value="38"><label class="ml-2"
                                                                                     for="panel_type_638">Customer</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_639" value="39"><label class="ml-2" for="panel_type_639">Messages Center</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_640" value="40"><label class="ml-2" for="panel_type_640">Call Logs Center</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('41', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_641"
                                                                   value="41"><label class="ml-2"
                                                                                     for="panel_type_641">Update Phone Digits</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('42', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_642"
                                                                   value="42"><label class="ml-2"
                                                                                     for="panel_type_642">Show Customer Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('67', $panel_type_6)) {{ 'checked' }} @endif name="panel_type_6[]" id="panel_type_667" value="67"><label class="ml-2" for="panel_type_667">Customer Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('60', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_660"
                                                                   value="60"><label class="ml-2"
                                                                                     for="panel_type_660">Show Driver Number</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" @if (in_array('61', $panel_type_6)) {{ 'checked' }} @endif name="panel_type_6[]" id="panel_type_661" value="61"><label class="ml-2" for="panel_type_661">Driver Full Number</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('43', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_643"
                                                                   value="43"><label class="ml-2"
                                                                                     for="panel_type_643">Flag Employees</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('44', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_644"
                                                                   value="44"><label class="ml-2"
                                                                                     for="panel_type_644">Transfer Quotes</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('46', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_646"
                                                                   value="46"><label class="ml-2"
                                                                                     for="panel_type_646">Revenue</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('47', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_647"
                                                                   value="47"><label class="ml-2"
                                                                                     for="panel_type_647">Coupons</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('48', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_648"
                                                                   value="48"><label class="ml-2"
                                                                                     for="panel_type_648">Website Links</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('49', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_649"
                                                                   value="49"><label class="ml-2"
                                                                                     for="panel_type_649">Feedbacks</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_645" value="45"><label class="ml-2" for="panel_type_645">Add Feedback</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('50', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_650"
                                                                   value="50"><label class="ml-2"
                                                                                     for="panel_type_650">Managers Group</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('51', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_651"
                                                                   value="51"><label class="ml-2"
                                                                                     for="panel_type_651">Last Activity</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('52', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_652"
                                                                   value="52"><label class="ml-2"
                                                                                     for="panel_type_652">Login Ip Address</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('53', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_653"
                                                                   value="53"><label class="ml-2"
                                                                                     for="panel_type_653">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('54', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_654"
                                                                   value="54"><label class="ml-2"
                                                                                     for="panel_type_654">Shipment Status</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('55', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_655"
                                                                   value="55"><label class="ml-2"
                                                                                     for="panel_type_655">Dispatch Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('56', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_656"
                                                                   value="56"><label class="ml-2"
                                                                                     for="panel_type_656">Employee Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('57', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_657"
                                                                   value="57"><label class="ml-2"
                                                                                     for="panel_type_657">Performance Report</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_658" value="58"><label class="ml-2" for="panel_type_658">View Sheets</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_659" value="59"><label class="ml-2" for="panel_type_659">View Cancel History</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('62', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_662"
                                                                   value="62"><label class="ml-2"
                                                                                     for="panel_type_662">QA Report</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('63', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_663"
                                                                   value="63"><label class="ml-2"
                                                                                     for="panel_type_663">Roles</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('64', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_664"
                                                                   value="64"><label class="ml-2"
                                                                                     for="panel_type_664">Update QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('65', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_665"
                                                                   value="65"><label class="ml-2"
                                                                                     for="panel_type_665">View QA History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('68', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_668"
                                                                   value="68"><label class="ml-2"
                                                                                     for="panel_type_668">Approaching Number Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('69', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_669"
                                                                   value="69"><label class="ml-2"
                                                                                     for="panel_type_669">Approaching Number Website</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('70', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_670"
                                                                   value="70"><label class="ml-2"
                                                                                     for="panel_type_670">Approaching Assign</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('142', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6142"
                                                                   value="142"><label class="ml-2"
                                                                                      for="panel_type_6142">Approaching  Filter <span class="badge badge-warning">New</span></label>
                                                        </div>




                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('145', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6145"
                                                                   value="145"><label class="ml-2"
                                                                                      for="panel_type_6145">Auto Approach Assign <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('146', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6146"
                                                                   value="146"><label class="ml-2"
                                                                                      for="panel_type_6146">Auto Approach  Filter <span class="badge badge-warning">New</span></label>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('71', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_671"
                                                                   value="71"><label class="ml-2"
                                                                                     for="panel_type_671">Booked Name</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('72', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_672"
                                                                   value="72"><label class="ml-2"
                                                                                     for="panel_type_672">Offer Price</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('74', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_674"
                                                                   value="74"><label class="ml-2"
                                                                                     for="panel_type_674">Achievement Sheet</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="panel_type_6111">Achievement Sheet Add/Edit
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('107', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6107"
                                                                   value="107"><label class="ml-2"
                                                                                      for="panel_type_6107">Achievement Sheet View Full
                                                                Screen </label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('75', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_675"
                                                                   value="75"><label class="ml-2"
                                                                                     for="panel_type_675">Port Price</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('76', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_676"
                                                                   value="76"><label class="ml-2"
                                                                                     for="panel_type_676">Assign To Dispatcher</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('77', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_677"
                                                                   value="77"><label class="ml-2"
                                                                                     for="panel_type_677">Move OnApprovalCancel To
                                                                Cancel</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_678" value="78"><label class="ml-2" for="panel_type_678">Payment Confirmation</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('79', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_679"
                                                                   value="79"><label class="ml-2"
                                                                                     for="panel_type_679">Profile</label>
                                                        </div>
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_680" value="80"><label class="ml-2" for="panel_type_680">Port Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_681" value="81"><label class="ml-2" for="panel_type_681">Payment Missing Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_682" value="82"><label class="ml-2" for="panel_type_682">Dispatch Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_683" value="83"><label class="ml-2" for="panel_type_683">Pickup Sheet</label>-->
                                                        <!--</div>-->
                                                        <!--<div class="col-sm-6">-->
                                                        <!--    <input type="checkbox" name="panel_type_6[]" id="panel_type_684" value="84"><label class="ml-2" for="panel_type_684">Delivered Sheet</label>-->
                                                        <!--</div>-->
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('85', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_685"
                                                                   value="85"><label class="ml-2"
                                                                                     for="panel_type_685">Commission Range</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('86', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_686"
                                                                   value="86"><label class="ml-2"
                                                                                     for="panel_type_686">Employee Profile Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('87', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_687"
                                                                   value="87"><label class="ml-2"
                                                                                     for="panel_type_687">Break Time</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('88', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_688"
                                                                   value="88"><label class="ml-2"
                                                                                     for="panel_type_688">Freeze Time History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('89', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_689"
                                                                   value="89"><label class="ml-2"
                                                                                     for="panel_type_689">Payment System Advance
                                                                Filter</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('90', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_690"
                                                                   value="90"><label class="ml-2"
                                                                                     for="panel_type_690">Demand Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('91', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_691"
                                                                   value="91"><label class="ml-2"
                                                                                     for="panel_type_691">Sell Invoice</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('93', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_693"
                                                                   value="93"><label class="ml-2"
                                                                                     for="panel_type_693">Freight Price Checker</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('94', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_694"
                                                                   value="94"><label class="ml-2"
                                                                                     for="panel_type_694">Access Auto Approach</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('100', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6100"
                                                                   value="100"><label class="ml-2"
                                                                                      for="panel_type_6100">Field Labels</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('101', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6101"
                                                                   value="101"><label class="ml-2"
                                                                                      for="panel_type_6101">Carrier Approaching
                                                                Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('102', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6102"
                                                                   value="102"><label class="ml-2"
                                                                                      for="panel_type_6102">Carrier Approaching View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('103', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6103"
                                                                   value="103"><label class="ml-2"
                                                                                      for="panel_type_6103">Carrier Blocking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('104', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6104"
                                                                   value="104"><label class="ml-2"
                                                                                      for="panel_type_6104">Whatsapp Access</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('105', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6105"
                                                                   value="105"><label class="ml-2"
                                                                                      for="panel_type_6105">Customer Nature
                                                                (View/Update)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('106', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6106"
                                                                   value="106"><label class="ml-2"
                                                                                      for="panel_type_6106">Customer Nature
                                                                List/Filter</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="panel_type_6109">Authorization Form List</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="panel_type_6110">Testing Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="panel_type_6111">Port Tracking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('112', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6112"
                                                                   value="112"><label class="ml-2"
                                                                                      for="panel_type_6112">Message Chats</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('113', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6113"
                                                                   value="113"><label class="ml-2"
                                                                                      for="panel_type_6113">Allow Vehicle</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('114', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6114"
                                                                   value="114"><label class="ml-2"
                                                                                      for="panel_type_6114">Allow Heavy</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('115', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6115"
                                                                   value="115"><label class="ml-2"
                                                                                      for="panel_type_6115">Allow Freight</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('116', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6116"
                                                                   value="116"><label class="ml-2"
                                                                                      for="panel_type_6116">Logout Questions (Show Logout
                                                                Questions)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('117', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6117"
                                                                   value="117"><label class="ml-2"
                                                                                      for="panel_type_6117">Logout Questions Answer
                                                                View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('118', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6118"
                                                                   value="118"><label class="ml-2"
                                                                                      for="panel_type_6118">Logout Questions Comments</label>
                                                        </div>
                                                        {{-- <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                @if (in_array('119', $panel_type_6)) {{ 'checked' }} @endif
                                                                name="panel_type_6[]" id="panel_type_6119"
                                                                value="119"><label class="ml-2"
                                                                for="panel_type_6119">Logout Questions Answer</label>
                                                        </div> --}}
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('120', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6120"
                                                                   value="120"><label class="ml-2"
                                                                                      for="panel_type_6120">Logout Questions View &
                                                                Add</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('121', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6121"
                                                                   value="121"><label class="ml-2"
                                                                                      for="panel_type_6121">Show Pickup Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('122', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6122"
                                                                   value="122"><label class="ml-2"
                                                                                      for="panel_type_6122">Show Delivery Phone</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('123', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6123"
                                                                   value="123"><label class="ml-2"
                                                                                      for="panel_type_6123">Request Price Page</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('124', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6124"
                                                                   value="124"><label class="ml-2"
                                                                                      for="panel_type_6124">Block Phone View</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('125', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6125"
                                                                   value="125"><label class="ml-2"
                                                                                      for="panel_type_6125">Block Phone Approve</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('128', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6128"
                                                                   value="128"><label class="ml-2"
                                                                                      for="panel_type_6128">Employee Revenue (OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('127', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6127"
                                                                   value="127"><label class="ml-2"
                                                                                      for="panel_type_6127">Employee Revenue (DB)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('129', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6129"
                                                                   value="129"><label class="ml-2"
                                                                                      for="panel_type_6129">Employee Revenue (DIS)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('130', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6130"
                                                                   value="130"><label class="ml-2"
                                                                                      for="panel_type_6130">Employee Revenue (Private
                                                                OT)</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('131', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6131"
                                                                   value="131"><label class="ml-2"
                                                                                      for="panel_type_6131">Cpanel Emails</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('132', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6132"
                                                                   value="132"><label class="ml-2"
                                                                                      for="panel_type_6132">Agents Reports</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('133', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6133"
                                                                   value="133"><label class="ml-2"
                                                                                      for="panel_type_6133">Customer Reviews</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('134', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6134"
                                                                   value="134"><label class="ml-2"
                                                                                      for="panel_type_6134">Call/SMS With App</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('135', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6135"
                                                                   value="135"><label class="ml-2"
                                                                                      for="panel_type_6135">Call/SMS Old</label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('136', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6136"
                                                                   value="136"><label class="ml-2"
                                                                                      for="panel_type_6136">Day Dispatch | Filter <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('143', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6143"
                                                                   value="143"><label class="ml-2"
                                                                                      for="panel_type_6143">Day Dispatch C|S|B | Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('137', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6137"
                                                                   value="137"><label class="ml-2"
                                                                                      for="panel_panel_type_6137">Day Dispatch  | Shipper <span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('138', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6138"
                                                                   value="138"><label class="ml-2"
                                                                                      for="panel_panel_type_6138">Day Dispatch  | Carrier <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('139', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6139"
                                                                   value="139"><label class="ml-2"
                                                                                      for="panel_panel_type_6139">Day Dispatch  | Broker <span class="badge badge-warning">New</span></label>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('140', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6140"
                                                                   value="140"><label class="ml-2"
                                                                                      for="panel_panel_type_6140">Dealer Approaching view<span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('144', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6144"
                                                                   value="144"><label class="ml-2"
                                                                                      for="panel_panel_type_6144">Dealer Approaching Assign <span class="badge badge-warning">New</span></label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('141', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6141"
                                                                   value="141"><label class="ml-2"
                                                                                      for="panel_type_6141">Dealer Approaching Filter<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('147', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6147"
                                                                   value="147"><label class="ml-2"
                                                                                      for="panel_type_6147">Shipa1 Query<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('148', $panel_type_6)) {{ 'checked' }} @endif
                                                                   name="panel_type_6[]" id="panel_type_6148"
                                                                   value="148"><label class="ml-2"
                                                                                      for="panel_type_6panel_type_6148">Shipa1 Query Assign<span class="badge badge-warning">New</span></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Employee Access (Show Data)
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all3"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all3">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_show_data1">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_show_data2">Follow Up</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_show_data3">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_show_data4">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_show_data5">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_show_data6">No Responding</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_show_data7">Time Qoute</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_show_data8">Payment Missing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_show_data9">On Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_show_data10">On Approval Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_show_data11">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_show_data12">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data13"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_show_data13">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_show_data14">Not Picked Up</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data15"
                                                                   value="15"><label class="ml-2"
                                                                                     for="emp_show_data15">Picked Up</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data16"
                                                                   value="16"><label class="ml-2"
                                                                                     for="emp_show_data16">Not Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data23"
                                                                   value="23"><label class="ml-2"
                                                                                     for="emp_show_data23">Schedule For Delivery</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data17"
                                                                   value="17"><label class="ml-2"
                                                                                     for="emp_show_data17">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_show_data18">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_show_data19">Cancelled</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_show_data20">Deleted</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_show_data21">Owes Money</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $emp_show_data)) {{ 'checked' }} @endif
                                                                   name="emp_show_data[]" id="emp_show_data22"
                                                                   value="22"><label class="ml-2"
                                                                                     for="emp_show_data22">No Win Auction</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel4">Employee Access (Shipment
                                                Status)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all4"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all4">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('0', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship0" value="0"><label
                                                                    class="ml-2" for="emp_access_ship0">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('1', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship1" value="1"><label
                                                                    class="ml-2" for="emp_access_ship1">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('2', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship2" value="2"><label
                                                                    class="ml-2" for="emp_access_ship2">Follow
                                                                More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('3', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship3" value="3"><label
                                                                    class="ml-2" for="emp_access_ship3">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('4', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship4" value="4"><label
                                                                    class="ml-2" for="emp_access_ship4">Not
                                                                Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('5', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship5" value="5"><label
                                                                    class="ml-2" for="emp_access_ship5">No
                                                                Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('6', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship6" value="6"><label
                                                                    class="ml-2" for="emp_access_ship6">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('7', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship7" value="7"><label
                                                                    class="ml-2" for="emp_access_ship7">Payment
                                                                Missing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('8', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship8" value="8"><label
                                                                    class="ml-2" for="emp_access_ship8">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('18', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship18" value="18"><label
                                                                    class="ml-2"
                                                                    for="emp_access_ship18">OnApproval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('9', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship9" value="9"><label
                                                                    class="ml-2" for="emp_access_ship9">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('10', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship10" value="10"><label
                                                                    class="ml-2" for="emp_access_ship10">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('34', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship34" value="34"><label
                                                                    class="ml-2" for="emp_access_ship34">Schedule Another
                                                                Driver</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('30', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship30" value="30"><label
                                                                    class="ml-2" for="emp_access_ship30">Pickup
                                                                Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('11', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship11" value="11"><label
                                                                    class="ml-2" for="emp_access_ship11">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('31', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship31" value="31"><label
                                                                    class="ml-2" for="emp_access_ship31">Delivered
                                                                Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('32', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship32" value="32"><label
                                                                    class="ml-2" for="emp_access_ship32">Schedule For
                                                                Delivery</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('12', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship12" value="12"><label
                                                                    class="ml-2" for="emp_access_ship12">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('19', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship19" value="19"><label
                                                                    class="ml-2"
                                                                    for="emp_access_ship19">OnApprovalCancelled</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('14', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship14" value="14"><label
                                                                    class="ml-2" for="emp_access_ship14">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('20', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship20" value="20"><label
                                                                    class="ml-2" for="emp_access_ship20">Relist</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('21', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship21" value="21"><label
                                                                    class="ml-2" for="emp_access_ship21">Price
                                                                Raise</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('22', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship22" value="22"><label
                                                                    class="ml-2" for="emp_access_ship22">Approach
                                                                Id</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('23', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship23" value="23"><label
                                                                    class="ml-2" for="emp_access_ship23">Different
                                                                Port</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('24', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship27" value="24"><label
                                                                    class="ml-2" for="emp_access_ship24">Carrier
                                                                Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('25', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship25" value="25"><label
                                                                    class="ml-2" for="emp_access_ship25">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('26', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship26" value="26"><label
                                                                    class="ml-2"
                                                                    for="emp_access_ship26">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('27', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship27" value="27"><label
                                                                    class="ml-2" for="emp_access_ship27">Auction Update
                                                                Request</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('28', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship28" value="28"><label
                                                                    class="ml-2" for="emp_access_ship28">Move To
                                                                Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('29', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship29" value="29"><label
                                                                    class="ml-2" for="emp_access_ship29">Double
                                                                Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="emp_access_ship[]"
                                                                   @if (in_array('33', $emp_shipment_status)) {{ 'checked' }} @endif
                                                                   id="emp_access_ship33" value="33"><label
                                                                    class="ml-2" for="emp_access_ship33">Auction
                                                                Update</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel5" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 55%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel5">Employee Access (Profile)
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all5"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all5">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile0"
                                                                   value="0"><label class="ml-2"
                                                                                    for="emp_access_profile0">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_access_profile1">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_access_profile2">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_access_profile3">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_access_profile4">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_access_profile5">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_access_profile6">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_access_profile7">Payment Missing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_access_profile18">OnApproval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_access_profile8">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_access_profile9">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_access_profile10">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile30"
                                                                   value="30"><label class="ml-2"
                                                                                     for="emp_access_profile30">Pickup Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_access_profile11">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile31"
                                                                   value="31"><label class="ml-2"
                                                                                     for="emp_access_profile31">Delivered Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile32"
                                                                   value="32"><label class="ml-2"
                                                                                     for="emp_access_profile32">Schedule For Delivery</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_access_profile12">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile13"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_access_profile13">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_access_profile14">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_access_profile19">On Approval Cancelled</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_access_profile20">Review Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_profile)) {{ 'checked' }} @endif
                                                                   name="emp_access_profile[]" id="emp_access_profile21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_access_profile21">Cancel Remark By
                                                                (Admin/HOD/TeamLead)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel6" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 55%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel6">Employee Access (Action)
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all6"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all6">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_access_action1">Move To Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_access_action2">Move To Schedule For
                                                                Delivery</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_access_action3">Move To Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_access_action4">View/Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_access_action5">Edit Data</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_access_action6">Print Summary</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_access_action7">Send Payment Link To
                                                                Customer</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_access_action8">View Location</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_access_action9">Request</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_access_action10">Pay Now</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_access_action11">Carrier Record</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_access_action12">Storage Record</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action13"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_access_action13">Move to Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_access_action14">Payment Confirmation</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('15', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action15"
                                                                   value="15"><label class="ml-2"
                                                                                     for="emp_access_action15">Message Center</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('16', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action16"
                                                                   value="16"><label class="ml-2"
                                                                                     for="emp_access_action16">Call Logs Center</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('17', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action17"
                                                                   value="17"><label class="ml-2"
                                                                                     for="emp_access_action17">Rating</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_access_action18">Delete Order</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_access_action19">Feedback</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_access_action20">Sheet</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_access_action21">View Cancel History</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('108', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action108"
                                                                   value="108"><label class="ml-2"
                                                                                      for="emp_access_action108">Authorization Form</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('109', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action109"
                                                                   value="109"><label class="ml-2"
                                                                                      for="emp_access_action109">Revert to New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('110', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action110"
                                                                   value="110"><label class="ml-2"
                                                                                      for="emp_access_action110">Allow Price Giver</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('111', $emp_action)) {{ 'checked' }} @endif
                                                                   name="emp_access_action[]" id="emp_access_action111"
                                                                   value="111"><label class="ml-2"
                                                                                      for="emp_access_action111">Allow Check Price Btn</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModa28" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel6" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 55%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel6">Panel Type Access
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        {{-- <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all6"
                                                                class="emp_access_ship_all"><label class="ml-2"
                                                                for="emp_access_ship_all6">All Options</label>
                                                        </div> --}}
                                                        <br>
                                                        <div class="col-sm-4">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_panel_access)) {{ 'checked' }} @endif
                                                                   name="emp_panel_access[]" id="emp_panel_access1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_panel_access1">Phone</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_panel_access)) {{ 'checked' }} @endif
                                                                   name="emp_panel_access[]" id="emp_panel_access2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_panel_access2">Website</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_panel_access)) {{ 'checked' }} @endif
                                                                   name="emp_panel_access[]" id="emp_panel_access3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_panel_access3">Testing</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_panel_access)) {{ 'checked' }} @endif
                                                                   name="emp_panel_access[]" id="emp_panel_access4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_panel_access4">Panel Type 4</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_panel_access)) {{ 'checked' }} @endif
                                                                   name="emp_panel_access[]" id="emp_panel_access5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_panel_access5">Panel Type 5</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_panel_access)) {{ 'checked' }} @endif
                                                                   name="emp_panel_access[]" id="emp_panel_access6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_panel_access6">Panel Type 6</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel7" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel7">Employee Access (Employee
                                                Report)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="checkbox" id="emp_access_ship_all7"
                                                                   class="emp_access_ship_all"><label class="ml-2"
                                                                                                      for="emp_access_ship_all7">All Options</label>
                                                        </div>
                                                        <br>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('0', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report0"
                                                                   value="0"><label class="ml-2"
                                                                                    for="emp_access_report0">New</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('1', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report1"
                                                                   value="1"><label class="ml-2"
                                                                                    for="emp_access_report1">Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('2', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report2"
                                                                   value="2"><label class="ml-2"
                                                                                    for="emp_access_report2">Follow More</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('3', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report3"
                                                                   value="3"><label class="ml-2"
                                                                                    for="emp_access_report3">Asking Low</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('4', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report4"
                                                                   value="4"><label class="ml-2"
                                                                                    for="emp_access_report4">Not Interested</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('5', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report5"
                                                                   value="5"><label class="ml-2"
                                                                                    for="emp_access_report5">No Response</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('6', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report6"
                                                                   value="6"><label class="ml-2"
                                                                                    for="emp_access_report6">Time Quote</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('7', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report7"
                                                                   value="7"><label class="ml-2"
                                                                                    for="emp_access_report7">Payment Missing</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('8', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report8"
                                                                   value="8"><label class="ml-2"
                                                                                    for="emp_access_report8">Booked</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('18', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report18"
                                                                   value="18"><label class="ml-2"
                                                                                     for="emp_access_report18">OnApproval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('9', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report9"
                                                                   value="9"><label class="ml-2"
                                                                                    for="emp_access_report9">Listed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('10', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report10"
                                                                   value="10"><label class="ml-2"
                                                                                     for="emp_access_report10">Schedule</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('34', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report34"
                                                                   value="34"><label class="ml-2"
                                                                                     for="emp_access_report34">Schedule Another Driver</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('30', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report30"
                                                                   value="30"><label class="ml-2"
                                                                                     for="emp_access_report30">Pickup Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('11', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report11"
                                                                   value="11"><label class="ml-2"
                                                                                     for="emp_access_report11">Pickup</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('31', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report31"
                                                                   value="31"><label class="ml-2"
                                                                                     for="emp_access_report31">Delivered Approval</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('32', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report32"
                                                                   value="32"><label class="ml-2"
                                                                                     for="emp_access_report32">Schedule For Delivery</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('12', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report12"
                                                                   value="12"><label class="ml-2"
                                                                                     for="emp_access_report12">Delivered</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('13', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report32"
                                                                   value="13"><label class="ml-2"
                                                                                     for="emp_access_report13">Completed</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('19', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report19"
                                                                   value="19"><label class="ml-2"
                                                                                     for="emp_access_report19">OnApprovalCancelled</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('14', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report14"
                                                                   value="14"><label class="ml-2"
                                                                                     for="emp_access_report14">Cancel</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('20', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report20"
                                                                   value="20"><label class="ml-2"
                                                                                     for="emp_access_report20">Relist</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('21', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report21"
                                                                   value="21"><label class="ml-2"
                                                                                     for="emp_access_report21">Price Raise</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('22', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report22"
                                                                   value="22"><label class="ml-2"
                                                                                     for="emp_access_report22">Approach Id</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('23', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report23"
                                                                   value="23"><label class="ml-2"
                                                                                     for="emp_access_report23">Different Port</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('24', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report24"
                                                                   value="24"><label class="ml-2"
                                                                                     for="emp_access_report24">Carrier Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('25', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report25"
                                                                   value="25"><label class="ml-2"
                                                                                     for="emp_access_report25">Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('26', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report26"
                                                                   value="26"><label class="ml-2"
                                                                                     for="emp_access_report26">Approaching</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('27', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report27"
                                                                   value="27"><label class="ml-2"
                                                                                     for="emp_access_report27">Auction Update Request</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('28', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report28"
                                                                   value="28"><label class="ml-2"
                                                                                     for="emp_access_report28">Move To Storage</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('29', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report29"
                                                                   value="29"><label class="ml-2"
                                                                                     for="emp_access_report29">Double Booking</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('33', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report33"
                                                                   value="33"><label class="ml-2"
                                                                                     for="emp_access_report33">Auction Update</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="checkbox"
                                                                   @if (in_array('35', $emp_report)) {{ 'checked' }} @endif
                                                                   name="emp_access_report[]" id="emp_access_report35"
                                                                   value="35"><label class="ml-2"
                                                                                     for="emp_access_report35">Auction Storage</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel7" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel7">Employee Access (Assign
                                                Data)</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php
                                                    $datas = \App\UsedAndNewCarDealers::select('state', \DB::raw('MIN(id) as id'), \DB::raw('COUNT(CASE WHEN user_id = 0 THEN 1 ELSE NULL END) as total_with_user_id_0'), \DB::raw('COUNT(*) as total'))->where('state', '!=', '-')->groupBy('state')->orderBy('state', 'asc')->get();
                                                    ?>
                                                    <div class="row justify-content displayEdit">
                                                        <div class="col-lg-3 lg3-div">
                                                            <label style="float: left">Order Taker</label>
                                                            <div class='input-group'>
                                                                <span>{{ $data2->name }}</span>
                                                                <input type='hidden' name="orderTaker"
                                                                       value="{{ $data2->id }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 lg3-div">
                                                            <label style="float: left">States</label>
                                                            <select id="state" name="state[]"
                                                                    class="select2 form-control" multiple
                                                                    class="form-control">
                                                                <!--<option selected value="">Select</option>-->
                                                                @foreach ($datas as $key => $val)
                                                                    <option value="{{ $val->state }}">
                                                                        {{ $val->state . ' ' . '(' . $val->total . ')' }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label style="float: left">Categories</label>
                                                            <select id="category_assign" name="category_assign"
                                                                    class="form-control">
                                                                <option value="">Select Category</option>
                                                                <option value="Auto Dealership">Auto Dealership</option>
                                                                <option value="Automotive Repair Services">Automotive
                                                                    Repair Services
                                                                </option>
                                                                <option value="New Car Dealer">New Car Dealer</option>
                                                                <option value="Used Car Dealer">Used Car Dealer</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-3 lg3-div">
                                                            <label style="float: left">Allow Records</label>
                                                            <div class='input-group'>
                                                                <input type='number' name="recordsAllowed"
                                                                       id="recordsAllowed" class="form-control height" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- </form> --}}
                                                    <div class="row justify-table">
                                                        <!--class="table table-bordered table-sm col-lg-2 fs-18 text-center pd-2 bd-l"-->
                                                        <table class="table table-bordered   fs-18 text-center pd-2 bd-l"
                                                               role="grid" aria-describedby="">
                                                            <thead class="table-dark">
                                                            <tr>
                                                                <th width="10%">States</th>
                                                                <th width="10%">Category</th>
                                                                <th width="10%">Records Allowed</th>
                                                                <th width="10%">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <td>{{ !is_null($data2->assignedData) ? $data2->assignedData->state : '' }}
                                                            </td>
                                                            <td>{{ !is_null($data2->assignedData) ? $data2->assignedData->category : '' }}
                                                            </td>
                                                            <td>{{ !is_null($data2->assignedData) ? $data2->assignedData->recordsAllowed : '' }}
                                                            </td>
                                                            <td>
                                                                {{-- <a class="btn btn-primary getData">Edit</a> --}}
                                                                <button type="button"
                                                                        class="btn btn-primary getData">Edit
                                                                    <input hidden type="text" class="User-ID"
                                                                           value="{{ !is_null($data2->assignedData) ? $data2->assignedData->orderTaker : '' }}">
                                                                </button>
                                                            </td>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{-- @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal9" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel4">Employee Access (Guides)
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        @foreach ($guide as $row)
                                                            <div class="col-sm-12">
                                                                <input type="checkbox" name="emp_access_guide[]"
                                                                       @if (in_array($row->id, $emp_access_guide)) {{ 'checked' }} @endif
                                                                       id="emp_access_guide{{ $row->id }}"
                                                                       value="{{ $row->id }}"><label class="ml-2"
                                                                                                     for="emp_access_guide{{ $row->id }}">{{ $row->page_name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-3">
                                <div class="form-group">
                                    @php
                                        $pt = 1;
                                        if (!empty($penaltype)) {
                                            $pt = $penaltype->penal_type;
                                        }
                                    @endphp

                                    <input type="radio" @if ($pt == 1) checked @endif
                                    name="penalytype" value="1"> Phone Quote
                                    <br>
                                    <input type="radio" @if ($pt == 2) checked @endif
                                    name="penalytype" value="2"> Website Quote
                                    <br>
                                    <input type="radio" @if ($pt == 3) checked @endif
                                    name="penalytype" value="3"> Testing Quote
                                    <br>
                                    <input type="radio" @if ($pt == 4) checked @endif
                                    name="penalytype" value="4"> Panel Type 4 Quote
                                    <br>
                                    <input type="radio" @if ($pt == 5) checked @endif
                                    name="penalytype" value="5"> Panel Type 5 Quote
                                    <br>
                                    <input type="radio" @if ($pt == 6) checked @endif
                                    name="penalytype" value="6"> Panel Type 6 Quote
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" required name="address" value="{{ $data2->address }}"
                                           class="form-control" placeholder="Home Address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button id="sv_btn" type="submit" class="btn  btn-info">UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row-->
    </form>


    <div class="modal" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fe fe-check-circle fs-100 text-success lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold" id="success"></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modaldemo5">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    <i class="fe fe-x-circle fs-100 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger" id="not_success"></h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')
    <script>
        $(document).ready(function(e) {
            $("#form").on('submit', (function(e) {
                if ($('#state').val() && $('#state').val().length > 0) {
                    var numberInputValue = $('#recordsAllowed').val();
                    if (numberInputValue !== undefined && numberInputValue.trim() !== '') {} else {
                        console.log('Number input is required.');
                    }
                } else {
                    console.log('At least one option in the multi-select is required.');
                }
                e.preventDefault();
                $.ajax({
                    url: "/update_employee",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {

                    },
                    success: function(data) {
                        let test = data.toString();
                        let test2 = $.trim(test);
                        let text = "SUCCESS";
                        if (test2 == text) {
                            $('#success').html(data);
                            $('#modaldemo4').modal('show');
                            if ("{{ Auth::user()->userRole->name }}" == 'Code Giver') {
                                window.location.href = "/employees";
                            } else {
                                window.location.href = "/view_employee";
                            }
                        } else {
                            $('#not_success').html(data);
                            $('#modaldemo5').modal('show');
                        }
                    },
                    error: function(e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });

        $("body").delegate("#phoneNumber", "focus", function() {
            $("#phoneNumber").mask("9999-9999999");
            $("#phoneNumber")[0].setSelectionRange(0, 0);
        });

        $(document).ready(function() {
            $("#phoneNumber").mask("9999-9999999");
            $("#phoneNumber")[0].setSelectionRange(0, 0);
        })

        $("input[name='phone_number']").keypress(function(e) {

            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || x == 8 ||
                (x >= 35 && x <= 40) || x == 46)
                return true;
            else
                return false;
        })
        $("input[name='assign_daily_qoute']").keypress(function(e) {

            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || x == 8 ||
                (x >= 35 && x <= 40) || x == 46)
                return true;
            else
                return false;
        })
    </script>
    <script>
        $('select[name="job_type"]').change(function() {
            var role_id = $(this).val();
            var role = $(this).children('option:selected').text();

            $('input:checkbox').removeAttr('checked');

            $.ajax({
                url: "/role-access",
                type: "POST",
                dataType: "json",
                data: {
                    role_id: role_id
                },
                success: function(res) {
                    if (res.data.phone) {
                        $.each(res.data.phone, function() {
                            if ($(`#emp_access_phone${this}`).val() == this) {
                                $(`#emp_access_phone${this}`).attr("checked", "checked");
                            }
                        });
                    }
                    if (res.data.web) {

                        $.each(res.data.web, function() {
                            if ($(`#emp_access_web${this}`).val() == this) {
                                $(`#emp_access_web${this}`).attr("checked", "checked");
                            }
                        });
                    }
                    if (res.data.show) {

                        $.each(res.data.show, function() {
                            if ($(`#emp_show_data${this}`).val() == this) {
                                $(`#emp_show_data${this}`).attr("checked", "checked");
                            }
                        });
                    }
                    if (res.data.ship) {

                        $.each(res.data.ship, function() {
                            if ($(`#emp_access_ship${this}`).val() == this) {
                                $(`#emp_access_ship${this}`).attr("checked", "checked");
                            }
                        });
                    }
                    if (res.data.profile) {

                        $.each(res.data.profile, function() {
                            if ($(`#emp_access_profile${this}`).val() == this) {
                                $(`#emp_access_profile${this}`).attr("checked", "checked");
                            }
                        });
                    }
                    if (res.data.action) {

                        $.each(res.data.action, function() {
                            if ($(`#emp_access_action${this}`).val() == this) {
                                $(`#emp_access_action${this}`).attr("checked", "checked");
                            }
                        });
                    }
                    if (res.data.report) {

                        $.each(res.data.report, function() {
                            if ($(`#emp_access_report${this}`).val() == this) {
                                $(`#emp_access_report${this}`).attr("checked", "checked");
                            }
                        });
                    }
                }
            });
            if (role == 'CSR' || role == 'Seller Agent' || role == 'Order Taker') {
                $("#client_number").show();
                $("#qoutes").show();
                $("#all_ot").hide();
                $("#manager").hide();
                $("#assign_daily_qoute").show();
                $("#group_qoutes").show();
                $("#auto_assigning").hide();
                $("#dispatcher_quotes").hide();
            } else if (role == 'Manager') {
                $("#client_number").hide();
                $("#qoutes").show();
                $("#all_ot").show();
                $("#manager").hide();
                $("#assign_daily_qoute").show();
                $("#group_qoutes").hide();
                $("#auto_assigning").hide();
                $("#dispatcher_quotes").hide();
            } else if (role == 'Dispatcher' || role == 'Delivery Boy') {
                if (role == 'Dispatcher') {
                    $("#auto_assigning").show();
                    $("#dispatcher_quotes").show();
                } else {
                    $("#auto_assigning").hide();
                    $("#dispatcher_quotes").hide();
                }
                $("#client_number").hide();
                $("#qoutes").show();
                $("#all_ot").hide();
                $("#manager").hide();
                $("#assign_daily_qoute").show();
                $("#group_qoutes").hide();
            } else {
                $("#client_number").hide();
                $("#qoutes").hide();
                $("#all_ot").hide();
                $("#manager").hide();
                $("#assign_daily_qoute").hide();
                $("#group_qoutes").hide();
                $("#auto_assigning").hide();
                $("#dispatcher_quotes").hide();
            }
        });

        $("input[name='order_taker_quote']").change(function() {
            if ($(this).val() == 2) {
                $("#manager").show();
            } else {
                $("#manager").hide();
            }
        })

        $(".emp_access_ship_all").on('change', function() {
            if ($(this).is(":checked")) {
                $(this).parent('div').siblings('.col-sm-6').each(function() {
                    $(this).children('input').attr('checked', true);
                })
            } else {
                $(this).parent('div').siblings('.col-sm-6').each(function() {
                    $(this).children('input').attr('checked', false);
                })
            }
        })

        // $('.displayEdit').hide();

        $(".getData").click(function() {
            var user_id = $(this).find('.User-ID').val();

            // $('.displayEdit').show();

            $.ajax({
                url: '{{ route('edit.allowed.states') }}',
                type: 'GET',
                data: {
                    'user_id': user_id,
                },
                success: function(data) {

                    var selectedStates = data.state.split(',');

                    // Unselect all options first
                    $('#state option').prop('selected', false);

                    // Loop through the options in the select element
                    $('#state option').each(function() {
                        // Check if the current option's value is in the selectedStates array
                        if (selectedStates.includes($(this).val())) {
                            // If it is, set the option as selected
                            $(this).prop('selected', true);
                        }
                    });

                    // Display the recordsAllowed value
                    $('#recordsAllowed').val(data.recordsAllowed);
                    // Ensure "Used Car Dealer" option is present and then select it
                    if ($('#category_assign option[value="Used Car Dealer"]').length === 0) {
                        $('#category_assign').append(
                            '<option value="Used Car Dealer">Used Car Dealer</option>');
                    }
                    $('#category_assign').val(data.category);
                },
                error: function(error) {
                    // Handle the error response
                    console.error('Error submitting the form:', error);
                    // Optionally, you can display an error message or take other actions
                }
            });
        });
    </script>
@endsection
