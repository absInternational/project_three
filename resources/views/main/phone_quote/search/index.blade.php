@extends('layouts.innerpages')

@section('template_title')
    Search Orders
@endsection

@section('content')
    <style>
        .selected {
            background: lightgray;
            border-radius: 10px;
        }
    </style>

    <!--/app header-->
    <!--Page header-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="page-header">
        <div class="text-secondary text-center text-uppercase w-100">
            <h1 class="my-4"><b>Search Orders</b></h1>
        </div>
        <!--<div class="page-leftheader" >-->
        <!--    <h4 class="page-title mb-0" style="display: none">{{ ucfirst(trim("$_SERVER[REQUEST_URI]", '/')) }}</h4>-->
        <input type="hidden" value="{{ trim("$_SERVER[REQUEST_URI]", '/') }}" id="titlee">
        <!--    <ol class="breadcrumb">-->
        <!--        <li class="breadcrumb-item"><a href="#"><i class="fe fe-layout mr-2 fs-14"></i>Tables</a>-->
        <!--        </li>-->
        <!--        <li class="breadcrumb-item active" aria-current="page"><a href="#">New Order</a></li>-->
        <!--    </ol>-->
        <!--</div>-->
        <!--<div class="page-rightheader">-->
        <!--    <div class="btn btn-list">-->

        <!--    </div>-->
        <!--</div>-->
    </div>
    <!--End Page header-->
    <!-- Row -->


    <div class="row">
        <div class="col-12">

            @if (session('flash_message'))
                <div class="alert alert-success">
                    {{ session('flash_message') }}
                </div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <form id="search_form" onsubmit="return false">
                            <div class="col-lg-12 p-0">
                                <div class="row">
                                    <div class="col-lg-1 text-left pd-10 pl-0" style="margin: auto 0 4px;">
                                        <button class="btn btn-warning w-100 aucDate" type="button"><img height="25px"
                                                width="25px" src="{{ asset('images/hammer.png') }}"
                                                alt="hammer" /></button>
                                    </div>
                                    <div class="col-lg-3 text-center pd-10" style="display:none;" id="showAuctionDateRange">
                                        <label style="float: left">Auction Daterange <button type="button"
                                                class="btn btn-info btn-sm" onclick="$('#date_range1').val('')"
                                                style="padding: 3.2px 10px;">Clear</button></label>
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' name="date_range1" id="date_range1"
                                                class="form-control" />
                                            <span class="input-group-addon"
                                                style="
                                                    border: 1px solid #ddd;
                                                    border-left-color: transparent;
                                                    border-radius: 0;
                                                    position: relative;
                                                    left: -1px;
                                                    display: flex;
                                                    align-items: center;
                                                ">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-left pd-10" style="display:none;" id="accounttitle">
                                        <label style="float: left">Has Auction Account?</label>
                                        <select id="acutionaccounttitle" name="acutionaccounttitle" class="form-control"
                                            data-placeholder="50">
                                            <option value="">All</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 text-center pd-10" style="display:none;" id="accountname">
                                        <label style="float: left">Auction Account Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Auction Account Name..."
                                                id="acutionaccountname" name="acutionaccountname">
                                        </div>
                                    </div>
                                    @if (Auth::user()->userRole->name == 'Admin')
                                        <div class="col-lg-1 text-left pd-10" style="margin: auto 0 4px;">
                                            <button class="btn btn-info w-100 showQaFilter" type="button"
                                                title="QA Verify Filter"><i class="fa fa-check" style="font-size: 21px;"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                        <div class="col-lg-3" style="display:none;" id="verifyNegative">
                                            <div class="row">
                                                <div class="col-lg-6 text-center pd-10">
                                                    <label style="float: left">Verified/Unverified</label>
                                                    <select id="verify2" name="verify" style="height: 35px;"
                                                        class="form-control">
                                                        <option value="" selected>ALL</option>
                                                        <option value="0">Unverified</option>
                                                        <option value="1">Verified</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 text-center pd-10">
                                                    <label style="float: left">Negative</label>
                                                    <select id="negative2" name="negative" style="height: 35px;"
                                                        class="form-control">
                                                        <option value="" selected>ALL</option>
                                                        <option value="1">Negative</option>
                                                        <option value="0">Not Negative</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="@if (Auth::user()->userRole->name == 'Admin') col-lg-10 @else col-lg-11 @endif">
                                        <div class="row">
                                            <div class="col-lg-2 text-left pd-10">
                                                <label>Status</label>
                                                <select id="pstatuss2" name="pstatuss2" class="form-control">
                                                    <option value="" disabled selected>All</option>
                                                    <option value="0">New</option>
                                                    <option value="1">Interested</option>
                                                    <option value="2">FollowMore</option>
                                                    <option value="3">AskingLow</option>
                                                    <option value="4">NotInterested</option>
                                                    <option value="5">NoResponse</option>
                                                    <option value="6">TimeQuote</option>
                                                    <option value="7">PaymentMissing</option>
                                                    <option value="8">Booked</option>
                                                    <option value="9">Listed</option>
                                                    <option value="10">Schedule</option>
                                                    <option value="11">Pickup</option>
                                                    <option value="12">Delivered</option>
                                                    <option value="13">Completed</option>
                                                    <option value="14">Cancel</option>
                                                    <option value="15">Deleted</option>
                                                    <option value="18">OnApproval</option>
                                                    <option value="19">Approval Canceled</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-2 text-left pd-10">
                                                <label>Sort By</label>
                                                <select id="sort_by" name="sort_by" class="form-control">
                                                    <option value="id">ID</option>
                                                    <option value="created_at">Created at</option>
                                                    <option value="updated_at">Updated at</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-3 text-center pd-10">
                                                <label style="float: left">Daterange <button type="button"
                                                        class="btn btn-info btn-sm" onclick="$('#date_range').val('')"
                                                        style="padding: 3.2px 10px;">Clear</button></label>
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' name="date_range" id="date_range"
                                                        class="form-control" />
                                                    <span class="input-group-addon"
                                                        style="border: 1px solid #ddd;border-left-color: transparent;border-radius: 0;position: relative;left: -1px;display: flex;align-items: center;">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 text-left pd-10">
                                                <label>Search By</label>
                                                <select id="search_by" name="search_by" class="form-control"
                                                    data-placeholder="50">
                                                    <option value="" selected>All</option>
                                                    <option value="id">Order ID</option>
                                                    <option value="oname">Customer Name</option>
                                                    <option value="ymk">Vehicle Name</option>
                                                    <option value="vin_num">VIN Number</option>
                                                    <option value="dauction">Port</option>
                                                    <option value="origincity">Pickup City</option>
                                                    <option value="originstate">Pickup State</option>
                                                    <option value="destinationcity">Delivery City</option>
                                                    <option value="destinationstate">Delivery State</option>
                                                    <option value="originzsc">Origin Location</option>
                                                    <option value="destinationzsc">Destination Location</option>
                                                    <option value="dphone">Destination Phone</option>
                                                    <option value="ophone">Customer Phone</option>
                                                    <option value="obuyer_no">Buyer #</option>
                                                    <option value="obuyer_lot_no">Lot #</option>
                                                    <option value="obuyer_stock_no">stock #</option>
                                                    @if (Auth::user()->userRole->name == 'Delivery Boy' || Auth::user()->userRole->name == 'Admin')
                                                        <option value="driverphoneno">Driver Phone</option>
                                                    @endif
                                                    <option value="created_at">Created At</option>
                                                    <option value="updated_at">Updated At</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 text-center pd-10 pr-0">
                                                <label style="float: left">Keyword</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Search for..." id="keywords"
                                                        @if (isset($_GET['search'])) value="{{ $_GET['search'] }}" @endif
                                                        name="search">
                                                    <span class="input-group-btn">
                                                        <button class="btn bd bd-l-0 bg-white tx-gray-600"
                                                            onclick="return_data()" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div id="table_data">
                        @include('main.phone_quote.new.load')
                    </div>
                </div>
            </div>

        </div>

    </div><!-- end app-content-->




    <div class="modal" id="reportmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Send Email Link</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form action="" method="post" id="form">
                        <h5 class=" lh-3 mg-b-20">Order Id # <input readonly type="text" style=" border: 0px; "
                                name="orderid" value="" /></h5>

                        <div class="card">
                            <div class="card-body pd-20">

                                @csrf
                                Email Link
                                </br>
                                <!-- <input type="hidden" name="user_id" value="47"> -->
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-sm">
                                            {{-- <input type="text" readonly name="link" id="link"
                                                class="form-control" value="" /> --}}
                                            <div style="position: relative; display: inline-block;width: 100%;">
                                                <input type="text" readonly="" name="link" id="link"
                                                    class="form-control" value="" autocomplete="on">
                                                <div
                                                    style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; z-index: 1;">
                                                </div>
                                            </div>
                                        </div><!-- col -->
                                    </div><!-- row -->
                                </div><!-- form-group -->
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="" placeholder="Enter email address..." />
                                </div><!-- form-group -->
                                <button type="submit" class="btn btn-primary pd-x-20">Submit
                                </button>

                            </div><!-- card-body -->
                        </div>
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalPaid">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Payment Status</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form action="paid_status" method="post" id="form">
                        @csrf
                        <h5 class=" lh-3 mg-b-20">Order Id # <input readonly type="text" style=" border: 0px; "
                                name="orderid" value="" /></h5>

                        <div class="card">
                            <div class="card-body pd-20">


                                <h5>Payment Status</h5>
                                <br>
                                <!-- <input type="hidden" name="user_id" value="47"> -->
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-sm">

                                            <input type="radio" name="status" id="status0" class="rad-input"
                                                value="0" /> Pending &nbsp;&nbsp;


                                            <input type="radio" name="status" id="status1" class="rad-input"
                                                value="1" /> Updated &nbsp;&nbsp;


                                            <input type="radio" name="status" id="status2" class="rad-input"
                                                value="2" /> Received &nbsp;&nbsp;

                                            <input type="checkbox" name="fully_paid" id="fully_paid" class="rad-input"
                                                value="1" />
                                            Fully Paid
                                            <br>
                                            <br>
                                            <h5>Comments</h5>

                                            <textarea name="pay_comments" class="form-control"></textarea>

                                        </div><!-- col -->
                                    </div><!-- row -->
                                </div><!-- form-group -->
                                <div class="form-group">

                                </div><!-- form-group -->
                                <button type="submit" class="btn btn-primary pd-x-20">Submit
                                </button>

                            </div><!-- card-body -->
                        </div>
                    </form>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="trashmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Delete Order</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/trash_order" method="post" id="form">
                    <div class="modal-body pd-20">

                        <h5 class=" lh-3 mg-b-20">Order Id # <input style="border: none" readonly type="text"
                                name="orderid" value="" /></h5>

                        <div class="card">
                            <div class="card-body pd-20">
                                @csrf
                                <div class="form-group" style=" text-align: center; font-size: 24px; ">
                                    Do you want to delete order <strong>?</strong>


                                </div><!-- card-body -->
                            </div>
                        </div>

                    </div><!-- modal-body -->
                    <div class="modal-footer" style=" justify-content: center; ">
                        <button type="submit" class="btn btn-danger pd-x-20 w-25">Yes
                        </button>
                        <button type="button" class="btn btn-info w-25" data-dismiss="modal">No
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal" id="carrier_comment">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm" style="width: 165%;margin-left: -16pc;">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">History</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/carrier_history_post" method="post" id="form">
                    <div class="modal-body pd-20">

                        <h5 class=" lh-3 mg-b-20">Order Id #
                            <input style="border: none" readonly type="text" name="ca_order_id" id="ca_order_id"
                                value="" />
                        </h5>

                        <h5 class=" lh-3 mg-b-20">Carrier Id #
                            <input style="border: none" readonly type="text" name="ca_carrier_id" id="ca_carrier_id"
                                value="" />
                        </h5>

                        <div class="card">
                            <div class="card-body pd-20">
                                @csrf

                                <div class="form-group">

                                    <div class="chat-body-style ChatBody" style=" height: 198px; overflow: scroll ">
                                        <div class="message-feed media">
                                            <div class="media-body">
                                                <div class="mf-content" id="ca_carrier_comments1"
                                                    style=" font-size: 21px;width: 99% "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="form-control" name="ca_carrier_comments" id="ca_carrier_comments" style=" "></textarea>
                                    <br>
                                    <input type="submit" class="btn btn-primary" name="ca_submit">

                                </div><!-- card-body -->
                            </div>
                        </div>

                    </div><!-- modal-body -->
                    <div class="modal-footer" style=" justify-content: center; ">
                        <button type="button" class="btn btn-info w-25" data-dismiss="modal">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <div class="modal fade" id="comparehmodal" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content"
                style="width: max-content;right: 302px;min-width: 86pc !important;height: 47pc !important;overflow: scroll;">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="largemodal1">Carrier Data</h5>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <table class="table table-responsive table-bordered table-stripe table-condensed"
                            id="table_data_carrier">

                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="storagehmodal" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content"
                style="right: 215px;min-width: 77pc !important;height: 47pc !important;overflow: scroll;">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="largemodal1">Storage Data</h5>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <table class="table table-responsive table-bordered table-stripe table-condensed"
                            id="table_data_storage">

                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateCarrierHistory" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content"
                style="width: max-content;right: 215px;min-width: 77pc !important;min-height: 23pc !important;">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="largemodal1">Update Carrier History</h5>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="card-body">
                            <input type="hidden" id="old_order_id" />
                            <input type="hidden" id="new_order_id" />
                            <h3>Order Id#</h3>
                            <div class="form-group">
                                <label for="carrier_history" class="form-label">History</label>
                                <textarea class="form-control" id="carrier_history" placeholder="Write the history"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnUpdateHistory">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewCarrierHistory" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content"
                style="width: max-content;right: 215px;min-width: 77pc !important;height: 47pc !important;">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="largemodal1">View Carrier History</h5>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body" id="viewHistoryOfCarrier"
                        style="min-height:100px;max-height:567px;overflow:scroll;">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="find_carrier_modal" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content"
                style="width: max-content;right: 302px;min-width: 86pc !important;min-height: 36pc !important;">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="largemodal1">Find Carrier Data <span class="badge badge-warning"
                                style=" font-size: 17px; font-family: emoji; " id="find_o_id"></span></h5>

                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <table class="table table-responsive table-bordered table-stripe table-condensed"
                            id="table_find_data_carrier">

                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="largemodal" tabindex="-1" role="dialog" aria-labelledby="largemodal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document" style="max-width:75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largemodal1">HISTORY/STATUS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading p-0 bg-light">
                                <div class="tabs-menu1 ">
                                    <!-- Tabs -->
                                    @php
                                        $check_panel = check_panel();

                                        if ($check_panel == 1) {
                                            $phoneaccess = explode(',', Auth::user()->emp_access_phone);
                                        } 
                                        elseif($check_panel == 3)
                                        {
                                            $phoneaccess = explode(',',Auth::user()->emp_access_test);
                                        }
                                        else {
                                            $phoneaccess = explode(',', Auth::user()->emp_access_web);
                                        }
                                    @endphp
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab1" id="tab1_click" class="active"
                                                data-toggle="tab">HISTORY/STATUS</a></li>
                                        <li><a href="#tab2" data-toggle="tab">VIEW HISTORY</a></li>
                                        <li id="tab3_toggle"><a href="#tab3" data-toggle="tab">Relist</a></li>
                                        @if (in_array('64', $phoneaccess))
                                            <li><a href="#tab8" data-toggle="tab">UPDATE QA HISTORY</a></li>
                                        @endif
                                        @if (in_array('65', $phoneaccess))
                                            <li class="position-relative">
                                                <a href="#tab9" data-toggle="tab">VIEW QA HISTORY</a>
                                                <span id="qa_count"
                                                    class="badge badge-success text-light position-absolute"
                                                    style="top: -12px;right: -6px;height: 30px;width: 30px;display: flex;justify-content: center;align-items: center;font-size: 13px;">0</span>
                                            </li>
                                        @endif
                                        @if (in_array('101', $phoneaccess))
                                            <!--=========================new form ==================-->
                                            <li><a href="#tab11" data-toggle="tab">UPDATE APPROACH</a></li>
                                            <!--=========================new form==================-->
                                        @endif
                                        @if (in_array('102', $phoneaccess))
                                            <!--=========================new==================-->
                                            <li><a href="#tab10" data-toggle="tab">VIEW APPROACH</a></li>
                                            <!--=========================new==================-->
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab1">

                                    </div>
                                    <div class="tab-pane" id="tab2">

                                        <div class="chat-body-style ChatBody" id="calhistory"
                                            style="overflow:scroll; height:300px;">
                                            <div class="message-feed media">
                                                <div class="media-body">
                                                    <div class="mf-content">
                                                        hi
                                                    </div>
                                                    <small class="mf-date"><i class="fa fa-clock-o"></i>2021-01-19
                                                        15:53:42</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <form id="listedform2" method="post"
                                            action="{{ route('call_history_post_relist') }}">
                                            @csrf
                                            <div class="card-title font-weight-bold">Relist</div>
                                            <div class="row" id="row1">
                                                <input type="hidden" name="order_id1" id='order_id2'>
                                                <input type="hidden" id="pstatus2" name="pstatus" value="9">
                                                <input type="hidden" name="relist" value="1">


                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Lister Price</label>
                                                        <input type="number" required name="listed_price"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">EXPECTED DATE</label>
                                                        <input type="date" required name="expected_date"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6" id="status_carrier_deleted">
                                                    <div class="form-group">
                                                        <label class="form-label">STATUS</label>
                                                        <select name="carrier_deleted" id="carrier_deleted"
                                                            class="form-control" required>
                                                            <option value="" selected disabled>SELECT</option>
                                                            <option value="CARRIER CANCEL">CARRIER CANCEL</option>
                                                            <option value="COMPANY CANCEL">COMPANY CANCEL</option>
                                                            <option value="CARRIER CANCEL AND RELIST">CARRIER CANCEL AND
                                                                RELIST</option>
                                                            <option value="COMPANY CANCEL AND RELIST">COMPANY CANCEL AND
                                                                RELIST</option>
                                                            <option value="OTHER">OTHER</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">HISTORY</label>
                                                        <textarea required name="history_update" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>

                                    </div>
                                    <!--=============new==================-->
                                    @if (in_array('102', $phoneaccess))
                                        <div class="tab-pane" id="tab10">
                                            <div class="chat-body-style ChatBody" id="calhistory"
                                                style="overflow:scroll; height:300px;">
                                                <div class="message-feed media">
                                                    <div class="media-body" id="history-content">
                                                        {{-- {{ dd($allHistory->toArray()) }} --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <!--=============new==================-->
                                    <!--=============new form==================-->
                                    @if (in_array('101', $phoneaccess))
                                        <div class="tab-pane" id="tab11">
                                            <form action="{{ route('store.carrier_approachings') }}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" class="val_order_id" name="order_id" />

                                                    <div class="form-group row">
                                                        <label for="extension"
                                                            class="col-sm-4 col-form-label">Extension</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="extension" id="extension"
                                                                class="form-control col-12" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="comp_name" class="col-sm-4 col-form-label">Company
                                                            Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="comp_name" id="comp_name"
                                                                class="form-control col-12" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="comp_phone" class="col-sm-4 col-form-label">Company
                                                            Phone</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="comp_phone" id="comp_phone"
                                                                class="form-control col-12" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="status"
                                                            class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <select name="status" id="status"
                                                                class="form-control col-12" required>
                                                                <option value="1">Interested</option>
                                                                <option value="0">Not Interested</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="comp_response" class="col-sm-4 col-form-label">Company
                                                            Response</label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" name="comp_response" id="comp_response" placeholder="Company's Response"
                                                                rows="12" cols="12" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    <!--=============new==================-->
                                    <div class="tab-pane" id="tab8">
                                    </div>
                                    <div class="tab-pane" id="tab9">
                                        <div class="chat-body-style ChatBody" id="calhistory9"
                                            style="overflow:scroll; height:400px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="schedule_delivery" tabindex="-1" role="dialog" aria-labelledby="schedule_delivery"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document" style="max-width:45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="schedule_delivery1">Schedule For Delivery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ url('/schedule_delivery') }}" method="POST">
                    @csrf
                    <input type="hidden" id="sd_order_id" name="id" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="payment_status" class="form-label">Payment Status</label>
                                    <input type="text" class="form-control" placeholder="Payment Status"
                                        name="payment_status" id="payment_status" required />
                                </div>
                            </div>
                            <!--<div class="col-sm-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="payment_status" class="form-label">Payment Status</label>-->
                            <!--        <input type="text" class="form-control" placeholder="Payment Status" name="payment_status" id="payment_status" required />-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-sm-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="payment_status" class="form-label">Payment Status</label>-->
                            <!--        <input type="text" class="form-control" placeholder="Payment Status" name="payment_status" id="payment_status" required />-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="additional" class="form-label">Additional</label>
                                    <textarea rows="12" cols="12" class="form-control" name="additional" placeholder="Additional"
                                        id="additional" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="messageCallCenter" tabindex="-1" role="dialog"
        aria-labelledby="messageCallCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageCallCenterLongTitle">Message Center</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="modalClick()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading p-0 bg-light">
                                <div class="tabs-menu1 ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab4" class="active" data-toggle="tab">Update
                                                Message Center</a>
                                        </li>
                                        <li><a href="#tab5" data-toggle="tab">View Message Center</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active " id="tab4">
                                        <form method="post" action="#">
                                            <div class="row">
                                                <input type="hidden" class="form-control" name="id" id='orderId22'
                                                    placeholder="" readonly>
                                                <input type="hidden" class="form-control" name="status" id='status'
                                                    placeholder="" readonly>
                                                <input type="hidden" class="form-control" name="cname" id='cname'
                                                    placeholder="" readonly>
                                                <input type="hidden" class="form-control" name="cphone" id='cphone'
                                                    placeholder="" readonly>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Date/Time</label>
                                                        <input type="datetime-local" class="form-control"
                                                            name="date_time" id='date_time' placeholder="Date/Time">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary active changeMsg">Your Message</button>
                                                        <button type="button" class="btn btn-primary changeMsg">Client
                                                            Reply</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="Message" id="messageReply"
                                                    value="Your Message" />
                                                <br>
                                                <br>
                                                <div class="col-sm-12 col-md-12" id="msgReply">
                                                    <div class="form-group">
                                                        <label class="form-label">Your Message</label>
                                                        <textarea required name="history" id='description' class="form-control" placeholder="Write Your Message"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="udpateMessageCall">Save
                                                changes</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <div class="chat-body-style ChatBody viewMessageCall"
                                            style="overflow:scroll; height:300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                        onclick="modalClick()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="feedback" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="feedbackLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:75% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">OrderId#</th>
                                <th class="text-center">Pickup</th>
                                <th class="text-center">Delivery</th>
                                <th class="text-center">Vehicle Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="id" class="text-center"></td>
                                <td id="pickup" class="text-center"></td>
                                <td id="delivery" class="text-center"></td>
                                <td id="vehicle_name" class="text-center"></td>
                                <td id="date" class="text-center"></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" title="Review Link"
                                            data-toggle="modal" data-target="#staticBackdrop1" onclick="sendLink()">Send
                                            Link</button>
                                        <button type="button" class="btn btn-info" title="Coupon" data-toggle="modal"
                                            data-target="#staticBackdrop">Send Coupon</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Feedback</label>
                        <textarea placeholder="Feedback..." class="form-control mb-2" name="feedback" id="feedbackDetail"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-center mb-2">
                            <div class="form-group mx-2 mb-0">
                                <label class="form-label px-2 py-1 checkRate" style="cursor:pointer;" for="positive">
                                    <i class="fa fa-smile-o m-0" aria-hidden="true"></i>
                                    Positive
                                </label>
                                <input type="radio" name="rate" id="positive" value="5"
                                    style="display:none;" />
                            </div>
                            <div class="form-group mx-2 mb-0">
                                <label class="form-label px-2 py-1 checkRate" style="cursor:pointer;" for="neutral">
                                    <i class="fa fa-meh-o m-0" aria-hidden="true"></i>
                                    Neutral
                                </label>
                                <input type="radio" name="rate" id="neutral" value="3"
                                    style="display:none;" />
                            </div>
                            <div class="form-group mx-2 mb-0">
                                <label class="form-label px-2 py-1 checkRate" style="cursor:pointer;" for="negative">
                                    <i class="fa fa-frown-o m-0" aria-hidden="true"></i>
                                    Negative
                                </label>
                                <input type="radio" name="rate" id="negative" value="1"
                                    style="display:none;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit2">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ratingPopup" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="ratingPopupLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:75% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingPopupLabel">Rate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" id="ord_id" name="ord_id" />
                <div id="ratingPopupContent">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="feedback2" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="feedback2Label" aria-hidden="true">
        <div class="modal-dialog" style="max-width:75% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedback2Label">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">OrderId#</th>
                                <th class="text-center">Pickup</th>
                                <th class="text-center">Delivery</th>
                                <th class="text-center">Vehicle Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Review Email Clicked</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="id2" class="text-center"></td>
                                <td id="pickup2" class="text-center"></td>
                                <td id="delivery2" class="text-center"></td>
                                <td id="vehicle_name2" class="text-center"></td>
                                <td id="date2" class="text-center"></td>
                                <td class="text-center clicked">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h2>Feedback:</h2>
                        <div class="row">
                            <div class="col-sm-2 m-auto d-inline-block text-center rate">
                            </div>
                            <div class="col-sm-10 feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/coupons/create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Coupon Number</label>
                            <input type="text" maxlength="10" name="coupon_number" id="coupon_number"
                                class="form-control mb-2" placeholder="Enter Coupon Number" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Coupon Price</label>
                            <input type="text" name="coupon_price" id="coupon_price" class="form-control mb-2"
                                placeholder="Enter Coupon Price" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Coupon Email</label>
                            <input type="email" name="coupon_email" id="coupon_email" class="form-control mb-2"
                                placeholder="Enter Coupon Email" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdrop1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdrop1Label">Send Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="order_id" name="order_id" />
                    <div class="form-group">
                        <label class="form-label">Review Website</label>
                        <select name="website" id="website" class="form-control mb-2">
                            <option value="" selected disabled>Select Website</option>
                            @foreach ($link as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Customer Email</label>
                        <input type="email" name="customer_email" id="customer_email" class="form-control mb-2"
                            placeholder="Enter Customer Email" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="send">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:85%;">
            <div class="modal-content">
                <div class="d-flex justify-content-between mt-5">
                    <h5 class="text-center my-auto ml-4" id="order_detail_status">Order Status</h5>
                    <h5 class="text-center my-auto" id="order_detail_title">Order Detail</h5>
                    <button type="button" class="close bg-danger text-white mr-4" data-dismiss="modal"
                        aria-label="Close" style="height: 25px;width: 25px;border-radius: 50%;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detail_order">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewCancelHistory" tabindex="-1" aria-labelledby="viewCancelHistoryLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:55%;">
            <div class="modal-content">
                <div class="d-flex justify-content-between mt-5">
                    <h5 class="text-center my-auto ml-4" id="viewCancelHistoryTitle">View Cancel History</h5>
                    <button type="button" class="close bg-danger text-white mr-4" data-dismiss="modal"
                        aria-label="Close" style="height: 25px;width: 25px;border-radius: 50%;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cancel_history">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="requestShipment" tabindex="-1" aria-labelledby="requestShipmentLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="d-flex justify-content-between mt-5">
                    <h5 class="text-center my-auto ml-4" id="requestShipmentTitle">Request</h5>
                    <button type="button" class="close bg-danger text-white mr-4" data-dismiss="modal"
                        aria-label="Close" style="height: 25px;width: 25px;border-radius: 50%;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('request_shipment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id_request" id="order_id_request" />
                    <input type="hidden" name="status_request" id="status_request" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="request_name" class="form-label">Request Name</label>
                                    <select required name="request_name" id="request_name" class="form-control">
                                        <option value="" selected disbaled data-value="">Select</option>
                                        <option value="Relist" data-value="20">Relist</option>
                                        <option value="Price Raise" data-value="21">Price Raise</option>
                                        <option value="Approach Id" data-value="22">Approach Id</option>
                                        <option value="Different Port" data-value="23">Different Port</option>
                                        <option value="Carrier Update" data-value="24">Carrier Update</option>
                                        <option value="Storage" data-value="25">Storage</option>
                                        <option value="Approaching" data-value="26">Approaching</option>
                                        <option value="Auction Update" data-value="27">Auction Update</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="additional_request" class="form-label">Additional</label>
                                    <textarea rows="12" cols="12" class="form-control" id="additional_request"
                                        name="additional_request"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).on('click', '.updateHistoryCarrier', function(event) {
            $("#old_order_id").siblings('h3').text(`Order Id# ${$(this).attr('data-old-id')}`);
            $("#old_order_id").val($(this).attr('data-old-id'));
            $("#new_order_id").val($(this).attr('data-new-id'));
        })


        $(document).on('click', '#btnUpdateHistory', function(event) {
            var old_order_id = $("#old_order_id").val();
            var new_order_id = $("#new_order_id").val();
            var history = $("#carrier_history").val();
            $.ajax({
                url: "{{ url('/update-carrier-history') }}",
                type: "GET",
                dataType: "JSON",
                data: {
                    old_order_id: old_order_id,
                    new_order_id: new_order_id,
                    history: history
                },
                success: function(res) {
                    $("#updateCarrierHistory").modal('hide');
                    $("#carrier_history").val('');
                    $(".modal-backdrop").eq(0).remove();
                    $(".modal-backdrop").eq(1).remove();
                }
            });
            // console.log(old_order_id);
            // console.log(new_order_id);
        })

        $(document).on('click', '.viewHistoryCarrier', function(event) {
            var old_order_id = $(this).attr('data-old-id');
            var new_order_id = $(this).attr('data-new-id');
            $("#viewHistoryOfCarrier").html('');
            $.ajax({
                url: "{{ url('/view-carrier-history') }}",
                type: "GET",
                dataType: "html",
                data: {
                    old_order_id: old_order_id,
                    new_order_id: new_order_id
                },
                success: function(res) {
                    $("#viewHistoryOfCarrier").html('');
                    $("#viewHistoryOfCarrier").html(res);
                    $("#viewHistoryOfCarrier").animate({
                        scrollTop: 20000000000
                    }, "slow");
                },
                complete: function() {}
            });
            // console.log(old_order_id);
            // console.log(new_order_id);
        })

        function getMsgCall(id, status) {
            $.ajax({
                url: "{{ url('/show-message-call') }}",
                type: "GET",
                data: {
                    order_id: id,
                    status: status
                },
                success: function(res) {
                    $('.viewMessageCall').html('');
                    $('.viewMessageCall').html(res);
                }
            })
        }

        function msgCall(id, status, name, phone, msgVal) {
            $("#orderId22").val(id);
            $("#status").val(status);
            $("#cname").val(name);
            $("#cphone").val(phone);
            $("#messageReply").val(msgVal);
            var messageCallCenterLongTitle = '';
            var tab4 = '';
            var tab5 = '';
            if (status == 0) {
                messageCallCenterLongTitle = 'Message Center';
                tab4 = 'Update Message Center';
                tab5 = 'View Message Center';
            }
            if (status == 1) {
                messageCallCenterLongTitle = 'Call Log Center';
                tab4 = 'Update Call Log Center';
                tab5 = 'View Call Log Center';
            }
            $("#messageCallCenterLongTitle").text(messageCallCenterLongTitle);
            $("a[href='#tab4']").text(tab4);
            $("a[href='#tab5']").text(tab5);

            getMsgCall(id, status);

        }

        function modalClick() {
            $("#description").val('');
            $("#date_time").val('');
            // $("#orderId22").val('');
            // $("#status").val('');
            // $("#cname").val('');
            // $("#cphone").val('');
        }

        $("#udpateMessageCall").click(function() {
            var order_id = $("#orderId22").val();
            var status = $("#status").val();
            var cname = $("#cname").val();
            var cphone = $("#cphone").val();
            var date_time = $("#date_time");
            var description = $("#description");
            var messageReply = $("#messageReply").val();
            date_time.parents('.form-group').children('.alert').remove();
            description.parents('.form-group').children('.alert').remove();
            $.ajax({
                url: "{{ url('/add-message-call') }}",
                type: "POST",
                dataType: "json",
                data: {
                    order_id: order_id,
                    status: status,
                    cname: cname,
                    cphone: cphone,
                    date_time: date_time.val(),
                    description: description.val(),
                    messageReply: messageReply
                },
                success: function(res) {
                    if (res.status_code === 200) {
                        getMsgCall(order_id, status);
                        $('#modal').modal('hide');
                        modalClick();
                    }
                    if (res.error.description) {
                        description.parents('.form-group').append(`
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                ${res.error.description[0]}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`);
                    }
                    if (res.error.date_time) {
                        date_time.parents('.form-group').append(`
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                ${res.error.date_time[0]}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`);
                    }
                }
            });
        });

        $(".changeMsg").click(function() {
            $("#msgReply").children('.form-group').children('.form-label').text('');
            $("#msgReply").children('.form-group').children('.form-label').text($(this).text());
            $('#messageReply').val($(this).text());
            $('.changeMsg').removeClass('active');

            if ($(this).text() == 'Your Message') {
                $("#msgReply").children('.form-group').children('#description').attr('placeholder',
                    'Write Your Message');
                $(this).addClass('active');
            }
            if ($(this).text() == 'Client Reply') {
                $("#msgReply").children('.form-group').children('#description').attr('placeholder',
                    'Write Client Message');
                $(this).addClass('active');
            }
        })

        function sendLink() {
            var id = $("#id").text();
            $("#order_id").val(id);
        }

        $("#send").click(function(e) {
            e.preventDefault();
            var order_id = $("#order_id").val();
            var website = $("#website");
            var customer_email = $("#customer_email");
            website.parent('.form-group').children('.alert').remove();
            customer_email.parent('.form-group').children('.alert').remove();

            var btn = $(this);
            btn.attr('disabled', true);
            $.ajax({
                url: "{{ url('/send-website-link') }}",
                type: "GET",
                data: {
                    website: website.val(),
                    customer_email: customer_email.val(),
                    order_id: order_id
                },
                dataType: "json",
                success: function(res) {
                    if (res.status_code === 400) {
                        if (res.error.customer_email) {
                            customer_email.parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.customer_email[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                        if (res.error.website) {
                            website.parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.website[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                    } else {
                        $('#staticBackdrop1').modal('hide');
                        $(".modal-backdrop").eq(0).remove();
                        $(".modal-backdrop").eq(1).remove();
                        $(".modal-backdrop").eq(2).remove();
                    }
                    btn.removeAttr('disabled');
                }
            });
        });

        function feedbackDetail(id, origin, pickup, destination, delivery, vehicle, date) {
            $("textarea[name='feedback']").val('');
            $("input[name='rate']").attr('checked', false);
            $('.checkRate').removeClass('selected');

            $("#id").text('');
            $("#pickup").text('');
            $("#delivery").text('');
            $("#vehicle_name").text('');
            $("#date").text('');

            $("#id").append(`${id}`);
            $("#pickup").append(`${origin}<br>${pickup}`);
            $("#delivery").append(`${destination}<br>${delivery}`);
            $("#vehicle_name").append(`${vehicle}`);
            $("#date").append(`${date}`);
        }

        function feedbackDetail2(id, origin, pickup, destination, delivery, vehicle, date) {
            $("#id2").text('');
            $("#pickup2").text('');
            $("#delivery2").text('');
            $("#vehicle_name2").text('');
            $("#date2").text('');
            $(".rate").html('');
            $(".feedback").html('');
            $(".clicked").html('');

            $("#id2").append(`${id}`);
            $("#pickup2").append(`${origin}<br>${pickup}`);
            $("#delivery2").append(`${destination}<br>${delivery}`);
            $("#vehicle_name2").append(`${vehicle}`);
            $("#date2").append(`${date}`);

            $.ajax({
                url: "{{ url('/feedback/show') }}",
                type: "GET",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(res) {
                    if (res.feedback) {
                        if (res.feedback.rate == 1 || res.feedback.rate == 0) {
                            $(".rate").append(`
                                <i class="fa fa-frown-o m-0" style="font-size:2rem !important;" aria-hidden="true"></i> 
                                <p style="font-size:2rem !important;">Negative</p>
                            `);
                        } else if (res.feedback.rate == 3 || res.feedback.rate == 2) {
                            $(".rate").append(`
                                <i class="fa fa-meh-o m-0" style="font-size:2rem !important;" aria-hidden="true"></i> 
                                <p style="font-size:2rem !important;">Neutral</p>
                            `);

                        } else if (res.feedback.rate == 5 || res.feedback.rate == 4) {
                            $(".rate").append(`
                                <i class="fa fa-smile-o m-0" style="font-size:2rem !important;" aria-hidden="true"></i> 
                                <p style="font-size:2rem !important;">Positive</p>
                            `);
                        }

                        $(".feedback").append(`
                            <span>${res.feedback.feedback}</span>
                        `);
                    } else {
                        $(".feedback").append(`No Feedback!`);
                    }
                    if (res.email) {
                        $(".clicked").append(`
                            <span class="badge badge-success">${res.email.link_click} click</span>
                        `);
                    } else {
                        $(".clicked").append(`
                            <span class="badge badge-danger">0 click</span>
                        `);
                    }
                }
            });
        }

        function ratingDetail(id) {
            $("#ord_id").val(id);

            $.ajax({
                url: "{{ url('/ratingdetail') }}",
                type: "GET",
                dataType: "html",
                data: {
                    order_id: id
                },
                success: function(res) {
                    $("#ratingPopupContent").html('');
                    $("#ratingPopupContent").html(res);
                }
            })
        }

        $('.checkRate').click(function() {
            $('.checkRate').removeClass('selected');
            $(this).addClass('selected');
            $("input[name='rate']").attr('checked', false);
            $(this).siblings('input').attr('checked', true);
        })


        $("#coupon_price").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });

        $("#submit2").click(function(e) {
            e.preventDefault();
            var id = $("#id").text();
            var feedback = $("textarea[name='feedback']");
            var rate = $("input[name='rate']");
            feedback.parent('.form-group').children('.alert').remove();
            rate.parent('.form-group').parent('.d-flex').parent('.form-group').children('.alert').remove();

            var btn = $(this);
            btn.attr('disabled', true);
            $.ajax({
                url: "{{ url('/feedback/create') }}",
                type: "GET",
                data: {
                    feedback: feedback.val(),
                    rate: $("input[name='rate']:checked").val(),
                    order_id: id
                },
                dataType: "json",
                success: function(res) {
                    if (res.status_code === 400) {
                        if (res.error.feedback) {
                            feedback.parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.feedback[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                        if (res.error.rate) {
                            rate.parent('.form-group').parent('.d-flex').parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.rate[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                    } else {
                        $('#feedback').modal('hide');
                        location.reload(true);
                    }
                    btn.removeAttr('disabled');
                }
            });
            // console.log(rate.val());
            // console.log(feedback.val());
            // console.log(id);
        })

        $("#submit").click(function(e) {
            e.preventDefault();
            var coupon_number = $("#coupon_number");
            var coupon_price = $("#coupon_price");
            var coupon_email = $("#coupon_email");
            coupon_number.parent('.form-group').children('.alert').remove();
            coupon_price.parent('.form-group').children('.alert').remove();
            coupon_email.parent('.form-group').children('.alert').remove();

            var btn = $(this);
            btn.attr('disabled', true);
            $.ajax({
                url: "{{ url('/coupons/create') }}",
                type: "GET",
                data: {
                    coupon_number: coupon_number.val(),
                    coupon_price: coupon_price.val(),
                    coupon_email: coupon_email.val()
                },
                dataType: "json",
                success: function(res) {
                    if (res.status_code === 400) {
                        if (res.error.coupon_number) {
                            coupon_number.parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.coupon_number[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                        if (res.error.coupon_price) {
                            coupon_price.parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.coupon_price[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                        if (res.error.coupon_email) {
                            coupon_email.parent('.form-group').append(`
                                <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                                  <strong>${res.error.coupon_email[0]}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div> 
                            `);
                        }
                    } else {
                        $('#staticBackdrop').modal('hide');
                        $(".modal-backdrop").eq(0).remove();
                        $(".modal-backdrop").eq(1).remove();
                        $(".modal-backdrop").eq(2).remove();
                    }
                    btn.removeAttr('disabled');
                }
            });
        });

        $(function() {
            var date = new Date();
            $('#date_range').daterangepicker({
                "showDropdowns": true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                "alwaysShowCalendars": true,
                "startDate": new Date(date.getFullYear(), date.getMonth(), 1),
                "endDate": new Date(date.getFullYear(), date.getMonth() + 1, 0),
                "opens": "center",
                "drops": "auto"
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                    'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
                // $('#date_range').val(start + ' - ' + end);
                $('#date_range').val('');
            });
            $('#date_range').val('');
            $('#date_range1').daterangepicker({
                "showDropdowns": true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                "alwaysShowCalendars": true,
                "startDate": new Date(date.getFullYear(), date.getMonth(), 1),
                "endDate": new Date(date.getFullYear(), date.getMonth() + 1, 0),
                "opens": "center",
                "drops": "auto"
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                    'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
                // $('#date_range1').val(start + ' - ' + end);
                $('#date_range1').val('');
            });
            $('#date_range1').val('');
        });

        $(".aucDate").on('click', function() {
            $("#showAuctionDateRange").toggle();
            $("#accounttitle").toggle();
            $('#date_range1').val('');
        })
        $("#acutionaccounttitle").on('change', function() {
            $("#acutionaccountname").val('');
            if ($(this).val() == 'Yes') {
                $("#accountname").show();
            } else {
                $("#accountname").hide();
            }
        })

        $("body").delegate(".cancelBtn", "click", function() {
            $('#date_range').val('');
        });

        //document.getElementById("defaultOpen").click();

        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>



    <script>
        function selectRefresh() {
            $('.select2').select2({
                //-^^^^^^^^--- update here
                tags: true,
                placeholder: "Select an Option",
                allowClear: true,
                width: '100%'
            });
        }


        $("body").delegate(".BundleExpand", "click", function() {
            var className = $(this).closest('tr').attr('class');
            var number = parseFloat(className.match(/-*[0-9]+/));
            $(".BundleExpand").toggleClass('fa-chevron-down');
            if ($('.child' + number + ':visible').length)
                $('.child' + number).hide().removeClass("shown");
            else
                $('.child' + number).show().addClass("shown");
        });

        function showprice() {

            if ($('#relist').is(":checked")) {

                $('#row1').hide();
                $('#r1').show();
                $('#r2').show();
                $('#r3').show();
                $(".getcarrier").removeAttr("required");
                $("#r1").attr("required", true);
                $("#relist_id").attr("required", true);
                $("#expected_date").removeAttr("required");
                $("#current_carrier").removeAttr("required");


            } else {
                $('#row1').show();
                $('#r1').hide();
                $('#r2').hide();
                $('#r3').hide();
                $(".getcarrier").attr("required", true);
                $("#r1").removeAttr("required");
                $("#expected_date").attr("required", true);
                $("#current_carrier").attr("required", true);
                $("#relist_id").removeAttr("required");
            }
        }

        $(document).ready(function() {

            $('input').attr('autocomplete', 'onn');

        });
    </script>

    <script>
        $('#reportmodal').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var orderId = $(e.relatedTarget).data('book-id');

            //populate the textbox
            var encryptvuserid = btoa({{ Auth::user()->id }});
            var encryptvoderid = btoa(orderId);
            var linkv = "{{ url('/email_order/') }}" + '/' + encryptvoderid + '/' + encryptvuserid;
            $(e.currentTarget).find('input[name="orderid"]').val(orderId);
            $(e.currentTarget).find('input[name="link"]').val(linkv);
        });

        $('#trashmodal').on('show.bs.modal', function(e) {

            var orderId = $(e.relatedTarget).data('book-id');
            $(e.currentTarget).find('input[name="orderid"]').val(orderId);

        });

        $('#modalPaid').on('show.bs.modal', function(e) {
            var orderId = $(e.relatedTarget).data('book-id');
            $(e.currentTarget).find('input[name="orderid"]').val(orderId);

            var comments = $(e.relatedTarget).data('comments');
            //  alert(comments);
            $(e.currentTarget).find('textarea[name="pay_comments"]').val(comments);


            var paid_status = $(e.relatedTarget).data('paid_status');
            if (paid_status == 0) {
                $("#status0").prop("checked", true);
            } else if (paid_status == 1) {
                $("#status1").prop("checked", true);
            } else if (paid_status == 2) {
                $("#status2").prop("checked", true);
            }

        });


        $("#form").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "/send_order_link",
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
                        $('#reportmodal').modal('hide');

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

        $(".close").click(function() {
            $(".modal-backdrop").remove();
        })
    </script>


    <script>
        function regain_report_modal() {

            $('#reportmodal').on('show.bs.modal', function(e) {

                //get data-id attribute of the clicked element
                var orderId = $(e.relatedTarget).data('book-id');

                //populate the textbox
                var encryptvuserid = btoa({{ Auth::user()->id }});
                var encryptvoderid = btoa(orderId);
                var linkv = "{{ url('/email_order/') }}" + '/' + encryptvoderid + '/' + encryptvuserid;
                $(e.currentTarget).find('input[name="orderid"]').val(orderId);
                $(e.currentTarget).find('input[name="link"]').val(linkv);
            });


            $('#trashmodal').on('show.bs.modal', function(e) {

                var orderId = $(e.relatedTarget).data('book-id');
                $(e.currentTarget).find('input[name="orderid"]').val(orderId);

            });

            $('#modalPaid').on('show.bs.modal', function(e) {
                var orderId = $(e.relatedTarget).data('book-id');
                $(e.currentTarget).find('input[name="orderid"]').val(orderId);

                var comments = $(e.relatedTarget).data('comments');
                //  alert(comments);
                $(e.currentTarget).find('textarea[name="pay_comments"]').val(comments);


                var paid_status = $(e.relatedTarget).data('paid_status');
                if (paid_status == 0) {
                    $("#status0").prop("checked", true);
                } else if (paid_status == 1) {
                    $("#status1").prop("checked", true);
                } else if (paid_status == 2) {
                    $("#status2").prop("checked", true);
                }

            });

        }



        $("body").delegate(".compare", "click", function() {

            var order_id = $(this).closest('tr').find('.order_id').val();
            var olcation = $(this).closest('tr').find('.location1').val();
            var dlcation = $(this).closest('tr').find('.location2').val();
            $.ajax({

                url: "/get_carrier_by_location",
                type: "GET",
                //dataType: "json",
                data: {
                    olcation: olcation,
                    dlcation: dlcation,
                    order_id: order_id
                },
                beforeSend: function() {
                    $('#table_data_carrier').html("");
                    $('#table_data_carrier').append(`<div class="lds-hourglass" id='ldss'></div>`);
                },

                success: function(data) {
                    //success
                    $('#table_data_carrier').html("");
                    $('#table_data_carrier').html(data);
                    if (data == "") {
                        $('#table_data_carrier').append(
                            `<div ><center> <h3 style="margin-top: 15px;">No Data Found</h3> </center></div>`
                        );
                    }
                    $(document).on('click', '#carrierPagination a', function(event) {
                        event.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];

                        var order_id = $('#order_id').val();
                        var olcation = $('#origin').val();
                        var dlcation = $('#destination').val();
                        $.ajax({

                            url: "/get_carrier_by_location?page=" + page,
                            type: "GET",
                            //dataType: "json",
                            data: {
                                olcation: olcation,
                                dlcation: dlcation,
                                order_id: order_id
                            },
                            beforeSend: function() {
                                $('#table_data_carrier').html("");
                                $('#table_data_carrier').append(
                                    `<div class="lds-hourglass" id='ldss'></div>`
                                );
                            },

                            success: function(data) {
                                //success
                                $('#table_data_carrier').html("");
                                $('#table_data_carrier').html(data);
                                if (data == "") {
                                    $('#table_data_carrier').append(
                                        `<div ><center> <h3 style="margin-top: 15px;">No Data Found</h3> </center></div>`
                                    );
                                }

                            },


                        });
                    });

                },


            });

        });
        $("body").delegate(".storageModal", "click", function() {

            var olcation = $(this).closest('tr').find('.location1').val();
            var dlcation = $(this).closest('tr').find('.location2').val();
            $.ajax({

                url: "/get_storage_by_location",
                type: "GET",
                //dataType: "json",
                data: {
                    olcation: olcation,
                    dlcation: dlcation
                },
                beforeSend: function() {
                    $('#table_data_storage').html("");
                    $('#table_data_storage').append(`<div class="lds-hourglass" id='ldss'></div>`);
                },

                success: function(data) {
                    //success
                    $('#table_data_storage').html("");
                    $('#table_data_storage').html(data);
                    if (data == "") {
                        $('#table_data_storage').append(
                            `<div ><center> <h3 style="margin-top: 15px;">No Data Found</h3> </center></div>`
                        );
                    }

                    $(document).on('click', '#carrierPagination a', function(event) {
                        event.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];

                        var olcation = $('#origin').val();
                        var dlcation = $('#destination').val();
                        $.ajax({

                            url: "/get_storage_by_location?page=" + page,
                            type: "GET",
                            //dataType: "json",
                            data: {
                                olcation: olcation,
                                dlcation: dlcation
                            },
                            beforeSend: function() {
                                $('#table_data_storage').html("");
                                $('#table_data_storage').append(
                                    `<div class="lds-hourglass" id='ldss'></div>`
                                );
                            },

                            success: function(data) {
                                //success
                                $('#table_data_storage').html("");
                                $('#table_data_storage').html(data);
                                if (data == "") {
                                    $('#table_data_storage').append(
                                        `<div ><center> <h3 style="margin-top: 15px;">No Data Found</h3> </center></div>`
                                    );
                                }

                            },


                        });
                    });

                },


            });

        });


        $("body").delegate(".find_carrier", "click", function() {
            var order_id = $(this).closest('tr').find('.order_id').val();
            var originstate = $(this).closest('tr').find('.origincity').val();
            var destinationstate = $(this).closest('tr').find('.destinationcity').val();
            $('#find_o_id').html("Order-Id: " + order_id);

            $.ajax({

                url: "/find_carrier",
                type: "GET",
                //dataType: "json",
                data: {
                    originstate: originstate,
                    destinationstate: destinationstate,
                    order_id: order_id
                },

                beforeSend: function() {
                    $('#table_find_data_carrier').html("");
                    $('#table_find_data_carrier').append(`<div class="lds-hourglass" id='ldss'></div>`);
                },

                success: function(data) {
                    //success
                    $('#table_find_data_carrier').html("");
                    $('#table_find_data_carrier').html(data);

                },


            });

        });


        function find_select(select_id, order_id) {

            $.ajax({

                url: "/assign_find_carrier",
                type: "GET",
                //dataType: "json",
                data: {
                    select_id: select_id,
                    order_id: order_id
                },

                success: function(data) {
                    $('#find_carrier_modal').modal('hide');
                    not1();

                }

            });


        }



        function call_history(id) {

            $.ajax({

                url: "show_call_history",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.length > 0) {
                        $('#calhistory').html('');
                        $('#calhistory').html(data);
                        setTimeout(function() {
                            $("#calhistory").animate({
                                scrollTop: 20000
                            }, "slow");

                        }, 200);
                    } else {
                        $('#calhistory').html('NO HISTORY FOUND');
                    }

                }

            });

        }

        function qa_show_history(id) {
            $.ajax({
                url: "{{ url('/qa_show_history') }}",
                type: "GET",
                data: {
                    id: id
                },
                dataType: "html",
                success: function(res) {
                    $("#calhistory9").html(res);
                }
            })
        }

        function qa_update_history(id, pstatus) {
            $.ajax({
                url: "{{ url('/qa_update_history') }}",
                type: "GET",
                data: {
                    id: id,
                    pstatus: pstatus
                },
                dataType: "html",
                success: function(res) {
                    $("#tab8").html(res);
                }
            })
        }

        $("body").delegate(".updatingToSchedule", "click", function() {
            $('#schedule_delivery').modal('show');
            $("#sd_order_id").val($(this).attr('data-order-id'));
        })


        $("body").delegate(".updatee", "click", function() {

            var order_id = $(this).closest('tr').find('.order_id').val();
            var pstatus = $(this).closest('tr').find('.pstatus').val();
            var pickup_date = $(this).closest('tr').find('.pickup_date').val();
            var deliver_date = $(this).closest('tr').find('.deliver_date').val();
            $("#order_id1").attr("value", order_id);
            $("#order_id2").attr("value", order_id);
            $('#ask_low').html('');
            var id = order_id;

            $('#largemodal').modal('show');




            call_history(id);
            $.ajax({

                url: "/show_pop_up",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.length > 0) {
                        $('#tab1').html('');
                        $('#tab1').html(data);
                    } else {
                        $('#tab1').html('NO HISTORY FOUND');
                    }
                },
                complete: function(data) {
                    $('#ldss').hide();
                    selectRefresh();
                }

            });

            setTimeout(function() {
                pop_update(pstatus, pickup_date, deliver_date, order_id);
            }, 1000);
            qa_show_history(id);
            qa_update_history(id, pstatus);
            $("#pstatus").children('option').removeAttr('selected');
            $("#pstatus").children('option').eq(0).attr('selected', true);
            $("#mistakers").html('');
            $("#last_history").html('');


            $.ajax({
                url: "{{ url('/qa_count') }}",
                type: "GET",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(res) {
                    $("#qa_count").html(res);
                }
            })


        });



        $(document).on('change', "#carrier_deleted", function() {
            $("#status_other_reason").remove();
            if ($(this).val() == 'OTHER') {
                $("#status_carrier_deleted").after(`
                    <div class="col-sm-6 col-md-6" id="status_other_reason">
                        <div class="form-group">
                            <label class="form-label">OTHER REASON</label>
                            <input type="text" required name="other_reason" id="other_reason" class="form-control">
                        </div>
                    </div>
                `);
            } else if ($(this).val() == 'COMPANY CANCEL' || $(this).val() == 'COMPANY CANCEL AND RELIST') {
                $("#status_carrier_deleted").after(`
                    <div class="col-sm-6 col-md-6" id="status_other_reason">
                        <div class="form-group">
                            <label class="form-label">Select Company
        
                            </label>
                            <select id="company_cancel" class="form-control select_cancel"
                                    name="company_cancel" required
                                    style=" height: auto; "
                                    data-validation-required-message="This field is required">
                                <option value="">Select Company</option>
                            </select>
                        </div>
                    </div>
                `);
                var options = '';
                var order_id2 = document.getElementById('order_id2').value;
                $.ajax({

                    type: "GET",
                    url: "/get_carrier",
                    data: {
                        'order_id': order_id2
                    },
                    dataType: "json",

                    success: function(data) {
                        $.each(data, function(i, item) {

                            if (item.id) {
                                options = options + `<option value='` + item.id + `'>` + item
                                    .companyname + `</option>`;

                            }
                        });
                        $("#company_cancel").append(options);
                    },
                    error: function(e) {
                        alert("error");
                    }

                });
            }
        })

        function pop_update(titlee, pickup, deliver, order_id) {

            var id = order_id;


            if (titlee == 9 || titlee == 10 || titlee == 11 || titlee == 19) {
                $('#tab3_toggle').show();
                $('#tab1_click').trigger('click');

            } else {
                $('#tab3_toggle').hide();
                $('#tab1_click').trigger('click');
            }

            if (titlee == 9 || titlee == 10 || titlee == 34) {

                $("#current_carrier").empty();
                var order_id = document.getElementById('order_id1').value;
                var options = "<option selected value=''>Select Carrier</option>";
                $.ajax({

                    type: "GET",
                    url: "/get_carrier",
                    data: {
                        'order_id': order_id
                    },
                    dataType: "json",

                    success: function(data) {
                        $.each(data, function(i, item) {

                            if (item.id) {
                                options = options + `<option value='` + item.id + `'>` + item
                                    .companyname + `</option>`;

                            }
                        });
                        //$("#current_carrier").remove();
                        $("#current_carrier").append(options);
                    },
                    error: function(e) {
                        alert("error");
                    }

                });
            }


            // if (titlee == 10) {

            //     $(".pickupdatediv").html('');

            //     $(".pickupdatediv").append(`<div class="form-group"><label class="form-label">PICKUP DATE</label>
        //                 <input type="date" value="${pickup}" required name="pickup_date"
        //                 id='pickup_date' class="form-control"><input type="checkbox" name="approvalpickup" value="1"/>MARK AS APPROVED</div>`);

            // }



            // if (titlee == 11) {

            //     $(".pickupdatediv2").html('');
            //     $(".deliverdate").html('');


            //     $(".pickupdatediv2").append(`<div class="form-group"><label class="form-label">PICKUP DATE</label>
        //                 <input readonly type="text" value="${pickup}"  name="pickup_date1"
        //                 id='pickup_date1' class="form-control"></div>`);

            //     $(".deliverdate").append(`<div class="form-group"><label class="form-label">Expected/DELIVER DATE</label>
        //                 <input required  type="date" value="${deliver}"  name="deliver_date"
        //                 id='deliver_date'class="form-control"></br>
        //                 <input type="checkbox" name="approvaldeliver" value="1"/> &nbsp; Mark AS APPROVED (DELIVER)</div>`);


            // }

        }

        $(document).on("change", "#current_carrier", function() {
            var id = $(this).val();
            $.ajax({
                url: "{{ url('/getonecarrier') }}",
                type: "GET",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    $("#auc_driver_no").val('');
                    $("#auc_company_name").val('');
                    $("#auc_company_name").val(data.companyname);
                    if (data.driverphoneno) {
                        $("#auc_driver_no").val(data.driverphoneno);
                    } else {
                        if (data.companyphoneno) {
                            $("#auc_driver_no").val(data.companyphoneno);
                        }
                    }
                }
            });
        })

        $("body").delegate("#keywords", "click", function() {
            setTimeout(function() {
                $('input[name="keywords"]').focus()
            }, 100);
        });


        $(document.body).delegate("#keywords", "keyup", function(e) {

            if (e.which == 13) {
                return_data();
            }

        });


        $("body").delegate("#search_by", "change", function() {

            $('#keywords').removeAttr('readonly');
            var search_by = $('#search_by').val();
            if (search_by == "ophone" || search_by == "driverphoneno") {

                $('#keywords').val('');
                $('#keywords').attr('type', 'text');
                $("#keywords").mask("(999) 999-9999");

                setTimeout(function() {
                    $('input[name="keywords"]').focus()
                }, 100);

            } else if (search_by == "created_at" || search_by == "updated_at") {

                $('#keywords').val('');
                $('#keywords').attr('type', 'date');

            } else if (search_by == "dauction") {
                $('#keywords').val('');
                $('#keywords').attr('type', 'text');
                $('#keywords').val('Port');
                $('#keywords').attr('readonly', true);
            } else {
                $('#keywords').attr('type', 'text');
                $("#keywords").unmask();
                setTimeout(function() {
                    $('input[name="keywords"]').focus()
                }, 100);
                $('#keywords').val('');

            }
        });


        $("body").delegate("#pstatus", "change", function() {
            var p_status = $('#pstatus').val();
            if (p_status == 3) {

                $('#ask_low').html(`
                    <div class="form-group">
                        <label class="form-label">Asking Low Price</label>
                        <input required type="number" min="0" step="0.01" name="asking_low"
                                  id='asking_low' class="form-control">
                    </div>`)
            }

            // if(p_status == 19){

            //     $('.select_cancel').prop("disabled", true);
            // }else{

            //     $('.select_cancel').prop("disabled", false);
            // }



        });

        function return_data() {

            var data = $('#search_form').serialize();

            $('#table_data').html('');
            $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);
            $.ajax({

                url: "/searchFetch",
                type: "GET",
                data: data,
                success: function(data) {
                    $('#table_data').html('');
                    $('#table_data').html(data);
                },
                complete: function(data) {
                    $('#ldss').hide();
                    //regain();
                }

            });
        }

        $("body").delegate(".count_user", "click", function() {

            var order_id = $(this).closest('tr').find('.order_id').val();
            var pstatus = $(this).closest('tr').find('.pstatus').val();
            var client_email = $(this).closest('tr').find('.client_email').val();
            var client_name = $(this).closest('tr').find('.client_name').val();
            var client_phone = $(this).closest('tr').find('.client_phone').val();

            //alert(order_id + " " + pstatus + " " + client_email);

            var data = {
                order_id: order_id,
                pstatus: pstatus,
                client_email: client_email,
                client_name: client_name
            };
            $.ajax({
                type: "GET",
                url: '/count_user',
                dataType: "json",
                data: data,
                beforeSend: function() {

                },
                complete: function() {

                },
                success: function(response) {
                    if (response) {
                        window.location.href = "rcmobile://call?number=" + client_phone;
                    }

                }
            });


        });
    </script>


    <script>
        $(document).ready(function() {


            $(document).on('click', '.pagination a', function(event) {

                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data3(page);
                $.cookie("page", page, {
                    expires: 1
                });

            });


            function fetch_data3(page) {


                var data = $('#search_form').serialize();
                data = data + "&page=" + page;

                $('#table_data').html('');
                $('#table_data').append(`<div class="lds-hourglass" id='ldss'></div>`);

                $.ajax({

                    url: "/searchFetch",
                    data: data,
                    type: "GET",
                    success: function(data) {
                        $('#table_data').html('');
                        $('#table_data').html(data);

                    },
                    complete: function(data) {
                        $('#ldss').hide();
                        //regain();
                    }

                })

            }
            // let cookie = $.cookie("page");
            // if(cookie)
            // {
            //     fetch_data3(cookie);
            //     $.removeCookie("page");
            // }


        });
    </script>
    <script>
        $("#showingDispatchers").on('click', function() {
            $("#showDispatchers").toggle();
        });
        // $("#auction_storage").on('change',function () {
        //     if($(this).val() == 1)
        //     {
        //         $("#already").show();
        //         $("#late").hide();
        //     }
        //     else if($(this).val() == 2)
        //     {
        //         $("#late").show();
        //         $("#already").hide();
        //     }
        //     else
        //     {
        //         $("#late").hide();
        //         $("#already").hide();
        //     }
        // })
    </script>

    <script>
        $(".already_late").on('change', function() {
            if ($(this).is(":checked")) {
                $(this).parent('div').parent('div').siblings('.auction_already_late').show();
            } else {
                $(this).parent('div').parent('div').siblings('.auction_already_late').hide();
            }
        })
    </script>
    <script>
        $("body").delegate(".add-approaching", "click", function() {
            var order_id = $(this).find('.Get-Order-ID').val();

            $(".show_order_id").html(order_id);
            $(".val_order_id").val(order_id);

            $.ajax({
                url: '{{ route('get.carrier_approachings') }}',
                type: 'GET',
                data: {
                    'order_id': order_id,
                },
                success: function(data) {
                    // Handle the success response
                    // console.log('datas', data);

                    var html = "";

                    $("#history-content").html('');

                    $.each(data, function(index, val) {
                        // Assuming val['created_at'] is a string representation of the date
                        var createdAt = new Date(val['created_at']);

                        // Format the date
                        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May",
                            "Jun", "Jul",
                            "Aug", "Sep", "Oct", "Nov", "Dec"
                        ];
                        var formattedDate = monthNames[createdAt
                                .getMonth()] + "," +
                            ("0" + createdAt.getDate()).slice(-2) + " " +
                            createdAt.getFullYear() + " " +
                            ("0" + createdAt.getHours()).slice(-2) + ":" +
                            ("0" + createdAt.getMinutes()).slice(-2) +
                            (createdAt.getHours() >= 12 ? " PM" : " AM");

                        // Append formatted date to HTML
                        html += "<h6>User: " + val['user']['name'] + "</h6>";
                        html += "<h6>Company: " + val['comp_name'] + "</h6>";
                        html += "<h6>Company Phone: " + val['comp_phone'] + "</h6>";

                        // Handle status
                        html += "<h6>";

                        if (val['status'] == 1) {
                            html += "Interested";
                        } else if (val['status'] == 0) {
                            html += "Not Interested";
                        } else {
                            // Handle other cases if needed
                            html += "Unknown Status";
                        }

                        html += "</h6>";

                        html += "<h6>Response: " + val['comp_response'] + ".</h6>";
                        html +=
                            "<strong class='mf-date'><i class='fa fa-clock-o'></i>" +
                            formattedDate + "</strong> <hr>";
                    });

                    $("#history-content").html(html);
                },
                error: function(error) {
                    // Handle the error response
                    console.error('Error submitting the form:', error);
                    // Optionally, you can display an error message or take other actions
                }
            });
        });
    </script>
    <script>
        $(".driverphoneno").keypress(function(e) {
            if ($(this).val() == '') {
                $(this).mask("(999) 999-9999");
            }
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)) {
                return true;
            } else {
                return false;
            }
        })

        $(".showQaFilter").on('click', function() {
            $("#verifyNegative").toggle();
            $('#verify2').children('option').removeAttr('selected');
            $('#verify2').children('option').eq(0).attr('selected', true);
            $('#negative2').children('option').removeAttr('selected');
            $('#negative2').children('option').eq(0).attr('selected', true);
        })

        $("#request_name").change(function() {
            var datavalue = $(this).children('option:selected').attr('data-value');
            $("#status_request").val(datavalue);
            if (datavalue == 23) {
                $("#keyvalue").html(`
                    <div class="row">
                        <input type="hidden" name="key[]" value="Port" />
                        <div class="col-10">
                            <div class="form-group">
                                <label for="port1" class="form-label">Port 1</label>
                                <input type="text" placeholder="Port 1" name="value[]" id="port1" class="form-control" />
                            </div>
                        </div>
                        <div class="col-2 mt-auto">
                            <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                `);
                var i = 1;
                $(document).on('click', ".addPort", function() {
                    i++;
                    $("#keyvalue").append(`
                        <div class="row mb-2">
                            <input type="hidden" name="key[]" value="Port" />
                            <div class="col-10">
                                <div class="form-group mb-0">
                                    <label for="port${i}" class="form-label">Port ${i}</label>
                                    <input type="text" placeholder="Port ${i}" name="value[]" id="port${i}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-2 mt-auto">
                                <button type="button" class="btn btn-danger subPort"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    `);
                })

                $(document).on('click', '.subPort', function() {
                    i--;
                    $(this).parent('div').parent('.row').remove();
                })
            } else {
                $("#keyvalue").html('');
            }
        })
    </script>

    <!--Scrolling Modal-->
    
    <script>
        document.getElementById('link').addEventListener('selectstart', function(e) {
            e.preventDefault();
            return false;
        });
    </script>
@endsection
