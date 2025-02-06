@extends('layouts.innerpages')

@section('template_title')
    New Quote Freight
@endsection

@include('partials.mainsite_pages.return_function')
<style>
    .card-people-list .media-body {
        margin-left: 15px;
    }

    .media-body>a {
        color: #00a0fc !important;
    }

    .slim-card-title {
        text-transform: uppercase;
        font-weight: 700;
        font-size: 13px;
        color: rgb(52 58 64);
        letter-spacing: 1px;
    }

    .oauc {
        padding: 11px;
        width: 100%;
    }

    .dauc {
        padding: 11px;
        width: 100%;
    }

    .row_style {
        padding: 28px;
    }

    .modal-backdrop {
        width: 100% !important;
        height: 100% !important;
    }

    .btn-color:hover {
        color: white !important;
    }

    .btn-color {
        color: white !important;
    }

    .ui-menu {
        z-index: 10000 !important;
        font-size: 15px !important;
        background: rgba(223, 253, 255, 0.93) !important;
        display: block !important;
    }

    input::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder {
        color: #b2b2b2 !important;
    }

    .margin_lft_rth {
        margin: 15px 15px !important;
    }

    .font-boldd {
        font-weight: 900 !important;
        color: #000;
    }

    input {
        color: black !important;
    }

    .border_none {
        border: 0px !important;
    }

    input.select2-search__field {
        height: 45px !important;
    }

    select.form-control:not([size]):not([multiple]) {
        height: 2.375rem !important;
    }
</style>

@section('content')

<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">New Quote </h4>
        <h4 id="orderidplace"></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Pages</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page"><a href="#">New Quote</a></li>
        </ol>
    </div>

</div>
<!--End Page header-->
<!-- Row -->

<form action="" name="valid_form" id="form" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <input  name="order_history" type="hidden"  id="order_history">

    <!-- Row -->
    <div class="row">

        <div class="card margin_lft_rth">
            <div class="grid_new grid_2 new__Quote aaa" style="gap: 0 2rem !important;">
                <div class="" style="padding: 12px 0px 0px 24px !important;">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title font-boldd">ORIGIN LOCATION</div>
                        </div>
                        <div class="card-body">
                            <div class="card-title font-boldd"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Terminal, Dealer, Auction</label>
                                        <select class="form-control parsley-error this_save  select2" name="oterminal" id="oterminal" onkeypress="$(this).css('border-color', 'rgb(92 166 242)');">

                                            <option value="">Select an Option</option>
                                            <option value="1">Residence</option>
                                            <option value="2">COPART Auction</option>
                                            <option value="3">Manheim Auction</option>
                                            <option value="4">IAAI Auction</option>
                                            <option value="5">Body Shop</option>
                                            <option value="10">Dealership</option>
                                            <option value="7">Business Location</option>
                                            <option value="8">Auction (Heavy)</option>
                                            <option value="6">Other</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row oauc" style="margin-bottom: -22px;">
                                </div>

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <label class="form-label parsley-error font-boldd">Name<span class="redcolor">*</span></label>
                                        <input type="text" name="oname" id="oname" onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" class="form-control this_save " autocomplete="off" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 stock_number">

                                </div>
                                <!--
                                        <div class="col-sm-12 buyer_number">
                                            <div class="form-group">
                                                <label class="form-label">Buyer/Lot/Stock Number</label>
                                                <input type="text" name="obuyer_no" id="obuyer_no" class="form-control this_save "
                                                       placeholder="Buyer/Lot/Stock Number">
                                            </div>
                                        </div>
                                        -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Email address</label>
                                        <input type="email" name="oemail" id="oemail" autocomplete="off" class="form-control this_save" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-sm-12 add_phone">
                                    <div class='row'>&nbsp;&nbsp;&nbsp;
                                        <label class="form-label font-boldd">Phone Number<span class="redcolor">*</span></label>
                                        <div class="form-group col-11 ">
                                            <input type="text" name="ophone[]" id="ophone" autocomplete="off" class="form-control this_save  ophone ophone_new" required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" placeholder="Number" value="{{ $phoneno }}">
                                        </div>
                                        <div class='form-group col-1' style="padding-top: 7px;">
                                            <i id='add_btn' class="si si si-plus add_phone_btn"></i>
                                        </div>
                                        <input type="hidden" value="{{ $phoneno }}" name="ophone2[]" />
                                    </div>
                                </div>

                                <div class="row mb-2" id="ophoneResult">
                                    <div class="col-lg-12" style=" padding-left: 26px !important; ">
                                        <a href="javascript:void(0)" id="ophoneNumChk" onclick="ophoneNumChk('(000) 000-0000')">3 Order Found</a>
                                        <span style="font-size: 22px; color: #000; line-height: 0;">|</span>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#alreadyCreditCard">1 Card Found</a>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Address <span class="redcolor">*</span></label>
                                        <input type="text" name="oaddress" id="oaddress" autocomplete="off" required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');"  class="form-control this_save " placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Address2</label>
                                        <input type="text" id="oaddress2" name="oaddress2" autocomplete="off" class="form-control this_save " placeholder="Home Address">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label parsley-error font-boldd">Zip Code<span class="redcolor">*</span></label>
                                        <input type="text" id="o_zip1" class="form-control this_save " autocomplete="off" maxlength="100" name="o_zip1" onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" placeholder="ZIP CODE" required/>
                                    </div>
                                    <ul class="nav scrollul flex-column border" style="max-height:200px;overflow:scroll;display:none;">
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="" style="padding: 12px 24px 0px 1px !important;">
                    <div class="card" style=" height: 96%; ">
                        <div class="card-header">
                            <div class="card-title">DESTINATION LOCATION</div>
                        </div>
                        <div class="card-body">
                            <div class="card-title font-boldd"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Terminal, Dealer, Auction</label>
                                        <select class="form-control this_save select2" name="dterminal" id="dterminal">
                                            <option value="" data-value="">Select</option>
                                            <option value="1" data-value="Residence">Residence</option>
                                            <option value="2" data-value="COPART Auction">COPART Auction</option>
                                            <option value="3" data-value="Manheim Auction">Manheim Auction</option>
                                            <option value="4" data-value="IAAI Auction">IAAI Auction</option>
                                            <option value="5" data-value="Body Shop">Body Shop</option>
                                            <option value="11" data-value="Dealership">Dealership</option>
                                            <option value="7" data-value="Port">Port</option>
                                            <option value="6" data-value="AirPort">AirPort</option>
                                            <option value="9" data-value="Business Location">Business Location</option>
                                            <option value="10" data-value="Auction (Heavy)">Auction (Heavy)</option>
                                            <option value="8" data-value="Other">Other</option>
                                        </select>
                                        <input type="hidden" id="dauctionnew" name="dauctionnew" value="" />
                                    </div>
                                </div>
                                @php $style = 'display: none;'; @endphp
                                <span id="port_lines" style="{{ $style }} width: 100%">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row label_margin">
                                                    <div class="col-md-3" style="display: inline-flex">
                                                        <input type="radio" id="port_line1" name="port_line" value="girmadi" class="mr-1 this_save">
                                                        <label class="form-label font-boldd" for="port_line1">Girmadi Lines
                                                            <!--<span class="redcolor">*</span>-->
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3" style="display: inline-flex">
                                                        <input type="radio" id="port_line2" name="port_line" value="sallum" class="mr-1 this_save" >
                                                        <label class="form-label font-boldd" for="port_line2">Sallum Lines
                                                            <!--<span class="redcolor">*</span>-->
                                                        </label>
                                                    </div>
                                                     <div class="col-md-3" style="display: inline-flex">
                                                        <input type="radio" id="port_line3" name="port_line" value="both" class="mr-1 this_save" >
                                                        <label class="form-label font-boldd" for="port_line3">Both
                                                            <!--<span class="redcolor">*</span>-->
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class=" form-label font-boldd">Dock Recieve Type*</label>
                                                <select class="form-control this_save select2" name="port_dock_type"
                                                        id="port_dock_type" >
                                                    <option value="">Select</option>
                                                    <option value="Running">Running</option>
                                                    <option value="Non Running">Non Running</option>
                                                    <option value="Folk Lift">Folk Lift</option>
                                                </select>
                                            </div>
                                        </div>
                                    </span> @php $style = 'display: none;'; @endphp
                                <div id="port_reason_box" style="{{ $style }} width: 100%" class="col-sm-6 col-md-12">
                                    <div class="form-group">
                                        <label class=" form-label font-boldd  ">Reason Box</label>
                                        <input type="text" id='reason_box' name='reason_box' class="form-control this_save" onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Name </label>
                                        <input type="text" id='dname' name='dname' class="form-control this_save " autocomplete="off" onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" placeholder="First Name">
                                    </div>
                                </div>

                                <div class="row dauc" style="margin-bottom: -22px;"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Email address</label>
                                        <input type="email" name="demail" id="demail" autocomplete="of" class="form-control this_save" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 add_dphone">

                                    <div class="row">
                                        &nbsp; &nbsp; &nbsp; <label class="form-label font-boldd">Phone Number
                                            <!--<span class="redcolor">*</span>-->
                                        </label>

                                        <div class="form-group col-11 ">
                                            <input type="text" name="dphone[]" id="dphone" autocomplete="off" class="form-control this_save  dphone ophone_new" placeholder="Number">
                                        </div>
                                        <div class="form-group col-1" style="padding-top: 7px;">
                                            <i id="add_btn" class="si si si-plus add_dphone_btn"></i>

                                        </div>
                                        <input type="hidden" value="" name="dphone2[]" />

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Address
                                            <span class="redcolor">*</span></label>
                                        <input type="text" name='daddress' id='daddress' required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" autocomplete="off" class="form-control this_save " placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label font-boldd">Address2</label>
                                        <input type="text" name='daddress2' id='daddress2' autocomplete="off" class="form-control this_save " placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label parsley-error font-boldd">Zip Code
                                            <span class="redcolor">*</span>
                                        </label>
                                        <input type="text" id="d_zip1" class="form-control this_save " autocomplete="off" required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" maxlength="100" name="d_zip" placeholder="ZIP CODE" />
                                    </div>
                                    <ul class="nav flex-column border scrollul" style="max-height:200px;overflow:scroll;display:none;">
                                    </ul>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-sm-4 ml-4">
                    <div class="form-group">
                        <label for="miles" class="form-label">Miles</label>
                        <input type="text" class="form-control" placeholder="Miles"  name="miles" id="miles" />
                    </div>
                </div>
            </div>
            <div class="çard-footer">
                <div class="flex_ flex_center gap_new row_style">
                    <div>
                        <div class=" text-right">
                            <a target="_blank" href="https://www.timeanddate.com/worldclock/usa" class="btn btn-primary">Time Zone</a>
                        </div>
                    </div>
                    <div>
                        <div class=" ">
                            <a href="javascript:void(0)" target="_blank"  id='viewMap' class="btn  btn-primary">View Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Freight INFORMATION</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 ">
                                <label for="Freight Class">Freight Class</label>
                                <button type="button" class="btn btn-info btn-sm" data-type="1" data-toggle="modal" data-target="#modal_frieght" style="float: right;">Calculate Your Frieght Class</button>
                                <select name="frieght_class" id="frieght_class" class="frieght_class form-control this_save"  required>
                                    <option value="">Select</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                    <option value="65">65</option>
                                    <option value="70">70</option>
                                    <option value="77.5">77.5</option>
                                    <option value="85">85</option>
                                    <option value="92.5">92.5</option>
                                    <option value="100">100</option>
                                    <option value="110">110</option>
                                    <option value="125">125</option>
                                    <option value="150">150</option>
                                    <option value="175">175</option>
                                    <option value="200">200</option>
                                    <option value="250">250</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                </select>
                        </div>
                        <div class="col-md-4">
                                <label for="Total Weight in LBS">Total Weight in LBS</label>
                                <input name="total_weight_lbs" class="form-control this_save" required type="text" placeholder="Total Weight in LBS">
                        </div>
                        <div class="col-md-4 ">
                            <label for="Freight Class">Shipment Prefences</label>
                            <select name="shipment_prefences" id="shipment_prefences" class="shipment_prefences form-control this_save"  required>
                                <option value="">Select</option>
                                <option value="ltl">LTL (Less than truck load)</option>
                                <option value="fl">FTL (Full Truck Load)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Freight Class">Equipment Type</label>
                                <select multiple required  class="form-control select2 equipment_type this_save"  name="equipment_type[]" data-placeholder="Equipment Type" >
                                    <option>VAN (V)</option>
                                    <option>REEFER (RE)</option>
                                    <option>FLATBED (F)</option>
                                    <option>STEP DECK (SD)</option>
                                    <option>REMOVABLE GOOSENECK (RGN)</option>
                                    <option>CONESTOGA (CS)</option>
                                    <option>CONTAINER / DRAYAGE (C)</option>
                                    <option>TRUCK (T)</option>
                                    <option>HAZMAT (hazardous materials)</option>
                                    <option>POWER ONLY (PO)</option>
                                    <option>HOT SHOT (HS)</option>
                                    <option>LOWBOY (LB)</option>
                                    <option>ENDUMP (ED)</option>
                                    <option>LANDOLL (LD)</option>
                                    <option>PARTIAL (PT)</option>
                                    <option>20ft container</option>
                                    <option>40ft container</option>
                                    <option>48ft container</option>
                                    <option>53ft container</option>
                                </select>
                                <input type="hidden" id="dauctionnew" name="dauctionnew" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                                <label for="Freight Class">Trailer Specification</label>
                                <select  multiple data-placeholder="Trailer Specification" name="trailer_specification[]"  class="form-control select2 trailer_specification this_save" >
                                    <option>Air Ride(A)</option>
                                    <option>Blanket Wrap (B)</option>
                                    <option>B-Train (BT)</option>
                                    <option>Chain(CH)</option>
                                    <option>Chassis (CS)</option>
                                    <option>Conestoga(CO)</option>
                                    <option>Curtain(C)</option>
                                    <option>Double(2)</option>
                                    <option>Extendable (E)</option>
                                    <option>E-Track (ET)</option>
                                    <option>Hazmat (Z)</option>
                                    <option>Hot Shot (HS)</option>
                                    <option>Insulated (N)</option>
                                    <option>Lift Gate (LG)</option>
                                    <option>Load Out (LO)</option>
                                    <option>Load Ramp (LR)</option>
                                    <option>Moving (MV)</option>
                                    <option>Open Top (OT)</option>
                                    <option>Oversized (O)</option>
                                    <option>Pallet Exchange (X)</option>
                                    <option>Side Kit (S)</option>
                                    <option>Tarp(T)</option>
                                    <option>Team Driver(M)</option>
                                    <option>Temp Control (TC)</option>
                                    <option>Triple (3)</option>
                                    <option>Vented (V)</option>
                                    <option>Walking Floor (WF)</option>
                                </select>

                        </div>

                        <div class="col-md-6">
                                <label for=" Commodity Details"> Commodity Details</label>
                                <input required name="commodity_detail" type="text" placeholder=" Commodity Details" class="form-control this_save">
                        </div>
                        <div class="col-md-6">
                                <label for="Units">Units</label>
                                <input required type="number" class="form-control this_save" name="commodity_unit" >
                        </div>
                        <div class="col-md-6">
                                 <label class="d-block"> Select Handling Unit:</label>
                                        <select class="form-control" id="handling_unit" name="handling_unit">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Pallet">Pallet</option>
                                            <option value="Crate">Crate</option>
                                            <option value="Box">Box</option>
                                            <option value="Bag">Bag</option>
                                            <option value="Bale">Bale</option>
                                            <option value="Bundle">Bundle</option>
                                            <option value="Can">Can</option>
                                            <option value="Carton">Carton</option>
                                            <option value="Case">Case</option>
                                            <option value="Coil">Coil</option>
                                            <option value="Cylinder">Cylinder</option>
                                            <option value="Drum">Drum</option>
                                            <option value="Loose">Loose</option>
                                            <option value="Pail">Pail</option>
                                            <option value="Reel">Reel</option>
                                            <option value="Roll">Roll</option>
                                            <option value="Pipe">Pipe</option>
                                            <option value="Other">Other</option>
                                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="lab-cos">Length</label>
                            <div class="input-container">
                                <input type="number" id="feet-input" class="input-field" placeholder=""
                                    min="0" maxlength="3" oninput="limitDigits(this, 3)">
                                <span class="separator">(Ft.)</span>
                                <input type="number" id="inches-input" class="input-field" placeholder=""
                                    min="0" max="11" maxlength="2" oninput="limitDigits(this, 2)">
                                <span class="separators">(In.)</span>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <label class="lab-cos">Width</label>
                            <div class="input-container">
                                <input type="number" id="feet-input1" class="input-field" placeholder=""
                                    min="0" maxlength="3" oninput="limitDigits(this, 3)">
                                <span class="separator">(Ft.)</span>
                                <input type="number" id="inches-input1" class="input-field" placeholder=""
                                    min="0" max="11" maxlength="2" oninput="limitDigits(this, 2)">
                                <span class="separators">(In.)</span>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <label class="lab-cos">Height</label>
                            <div class="input-container">
                                <input type="number" id="feet-input2" class="input-field" placeholder=""
                                    min="0" maxlength="3" oninput="limitDigits(this, 3)">
                                <span class="separator">(Ft.)</span>
                                <input type="number" id="inches-input2" class="input-field" placeholder=""
                                    min="0" max="11" maxlength="2" oninput="limitDigits(this, 2)">
                                <span class="separators">(In.)</span>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <label class="lab-cos">Weight</label>
                            <div class="input-container1">
                                <input type="" id="feet-input" class="input-field-1" placeholder=""
                                    min="0" maxlength="6" oninput="limitDigits(this, 6)">
                                <span class="separators-w">(Lbs.)</span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>
                                <input type="checkbox" value="0" id="Shipment" onclick="($(this).is(':checked')) ? $('#addingmore').show() : $('#addingmore').hide();  " />
                                Enter Detailed Shipment Information
                            </label>
                        </div>
                    </div>
                    <div id="addingmore" style="display: none">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="feild">
                                    <label for="Pickup Date">Pickup Date</label>
                                    <input name="ex_pickup_date" type="date" placeholder="Pickup Date" class="form-control this_save">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="feild">
                                    <label for="Pickup Date">Pickup Time</label>
                                    <input type="time" onchange="time(event)" id="appt" name="ex_pickup_time" class="form-control this_save">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="feild">
                                    <label for="Pickup Date">Delivery Date</label>
                                    <input type="date" placeholder="Delivery Date" class="form-control this_save" name="ex_delivery_date">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="feild">
                                    <label for="Pickup Date">Delivery Time</label>
                                    <input type="time" id="appt" name="ex_delivery_time" class="form-control this_save">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row Advanced">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        Pickup Services
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="pick_up_services[]"  value="Construction_Utility" type="checkbox" class="this_save" > Construction / Utility
                                </div>
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Container_Station" type="checkbox" class="this_save" > Container Station
                                </div>
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Exhibition" type="checkbox" class="this_save" > Exhibition
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Inside_Pickup" type="checkbox" class="this_save" > Inside Pickup
                                </div>
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Lift_Gate_Service" type="checkbox" class="this_save" > Lift Gate Service
                                </div>
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Residential" type="checkbox" class="this_save" > Residential
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Single_Shipment" type="checkbox" class="this_save" > Single Shipment
                                </div>
                                <div class="col-md-4">
                                    <input name="pick_up_services[]" value="Sorting_Segregation" type="checkbox" class="this_save" > Sorting / Segregation
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row Advanced">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        Delivery Services
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save"  name="deliver_services[]" value="After_Business_Hours_Delivery" > After Business Hours Delivery
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save"  name="deliver_services[]" value="Construction_Utility" > Construction / Utility
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save"  name="deliver_services[]" value="Appointment" > Appointment
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Container_Station" > Container Station
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Exhibition" > Exhibition
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="In_Bond_Freight" > In Bond Freight
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="In_Bond_TIR_Caret" > In Bond TIR Caret
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Inside_Same_Level_as_Delivery_Vehicle" > Inside - Same Level as Delivery Vehicle
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Lift_Gate_Service" > Lift Gate Service
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Residential" > Residential
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Mine_Govt_Airport" >  Mine / Govt / Airport
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="this_save" name="deliver_services[]" value="Notification_Prior_Delivery" > Notification Prior Delivery
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row Advanced">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        Additional Services
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input this_save" type="checkbox" id="protect_from_freezing"
                                            name="protect_from_freezing" value="1" />
                                        <label class="form-check-label" for="protect_from_freezing"
                                            style="font-size: 14px;"> Protect from freezing</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input this_save" type="checkbox" id="sort_segregate"
                                            name="sort_segregate" value="1" />
                                        <label class="form-check-label" for="sort_segregate"
                                            style="font-size: 14px;"> Sort & Segregate</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input this_save" type="checkbox" id="blind_shipment"
                                            name="blind_shipment" value="1" />
                                        <label class="form-check-label" for="blind_shipment"
                                            style="font-size: 14px;"> Blind Shipment</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input this_save" type="checkbox" id="stackable" name="stackable"
                                            value="1" />
                                        <label class="form-check-label" for="stackable"> Stackable</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                     <div class="form-check mt-3">
                                        <input class="form-check-input this_save" type="checkbox" id="hazardous" name="hazardous"
                                            value="1" />
                                        <label class="form-check-label" for="hazardous"> Hazardous</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">


                </div>
            </div>
        </div>
        <!--
                <button type="submit" id="saveBtn" name="saveBtn" style="border: 1px solid;"
                                        class="btn btn-outline-primary mg-l-20 float-right">Save
                                </button>
                        -->


        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title ">TIME FRAME</div>
                </div>
                <div class="card-body">
                    <div class='row '>
                        <div class="col ">
                            <h5>Pickup</h5>

                            <div class="wd-200 mg-b-30">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"></path>
                                                <path d="M4 5.01h16V8H4z" opacity=".3"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    {{-- <input class="form-control this_save " id='pickup_date' name='pickup_date' placeholder="MM/DD/YYYY" type="text" id="pickup_date">--}}

                                    <input type="text" name="pickup_date" id="pickup_date" class="form-control this_save " placeholder="MM/DD/YYYY" autocomplete="off" data-parsley-id="">
                                </div>
                            </div>
                        </div>
                        <div class="col ">
                            <h5>Delivery</h5>
                            <div class="wd-200 mg-b-30">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"></path>
                                                <path d="M4 5.01h16V8H4z" opacity=".3"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <input type="text" name="delivery_date" id="delivery_date" class="form-control this_save " placeholder="MM/DD/YYYY" autocomplete="off" data-parsley-id="">
                                </div>
                            </div>

                        </div>


                    </div>

                    &nbsp;
                    <div class="row ">
                        <div class="col-lg-6" id="whenPickUpDate"></div>
                        <div class="col-lg-6" id="whenDeliveryDate"></div>
                    </div>

                    <div class="card-footer text-left">
                        <!-- <a href="#" class="btn btn-danger">Cancle</a> -->
                    </div>
                    <div class="flex_ flex_center gap_new">
                        <a href="javascript:void(0)" id="zipCityDest" class="btn btn-primary mg-r-10">Ship A1 Rates</a>
                        <input type="hidden" class="orderID">
                        <div class="priceReq text-left float-left">
                        </div>
                        <!--<a href="javascript:void(0)" id="viewCentral" class="btn btn-primary mg-r-10">-->
                        <!--    View Pricing</a>-->
                        <!--<a href="javascript:void(0)" id="shipa1Rates" class="btn btn-primary mg-r-10">Ship A1 Rates</a>-->
                        <a href="javascript:void(0)" id="previousRecord" class="btn btn-primary mg-r-10">Previous Record</a>
                        <a href="https://www.weather.gov/" target="_blank" class="btn btn-primary mg-r-10">View Weather</a>
                        <a href="https://gasprices.aaa.com/" target="_blank" class="btn btn-primary">Fuel Price</a>
                        <a href="javascript:void(0)" id="previousBookPrice" class="btn btn-primary mg-r-10">Previous Driver Price</a>
                        <a class="btn btn-primary mg-r-10"
                           onclick="history('0',$('#ophone').val())"
                           target="_blank">History</a>
                    </div>
                    <div class="row reqPrice"></div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Carrier/Payment</div>
                    </div>
                    <div class="card-body">
                        <div class='row'>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class='row'>
                                        @if(Auth::user()->userRole->name <> 'Dispatcher')
                                        <div class="col-md-3">
                                            <label class="form-label font-boldd">START PRICE<span class="redcolor">*</span></label>
                                            <input required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" type="text" placeholder="ORDER STARTING PRICE *" id='startPrice' name='start_price' value="" class="form-control parsley-error this_save ">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label font-boldd">PRICING & PAYMENT <span class="redcolor">*</span></label>
                                            <input type="text" placeholder="ORDER BOOKING PRICE " id='orderPrice' autocomplete="off" required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" name='price' class="form-control parsley-error this_save ">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label font-boldd">DRIVER PRICE <span class="redcolor">*</span></label>
                                            <input type="text" placeholder="DRIVER PRICE" id='driverPrice' autocomplete="off" required onkeypress="$(this).css('border-color', 'rgb(92 166 242)');" name='driver_price' class="form-control parsley-error this_save ">
                                        </div>
                                        @endif
                                        <div class="col-md-3">
                                            <label class="form-label font-boldd">Coupon Number</label>
                                            <input type="text" placeholder="Coupon Number" id='coupon_number' name='coupon_number' class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input class="this_save" type="checkbox" name="needDeposit" id="needDeposit"
                                               value="yes"
                                               data-parsley-multiple="needDeposit">
                                        <span>&nbsp;Deposit Amount?</span>
                                    </label>
                                </div>
                                <div id="depositContent"></div>&nbsp;
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="rdiobox radio_btn">

                                        <input name="central_chk"  class="this_save"    id="central_chk1" type="radio" value="confirm">
                                        <span>DB List</span>
                                    </label>


                                    <label>
                                        <input name="central_chk"  class="this_save"  id="central_chk2" type="radio" value="may be">
                                        <span>DB May Be List</span>
                                    </label>


                                    <label>
                                        <input name="central_chk" class="this_save" id="central_chk3" type="radio" value="none">
                                        <span>None</span>
                                    </label> &nbsp;
                                    <div id="confirm_book" style="display:flex"></div>
                                    <div id="may_be_book" style="display:flex"></div>

                                </div>
                                &nbsp;
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="label font-boldd tx-black">Storage Fees</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-usd tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control this_save "
                                                       autocomplete="nope" type="text"
                                                       name="storage_fees" value="" placeholder=""
                                                       id="storage_fees" onkeyup="this.value > 0 ? $('#paybyy').show() : $('#paybyy').hide()"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" style="display:none;" id="paybyy">
                                        <div class="form-group">
                                            <label class="label font-boldd tx-black">Pay By</label>
                                            <select id="pay_by" name="pay_by"
                                                    class="form-control this_save ">

                                                <option disabled="" selected="">SELECT</option>
                                                <option value="Driver">Driver</option>
                                                <option value="Customer">Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="label font-boldd tx-black">Other Fees</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-usd tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control this_save "
                                                       autocomplete="nope" type="text"
                                                       name="other_fees" value="" placeholder=""
                                                       id="other_fees"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label font-boldd tx-black">Price to Pay
                                        Carrier</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-usd tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input class="form-control this_save " autocomplete="off" type="text" name="pay_carrier" value="" placeholder="" id="payCarrier">
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 mt-5"></div>

                            <!--<div class="col-lg-6 mt-5">-->
                            <!--    <label class="rdiobox mb-0 mr-5">-->
                            <!--        <input class="this_save" name="vehicle" id="carrier_status_1" type="radio"-->
                            <!--               value="quick_pay"-->
                            <!--               data-parsley-multiple="carrier_status">-->
                            <!--        <span>Quick Pay</span>-->
                            <!--    </label>-->


                            <!--    <label class="rdiobox mb-0 ml-5">-->
                            <!--        <input class="this_save" name="vehicle" id="carrier_status_2" type="radio"-->
                            <!--               value="cod"-->
                            <!--               data-parsley-multiple="carrier_status">-->
                            <!--        <span>COD</span>-->
                            <!--    </label>-->

                            <!--</div>-->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="label font-boldd tx-black">COD/COP
                                        Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-usd tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input class="form-control this_save " autocomplete="off" style="width: 80%" type="text" name="cod_cop" value="" placeholder="" id="copcodAmount">
                                    </div>

                                </div>
                                <div id="copcodPart" style="display: none">
                                    <div class="form-group">
                                        <label class="form-control -label font-boldd tx-black border_none">COD/COP
                                            Payment
                                            Method <span class="tx-danger">*</span></label>
                                        <select id="payment_method" name="payment_method" class="form-control this_save ">
                                            <option disabled="" selected=""></option>
                                            <option value="Cash/Certified Funds">Cash/Certified Funds</option>
                                            <option value="Check">Check</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control -label font-boldd tx-black border_none">COD/COP
                                            Location
                                            <span class="tx-danger">*</span></label>
                                        <select id="cod_cop_loc" name="cod_cop_loc" class="form-control this_save ">
                                            <option disabled="" selected=""></option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="Delivery">Delivery</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="label font-boldd tx-black">Balance
                                        Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-usd tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input class="form-control this_save " type="text" name="balance" value="" readonly="" placeholder="" id="balAmount">
                                    </div>
                                </div>

                                <div id="balPart" style="display:none">
                                    <div class="form-group">
                                        <label class="form-control -label font-boldd tx-black border_none">Balance
                                            Payment
                                            Method <span class="tx-danger">*</span></label>
                                        <select id="balance_method" name="balance_method" class="form-control this_save ">
                                            <option disabled="" selected=""></option>
                                            <option value="Cash">Cash</option>
                                            <option value="Certified Funds">Certified Funds</option>
                                            <option value="Company Check">Company Check</option>
                                            <option value="Comchek">Comchek</option>
                                            <option value="TCH">TCH</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control -label font-boldd tx-black border_none">Balance
                                            Payment
                                            Time <span class="tx-danger">*</span></label>
                                        <select id="balance_time" name="balance_time" class="form-control this_save ">
                                            <option disabled="" selected=""></option>
                                            <option value="Immediately">Immediately</option>
                                            <option value="2 Business Days (Quick Pay)">2 Business Days (Quick
                                                Pay)
                                            </option>
                                            <option value="5 Business Days">5 Business Days</option>
                                            <option value="10 Business Days">10 Business Days</option>
                                            <option value="15 Business Days">15 Business Days</option>
                                            <option value="30 Business Days">30 Business Days</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control -label font-boldd tx-black border_none">Balance
                                            Payment
                                            Terms Begin On <span class="tx-danger">*</span></label>
                                        <select id="terms" name="terms" class="form-control this_save ">
                                            <option disabled="" selected=""></option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="Delivery">Delivery</option>
                                            <option value="Receiving a Signed Bill of Lading border_none">Receiving
                                                a Signed
                                                Bill of Lading *
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="col-lg-12" id="alertMSG">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label font-boldd border_none">ADDITIONAL INFORMATION</label>
                                    <textarea id="additional_2" name="additional_2" rows="8" class="form-control this_save " placeholder="Enter any special instructions, notes from customer or details regarding this shipment..."></textarea>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-left">

                        <a href="javascript:void(0)" id='newCust' class="btn btn-primary this_save">New Customer Order</a>
                        <a href="javascript:void(0)" id='oldCust' class="btn btn-primary this_save">Old Customer Order</a>

                        <button type="submit" id="saveBtn" onclick="validate()" name="saveBtn" style="border: 1px solid;" class="btn btn-outline-primary mg-l-20 float-right">Save
                        </button>
                    </div>
                    <div class="col-lg-12" id="payCondition"></div>
                </div>
            </div>

        </div>

        <!-- End Row-->
    </div>
    <input type="hidden" name="orderid" id="orderid_find" value="" />
</form>



<div id="alreadyCreditCard" class="modal fade" style="padding-right: 15px;">
    <div class="modal-dialog modal-dialog-vertical-center" role="document" style="width: 100%;">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-30 mg-b-0 tx-uppercase tx-inverse tx-bold">ALREADY HAVE CARD</h6>
            </div>
            <div class="modal-body pd-25 pl-20 pr-20">
                <div class="card card-people-list mg-y-20" id="creditCardInfo">
                    <div class="slim-card-title mb-3">Credit Cards</div>
                    <div class="row" id="creditModal">
                        <div class="col-lg-12">
                            <div class="media-list">
                                <div class="media">
                                    <img src="https://admin.shipa1.com/img/visa.png" style=" margin: 11px; padding: 0px; " alt="">
                                    <div class="media-body">
                                        <a href="javascript:void(0)">test test</a>

                                        <p>XXXXXXXXXXXX9052<br> Order ID: <a href="/history/?id=N3dsTUVnTUtFeUNSdHNVeFR0NjJ0QT09" style="display: unset;color: rgb(0 160 252);" target="_blank">40596</a> <br> Email: <a href="/history/?id=N3dsTUVnTUtFeUNSdHNVeFR0NjJ0QT09"
                                                                                                                                                                                                                         style="display: unset;color: rgb(0 160 252);" target="_blank">test@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal-dialog -->
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


<div class="modal fade " role="dialog" id="modaldemo8" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal__new modal-content modal-content-demo " style=" position: fixed;width: 80vw;transform: translateX(-50%);left: 50%;top: -10px; ">
            <div class="modal-header heading_style">
                <h1 class="heading_style heading_font ">ORDER ON PHONE</h1>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                        <h5 class=" modal_subtitle">Customer Number</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                        <h5 class=" modal_subtitle">Unknown Number</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                        <div class="form-group">



                            <input style=" width: 15px; " name="mainPh" id="yes" type="radio" value="1">
                            <label for="yes" style=" position: relative; top: 0px; font-size: 20px; cursor:pointer; ">Yes</label>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                        <div class="form-group">





                            <input style=" width: 15px; " name="mainPh" id="no" type="radio" value="2">
                            <label for="no" style=" position: relative; top: 0px; font-size: 20px; cursor:pointer; ">No</label>

                        </div>
                    </div>
                </div>
                <form name="createnew" id="createnew_form" action="" method="post">
                    @csrf
                    <div class="row number_no" style='display:none'>
                        <div class="col-lg-12 ">
                            <input type="text" class="form-control " name="custName" id="custName" onfocus="$(this).attr('autocomplete', 'off');" placeholder="Enter Customer Name" onkeypress="showcreatenew();">
                        </div>
                        <div class="col-lg-12 mt-1">
                            <textarea name="addInfo" class="form-control " id="addInfo" cols="5" rows="3" onfocus="$(this).attr('autocomplete', 'off');" placeholder="Enter Additional Info"></textarea>
                        </div>
                    </div>


                    <input type="hidden" name="car_type" value="3" />
                    <div class="row number_yes" style='display:none'>
                        <div class="col-lg-12">
                            <input type="text" class="form-control  ophonev" onkeyup="phone_check(this.value)" onfocus="$(this).attr('autocomplete', 'off');" name="mainPhNum" id="PhNum" placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <br>
                    <a href="#" class="show_hide" data-content="toggle-text">View Previous Order Ids</a>
                    <div id="last_5">

                    </div>

                    <div class="modal-footer">
                        <label id="show_total"></label>
                        <button class="btn btn-indigo" id="update_previous" style="display: none;" type="button">
                            <a href="javascript:;" class="btn-color"
                               onclick="this.href='/searchData?search='+ document.getElementById('PhNum').value">
                                Update Previous
                            </a>

                            <!--
                                <a href="javascript:;"
                                   onclick="this.href='/carrier_add/'+ document.getElementById('order_id1').value"
                                   type="button" target="_blank"
                                   class="btn btn-info btn-sm">UPDATE CARRIER</a>
                                -->


                        </button>
                        <button class="btn btn-indigo" style="display:none" id="create_new" onclick="save_phon()" type="button"> Create New
                        </button>
                        <div class="unknownno_class">

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal" id="reportmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Order History</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form method="post" action="{{route('call_history_post')}}" id="callhistoryform">
                    @csrf
                    <div class="card-title font-weight-bold">New HISTORY/CHANGE
                        STATUS:
                    </div>
                    <div class="row">
                        <input type="hidden" class="form-control" name="order_id1"
                               id='order_id1' placeholder="" value="" readonly>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">CHANGE STATUS</label>
                                <select name="pstatus" id='pstatus' required
                                        class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="1">Interested</option>
                                    <option value="2">FollowMore</option>
                                    <option value="3">AskingLow</option>
                                    <option value="4">NotInterested</option>
                                    <option value="5">NoResponse</option>
                                    <option value="6">TimeQuote</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">EXPECTED DATE</label>
                                <input type="date" required name="expected_date"
                                       id='expected_date'
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="form-group">
                                <label class="form-label">HISTORY</label>
                                <textarea required name="history_update"
                                          id='history_update'
                                          class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12" id="ask_low">

                        </div>

                    </div>
                    <button type="submit" id="savceChanges" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <!-- modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>

<div id="modal_frieght" style="margin-top: 100px" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Select Unit</label>
                        <select name="" id="f_unit" class="form-control">
                            <option value="inch">Inch</option>
                            <option value="feet">Feet</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Length</label>
                        <input type="number" name="length" id="f_length" value="145" placeholder="Enter Length "
                               class="form-control"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Width</label>
                        <input type="number" name="Width" id="f_width" value="75" placeholder="Enter Width"
                               class="form-control"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Height</label>
                        <input type="number" name="Height" id="f_height" value="220" placeholder="Enter Height"
                               class="form-control"/>
                    </div>
                    <div class="col-md-4">
                        <label for="">Weight</label>
                        <input type="number" name="Weight" id="f_weight" value="2350" placeholder="Enter Weight"
                               class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info" onclick="freight_calc()">
                        Calculator
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection @section('extraScript')

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script>
    function history(order_id, ophone) {



        if (!order_id || !ophone) {
            not7();

        } else {

            var url = `/get_last_5_2?phone_no=${btoa(ophone)}&order_id=${btoa(order_id)}`;
            window.open(url, 'Previous Orders',
                'height=400,width=600,left=350,top=250,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No'
            );

        }

    }
    function freight_calc() {
        var length = parseFloat($('#f_length').val());
        var width =  parseFloat($('#f_width').val());
        var height = parseFloat($('#f_height').val());
        var weight = parseFloat($('#f_weight').val());
        var unit =  $('#f_unit').val();
        var answer_1 = (length * height * width).toFixed(4);
        if(unit == 'inch'){
            answer_1 = (answer_1/1728).toFixed(4);
        }
        var fright_class = 0;
        answer_1 = (weight/answer_1).toFixed(4);
        if(answer_1 < 1){
            fright_class = 500;
        }else if(answer_1 >= 1 &&  answer_1 < 2){
            fright_class = 400;
        }else if(answer_1 >= 2 &&  answer_1 < 3){
            fright_class = 300;
        }else if(answer_1 >= 3 &&  answer_1 < 4){
            fright_class = 250;
        }else if(answer_1 >= 4 &&  answer_1 < 5){
            fright_class = 200;
        }else if(answer_1 >= 5 &&  answer_1 < 6){
            fright_class = 175;
        }else if(answer_1 >= 6 &&  answer_1 < 7){
            fright_class = 150;
        }else if(answer_1 >= 7 &&  answer_1 < 8){
            fright_class = 125;
        }else if(answer_1 >= 8 &&  answer_1 < 9){
            fright_class = 110;
        }else if(answer_1 >= 9 &&  answer_1 < 10.5){
            fright_class = 100;
        }else if(answer_1 >= 10.5 &&  answer_1 < 12){
            fright_class = 92.5;
        }else if(answer_1 >= 12 &&  answer_1 < 13.5){
            fright_class = 85;
        }else if(answer_1 >= 13.5 &&  answer_1 < 15){
            fright_class = 77.5;
        }else if(answer_1 >= 15 &&  answer_1 < 22.5){
            fright_class = 70;
        }else if(answer_1 >= 22.5 &&  answer_1 < 30){
            fright_class = 65;
        }else if(answer_1 >= 30 &&  answer_1 < 35){
            fright_class = 60;
        }else if(answer_1 >= 35 &&  answer_1 < 50){
            fright_class = 55;
        }else if(answer_1 >= 50){
            fright_class = 50;
        }
        $('#frieght_class').val(fright_class).trigger('change');
        $('#modal_frieght').modal('hide');

    }
</script>

<script>
    $("#viewCentral").click(function() {
        var user_id = document.cookie.match(/PHPSESSID=[^;]+/);
        var ozip = $("#o_zip1").val();
        var dzip = $("#d_zip1").val();
        var vehType = $("#vehType0").val();
        var numVehicles = $("#addVeh").val();
        var veh = '';
        var condition = $("#condition0").val();
        var trailter = $("#trailter_type0").val();
        var type = $("#vehChkType0").val();
        var get_ses = $("#get_ses").val();
        if (condition == 'operable') {
            condition = '0';
        } else if (condition == 'non-running') {
            condition = '1';
        }
        if (trailter == 'open') {
            trailter = '0';
        } else if (trailter == 'enclosed') {
            trailter = '1';
        }
        if (ozip == '' || dzip == '') {
            alert('Please Enter Origin & Dest City or Zip');
            // toastr.error("Please Enter Origin & Dest City or Zip", "Error");
        } else {
            ozip = ozip.split(", ");
            dzip = dzip.split(", ");
            if (vehType || type) {
                if (vehType == "Car") {
                    veh = "Car";
                } else if (vehType == "motorcycle" || vehType == "3_wheel_sidecar" || vehType == "3_wheel_motorcycle") {
                    veh = "Motorcycle";
                } else if (vehType == "atv") {
                    veh = "ATV";
                } else if (vehType == "SUV" || vehType == "Mid SUV" || vehType == "Large SUV") {
                    veh = "SUV";
                } else if (vehType == "Van" || vehType == "Mini Van" || vehType == "Cargo Van" || vehType == "Passenger Van") {
                    veh = "Van";
                } else if (vehType == "Pickup" || vehType == "Pickup Dually" || vehType == "Box Truck Dually") {
                    veh = "Pickup";
                } else if (type == "other_vehicle" || type == "other_motorcycle") {
                    veh = "Other";
                }
            } else {
                veh = '%2b';
            }
            var url = `https://washington.shawntransport.com/get_web_price?num_vehicles=${numVehicles}&ozip=${ozip[2]}&dzip=${dzip[2]}&enclosed=${trailter}&inop=${condition}&vehicle_types=${veh}&miles=0&${get_ses}`;
            window.open(url, 'Central Dispatch Pricing', 'height=500,width=900,left=180,top=250,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
            window.submit();
        }
        var s = 'PHPSESSID=j1i07pn8bt8ff6caf6r6fca8t2';
        var m = 'PHPSESSID=ptofpmul885flvu4u3lo0q6413';
        if (user_id = s) {
            console.log('Shahzaib');
        } else if (user_id = m) {
            console.log('Mansoor');
        }
    });

    $("#shipa1Rates").click(function() {
        var ozip = $("#o_zip1").val();
        var dzip = $("#d_zip1").val();
        var id = $('#orderid').val();;
        if (ozip == '' || dzip == '') {
            alert('Please Enter Origin & Dest City or Zip');
            // toastr.error("Please Enter Origin & Dest City or Zip", "Error");
        } else {
            ozip = ozip.split(", ");
            dzip = dzip.split(", ");

            var url = `/rates_shipa1?ocity=${btoa(ozip[0])}&dcity=${btoa(dzip[0])}&id=${id}`;
            window.open(url, 'Ship A1 Rates', 'height=400,width=600,left=350,top=250,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
        }
    });

    $("#previousRecord").click(function() {
        var ozip = $("#o_zip1").val();
        var dzip = $("#d_zip1").val();
        if (ozip == '' || dzip == '') {
            alert('Please Enter Origin & Dest City or Zip');
            // toastr.error("Please Enter Origin & Dest City or Zip", "Error");
        } else {
            ozip = ozip.split(", ");
            dzip = dzip.split(", ");
            var url = `/previous-orders?ocity=${btoa(ozip[0])}&dcity=${btoa(dzip[0])}&id={{ \Request::segment(2) }}`;
            window.open(url, 'Previous Orders', 'height=400,width=600,left=350,top=250,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
        }
    });

    $("#previousBookPrice").click(function () {
        var ozip = $("#o_zip1").val();
        var dzip = $("#d_zip1").val();
        if (ozip == '' || dzip == '') {
            alert('Please Enter Origin & Dest City or Zip');
            // toastr.error("Please Enter Origin & Dest City or Zip", "Error");
        } else {
            var url = `/previous-orders2?ocity=${btoa(ozip)}&dcity=${btoa(dzip)}`;
            window.open(url, 'Previous Orders', 'height=700,width=1200,left=150,top=50,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
        }
    });

    function condition_change(val, counter_id) {
        var c_id = counter_id.replace('condition', '');
        if (val === '2') {
            $(`#vehicle_condition${c_id}`).html(`
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">PICK UP</label>
                            <select name="v_con_p[]" id='v_con_p${c_id}'
                                    class="form-control select2 this_save">
                                <option value="1">Folk Lift</option>
                                <option value="2">Man Help</option>
                                <option value="3">Toe</option>
                                <option value="4">Jump Box</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">DELIVERY</label>
                            <select name="v_con_d[]" id="v_con_d${c_id}"
                                    class="form-control select2 this_save">
                                <option value="1">Folk Lift</option>
                                <option value="2">Man Help</option>
                                <option value="3">Toe</option>
                                <option value="4">Jump Box</option>
                            </select>
                        </div>
                    </div>
                `);
        } else {
            $(`#vehicle_condition${c_id}`).html('');
        }
    }

    $('#zipCityDest').click(function(){
        var orderID = $(this).siblings('.orderID').val();
        var ozip = $("#o_zip1").val();
        var dzip = $("#d_zip1").val();
        var vehicleType = $(".vehicle-type option:selected");
        var vyear = $(".vyear");
        var vmake = $(".vmake");
        var vmodel = $(".vmodel");

        // .children('option:selected').val()
        var arr = [];
        $.each(vehicleType,function(){
            arr.push(this.value);
        });
        var arr2 = [];
        var vehicle = '';


        if (ozip == '' || dzip == '' || vyear.val() == '' || vmake.val() == '' || vmodel.val() == '') {
            // alert("Please Enter Origin & Dest City or Zip & vechile detail");
            $(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed;top: 5%;width: 75%;left: 12%;z-index: 9999;">
                  Please Enter Origin & Dest City or Zip & vechile detail
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            `).insertBefore(".page");

        } else {

            if(vyear.length > 1 && vmodel.length > 1 && vmake.length > 1)
            {
                $.each(vyear,function(index){
                    vehicle = this.value + ' ' + vmodel[index].value + ' ' + vmake[index].value;
                    arr2.push(vehicle);
                });
            }
            else{
                vehicle = vyear.val() + ' ' + vmodel.val() + ' ' + vmake.val();
                arr2.push(vehicle);
            }

            var odata = ozip.split(",");
            var ddata = dzip.split(",");

            var ozip1 = odata[2];
            var ocity1 = odata[0];
            var dzip1 = ddata[2];
            var dcity1 = ddata[0];

            var url = `/records_city_zip_destination?ocity=${ocity1}&dcity=${dcity1}&ozip=${ozip1}&dzip=${dzip1}&vehicle=${arr}&vehicleName=${arr2}&orderID${orderID}`;
            window.open(url, 'View Previous Prices', 'height=800,width=1000,left=150,top=100,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');

        }

    });



    $(document).ready(function() {
        $("#last_5").hide();
        $(".show_hide").hide();
        $(".show_hide").on("click", function() {
            var txt = $("#last_5").is(':visible') ? 'View Previous Order Ids' : 'Hide Previous Order Ids';
            $(".show_hide").text(txt);
            $(this).next('#last_5').slideToggle(200);
        });
    });
    setTimeout(function() {
        document.body.style.zoom = "95%";
    }, 500);


    $("body").delegate(".ui-menu", "click", function() {
        $(".ui-menu").html('');
    });


    //            $(document).ready(function(){
    //                $('input').attr('autocomplete', 'off');
    //                $('#o_zip1').attr('autocomplete', 'on');
    //                $('#daddress2').attr('autocomplete', 'on');
    //            });

    $(document).ready(function() {
        //            $("input").autocomplete({
        //                disabled: true
        //            });
        $('input').attr('autocomplete', 'of');
        //            $('#o_zip1').attr('autocomplete', 'on');
        //            $('#daddress2').attr('autocomplete', 'on');

    });


    $("#viewCentral").click(function() {

        var ozip = $("#o_zip").val();
        var dzip = $("#d_zip").val();
        var vehType = $("#vehType0").val();
        var numVehicles = $("#count0").val();
        var veh = '';
        var condition = $("#condition0").val();
        var trailter = $("#trailter_type0").val();
        var type = $("#vehChkType0").val();
        var get_ses = $("#get_ses").val();

        if (condition == 'operable') {
            condition = '0';
        } else if (condition == 'non-running') {
            condition = '1';
        }
        if (trailter == 'open') {
            trailter = '0';
        } else if (trailter == 'enclosed') {
            trailter = '1';
        }

        if (ozip == '' || dzip == '' || vehType == '' || condition == '' || trailter == '') {
            document.getElementById("o_zip1").focus();
            document.getElementById("d_zip1").focus();

            $("#o_zip1").addClass("border_bottom_color");
            $("#d_zip1").addClass("border_bottom_color");
            $("#condition0").addClass("border_bottom_color");
            $("#trailer_type0").addClass("border_bottom_color");

        } else {
            ozip = ozip.split(",");
            dzip = dzip.split(",");
            if (vehType || type) {

                if (vehType == "Car") {
                    veh = "Car";
                } else if (vehType == "motorcycle" || vehType == "3_wheel_sidecar" || vehType == "3_wheel_motorcycle") {
                    veh = "Motorcycle";
                } else if (vehType == "atv") {
                    veh = "ATV";
                } else if (vehType == "SUV" || vehType == "Mid SUV" || vehType == "Large SUV") {
                    veh = "SUV";
                } else if (vehType == "Van" || vehType == "Mini Van" || vehType == "Cargo Van" || vehType == "Passenger Van") {
                    veh = "Van";
                } else if (vehType == "Pickup" || vehType == "Pickup Dually" || vehType == "Box Truck Dually") {
                    veh = "Pickup";
                } else if (type == "other_vehicle" || type == "other_motorcycle") {
                    veh = "Other";
                }
            } else {
                veh = '%2b';
            }
            // var url = `https://www.centraldispatch.com/protected/cargo/sample-prices-lightbox?num_vehicles=${numVehicles}&ozip=${ozip[2]}&dzip=${dzip[2]}&enclosed=${trailter}&inop=${condition}&vehicle_types=${veh}&miles=0&${get_ses}`;
            var url = `https://washington.shawntransport.com/get_web_price?num_vehicles=${numVehicles}&ozip=${ozip[2]}&dzip=${dzip[2]}&enclosed=${trailter}&inop=${condition}&vehicle_types=${veh}&miles=0&${get_ses}`;
            window.open(url, 'Central Dispatch Pricing', 'height=600,width=900,left=250,top=250,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
        }
    });

    function not7() {
        notif({
            type: "warning",
            msg: "This Field is required!",
            position: "center",
            opacity: 0.8
        });
    }

    $("#driverPrice").on('keyup',function(){
        var price = $(this);
        $.ajax({
            url:"{{ url('/offer-price/get_commission') }}",
            type:"GET",
            data:{price:price.val()},
            dataType:"JSON",
            success:function(res)
            {
                price.siblings('.alert').remove();
                if(res.data)
                {
                    var newprice = parseInt(price.val()) + parseInt(res.data.commission_price);
                    price.after(`
                            <div class="alert alert-success mt-3 py-1 position-relative">
                                <i class="fa fa-caret-down text-success" aria-hidden="true" style="transform: rotate(180deg);position: absolute;top: -17px;font-size: 24px;"></i>
                                $${newprice}
                            </div>
                        `);
                }
            }
        })
    })

    function validate() {
        var oname = document.forms["valid_form"]["oname"];
        var oaddress = document.forms["valid_form"]["oaddress"];
        // var dname = document.forms["valid_form"]["dname"];
        // var oterminal = document.forms["valid_form"]["oterminal"];
        // var dterminal = document.forms["valid_form"]["dterminal"];
        // var dphone = document.forms["valid_form"]["dphone"];
        var o_zip1 = document.forms["valid_form"]["o_zip1"];
        var d_zip1 = document.forms["valid_form"]["d_zip"];
//            var oemail = document.forms["valid_form"]["oemail"];
        var ophone = document.forms["valid_form"]["ophone"];
        var daddress = document.forms["valid_form"]["daddress"];
        var orderPrice = document.forms["valid_form"]["orderPrice"];
        var driverPrice = document.forms["valid_form"]["driverPrice"];
        var startPrice = document.forms["valid_form"]["startPrice"];
        var approval_reason = document.forms["valid_form"]["approval_reason"];

        var year = $('[id^=year]');
        var make = $('[id^=make]');
        var model = $('[id^=model]');
        var valValidate = 0;
        year.each(function(index,item){
            if(!$(year[index]).val()){
                $(year[index]).css("border-color", "#ff0b00");
                valValidate = valValidate + 1;
            }
            if(!$(make[index]).val()){
                $(make[index]).css("border-color", "#ff0b00");
                valValidate = valValidate + 1;

            }
            if(!$(model[index]).val()){
                $(model[index]).css("border-color", "#ff0b00");
                valValidate = valValidate + 1;

            }
//                if(!$(vehType[index]).val())
//                    $(vehType[index]).prev().css("color", "#ff0b00");
//                if(!$(condition[index]).val())
//                    $(condition[index]).prev().css("color", "#ff0b00");
//                if(!$(trailter_type[index]).val())
//                    $(trailter_type[index]).prev().css("color", "#ff0b00");

            // if($(v_con_p[index]).is(":visible")) {
            //     if (!$(v_con_p[index]).val())
            //         $(v_con_p[index]).css("border-color", "#ff0b00");
            // }


        });
        // var v_con_p =  $('[id^=v_con_p]');
        // var vehType =  $('[id^=vehType]');
        // var condition =  $('[id^=condition]');
        // var trailter_type =  $('[id^=trailter_type]');

        if (!oname.value) {
            $("#oname").css("border-color", "#ff0b00");
            valValidate = valValidate + 1;
        }
        if (!oaddress.value) {
            $("#oaddress").css("border-color", "#ff0b00");
            valValidate = valValidate + 1;
        }
//            if (!dname.value) {
//                $("#dname").css("border-color", "#ff0b00");
//            }
        // if (!dphone.value) {
        //     $("#dphone").css("border-color", "#ff0b00");
        // }
        if (!o_zip1.value) {
            $("#o_zip1").css("border-color", "#ff0b00");
            valValidate = valValidate + 1;
        }
        if (!d_zip1.value) {
            $("#d_zip1").css("border-color", "#ff0b00");
            valValidate = valValidate + 1;
        }
//            if (!oemail.value) {
//                $("#oemail").css("border-color", "#ff0b00");
//            }
        if (!ophone.value) {
            $("#ophone").css("border-color", "#ff0b00");
            valValidate = valValidate + 1;
        }
        if (!daddress.value) {
            $("#daddress").css("border-color", "#ff0b00");
            valValidate = valValidate + 1;
        }
        // if (!oterminal.value) {
        //     $(".oterminallabel").css("color", "#ff0b00");
        // }
        // if (!dterminal.value) {
        //     $(".dterminallabel").css("color", "#ff0b00");
        // }
        if(orderPrice)
        {
            if (!orderPrice.value) {
                $("#orderPrice").css("border-color", "#ff0b00");
                valValidate = valValidate + 1;
            }
        }
        if(driverPrice)
        {
            if (!driverPrice.value) {
                $("#driverPrice").css("border-color", "#ff0b00");
                valValidate = valValidate + 1;
            }
        }
        if(startPrice)
        {
            if (!startPrice.value) {
                $("#startPrice").css("border-color", "#ff0b00");
                valValidate = valValidate + 1;
            }
        }
//            if($(payment_method).is(":visible")) {
//                if (!payment_method.value) {
//                    $("#payment_method").css("border-color", "#ff0b00");
//                }
//            }
//            if($(cod_cop_loc).is(":visible")) {
//                if (!cod_cop_loc.value) {
//                    $("#cod_cop_loc").css("border-color", "#ff0b00");
//                }
//            }
        // $("#carrier_status_2").parent('label').siblings('.text-danger').remove();
        if($("select[name='pstatus']").children('option:selected').val() >= 7)
        {
            // if($("#carrier_status_1").is(":checked") || $("#carrier_status_2").is(":checked"))
            // {
            // }
            // else
            // {
            //     $("#carrier_status_2").parent('label').after(`
            //         <div class="text-danger">This field is required!</div>
            //     `);
            //     valValidate = valValidate + 1;
            // }
            if(approval_reason)
            {
                if (!approval_reason.value) {
                    $("#pay_later_op_reason").css("border-color", "#ff0b00");
                    valValidate = valValidate + 1;
                }
            }
        }
        if(valValidate > 0)
        {
            $(window).scrollTop(0);
            return true;
        }
        return false;
    }

    function my_func(get) {
        var model = $(`#model${get}`).val();
        var make = $(`#makeOpt${get}`).val();
        var year = $(`#year${get}`).val();
        if (model.length >= 0 || make.length >= 0 || year.length >= 0) {
            $(`#googleimage${get}`).show();
        } else {
            $(`#googleimage${get}`).hide();
        }
    }

    function googl(get) {
        var model = $(`#model${get}`).val();
        var make = $(`#makeOpt${get}`).val();
        var year = $(`#year${get}`).val();
        var url = (`http://images.google.com/images?q=${year}+${make}+${model}`);
        window.open(url, 'GoogleImg', 'width=800,height=600,left=250,top=50, toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
    }

    $("#payCarrier").on("keypress", function(evt) {
        if (evt.which < 48 || evt.which > 57) {
            evt.preventDefault();
        }
    });
    $("#copcodAmount").on("keypress", function(evt) {
        if (evt.which < 48 || evt.which > 57) {
            evt.preventDefault();
        }
    });
    $("#orderPrice").on("keypress", function(evt) {
        if (evt.which < 48 || evt.which > 57) {
            evt.preventDefault();
        }
    });
    $("#startPrice").on("keypress", function(evt) {
        if (evt.which < 48 || evt.which > 57) {
            evt.preventDefault();
        }
    });

    function payCondition() {
        var data = `<div class="row">
             <input type="hidden" class="this_save" id="customer_status" name="customer_status" value="1">
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond1"  type="radio" value="1">
                                <span>COD / COP</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond2" type="radio" value="2" >
                                <span>Pay With Email</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond3" type="radio" value="3" >
                                <span>Pay Now</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond4" type="radio" value="4" >
                                <span>Pay Later</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row" id="payConf"></div>
                <div class="row" id="emailRequired"></div>
                <div class="row" id="pay_late"></div>
                <div class="row" id="pay_late_reason"></div>

                <div class="row" id="submitData" style="display:none">
                   <div class="col-lg-12">
                        <button type="button" id="clickToSubmit" onclick="validate()" name="neworderpay1" value="neworderpay1" class="btn btn-primary"></button>
						<input type="hidden" value="0" name="neworderpay_btn" id="neworderpay_btn">
						<input type="hidden" value="0" name="continuetopay_btn" id="continuetopay_btn">
                    </div>
                </div>
                `;

        return data;
    }

    function payConditionJS() {
        $("#pay_cond1").click(function() {
            $("#saveBtn").html('Save');
            $("#continuetopay_btn").val(0);
            $("#continuetopayold_btn").val(0);
            $("#payConf").html(`
                        <div class="col-lg-12">
                            <div class="form-group">

                                <label class="section-title mt-3">Payment Confirm <span class="tx-danger">*</span></label>

                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">

                                <label class="rdiobox">
                                    <input class="this_save" name="pay_confirm" id="payment_cond1" type="radio" value="1" required >
                                    <span>Yes</span>
                                </label>

                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">

                                <label class="rdiobox">
                                    <input class="this_save" name="pay_confirm" id="payment_cond2" type="radio" value="0" >
                                    <span>No</span>
                                </label>

                            </div>
                        </div>
                `);
            $("#submitData").show();
            $("#emailRequired").html(`
                    <div class="col-lg-4">
                        <div class="form-group">

                            <label class="form-control this_save -label font-boldd tx-black">Email Address <span class="tx-danger">*</span></label>
                            <input required class="form-control this_save " autocomplete="nope" type="email" name="oemail2" id="oemail2" value="" >


                        </div>
                    </div>
                 `);
            $("#clickToSubmit").html('Submit');
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
            $('#pay_late').html('');
        });

        $("#pay_cond2").click(function() {
            $("#saveBtn").html('Save');
            $("#continuetopay_btn").val(0);
            $("#continuetopayold_btn").val(0);
            $("#payConf").html('');
            $("#submitData").show();
            $("#emailRequired").html(`
                <div class="col-lg-4">
                    <div class="form-group">

                        <label class="form-control this_save -label font-boldd tx-black">Email Address <span class="tx-danger">*</span></label>
                        <input required class="form-control this_save " autocomplete="nope" type="email" name="oemail2" id="oemail2" value="" >

                    </div>
                </div>
                `);
            $("#clickToSubmit").html('Submit');
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
            $('#pay_late').html('');
        });

        $("#pay_cond3").click(function() {
            $("#saveBtn").html('Next');
            $("#payConf").html('');
            $("#submitData").show();
            $("#emailRequired").html('');
            $("#clickToSubmit").html('Continue To Payment');
            $("#continuetopay_btn").val(1);
            $("#continuetopayold_btn").val(1);
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
            $('#pay_late').html('');
        });

        $("#pay_cond4").click(function() {
            $("#saveBtn").html('Save');
            // $("#pay_late").html(`<div class="col-lg-2 mt-4">
            //         <div class="form-group">
            //             <label class="rdiobox">
            //                 <input class="this_save" checked name="pstatus" id="pay_later1" type="radio" value="7" >
            //                 <span>Payment Missing</span>
            //             </label>
            //         </div>
            //     </div>
            //     <div class="col-lg-2 mt-4">
            //         <div class="form-group">
            //             <label class="rdiobox">
            //                 <input class="this_save" name="pstatus" id="pay_later2" type="radio" value="18" >
            //                 <span>On Approval</span>
            //             </label>
            //         </div>
            //     </div>`);

            $("#pay_late").html(`
                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <label class="rdiobox form-label">Select the Status</label>
                            <select name="pstatus" class="form-control" id="pay_later1">
                                <option selected disabled value="0">Select the Status</option>
                                <option value="7">Payment Missing</option>
                                <option value="18">On Approval</option>
                            </select>
                        </div>
                    </div>
                `);
            $("#continuetopay_btn").val(0);
            $("#continuetopayold_btn").val(0);
            $("#submitData").show();
            $("#emailRequired").html('');
            $("#clickToSubmit").html('Submit');
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
        });


        // $("body").delegate("#pay_later1", "click", function() {
        //     $("#saveBtn").html('Save');
        //     $("#pay_late_reason").html('');
        //     $("#continuetopay_btn").val(0);
        //     $("#continuetopayold_btn").val(0);
        //     $("#submitData").show();
        //     $("#emailRequired").html('');
        //     $("#clickToSubmit").html('Submit');
        //     var email = $("#oemail").val();
        //     $("#oemail2").val(email);

        //     $("#oemail2").change(function() {
        //         $("#oemail").val($(this).val());
        //     });
        // });


        // $("body").delegate("#pay_later2", "click", function() {
        //     $("#pay_late_reason").html(`<div class="col-lg-2 mt-4">
        //             <div class="form-group">
        //                 <label class="rdiobox">
        //                     <span>Reason</span>
        //                     <input class="this_save form-control" name="approval_reason" id="pay_later_op_reason" type="text" value="">
        //                 </label>
        //             </div>
        //         </div>`);
        //     $("#continuetopay_btn").val(0);
        //     $("#continuetopayold_btn").val(0);
        //     $("#submitData").show();
        //     $("#emailRequired").html('');
        //     var email = $("#oemail").val();
        //     $("#oemail2").val(email);

        //     $("#oemail2").change(function() {
        //         $("#oemail").val($(this).val());
        //     });
        // });

        $("body").delegate("#pay_later1", "change", function () {
            if($("#pay_later1").val() == "18")
            {
                $("#pay_late_reason").html(`<div class="col-lg-8 mt-4">
                            <div class="form-group">
                                <label class="rdiobox form-label">
                                    <span>Reason</span>
                                    <input class="this_save form-control" name="approval_reason" required onkeyup="$('#order_history').val(this.value)" id="pay_later_op_reason" type="text" value="">
                                </label>
                            </div>
                        </div>`);
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#submitData").show();
                $("#emailRequired").html('');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function() {
                    $("#oemail").val($(this).val());
                });
            }
            if($("#pay_later1").val() == "7")
            {
                $("#pay_late_reason").html(`<div class="col-lg-8 mt-4">
                            <div class="form-group">
                                <label class="rdiobox form-label">
                                    <span>Reason</span>
                                    <input class="this_save form-control" name="approval_reason" required onkeyup="$('#order_history').val(this.value)" id="pay_later_op_reason" type="text" value="">
                                </label>
                            </div>
                        </div>`);
                $("#saveBtn").html('Save');
                // $("#pay_late_reason").html('');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#submitData").show();
                $("#emailRequired").html('');
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function() {
                    $("#oemail").val($(this).val());
                });
            }
        });


        $("#clickToSubmit").click(function() {
            if(validate() === true)
            {

            }
            else
            {
                $("#neworderpay_btn").val(1);
                $("#form").submit();
            }

        });

    }

    function oldPayCondition() {
        var data = `
                 <input type="hidden" class="this_save" id="customer_status" name="customer_status" value="0">
                <div class="row">
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond1" type="radio" value="1" >
                                <span>COD / COP</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond2" type="radio" value="2" >
                                <span>Pay With Email</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-3 mt-4">
                        <div class="form-group">

                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond3" type="radio" value="3" >
                                <span>Pay Now/Already Have Card</span>
                            </label>

                        </div>
                    </div>
                    <div class="col-lg-2 mt-4">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="pay_cond" id="pay_cond4" type="radio" value="4" >
                                <span>Pay Later</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row" id="sendEmailConf"></div>
                <div class="row" id="payConf"></div>
                <div class="row" id="pay_late"></div>
                <div class="row" id="pay_late_reason"></div>
                <div class="row" id="emailRequired"></div>

                <div class="row" id="submitData" style="display:none">
                    <div class="col-lg-12">
                        <!--<button type="submit" id="clickToSubmit"  onclick="validate()" class="btn btn-primary"></button>-->
						<button type="button" id="clickToSubmit"  onclick="validate()" name="neworderpay1" value="neworderpay1" class="btn btn-primary"></button>
						<input type="hidden" value="0" name="neworderpay_btn" id="neworderpay_btn">
						<input type="hidden" value="0" name="continuetopayold_btn" id="continuetopayold_btn">

                    </div>
                </div>
                `;

        return data;
    }

    function oldPayConditionJS() {
        $("#pay_cond1").click(function() {
            $("#saveBtn").html('Save');
            $("#continuetopay_btn").val(0);
            $("#continuetopayold_btn").val(0);
            $("#payConf").html(`
                <div class="col-lg-12">
                    <div class="form-group">

                        <label class="section-title mt-3">Payment Confirm <span class="tx-danger">*</span></label>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">

                        <label class="rdiobox">
                            <input class="this_save" name="pay_confirm" id="payment_cond1" type="radio" value="1" required >
                            <span>Yes</span>
                        </label>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">

                        <label class="rdiobox">
                            <input class="this_save" name="pay_confirm" id="payment_cond2" type="radio" value="0" >
                            <span>No</span>
                        </label>

                    </div>
                </div>`);

            $("#sendEmailConf").html(`
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label class='section-title mt-3'>Send Email <span class='tx-danger'>*</span></label>
                                </div>
                            </div>
                            <div class='col-lg-2'>
                                <div class='form-group'>

                                    <label class='rdiobox'>
                                        <input class='this_save' name='confirm1' onchange='' type='radio' value='1' required>
                                        <span>Yes</span>
                                    </label>

                                </div>
                            </div>
                            <div class='col-lg-2'>
                                <div class='form-group'>
                                    <label class='rdiobox'>
                                        <input class='this_save' name='confirm1' onchange='' type='radio' value='0'>
                                        <span>No</span>
                                    </label>

                                </div>
                            </div>`);


            $("#submitData").show();
            $("#emailRequired").html(`
                <div class='col-lg-4'>
                    <div class='form-group'>

                        <label class='form-control this_save -label font-boldd tx-black' id='emailAddrTxt'>Email Address <span class='tx-danger'>*</span></label>
                        <input required class='form-control this_save ' autocomplete='nope' type='text' name='oemail2' id='oemail2' value='' >

                    </div>
                </div>`);


            $("#clickToSubmit").html('Submit');
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
            $('#pay_late').html('');
        });


        $("#clickToSubmit").click(function() {
            if(validate() === true)
            {

            }
            else
            {
                $("#neworderpay_btn").val(1);
                $("#form").submit();
            }
        });

        $("#pay_cond2").click(function() {
            $("#saveBtn").html('Save');
            $("#continuetopay_btn").val(0);
            $("#continuetopayold_btn").val(0);
            $("#sendEmailConf").html('');
            $("#submitData").show();
            $("#payConf").html('');
            $("#emailRequired").html(`
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control this_save -label font-boldd tx-black" id="emailAddrTxt">Email Address <span class="tx-danger">*</span></label>
                    <input required class="form-control this_save " autocomplete="nope" type="text" name="oemail2" id="oemail2" value="" >
                    </div>
                    </div>`);
            $("#clickToSubmit").html('Submit');
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
            $('#pay_late').html('');
        });

        $("#pay_cond3").click(function() {
            $("#saveBtn").html('Save');
            $("#sendEmailConf").html('');
            $("#submitData").show();
            $("#payConf").html('');
            $("#emailRequired").html('');
            $("#clickToSubmit").html('Continue To Payment');
            $("#continuetopay_btn").val(1);
            $("#continuetopayold_btn").val(1);
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
            $('#pay_late').html('');
        });

        // $("body").delegate("#pay_later1", "click", function() {
        //     $("#saveBtn").html('Save');
        //     $("#pay_late_reason").html('');
        //     $("#continuetopay_btn").val(0);
        //     $("#continuetopayold_btn").val(0);
        //     $("#submitData").show();
        //     $("#emailRequired").html('');
        //     $("#clickToSubmit").html('Submit');
        //     var email = $("#oemail").val();
        //     $("#oemail2").val(email);

        //     $("#oemail2").change(function() {
        //         $("#oemail").val($(this).val());
        //     });
        // });


        // $("body").delegate("#pay_later2", "click", function() {
        //     $("#pay_late_reason").html(`<div class="col-lg-2 mt-4">
        //             <div class="form-group">
        //                 <label class="rdiobox">
        //                     <span>Reason</span>
        //                     <input class="this_save form-control" name="approval_reason" id="pay_later_op_reason" type="text" value="">
        //                 </label>
        //             </div>
        //         </div>`);
        //     $("#continuetopay_btn").val(0);
        //     $("#continuetopayold_btn").val(0);
        //     $("#submitData").show();
        //     $("#emailRequired").html('');
        //     var email = $("#oemail").val();
        //     $("#oemail2").val(email);

        //     $("#oemail2").change(function() {
        //         $("#oemail").val($(this).val());
        //     });
        // });


        $("body").delegate("#pay_later1", "change", function () {
            if($("#pay_later1").val() == "18")
            {
                $("#pay_late_reason").html(`<div class="col-lg-8 mt-4">
                            <div class="form-group">
                                <label class="rdiobox form-label">
                                    <span>Reason</span>
                                    <input class="this_save form-control" name="approval_reason" required onkeyup="$('#order_history').val(this.value)" id="pay_later_op_reason" type="text" value="">
                                </label>
                            </div>
                        </div>`);
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#submitData").show();
                $("#emailRequired").html('');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function() {
                    $("#oemail").val($(this).val());
                });
            }
            if($("#pay_later1").val() == "7")
            {
                $("#pay_late_reason").html(`<div class="col-lg-8 mt-4">
                            <div class="form-group">
                                <label class="rdiobox form-label">
                                    <span>Reason</span>
                                    <input class="this_save form-control" name="approval_reason" required onkeyup="$('#order_history').val(this.value)" id="pay_later_op_reason" type="text" value="">
                                </label>
                            </div>
                        </div>`);
                $("#saveBtn").html('Save');
                // $("#pay_late_reason").html('');
                $("#continuetopay_btn").val(0);
                $("#continuetopayold_btn").val(0);
                $("#submitData").show();
                $("#emailRequired").html('');
                $("#clickToSubmit").html('Submit');
                var email = $("#oemail").val();
                $("#oemail2").val(email);

                $("#oemail2").change(function() {
                    $("#oemail").val($(this).val());
                });
            }
        });

        $("#pay_cond4").click(function() {
            // $("#saveBtn").html('Save');
            // $("#pay_late").html(`<div class="col-lg-2 mt-4">
            //         <div class="form-group">
            //             <label class="rdiobox">
            //                 <input class="this_save" name="pstatus" id="pay_later1" type="radio" value="7" >
            //                 <span>Payment Missing</span>
            //             </label>
            //         </div>
            //     </div>
            //     <div class="col-lg-2 mt-4">
            //         <div class="form-group">
            //             <label class="rdiobox">
            //                 <input class="this_save" name="pstatus" id="pay_later2" type="radio" value="18" >
            //                 <span>On Approval</span>
            //             </label>
            //         </div>
            //     </div>`);
            $("#pay_late").html(`
                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <label class="rdiobox form-label">Select the Status</label>
                            <select name="pstatus" class="form-control" id="pay_later1">
                                <option selected disabled value="0">Select the Status</option>
                                <option value="7">Payment Missing</option>
                                <option value="18">On Approval</option>
                            </select>
                        </div>
                    </div>
                `);
            $("#continuetopay_btn").val(0);
            $("#continuetopayold_btn").val(0);
            $("#payConf").html('');
            $("#submitData").show();
            $("#emailRequired").html('');
            $("#clickToSubmit").html('Submit');
            var email = $("#oemail").val();
            $("#oemail2").val(email);

            $("#oemail2").change(function() {
                $("#oemail").val($(this).val());
            });
        });

        $("#clickToSubmit").click(function() {
            $("#selecttype").modal('hide');
            $("#manualOrder").attr('action', 'post.php');
            $("#manualOrder").submit();
        });
    }

    function sendConf(val) {
        if (val == 2) {
            $("#oemail2").removeAttr('required');
            $("#emailAddrTxt").html('Email Address');
        } else {
            $("#oemail2").attr('required', 'required');
            $("#emailAddrTxt").html('Email Address <span class="tx-danger">*</span>');
        }
    }

    $("#newCust").click(function() {
        $('#customer_status').trigger('change');
        $("#payCondition").html('');
        $("#payCondition").html(payCondition());
        payConditionJS();
    });

    $("#oldCust").click(function() {
        $('#customer_status').trigger('change');
        $("#payCondition").html('');
        $("#payCondition").html(oldPayCondition());
        oldPayConditionJS();
    });

    $("#payCarrier").change(function() {
        var pay = $(this).val();
        var copcod = $("#copcodAmount").val();
        var payMethod = $("#payment_method").val();
        var codcoploc = $("#cod_cop_loc").val();
        if (!copcod) {
            $("#balAmount").val(pay);
        }
        var balTime = $("#balance_time").val();
        var balTerms = $("#terms").val();
        var balMethod = $("#balance_method").val();
        var bal = pay - copcod;
        $("#balPart").hide();
        $("#balPart").show();
        if (balTime || balTerms || balMethod) {
            if (copcod > 0) {
                $("#balAmount").val(Math.abs(bal));
                $("#copcodPart").hide();
                $("#copcodPart").show();
                if (pay < copcod) {
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert"> The carrier will receive $
                            <span class="font-boldd">${copcod}</span>
                             </div>`);
                    }
                    $("#alertMSG").html('');
                    if (balTime && balTerms && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                    } else if (balTime && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                    } else {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                    }
                } else if (pay > copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    if (balTime && balTerms && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                    } else if (balTime && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                    } else {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                    }
                }
                if (bal < 0) {
                    $("#balAmount").val(Math.abs(bal));
                    $("#copcodPart").hide();
                    $("#copcodPart").show();
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    if (balTime && balTerms && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                    } else if (balTime && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                    } else {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                    }
                }
            } else {
                $("#balAmount").val(pay);
                $("#alertMSG").html('');
                $("#copcodPart").hide();
                if (balTime && balTerms && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                } else if (balTime && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                } else if (balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                } else {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
            }
            if (bal == 0) {
                $("#copcodPart").hide();
                $("#copcodPart").show();
                $("#balPart").hide();
                $("#balAmount").val(0);
                if (payMethod && codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else if (payMethod) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                            </div>`);
                } else if (codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span>.
                            </div>`);
                }
            }
            if (pay && !copcod) {
                $("#alertMSG").html('');
                if (balTime && balTerms && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${pay}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                } else if (balTime && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${pay}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                } else {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${pay}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                }
            }
        } else {
            if (copcod > 0) {
                $("#balAmount").val(Math.abs(bal));
                $("#copcodPart").hide();
                $("#copcodPart").show();
                if (pay < copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                } else if (pay > copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
                if (bal < 0) {
                    $("#balAmount").val(Math.abs(bal));
                    $("#copcodPart").hide();
                    $("#copcodPart").show();
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            The carrier will pay you $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
            } else {
                $("#balAmount").val(pay);
                $("#alertMSG").html('');
                $("#copcodPart").hide();
                if (balTime && balTerms && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                } else if (balTime && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                } else if (balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                } else {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
            }
            if (bal == 0) {
                $("#copcodPart").hide();
                $("#copcodPart").show();
                $("#balPart").hide();
                $("#balAmount").val(0);
                if (payMethod && codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else if (payMethod) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                            </div>`);
                } else if (codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span>.
                            </div>`);
                }
            }
            if (pay && !copcod) {
                $("#alertMSG").html('');
                $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${pay}</span>.
                        </div>`);
            }
        }
        if (!pay && !copcod) {
            $("#alertMSG").html('');
            $("#balAmount").val(0);
            $("#copcodPart").hide();
        }
        setTimeout(function() {
            if (jQuery("#copcodPart").css('display') === 'none') {
                //condition
                $("#payment_method").prop('required', false);
                $("#cod_cop_loc").prop('required', false);
            } else if (jQuery("#copcodPart").css('display') === 'block') {
                $("#payment_method").prop('required', true);
                $("#cod_cop_loc").prop('required', true);
            } else {
                $("#payment_method").prop('required', true);
                $("#cod_cop_loc").prop('required', true);
            }
            if (jQuery("#balPart").css('display') === 'none') {
                //condition
                $("#balance_method").prop('required', false);
                $("#balance_time").prop('required', false);
                $("#terms").prop('required', false);
            } else if (jQuery("#balPart").css('display') === 'block') {
                $("#balance_method").prop('required', true);
                $("#balance_time").prop('required', true);
                $("#terms").prop('required', true);
            } else {
                $("#balance_method").prop('required', false);
                $("#balance_time").prop('required', false);
                $("#terms").prop('required', false);
            }
        }, 1000)
    });

    $("#copcodAmount").change(function() {
        var copcod = $(this).val();
        var pay = $("#payCarrier").val();
        var payMethod = $("#payment_method").val();
        var codcoploc = $("#cod_cop_loc").val();
        var bal = pay - copcod;
        var balTime = $("#balance_time").val();
        var balTerms = $("#terms").val();
        var balMethod = $("#balance_method").val();
        $("#balPart").hide();
        $("#balPart").show();
        if (balTime || balTerms || balMethod) {
            if (copcod > 0) {
                $("#balAmount").val(Math.abs(bal));
                $("#copcodPart").hide();
                $("#copcodPart").show();
                if (pay < copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    if (balTime && balTerms && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                    } else if (balTime && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                    } else {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                    }
                } else if (pay > copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    if (balTime && balTerms && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                    } else if (balTime && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                    } else {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                    }
                }
                if (bal < 0) {
                    $("#balAmount").val(Math.abs(bal));
                    $("#copcodPart").hide();
                    $("#copcodPart").show();
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    if (balTime && balTerms && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            The carrier will pay you $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                    } else if (balTime && balMethod) {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            The carrier will pay you $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                    } else {
                        $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            The carrier will pay you $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                    }
                }
            } else {
                $("#balAmount").val(pay);
                $("#alertMSG").html('');
                $("#copcodPart").hide();
                if (balTime && balTerms && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                } else if (balTime && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                } else if (balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                } else {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
            }
            if (bal == 0) {
                $("#copcodPart").hide();
                $("#copcodPart").show();
                $("#balPart").hide();
                $("#balAmount").val(0);
                if (payMethod && codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else if (payMethod) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                            </div>`);
                } else if (codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span>.
                            </div>`);
                }
            }
        } else {
            if (copcod > 0) {
                $("#balAmount").val(Math.abs(bal));
                $("#copcodPart").hide();
                $("#copcodPart").show();
                if (pay < copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                } else if (pay > copcod) {
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
                if (bal < 0) {
                    $("#balAmount").val(Math.abs(bal));
                    $("#copcodPart").hide();
                    $("#copcodPart").show();
                    $("#alertMSG").html('');
                    if (payMethod && codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else if (payMethod) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                                </div>`);
                    } else if (codcoploc) {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                                </div>`);
                    } else {
                        $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                    The carrier will receive $<span class="font-boldd">${copcod}</span>.
                                </div>`);
                    }
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            The carrier will pay you $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
            } else {
                $("#balAmount").val(pay);
                $("#alertMSG").html('');
                $("#copcodPart").hide();
                if (balTime && balTerms && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span> of <span class="font-boldd">${balTerms}</span>.
                        </div>`);
                } else if (balTime && balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span> within <span class="font-boldd">${balTime}</span>.
                        </div>`);
                } else if (balMethod) {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span> via <span class="font-boldd">${balMethod}</span>.
                        </div>`);
                } else {
                    $("#alertMSG").append(`<div class="alert alert-danger" role="alert">
                            You will pay the carrier $<span class="font-boldd">${Math.abs(bal)}</span>.
                        </div>`);
                }
            }
            if (bal == 0) {
                $("#copcodPart").hide();
                $("#copcodPart").show();
                $("#balPart").hide();
                $("#balAmount").val(0);
                if (payMethod && codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else if (payMethod) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> via <span class="font-boldd">${payMethod}</span>.
                            </div>`);
                } else if (codcoploc) {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span> at <span class="font-boldd">${codcoploc}</span>.
                            </div>`);
                } else {
                    $("#alertMSG").html('');
                    $("#alertMSG").html(`<div class="alert alert-danger" role="alert">
                                The carrier will receive $<span class="font-boldd">${copcod}</span>.
                            </div>`);
                }
            }
        }
        setTimeout(function() {
            if (jQuery("#copcodPart").css('display') === 'none') {
                //condition
                $("#payment_method").prop('required', false);
                $("#cod_cop_loc").prop('required', false);
            } else if (jQuery("#copcodPart").css('display') === 'block') {
                $("#payment_method").prop('required', true);
                $("#cod_cop_loc").prop('required', true);
            } else {
                $("#payment_method").prop('required', true);
                $("#cod_cop_loc").prop('required', true);
            }
            if (jQuery("#balPart").css('display') === 'none') {
                //condition
                $("#balance_method").prop('required', false);
                $("#balance_time").prop('required', false);
                $("#terms").prop('required', false);
            } else if (jQuery("#balPart").css('display') === 'block') {
                $("#balance_method").prop('required', true);
                $("#balance_time").prop('required', true);
                $("#terms").prop('required', true);
            } else {
                $("#balance_method").prop('required', false);
                $("#balance_time").prop('required', false);
                $("#terms").prop('required', false);
            }
        }, 1000)
    });

    $("#needDeposit").click(function() {
        if ($(this).is(":checked")) {
            $("#depositContent").html(`
                    <label class="label font-boldd tx-black">Deposit Amount <span class="tx-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i style="color: #705ec8;font-size:larger" class="fa fa-usd tx-16 lh-0 op-6"></i>
                            </div>
                        </div>
                        <input class="form-control this_save " autocomplete="off" type="text" required
                               name="depositAmount" value="" placeholder="" id="depositAmount" style="width: 90%">
                    </div>
                `);
        } else {
            $("#depositContent").html('');
        }
    });
    $("#pickup_date").change(function() {
        $("#whenPickUpDate").html('');
        var pickupDate = $(this).val();
        if (pickupDate) {
            $("#whenPickUpDate").html(`<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_pickup" id="pickup1" type="radio" value="before" >
                                <span>Before</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_pickup" id="pickup2" type="radio" value="after" >
                                <span>After</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_pickup" id="pickup3" type="radio" value="on" >
                                <span>On</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_pickup" id="pickup4" type="radio" value="asap" >
                                <span>ASAP</span>
                            </label>
                        </div>
                    </div>
                </div>`);
        } else {
            $("#whenPickUpDate").html('');
        }
    });

    $("#delivery_date").change(function() {
        var pickupDate = $(this).val();
        if (pickupDate) {
            $("#whenDeliveryDate").html(``);
            $("#whenDeliveryDate").html(`<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_delivery" id="delivery1" type="radio" value="before" >
                                <span>Before</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_delivery" id="delivery2" type="radio" value="after" >
                                <span>After</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_delivery" id="delivery3" type="radio" value="on" >
                                <span>On</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="rdiobox">
                                <input class="this_save" name="when_delivery" id="delivery4" type="radio" value="asap" >
                                <span>ASAP</span>
                            </label>
                        </div>
                    </div>
                </div>`);
        } else {
            $("#whenDeliveryDate").html('');
        }
    });

    $("#dterminal").change(function() {
        $('#d_zip1').trigger('change');
        var id = $(this).val();
        if (id == 1 || id == 8 || id == 9) {
            $(".dauc").html('');
        }
        else {
            $(".dauc").html('');
            if (id == 7 || id == 6) {
                $(".dauc").html(`
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dauction" class="label font-boldd tx-black"></label>
                                <input  class="form-control this_save " autocomplete="off" type="text" name="dauction" id="dacution_name" value="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dauctionpho" class="label font-boldd tx-black"></label>
                                <input  class="form-control this_save  ophone" autocomplete="off" type="text" name="dauctionpho" id="dacutionphoNo" value="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="label font-boldd tx-black">Terminal</label>
                                <input class="form-control this_save " autocomplete="off" type="text" name="port_terminal" id="port_terminal" value="">
                            </div>
                        </div>
                    `);
            }
            else if(id == 2 || id == 3 || id == 4 || id == 10)
            {
                $(".dauc").html(`
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dauction" class="label font-boldd tx-black"></label>
                                <input required class="form-control this_save " autocomplete="off" type="text" name="dauction" id="dacution_name" value="" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dauctionpho" class="label parsley-error font-boldd tx-black"></label>
                                <input required class="form-control this_save  ophone" autocomplete="off" type="text" name="dauctionpho" id="dacutionphoNo" value="" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="dacutiondate" class="label parsley-error font-boldd tx-black">Auction Date <span class="text-muted">(Optional)</span></label>
                                <input class="form-control this_save" autocomplete="off" type="date"  name="dacutiondate" id="dacutiondate" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="dacutiontime" class="label parsley-error font-boldd tx-black">Auction Time <span class="text-muted">(Optional)</span></label>
                                <input class="form-control this_save" autocomplete="off" type="time"  name="dacutiontime" id="dacutiontime" value="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="dacutionaccounttitle" class="label parsley-error font-boldd tx-black">Has Auction Account?</label>
                                <select class="form-control this_save" autocomplete="off" name="dacutionaccounttitle" id="dacutionaccounttitle">
                                    <option value="" selected disabled>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12" style="display:none;" id="daucAccName">
                            <div class="form-group">
                                <label for="dacutionaccountname" class="label parsley-error font-boldd tx-black">Auction Account Name </label>
                                <input class="form-control this_save" autocomplete="off" type="text"  name="dacutionaccountname" id="dacutionaccountname" value="">
                            </div>
                        </div>
                    `);
            }
            else {
                $(".dauc").html(`
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dauction" class="label font-boldd tx-black"></label>
                                <input required class="form-control this_save " autocomplete="off" type="text" name="dauction" id="dacution_name" value="" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label id="dauctionpho" class="label font-boldd tx-black"></label>
                                <input required class="form-control this_save  ophone" autocomplete="off" type="text" name="dauctionpho" id="dacutionphoNo" value="" >
                            </div>
                        </div>
                    `);
            }
            if (id == 5) {
                $("#dauction").html('Shop Name');
                $("#dauctionpho").html('Shop Phone');
            } else if (id == 7 || id == 6) {
                $("#dauction").html('Port Name');
                $("#dauctionpho").html('Port Phone');
                $(".dauc2").show();
            } else if (id == 11) {
                $("#dauction").html('Dealership / Contact Person');
                $("#dauctionpho").html('Dealership Phone');
            } else {
                $("#dauction").html('Auction Name');
                $("#dauctionpho").html('Auction Phone');
            }
        }


        var dterminal = $("#dterminal").val();
        if (dterminal == 2 || dterminal == 3 || dterminal == 4 || dterminal == 10) {
            if (dterminal == 2) {
                $("#dacution_name").val("COPART Auto Auction");
            } else if (dterminal == 3) {
                $("#dacution_name").val("Manhein Auto Auction");
            } else if (dterminal == 4) {

                $("#dacution_name").val("IAAI Auto Auction");
            } else if (dterminal == 10) {

                $("#dacution_name").val("Auction (Heavy)");
            }
        }
        $(".ophone").keypress(function(e){
            if($(this).val() == '')
            {
                $(this).mask("(999) 999-9999");
            }
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)){
                return true;
            }else{
                return false;
            }
        })

    });

    $(document).on('change','#dacutionaccounttitle',function(){
        $("#dacutionaccountname").val('');
        if($(this).val() == 'Yes')
        {
            $("#daucAccName").show();
        }
        else
        {
            $("#daucAccName").hide();
        }
    })



    $("#oterminal").change(function() {
        $('#o_zip1').trigger('change');
        $(".buyer_number").hide();
        var oterminal = $("#oterminal").val();
        if (oterminal == 1) {
            $("#buyerPanel").hide();
            $(".buyer_number").hide();
        } else {
            $("#buyerPanel").show();
        }
        if (oterminal == 2 || oterminal == 3 || oterminal == 4 || oterminal == 10) {
            $("#oacution_name").val('');
            $("#oacutionphoNo").val('');
            $("#oaddress").val('');
            $(".buyer_number").hide();
        }
    });


    $("#oterminal").change(function() {
        var id = $(this).val();
        $(".stock_number").html('');
        if (id == 1) {
            $(".oauc").html('');
        }
        else if(id == 3 || id == 2 || id == 4 || id == 8)
        {
            $(".oauc").html('');
            $(".oauc").html(`
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="oacution" class="label font-boldd tx-black"></label>
                            <input class="form-control this_save" autocomplete="off"  type="text" name="oacution" id="oacution_name" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="oacutionpho" class="label parsley-error font-boldd tx-black"></label>
                            <input class="form-control this_save ophone" autocomplete="off" type="text"  name="oacutionpho" id="oacutionphoNo" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="oacutiondate" class="label parsley-error font-boldd tx-black">Auction Date <span class="text-muted">(Optional)</span></label>
                            <input class="form-control this_save" autocomplete="off" type="date"  name="oacutiondate" id="oacutiondate" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="oacutiontime" class="label parsley-error font-boldd tx-black">Auction Time <span class="text-muted">(Optional)</span></label>
                            <input class="form-control this_save" autocomplete="off" type="time"  name="oacutiontime" id="oacutiontime" value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="oacutionaccounttitle" class="label parsley-error font-boldd tx-black">Has Auction Account?</label>
                            <select class="form-control this_save" autocomplete="off" name="oacutionaccounttitle" id="oacutionaccounttitle">
                                <option value="" selected disabled>Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12" style="display:none;" id="aucAccName">
                        <div class="form-group">
                            <label for="oacutionaccountname" class="label parsley-error font-boldd tx-black">Auction Account Name </label>
                            <input class="form-control this_save" autocomplete="off" type="text"  name="oacutionaccountname" id="oacutionaccountname" value="">
                        </div>
                    </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Buyer/Lot/Stock Number</label>
                            <input type="text" name="obuyer_no" id="obuyer_no" class="form-control this_save " autocomplete="off"
                            placeholder="Buyer/Lot/Stock Number">
                        </div>
                     </div>
                `);
        }
        else {
            $(".oauc").html('');
            $(".oauc").html(`
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="oacution" class="label font-boldd tx-black"></label>
                            <input class="form-control this_save" autocomplete="off"  type="text" name="oacution" id="oacution_name" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label id="oacutionpho" class="label font-boldd tx-black"></label>
                            <input class="form-control this_save ophone" autocomplete="off" type="text"  name="oacutionpho" id="oacutionphoNo" value="">
                        </div>
                    </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Buyer/Lot/Stock Number</label>
                            <input type="text" name="obuyer_no" id="obuyer_no" class="form-control this_save " autocomplete="off"
                            placeholder="Buyer/Lot/Stock Number">
                        </div>
                     </div>
                    `);
            if (id == 5) {
                $("#oacution").html('Shop Name');
                $("#oacutionpho").html('Shop Phone');
            } else if (id == 7 || id == 6) {
                $(".oauc").html(``);
                $(".buyer_number").hide();
                $(".stock_number").html(`
                       <div class="">
                            <div class="form-group">
                            <label class="form-label">Buyer/Lot/Stock Number</label>
                            <input type="text" name="obuyer_no" id="obuyer_no" class="form-control this_save " autocomplete="off"
                            placeholder="Buyer/Lot/Stock Number">
                       </div>
                     </div>`);
            } else if (id == 10) {
                $("#oacution").html('Dealership / Contact Person');
                $("#oacutionpho").html('Dealership Phone');
                $(".buyer_number").hide();

            } else {
                $("#oacution").html('Auction Name');
                $("#oacutionpho").html('Auction Phone');
                $(".buyer_number").hide();
            }
        }


        var oterminal = $("#oterminal").val();
        if (oterminal == 2 || oterminal == 3 || oterminal == 4 || oterminal == 8) {
            if (oterminal == 2) {
                $("#oacution_name").val("COPART Auto Auction");
            } else if (oterminal == 3) {
                $("#oacution_name").val("Manhein Auto Auction");

            } else if (oterminal == 4) {
                $("#oacution_name").val("IAAI Auto Auction");
            } else if (oterminal == 8) {
                $("#oacution_name").val("Auction (Heavy)");
            }
        }
        $(".ophone").keypress(function(e){
            if($(this).val() == '')
            {
                $(this).mask("(999) 999-9999");
            }
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)){
                return true;
            }else{
                return false;
            }
        })


    });

    $(document).on('change','#oacutionaccounttitle',function(){
        $("#oacutionaccountname").val('');
        if($(this).val() == 'Yes')
        {
            $("#aucAccName").show();
        }
        else
        {
            $("#aucAccName").hide();
        }
    })

    function save_phon() {
        $('#show_total').show();
        var datastring = $("#createnew_form").serialize();
        var mainPhNum = $('#PhNum').val();

        if (mainPhNum.length > 0) {
            $.ajax({
                type: "post",
                url: "/createneworder",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    $('#ophone').val(data.autoorder["ophone"]);
                    $('#ophone').parent('div').siblings('input[name="ophone2[]"]').val(data.autoorder["ophone"]);
                    $('#orderid_find').val(data.autoorder["id"]);
                    $('#order_id1').val(data.autoorder["id"]);
                    $('#modaldemo8').modal('hide');
                    $('#ophone').focus();
                    $('#orderidplace').html('ORDER ON PHONE #' + data.autoorder["id"]);
                    $('#orderid').val(data.autoorder["id"]);
                    $('a[data-target="#alreadyCreditCard"]').html(`${data.count_credit_card} Card Found`);
                    $("#ophoneNumChk").html(`${data.old_count_previous}  Order Found`);
                },
                error: function(e) {}
            });
        } else {
            alert('PLEASE ENTER PHONE NUMBER');
        }
    }

    function save_customer() {
        $('#show_total').show();
        var datastring = $("#createnew_form").serialize();
        var customernameNum = $('#custName').val();

        if (customernameNum.length > 0) {
            $.ajax({
                type: "post",
                url: "/createneworder",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    $('#ophone').val(data["ophone"]);
                    $('#orderid_find').val(data["id"]);
                    $('#modaldemo8').modal('hide');
                    $('#ophone').focus();
                    $('#orderidplace').html('ORDER ON PHONE #' + data["id"]);
                    $('#orderid').val(data["id"]);
                    $('#order_id1').val(data["id"]);
                    $('#oname').val(data["oname"]);
                    $('#addition_info0').val(data["add_info"]);
                },
                error: function(e) {}
            });
        } else {
            alert('PLEASE ENTER CUSTOMER NAME');
        }
    }

    function get_pstatus(id){
        var ret = "";
        if (id == 0) {
            ret = "NEW";
        } else if (id == 1) {
            ret = "Interested";
        } else if (id == 2) {
            ret = "FollowMore";
        } else if (id == 3) {
            ret = "AskingLow";
        } else if (id == 4) {
            ret = "NotInterested";
        } else if (id == 5) {
            ret = "NoResponse";
        } else if (id == 6) {
            ret = "TimeQuote";
        } else if (id == 7) {
            ret = "PaymentMissing";
        } else if (id == 8) {
            ret = "Booked";
        } else if (id == 9) {
            ret = "Listed";
        } else if (id == 10) {
            ret = "Dispatch";
        } else if (id == 11) {
            ret = "Pickup";
        } else if (id == 12) {
            ret = "Delivered";
        } else if (id == 13) {
            ret = "Completed";
        } else if (id == 14) {
            ret = "Cancel";
        } else if (id == 15) {
            ret = "Deleted";
        } else if (id == 16) {
            ret = "OwesMoney";
        } else if (id == 17) {
            ret = "CarrierUpdate";
        } else if (id == 18) {
            ret = "OnApproval";
        }else if (id == 19) {
            ret = "On Approval Canceled";
        }

        return ret;
    }

    function phone_check(phone_no) {
        var phonelenght = phone_no.replace(/[^0-9]/g, "").length;
        if (phonelenght == 10) {
            $("#create_new").show();
            $('#last_5').show();
            $.ajax({
                type: "GET",
                url: "/get_order",
                data: {
                    'phone_no': phone_no
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(i, item) {
                        if (item.tot > 0) {
                            $("#update_previous").show();
                            $(".show_hide").show();
                        } else {
                            $("#update_previous").hide();
                            $(".show_hide").hide();
                        }
                        $('#show_total').html(item.tot + ' Order(s) found');
                    });
                },
                error: function(e) {}
            });
            $.ajax({
                type: "GET",
                url: "/get_last_5",
                data: {'phone_no': phone_no},
                dataType: "json",
                success: function (data) {
                    var temp = "";
                    $.each(data, function (i, item) {
                        temp= temp + `<tbody><tr><td>`+item.id+`</td>` ;
                        temp = temp + `<td>`+item.date+`</td>` ;
                        temp = temp + `<td>`+item.oname+`</td>` ;
                        temp = temp + `<td>`+item.originzsc+`</td>` ;
                        temp = temp + `<td>`+item.destinationzsc+`</td>` ;
                        temp = temp +  `<td>`+item.ymk+`</td>` ;
                        temp = temp + `<td>`+item.payment+`</td>` ;
                        temp = temp + `<td>`+get_pstatus(item.pstatus)+`</td>` ;
                        temp = temp + `<td><a target='_blank' href='/new_edit/${item.id}' class="badge bg-success text-light">Edit</a></td></tr></tbody>` ;
                    });
                    $('#last_5').html(`<div class='container' style="overflow:auto;">
                            <table class='table table-bordered table-hover' style='text-align: center; '>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Vehicle</th>
                                    <th>Price</th>
                                    <th>Last Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                ${temp}
                             </table>`);
                },
                error: function (e) {
                }
            });
        } else {
            $("#create_new").hide();
            $("#update_previous").hide();
            $("#show_total").html('');
            $('#last_5').hide();
        }
    }

    function phone_check22(phone_no) {
        $.ajax({
            url: "/get_order",
            type: "GET",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {},
            success: function(data) {
                let test = data.toString();
                let test2 = $.trim(test);
                let text = "SUCCESS";
                if (test2 == text) {
                    $('#success').html(data);
                    $('#modaldemo4').modal('show');
                    window.location.href = "/view_employee";
                } else {
                    $('#not_success').html(data);
                    $('#modaldemo5').modal('show');
                }
            },
            error: function(e) {
                $("#err").html(e).fadeIn();
            }
        });
        var showPass = 0;
        showPass = $('#PhNum').val();
        var len = showPass.length;
        if (len >= 10) {
            $('#create_new').show();
            $('#update_previous').show();
        } else {
            $('#create_new').hide();
            $('#update_previous').hide();
        }
    }
</script>



<script>
    $('#modaldemo8').modal('show');
    $(document).on('click', '.btn_remove', function() {
        $(this).parents(`.vehicle_add`).remove();
        vehicle_count--;
    });

    $(document).on('click', '#yes', function() {
        $('#custName').val('');
        $('#addInfo').val('');
        $('#show_total').show();
        $('#show_total').html('');
        $(".number_no").hide();
        $(".number_yes").show();
        $("#create_new_unknownno").css("display", "none");
    });
    $(document).on('click', '#no', function() {
        $('#PhNum').val('');
        $('#create_new').hide();
        $('#update_previous').hide();
        $('#show_total').hide();
        $(".number_yes").hide();
        $(".number_no").show();
        $("#create_new_unknownno").css("display", "block");
    });

    $('#PhNum').keypress(function(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57) || x == 8 ||
            (x >= 35 && x <= 40) || x == 46)
            return true;
        else
            return false;
    });

    function showcreatenew() {
        $('.unknownno_class').html('');
        $('.unknownno_class').append(`<button class="btn btn-indigo" style="" id="create_new_unknownno" onclick="save_customer();" style="" type="button">Create New</button>`);
    }
</script>

<script type="text/javascript">
    var Ophone_count = 0;
    var Dphone_count = 0;
    var vehicle_count = 1;


    $(".add_phone_btn").click(function() {
        $(".add_phone").append('<div class="col-12 add margin_lft"><div class="row"><div class="col-11"><label class="form-label font-boldd">Phone Number: </label><input  type="text" name="ophone[]"  class="form-control this_save ophone ophone_new" id="ophonee' + Ophone_count + '" placeholder="Phone Number"/></div><div class"form-group col-1" style="padding-top: 23px;"> <i id="remove_btn" class="fa fa-minus-circle remove_btn"></i></div> <input type="hidden" value="" name="ophone2[]" /></div></div>	&nbsp;');
        ++Ophone_count;
        $(".ophone").keypress(function(e){
            if($(this).val() == '')
            {
                $(this).mask("(999) 999-9999");
            }
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)){
                return true;
            }else{
                return false;
            }
        })

        $(".ophone_new").keyup(function(){
            $(this).parent('div').siblings('input').val($(this).val());
        })

    });

    $(".ophone_new").keyup(function(){
        $(this).parent('div').siblings('input').val($(this).val());
    })

    $(document).on('click', '.remove_btn', function() {
        $(this).parents('.add').remove();
        --Ophone_count;
    });

    $(".add_dphone_btn").click(function() {
        $(".add_dphone").append('<div class="col-12 add margin_lft"><div class="row"><div class="col-11"><label class="form-label font-boldd">Phone Number:</label><input  type="text" name="dphone[]"  class="form-control this_save dphone ophone_new" id="phonee' + Dphone_count + '" placeholder="Phone Number"/></div><div class"form-group col-1" style="padding-top: 23px;"> <i id="remove_btn" class="fa fa-minus-circle remove_btn"></i></div><input type="hidden" value="" name="dphone2[]" />  </div></div>	&nbsp;');
        ++Dphone_count;
        $(".dphone").keypress(function(e){
            var x = e.which || e.keycode;
            if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)){
                return true;
            }else{
                return false;
            }
        })

        $(".ophone_new").keyup(function(){
            $(this).parent('div').siblings('input').val($(this).val());
        })
    });

    $(document).on('click', '.remove_btn', function() {
        $(this).parents('.add').remove();
        --Dphone_count;
    });


    $(`.add_vehicle_btn`).click(function() {
        $(`.add_vehicle_information`).append(`
            <input type="hidden" name="count[]" value="1">
<div class="vehicle_add">
    <div class=" flex_ gap_new flex_space vichle__Information  ">
        <div class="vichle__Information--box">
            <div class=""><label class="rdiobox"> <input class="this_save type" name="vehicle${vehicle_count}"
                                                                   id="vehicle${vehicle_count}"
                                                                   onclick="vehicle_append(${vehicle_count})"
                                                                   type="radio" checked="" value="1"
                                                                   data-parsley-multiple="vehicle${vehicle_count}">
                    <input name="vehicle_v[]" id="vehicle_v${vehicle_count}" type="hidden" value="make"> <span>Year, Make, and Model</span>
                </label></div>
        </div>
        <div class="vichle__Information--box">
            <div class=""><label class="rdiobox"> <input class="this_save type" name="vehicle${vehicle_count}"
                                                                   id="vin${vehicle_count}"
                                                                   onclick="vin_append(${vehicle_count})" type="radio"
                                                                   value="2"
                                                                   data-parsley-multiple="vehicle${vehicle_count}"><input
                        name="vehicle_v[]" disabled id="vehicle_v_vin${vehicle_count}" type="hidden" value="vin"> <span>Vin Number</span>
                </label></div>
        </div>
        <div class="vichle__Information--box btn-list">
            <button  type="button" class="btn btn-danger btn_remove"><i class="mr-2"
                                                                                                 id="add-more"
                                                                                                 onclick="vehicleUpdate(1)"></i>Remove
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 vin_toggle${vehicle_count}"></div>
        <div class="col-sm-6 col-md-6">
            <div class="form-group"><label class="form-label font-boldd">Year<span class="redcolor">*</span></label> <input type="text"
                                                                                   class="form-control this_save fff vyear"
                                                                                   id="year${vehicle_count}"
                                                                                   name="vyear[]" onkeypress="$(this).css('border-color', 'rgb(92 166 242)');"
                                                                                   placeholder="Enter Year" required>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-group"><label class="form-label font-boldd">Make<span class="redcolor">*</span></label> <input type="text"
                                                                                   class="form-control this_save  makeOpt0 vmake"
                                                                                   id="makeOpt${vehicle_count}"
                                                                                   onkeypress="$(this).css('border-color', 'rgb(92 166 242)');"
                                                                                   onkeyup="getmake()" name="vmake[]"
                                                                                   placeholder="Enter Make" required>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="googleimage" onclick="googl(${vehicle_count})" id="googleimage${vehicle_count}"
                 style="position: absolute; right: 3%;top:-6px;display:none"><a href="javascript:void(0);"><img width="50"
                                                                                                       src="{{url('')}}/assets/images/png/google.png" style="border: 1px solid #5da6f2;border-radius: 5px;"></a>
            </div>
            <div class="form-group"><label class="form-label font-boldd">Model<span class="redcolor">*</span></label> <input type="text"
                                                                                    id="model${vehicle_count}"
                                                                                    onkeyup="getmodel(${vehicle_count})"
                                                                                    name="vmodel[]"
                                                                                    onkeypress="$(this).css('border-color', 'rgb(92 166 242)');"
                                                                                    class="form-control this_save  model0 vmodel"
                                                                                    placeholder="Enter Model" required>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-group"><label class="form-label font-boldd">Equipment Type</label>
                <select id="vehType${vehicle_count}" name="vehType[]" required="" class="form-control this_save vehicle-type">
                    <option selected="" value="">Select Type</option>
                    <option value="Step_Deck">Step Deck</option>
                    <option value="RGN">RGN</option>
                    <option value="Flatbed">Flatbed</option>
                    <option value="Landoll">Landoll</option>
                    <option value="Hotshot">Hotshot</option>
                </select></div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Length</label>

                <div class="row">
                    <div class="col-lg-6 pd-r-0"><input type="text" class="form-control this_save" placeholder="ft."
                                                        name="lengthft[]"  id="lengthft${vehicle_count}"></div>
                    <div class="col-lg-6 pd-l-0"><input type="text" class="form-control" placeholder="in."
                                                        name="lengthin[]"  id="lengthin${vehicle_count}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Width</label>

                <div class="row">
                    <div class="col-lg-6 pd-r-0"><input type="text" class="form-control this_save" placeholder="ft."
                                                        name="widthft[]" id="widthft${vehicle_count}"></div>
                    <div class="col-lg-6 pd-l-0"><input type="text" class="form-control this_save" placeholder="in."
                                                        name="widthin[]"  id="widthin${vehicle_count}"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group">

                <label class="form-control-label font-boldd tx-black">Height</label>

                <div class="row">
                    <div class="col-lg-6 pd-r-0"><input type="text" class="required form-control this_save" placeholder="ft."
                                                        name="heigthft[]"  id="heigthft${vehicle_count}">
                    </div>
                    <div class="col-lg-6 pd-l-0"><input type="text" class="required form-control this_save" placeholder="in."
                                                        name="heigthin[]"  id="heigthin${vehicle_count}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Weight</label> <input type="text" class="required form-control this_save"
                                                                  name="weight[]"
                                                                  id="weight${vehicle_count}"></div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Equipment Condition
                   </label> <select id="condition${vehicle_count}" name="condition[]"
                                                                     class="form-control this_save vehicle-condition">
                    <option selected="" disabled="">Select</option>
                    <option value="1">Running</option>
                    <option value="2">Not Running</option>
                    <option value="3">Its Roll</option>
                </select></div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Trailer Type </label> <select id="trailter_type${vehicle_count}"
                                                                   name="trailter_type[]"
                                                                   class="form-control this_save trailer-type">
                    <option selected="" disabled="">Select</option>
                    <option value="1">Open</option>
                    <option value="2">Enclosed</option>
                </select></div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Load Method</label> <select id="load_method${vehicle_count}" name="load_method[]"
                                                                    class="form-control this_save">
                    <option selected="" disabled="">Select</option>
                    <option value="loading_dock">Loading Dock</option>
                    <option value="crane">Crane</option>
                    <option value="forklift">Forklift</option>
                    <option value="drive_roll">Drive/roll on from ground</option>
                </select></div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="form-group"><label class="form-control-label font-boldd tx-black">Unload Method </label> <select id="unload_method${vehicle_count}" name="unload_method[]"  class="form-control this_save">
                    <option selected="" disabled="">Select</option>
                    <option value="loading_dock">Loading Dock</option>
                    <option value="crane">Crane</option>
                    <option value="forklift">Forklift</option>
                    <option value="drive_roll">Drive/roll on from ground</option>
                </select></div>
        </div>
        <div class="col-sm-6 col-md-6"> &nbsp;
            <div class="form-group"><label class="ckbox"> <input type="checkbox" name="portTitle${vehicle_count}"
                                                                 id="needTitle${vehicle_count}"
                                                                 onclick="goto_port(${vehicle_count})"
                                                                 class="this_save"> <input type="hidden"
                                                                                           id="portTitlehidden${vehicle_count}"
                                                                                           name="portTitlehidden[]"
                                                                                           value="false"><span>&nbsp;Need Title?</span>
                </label></div>
        </div>
    </div>
</div>  </div></div> &nbsp;
            `);
        vehicle_count++;
        selectRefresh();
    });


    $("#central_chk1").click(function() {

        $("#may_be_book").html('');
        $("#confirm_book").html(`

                    <input style="width: 150px;" class="form-control this_save" autocomplete="nope" type="text" name="company_name" id="company_name" placeholder="Company Name">

                    <input style="width: 150px;" class="form-control this_save" autocomplete="nope" type="text" name="company_price" id="company_price" placeholder="Price">
                `);
    });

    $("#central_chk2").click(function() {
        $("#confirm_book").html('');
        $("#may_be_book").html(`

                        <input  style="width: 150px;" class="form-control this_save" autocomplete="nope" type="text" name="company_name" id="company_name2" placeholder="Company Name">

                        <input  style="width: 150px;" class="form-control this_save" autocomplete="nope" type="text" name="company_price" id="company_price2" placeholder="Price">

                        <input  style="width: 150px;" class="form-control this_save" autocomplete="nope" type="text" name="company_comments" id="company_comments" placeholder="Comments">
                    `);
    });

    $("#central_chk3").click(function() {
        $("#confirm_book").html('');
        $("#may_be_book").html('');

    });


    function vin_append(vehicle_count) {
        $(`#vehicle_v_vin${vehicle_count}`).prop("disabled", false);

        $(`#vehicle_v${vehicle_count}`).prop("disabled", true);


        $(`.vin_show${vehicle_count}`).show();
        $(`.vin_toggle${vehicle_count}`).html(`

                                        <div class="input-group vin_show${vehicle_count}" style="padding-bottom: 12px;padding-top: 19px;">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-car tx-16 lh-0 op-6"></i>
                                                </div>
                                            </div>

                                            <input required class="form-control this_save" type="text" onkeyup="get_vin(${vehicle_count})" name="vin_num[]" id="vinNum${vehicle_count}" value=""
                                            placeholder="Ex: WBSWL93558P331570" style="width: 80%;">
                                        </div> `);

        $(`#year${vehicle_count}`).prop("readonly", true);
        $(`#makeOpt${vehicle_count}`).prop("readonly", true);
        $(`#model${vehicle_count}`).prop("readonly", true);
    }


    function vehicle_append(vehicle_count) {
        $(`#vehicle_v_vin${vehicle_count}`).prop("disabled", true);

        $(`#vehicle_v${vehicle_count}`).prop("disabled", false);


        //alert(`#vehicle${vehicle_count}`);
        $(`.vin_show${vehicle_count}`).html('');
        $(`#year${vehicle_count}`).prop("readonly", false);
        $(`#makeOpt${vehicle_count}`).prop("readonly", false);
        $(`#model${vehicle_count}`).prop("readonly", false);

    }

    $("#viewMap").click(function() {
        var ozip = $("#o_zip1").val();
        var dzip = $("#d_zip1").val();
        if (ozip == '' || dzip == '') {
            alert('Please Enter Origin & Dest City or Zip');
        }
        else {
            // ozip = ozip.split(",");
            // dzip = dzip.split(",");
            var url = `https://www.google.com/maps/dir/${ozip}/${dzip}/`;
            $(this).attr('href',url);
            // window.open(url, 'Map', 'height=700,width=800,left=200,top=50,toolbar=No,location=No,scrollbars=Yes,status=No,resizable=Yes,fullscreen=No,directories=No,menubar=No,copyhistory=No');
        }
    });
</script>



<script>
    $("body").delegate(".ophone", "focus", function() {
        $(".ophone").mask("(999) 999-9999");
        $(".ophone")[0].setSelectionRange(0, 0);
    });

    $("body").delegate(".dphone", "focus", function() {
        $(".dphone").mask("(999) 999-9999");
        $(".dphone")[0].setSelectionRange(0, 0);
    });

    $(document).on('click', '#ophonee', function() {
        $("#ophonee").mask("(999) 999-9999");
        $("#ophonee")[0].setSelectionRange(0, 0);

    });

    $(document).on('click', '#ophonee', function() {
        $("#ophonee").mask("(999) 999-9999");
        $("#ophonee")[0].setSelectionRange(0, 0);

    });
    $(".ophone").keypress(function(e){
        if($(this).val() == '')
        {
            $(this).mask("(999) 999-9999");
        }
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)){
            return true;
        }else{
            return false;
        }
    })
    $(".dphone").keypress(function(e){
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57) || (x >= 35 && x <= 40)){
            return true;
        }else{
            return false;
        }
    })



    $(document).on('change', '#o_zip1', function() {


        setTimeout(function() {

            var o_zip1 = $(`#o_zip1`).val();
            var oterminal = $(`#oterminal`).val();

            if (oterminal == 2) {
                oterminal = 1;

                $.ajax({
                    type: "GET",
                    url: "/get_auction",
                    dataType: 'JSON',
                    data: {
                        o_zip1: o_zip1,
                        oterminal: oterminal
                    },
                    success: function(res) {
                        if (res) {
                            $('#oaddress').val(res[0].address);
                            $('#oacutionphoNo').val(res[0].phone);
                            $('#oacution_name').val('Copart Auction');
                            $('#o_zip1').focus();

                        }
                    }

                });
            }
        }, 500);


    });

    $(document).on('change', '#d_zip1', function() {
        setTimeout(function() {
            var d_zip1 = $(`#d_zip1`).val();
            var dterminal = $(`#dterminal`).val();
            $('#port_lines').prop('style', 'display: none;');
            $("#port_line1").prop("checked", false);
            $("#port_line2").prop("checked", false);
            $('input[name="port_line"]').prop("required",false);
            $("#port_dock_type").prop("selectedIndex", 0).change();
            if (dterminal == 2) {
                dterminal = 1;
                $.ajax({
                    type: "GET",
                    url: "/get_auction",
                    dataType: 'JSON',
                    data: {
                        o_zip1: d_zip1,
                        oterminal: dterminal
                    },
                    success: function(res) {
                        if (res) {
                            $('#daddress').val(res[0].address);
                            $('#dacutionphoNo').val(res[0].phone);
                            $('#dacution_name').val('Copart Auction');
                            $('#d_zip1').focus();

                        }
                    }
                });
            } else if (dterminal == 7) {
                $('#reason_box').val(null);
                $('#port_lines').prop('style', 'display: block; width: 100%;"');
                $('input[name="port_line"]').prop("required",true);
            }
        }, 500);
    });

    $(document).on('change', '#dterminal', function() {
        $("#dauctionnew").val($(this).children('option:selected').attr('data-value'));
        setTimeout(function() {
            var d_zip1 = $(`#d_zip1`).val();
            var dterminal = $(`#dterminal`).val();
            $('#port_lines').prop('style', 'display: none;');
            $("#port_line1").prop("checked", false);
            $("#port_line2").prop("checked", false);
            $("#port_dock_type").prop("selectedIndex", 0).change();
            if (dterminal == 2) {
                dterminal = 1;
                $.ajax({
                    type: "GET",
                    url: "/get_auction",
                    dataType: 'JSON',
                    data: {
                        o_zip1: d_zip1,
                        oterminal: dterminal
                    },
                    success: function(res) {
                        if (res) {
                            $('#daddress').val(res[0].address);
                            $('#dacutionphoNo').val(res[0].phone);
                            $('#dacution_name').val('Copart Auction');
                            $('#d_zip1').focus();

                        }
                    }
                });
            } else if (dterminal == 7) {
                $('#reason_box').val(null);
                $('#port_lines').prop('style', 'display: block; width: 100%;"');
            }
        }, 500);
    });

    $(document).on('change', '#port_dock_type', function() {
        setTimeout(function($this) {
            var port_dock_type = $(`#port_dock_type`).val();
            if (port_dock_type == 'Non Running' || port_dock_type == 'Folk Lift') {
                $('#reason_box').val(null);
                $('#port_reason_box').prop('style', 'display: block; width: 100%;"');
            } else {
                $('#port_reason_box').prop('style', 'display: none; width: 100%;"');
                $('#reason_box').val(null);
            }
        }, 500);
    });


    $(document).on('click', '.ophonev', function() {

        $(".ophonev").mask("(999) 999-9999");
        $(".ophonev")[0].setSelectionRange(0, 0);

    });

    $(document).on('click', '#oacutionphoNo', function() {
        $("#oacutionphoNo").mask("(999) 999-9999");
        $("#oacutionphoNo")[0].setSelectionRange(0, 0);

    });



    $(function() {
        var dateToday = new Date();

        $("#pickup_date").datepicker({

            minDate: dateToday
        });
    });

    $(function() {
        var dateToday = new Date();

        $("#delivery_date").datepicker({

            minDate: dateToday
        });
    });

    function getmake() {
        $(".makeOpt0").autocomplete({
            source: "getmake"
        });
    }


    function goto_port(get) {


        if ($(`#needTitle${get}`).is(":checked")) {

            $(`#portTitlehidden${get}`).val("true");

        } else {

            $(`#portTitlehidden${get}`).val("false");
        }


    }

    function getmodel(num) {

        var yy = $("#year" + num).val();
        var mm = $("#makeOpt" + num).val();


        $(".model0").autocomplete({
            source: "getmodel?year=" + yy + "&make=" + mm
        });

        my_func(num);
    }

    function get_vin(num) {
        var vinno = $(`#vinNum${num}`).val();
        if(vinno == '')
        {
            $("#year" + num).val('');
            $("#makeOpt" + num).val('');
            $("#model" + num).val('');
        }
        else
        {
            $.ajax({
                type: "GET",
                url: "/getvin",
                dataType: 'JSON',
                data: {
                    term: vinno
                },
                success: function(res) {
                    if (res) {
                        $("#year" + num).val(res[2].value);
                        $("#makeOpt" + num).val(res[0].value);
                        $("#model" + num).val(res[1].value);

                        my_func(num);
                        if (res[0].value || res[1].value || res[0].value) {
                            $("#vingoogleimage" + num).show();
                        }
                    }
                }

            });
        }

    }


    function selectRefresh() {
        $('.select2').select2({
            //-^^^^^^^^--- update here
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
            width: '100%'
        });
    }


    $(document).ready(function(e) {

        selectRefresh();

        $("body").delegate(".this_save", "change", function() {

            var datastring = $("#form").serialize();

            $.ajax({

                type: "post",
                url: "/auto_save_order",
                data: datastring,
                dataType: "json",

                success: function(data) {
                    $("#miles").val(data.miles);
                },
                error: function(e) {

                }

            });


        });

        $(".ophone").mask("(999) 999-9999");


        // $(function() {
        //     $("#o_zip1").autocomplete({
        //         source: "get_zip"
        //     });
        // });

        // $(function() {
        //     $("#d_zip1").autocomplete({
        //         source: "get_zip"
        //     });
        // });

        $('#d_zip1').keyup(function () {
            var d_zip1 = $(this);
            var dterminal = $('#dterminal');
            var daddress = $('#daddress');
            var dacutionphoNo = $('#dacutionphoNo');
            var nav = $(this).parents('.form-group').siblings('.nav');
            if(d_zip1.val() == '')
            {
                nav.children().remove();
                nav.hide();
                daddress.val('');
                dacutionphoNo.val('');
            }
            else{
                $.ajax({
                    url: "{{url('/get_zip')}}",
                    type: "GET",
                    dataType: "json",
                    data: {d_zip1:d_zip1.val()},
                    success: function (res){
                        nav.show();
                        nav.children().remove();
                        $.each(res, function (){
                            nav.append(`
                                    <li class="nav-item">
                                        <a class="nav-link selectAdd2" href="javascript:void(0)">${this}</a>
                                    </li>
                                `);
                        });
                        $('.selectAdd2').click(function(){
                            nav.children().remove();
                            nav.hide();
                            d_zip1.val($(this).text());

                            var getZip = $(this).text();
                            if(dterminal.val() == 2 || dterminal.val() == 3 || dterminal.val() == 4)
                            {
                                $.ajax({
                                    url:"{{url('/new-auction-detail')}}",
                                    type: "GET",
                                    dataType: "json",
                                    data: {zip_code:getZip,terminal:dterminal.val()},
                                    success:function(res)
                                    {
                                        if(res.data.address)
                                        {
                                            daddress.val(res.data.address);
                                            dacutionphoNo.val(res.data.phone);
                                        }
                                        else{
                                            daddress.val('');
                                            dacutionphoNo.val('');
                                        }
                                    }
                                });
                            }
                            else{
                                daddress.val('');
                                dacutionphoNo.val('');
                            }
                        })
                        // console.log(res);
                    }
                });
            }
            // console.log(d_zip1);
        })


        $('#o_zip1').keyup(function () {
            var o_zip1 = $(this);
            var oterminal = $('#oterminal');
            var oaddress = $('#oaddress');
            var oacutionphoNo = $('#oacutionphoNo');
            var nav = $(this).parents('.form-group').siblings('.nav');
            if(o_zip1.val() == '')
            {
                nav.children().remove();
                nav.hide();
                oaddress.val('');
                oacutionphoNo.val('');
            }
            else{
                $.ajax({
                    url: "{{url('/get_zip')}}",
                    type: "GET",
                    dataType: "json",
                    data: {d_zip1:o_zip1.val()},
                    success: function (res){
                        nav.show();
                        nav.children().remove();
                        $.each(res, function (){
                            nav.append(`
                                <li class="nav-item">
                                    <a class="nav-link selectAdd" href="javascript:void(0)">${this}</a>
                                </li>
                            `);
                        });
                        $('.selectAdd').click(function(){
                            nav.children().remove();
                            nav.hide();
                            o_zip1.val($(this).text());

                            var getZip = $(this).text();
                            if(oterminal.val() == 2 || oterminal.val() == 3 || oterminal.val() == 4)
                            {
                                $.ajax({
                                    url:"{{url('/new-auction-detail')}}",
                                    type: "GET",
                                    dataType: "json",
                                    data: {zip_code:getZip,terminal:oterminal.val()},
                                    success:function(res)
                                    {
                                        if(res.data.address)
                                        {
                                            oaddress.val(res.data.address);
                                            oacutionphoNo.val(res.data.phone);
                                        }
                                        else{
                                            oaddress.val('');
                                            oacutionphoNo.val('');
                                        }
                                    }
                                });
                            }
                            else{
                                oaddress.val('');
                                oacutionphoNo.val('');
                            }
                        })
                        // console.log(res);
                    }
                });
            }
            // console.log(d_zip1);
        })

        $("#callhistoryform").on('submit', function(){
            $("#savceChanges").attr('disabled',true);
        })

        $("#form").on('submit', (function(e) {
            $("#clickToSubmit").attr('disabled',true);
            e.preventDefault();
            $.ajax({
                url: "/store_new_quote",
                type: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {

                },
                success: function(data) {


                    //let test = data.toString();
                    let test = data["success"];
                    let test2 = $.trim(test);
                    let text = "SUCCESS";
                    if (test2 == text) {
                        $('#success').html(data);
                        //$('#modaldemo4').modal('show');
                        $("#neworderpay_btn").val(0);

                        if ($("#continuetopay_btn").val() == 1 || $("#continuetopayold_btn").val() == 1) {


                            // window.open('/order_payment_card_us/' + data["orderid"], '_blank');
                            window.location.href = "/new";

                        } else {
                            //window.location.href = "/new";
                            $('#reportmodal').modal('show');
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

    $("#coupon_number").keyup(function(){
        var coupon_number = $(this);
        coupon_number.parent('div').children('.alert').remove();
        if(coupon_number.val() == '')
        {
            coupon_number.parent('div').children('.alert').remove();
        }
        else
        {
            $.ajax({
                url: "{{url('/coupon_number')}}",
                type: "GET",
                dataType: "json",
                data: {coupon_number:coupon_number.val()},
                success: function (res){
                    coupon_number.parent('div').children('.alert').remove();
                    if(res.status_code === 400)
                    {
                        coupon_number.parent('div').append(`
                                <div class="alert text-danger p-0"><strong>${res.err}</strong></div>
                            `);
                    }
                    else
                    {
                        coupon_number.parent('div').append(`
                                <div class="alert text-success p-0"><strong>${res.msg}</strong></div>
                            `);
                    }
                }
            });
        }
    });
    $(document).on('click',"#saveBtn",function(){
        $("select[name='pstatus']").children('option').attr("selected",false);
        $("select[name='pstatus']").children('option').eq(0).attr("selected",true);
        $("#payCondition").html('');
    })
</script>


@endsection