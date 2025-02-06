@extends('layouts.print_layout')

@section('template_title')
    Payment 
@endsection
@include('partials.mainsite_pages.return_function2')
@section('content')


<style>
    input, select, textarea {
        border: 1px solid #b0a6e0 !important;
    }
    body {
        /*background-image: linear-gradient(to right, rgb(109, 213, 250), rgb(255, 255, 255), rgb(41, 128, 185)) !important;*/
        box-shadow: 2px 2px #9E9E9E !important;
        background-color: white;
    }
    .card-header{
        color: white !important;
        justify-content: center !important;
        font-weight: 800 !important;
        font-size: 25px !important;
        border: 1px solid #d0d0d9 !important;
        background-color: #8fc445 !important;

    }
    .card-body{
        border:1px solid #d0d0d9 !important;
        padding: 4px 16px !important;
    }
    .icon-container {
        font-size: 24px;
        text-align: center;
        margin-top: -30px;
        margin-bottom: 3px;
    }
    .heading{
        float: left;
    }
    .subhead{
        float: right;
    }
    .app-content .side-app {
        padding: 0px !important;
    }
    .error{
        border:1px solid red !important;
    }
</style>

    <div class="container " style=" margin-top: 0px; ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="    border-bottom: 1px solid;">
                        <div class=" mb-0 w-100"><strong class="heading">Order Online # {{ $data->id  }} </strong>

                            <p class="subhead">Your IP address - {{ $ip }}</p>

                        </div>
                    </div>
                    <div class="card-body">

                        <form action="/order_payment_card" method="post" autocomplete="off" class="needs-validation" name="myform"
                              novalidate="">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id  }}">
                            <input type="hidden" name="userid" value="{{ $userid  }}">
                            <input type="hidden" name="ip" value="">
                            <input type="hidden" name="ipcity" value="">
                            <input type="hidden" name="ipregion" value="">
                            <input type="hidden" name="ipcountry" value="">
                            <input type="hidden" name="iploc" value="">
                            <input type="hidden" name="ippostal" value="">
                            <input type="hidden" name="browser" value=" ">
                            <input type="hidden" name="platform" value="">

                            <div class="text-muted text-right">
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mainTitle">
                                        <div class="stepContainer">
                                            <span></span>
                                        </div>
                                        <div class="stepTitle">
                                            <h5>Billing Information
                                                <a href="javascript:void(0);" data-toggle="tooltip"
                                                   data-placement="right" title="" data-original-title="
                                                Review pricing and submit your payment information to book your order.
                                                "> <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="alert alert-danger mt-2" id="success-alert">
                                            <button type="button" class="close" data-dismiss="alert">x</button>
                                            <strong class="error_text"></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="card-header bg-secondary text-white font-weight-bold">
                                        Price Information
                                    </div>
                                    <div class="card-body border">

                                        <div class="form-group">
                                            <label for="name"><strong>Booking Price</strong><span
                                                        class="text-danger"></span></label>
                                            <input autocomplete="nope" type="text" class="form-control" id="price"
                                                   readonly name="price" value="{{ $data->payment  }}">

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="address"><strong>Deposit</strong><span
                                                        class="text-danger"></span></label>
                                            <input autocomplete="nope" type="text" class="form-control" id="deposit"
                                                   readonly name="deposit" placeholder=""
                                                   value="{{ $data->deposit_amount  }}">

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="balance"><strong>Balance Amount</strong></label>
                                            <input autocomplete="nope" type="text" class="form-control" id="balance"
                                                   readonly name="balance" placeholder="" value="{{ $data->balance  }}">

                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="card-header bg-secondary text-white font-weight-bold">
                                        Credit Card Information
                                    </div>
                                    <div class="card-body border">
                                        <label for="fname"><strong>Accepted Cards</strong></label>
                                        <div class="icon-container">
                                            <i class="fa fa-cc-visa" style="color:navy !important;    font-size: 40px;"></i>
                                            <img src="/public/assets/images/photos/mastercard.png" style=" width: auto; height: 40px; margin-top: -15px; " >
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="cardfirstname"><strong>Card First Name </strong><span
                                                            class="text-danger"> </span></label>
                                                <input autocomplete="nope" type="text" class="form-control"
                                                       maxlength="100" id="firstname" name="firstname"
                                                       placeholder="Enter First Card Name" required="" value="">

                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cardlastname"><strong>Card Last Name </strong><span
                                                            class="text-danger"> </span></label>
                                                <input autocomplete="nope" type="text" value="" class="form-control"
                                                       id="lastname"
                                                       maxlength="100" name="lastname"
                                                       placeholder="Enter Card Last Name" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div id="billingaddress">
                                            <div class="form-group">
                                                <label for="auction_name"><strong>Billing Address</strong><span
                                                            class="text-danger"> </span></label>
                                                <div class="controls position-relative has-icon-left">
                                                    <input autocomplete="nope" type="text" name="billing_address"
                                                           id="billing_address" required class="form-control" value=""
                                                           placeholder="Enter Billing Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="zip">
                                            <div class="form-group">
                                                <label class="form-label">Zip Code*</label>
                                                <input type="text" id="o_zip1" class="form-control "
                                                       maxlength="11" name="o_zip1"
                                                       value="{{ $data->originzsc   }}" placeholder="ZIP CODE" required/>
                                            </div>
                                        </div>
                                        <div id="cardtype">
                                            <div class="form-group">
                                                <label for="cardnumber"><strong>Card Type</strong><span
                                                            class="text-danger"> </span></label>
                                                <div class="controls position-relative has-icon-left">
                                                    <select name="card_type" id="card_type" required class="form-control select2">
                                                        <option value=''>Select Card Type</option>
                                                        <option value="visa">visa</option>
                                                        <option value="amex">amex</option>
                                                        <option value="discover">discover</option>
                                                        <option value="mastercard">mastercard</option>
                                                        <option value="MC">MC</option>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="billingaddress">
                                            <div class="form-group">
                                                <label for="cardnumber"><strong>Credit Card Number</strong><span
                                                            class="text-danger"> </span></label>

                                                <div class="controls position-relative has-icon-left">
                                                    <input autocomplete="nope" type="text" name="card_number"
                                                           id="card_number"
                                                           required class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div id="card-element"></div> --}}

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="cardfirstname"><strong>Card Expiry Date </strong><span
                                                            class="text-danger"> </span></label>
                                                <input autocomplete="nope" type="text" class="form-control"
                                                       id="cardexpirydate" name="cardexpirydate" placeholder=""
                                                       required="" value="">
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cardlastname"><strong>Card Security (CVC) </strong><span
                                                            class="text-danger"> </span></label>
                                                <input autocomplete="nope" type="text" value="" class="form-control"
                                                       id="csvno"
                                                       name="csvno" placeholder="" required maxlength="3">
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="row mb-3">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary w-35 submit_btn" style=" font-size: 22px; border-radius: 10px; "
                                            name="save_but" value="save_with_pay">
                                            {{-- name="save_but" value="save_with_pay" onclick="return validateForm();"> --}}
                                        Submit
                                    </button>
                                    <button type="submit" class="btn btn-danger w-35" name="save_but" style=" font-size: 22px; border-radius: 10px; "
                                            value="save_without_pay">Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraScript')
<script src="https://js.stripe.com/v3/"></script>

            {{-- // Create the card object with your form's data
            var card = {
                number: $('#card_number').val().replace(/\s|-/g, ''),
                // exp_month: $('#cardexpirydate').val().split('/')[0].trim(),
                exp_month: 12,
                // exp_year: $('#cardexpirydate').val().split('/')[1].trim(),
                exp_year: 25,
                cvc: $('#csvno').val().trim(),
                name: $('#firstname').val().trim() + ' ' + $('#lastname').val().trim()
            }; --}}

<script>
    $(document).ready(function () {
        // var stripe = Stripe('pk_test_51MxvIfLXi5O85KsLry5H2N2Y4Iucz3tYL9kpQyfzZKq94dTb5weVlEjZQ403DSnPVMUm8015rapLGQLQgJjcCFnF00HqSlMZEX'); // Your public key
        // var elements = stripe.elements();

        // var card = elements.create('card');
        // card.mount('#card-element');

        $('.submit_btn').on('click', function (e) {
            // e.preventDefault();

            // // var crdNum = $('#card_number').val().replace(/\s|-/g, '');
            // // var crdExp = $('#cardexpirydate');
            // // var cardExpMonth = crdExp.slice(0, 1);
            // // var cardExpYear = crdExp.slice(-2);
            // // $('input[name="cardnumber"]').val(crdNum);
            // // $('input[name="exp-date"]').val(cardExpMonth);
            // // $('input[name="exp-date"]').val(cardExpYear);
            // // $('input[name="cvc"]').val($('#csvno'));
            // // $('input[name="postal"]').val($('#postal'));

            // // console.log($('input[name="cardnumber"]').val());
            // // console.log($('input[name="exp-date"]').val());
            // // console.log($('input[name="exp-date"]').val());
            // // console.log($('input[name="cvc"]').val());
            // // console.log($('input[name="postal"]').val());
            // // console.log($('#card_number').val());
            // // console.log($('#csvno').val());
            // // console.log($('#postal').val());

            // stripe.createToken(card).then(function (result) {
            //     if (result.error) {
            //         $('#success-alert').show().find('.error_text').text(result.error.message);
            //     } else {
            //         var token = result.token.id;
            //         $('<input>').attr({
            //             type: 'hidden',
            //             name: 'stripeToken',
            //             value: token
            //         }).appendTo('form');
            //         console.log(token);
            //         $('form').submit();
            //     }
            // });
        });
    });

</script>

<script>
    $(".app-sidebar").hide();
    $(".app-header").hide();
    $(".switcher-wrapper").hide();
</script>

<script type="text/javascript">
    $(function () {
        $("#success-alert").hide();
        $("#o_zip1").autocomplete({
            source: "/get_zip"
        });
    });

    function validateForm() {
        var firstname = document.getElementById("firstname").value;
        if (firstname == null || firstname == "") {
            $(".error_text").html("Please enter Card First Name!");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#firstname').focus();
            $('#firstname').addClass("error");
            return false;
        }

        var lastname = document.getElementById("lastname").value;
        if (lastname == null || lastname == "") {
            $(".error_text").html("Please enter Card Last Name!");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#lastname').focus();
            $('#lastname').addClass("error");
            return false;
        }

        var billaddress = document.getElementById("billing_address").value;
        if (billaddress == null || billaddress == "") {
            $(".error_text").html("Please enter billing address!");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#billing_address').focus();
            $('#billing_address').addClass("error");
            return false;
        }

        var type_card = $('#card_type :selected').val();

        if (type_card == '') {
            $(".error_text").html("Please select Card Type!");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#card_type').focus();
            $('#card_type').addClass("error");
            return false;
        }

        // var cardno = document.getElementById("card_number").value;
        // if (cardno == null || cardno == "") {
        //     $(".error_text").html("Please enter card no!");
        //     $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        //         $("#success-alert").slideUp(500);
        //     });
        //     $('#card_number').focus();
        //     $('#card_number').addClass("error");
        //     return false;
        // }
        // if (cardno.length < 25) {
        //     $(".error_text").html("Please enter valid card no!");
        //     $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        //         $("#success-alert").slideUp(500);
        //     });
        //     $('#card_number').focus();
        //     $('#card_number').addClass("error");
        //     return false;
        // }

        var cardexpirydate = document.getElementById("cardexpirydate").value;
        var expire = cardexpirydate.replace(/\//g, "");
        var res = expire.split("  ");
        var card_year1 = res[1];
        var card_month1 = res[0];
        var year = "{{date('Y')}}";
        var month = "{{date('m')}}";

        year = parseInt(year);
        card_month1 = parseInt(card_month1);
        card_year1 = parseInt(card_year1);
        month = parseInt(month);

        if (month.toString().length < 2) {
            month = "0" + month;
        }
        if (card_month1.toString().length < 2) {
            card_month1 = "0" + card_month1;
        }

        var temp = 0;

        if (card_month1 > month) {
            temp++;
        }
        if (card_year1 > year) {
            temp++;
        }
        if (card_month1 < month && card_year1 > year) {
            temp++;
        }

        if (temp <= 0) {
            $(".error_text").html("Please enter valid expiry date");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#cardexpirydate').focus();
            $('#cardexpirydate').addClass("error");
            return false;
        }

        var cardsecurity = document.getElementById("csvno").value;
        if (cardsecurity == null || cardsecurity == "") {
            $(".error_text").html("Please enter card CVC!");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#csvno').focus();
            $('#csvno').addClass("error");
            return false;
        }
        if (cardsecurity.length < 3) {
            $(".error_text").html("Please enter valid CVC!");
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            });
            $('#csvno').focus();
            $('#csvno').addClass("error");
            return false;
        }
    }

    $("#card_number").mask("9999 - 9999 - 9999 - 9999");
    $("#cardexpirydate").mask("99 / 9999");
    $("#csvno").mask("999");
</script>
@endsection