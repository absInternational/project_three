@extends('layouts.email')

@section('template_title')
    Signature Email
@endsection

@section('content')

<tr>
    <td valign="top" align="center">
        <table width="600" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
            <tbody>
            <tr>
                <td valign="top" bgcolor="#ffffff" align="center">

                    <!-- Start Space -->
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                        <tbody>
                        <tr>
                            <td height="26">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- End Space -->

                    <!-- Section 1 Starts / Logo & Menu -->
                    <table align="center" cellspacing="0" cellpadding="0" border="0" class="content-width-menu">
                        <tbody>
                        <tr>
                            <td height="25" valign="middle">

                                <!-- Start Logo -->
                                <table align="center" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                    <tbody>
                                    <tr>
                                        <td height="30" valign="middle" align="left" class="center-stack"  style="font-family: Open Sans, sans-serif;font-size: 18px;font-weight:bold;" ><a href="#" style="color: #1E9FF2;"><span style="font-size: 35px;font-weight:bold;font-family: 'Lato', sans-serif;">All State To State Auto Transport</span></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- End Logo -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- Section 1 Ends / Logo & Menu -->

                    <!-- Start Space -->
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                        <tbody>
                        <tr>
                            <td height="25">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- End Space -->

                    <!-- After Menu Start -->
                    <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                        <tbody>
                        <tr>
                            <td align="center">

                            @if($order->vtype == 1 || $order->vtype == '')
                                <!-- Section 2 Start / Start Block Content -->
                                    <table bgcolor="#666666" width="100%" cellspacing="0" cellpadding="0" border="0" background="{{ url('images/email/veh.jpg') }}" style="background-repeat: no-repeat; !important; background-position: center center;background-size: cover;" class="full-width">
                                        <tbody>
                                        <!--<tr style="background: #00000085;">-->
                                        <!--<td class="front" style="font-family: Open Sans, sans-serif; font-size: 60px;mso-line-height-rule:exactly; line-height:60px; font-weight: bold; color: #ffffff;" align="center">HEAVY EQUIPMENT</td>-->
                                        <!--</tr>-->
                                        <!--<tr>-->
                                        <!--<td class="front" height="150" align="center"><img src="img/star.png" width="131" height="14" alt=""/></td>-->
                                        <!--</tr>-->
                                        <tr>
                                            <td class="front" height="200">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="front" height="50">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- Section 2 End / End Block Content -->
                            @elseif($order->vtype == 2)
                                <!-- Section 2 Start / Start Block Content -->
                                    <table bgcolor="#666666" width="100%" cellspacing="0" cellpadding="0" border="0" background="{{ url('images/email/moto.jpg') }}" style="background-repeat: no-repeat; !important; background-position: center center;background-size: cover;" class="full-width">
                                        <tbody>
                                        <!--<tr style="background: #00000085;">-->
                                        <!--<td class="front" style="font-family: Open Sans, sans-serif; font-size: 60px;mso-line-height-rule:exactly; line-height:60px; font-weight: bold; color: #ffffff;" align="center">HEAVY EQUIPMENT</td>-->
                                        <!--</tr>-->
                                        <!--<tr>-->
                                        <!--<td class="front" height="150" align="center"><img src="img/star.png" width="131" height="14" alt=""/></td>-->
                                        <!--</tr>-->
                                        <tr>
                                            <td class="front" height="200">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="front" height="50">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- Section 2 End / End Block Content -->
                            @elseif($order->vtype == 3)
                                <!-- Section 2 Start / Start Block Content -->
                                    <table bgcolor="#666666" width="100%" cellspacing="0" cellpadding="0" border="0" background="{{ url('images/email/heavy-equipment.jpg') }}" style="background-repeat: no-repeat; !important; background-position: center center;background-size: cover;" class="full-width">
                                        <tbody>
                                        <!--<tr style="background: #00000085;">-->
                                        <!--<td class="front" style="font-family: Open Sans, sans-serif; font-size: 60px;mso-line-height-rule:exactly; line-height:60px; font-weight: bold; color: #ffffff;" align="center">HEAVY EQUIPMENT</td>-->
                                        <!--</tr>-->
                                        <!--<tr>-->
                                        <!--<td class="front" height="150" align="center"><img src="img/star.png" width="131" height="14" alt=""/></td>-->
                                        <!--</tr>-->
                                        <tr>
                                            <td class="front" height="200">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="front" height="50">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- Section 2 End / End Block Content -->
                            @endif
                            <?php
                            $searchString = ',';
                            ?>
                            <!-- Section 3 Start -->
                                <table width="100%" cellspacing="0" cellpadding="0" border="0" class="full-width">
                                    <tbody>
                                    <tr>
                                        <td align="center">
                                            <!-- Left Part Start -->
                                            <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="mobile-width">
                                                <tbody>
                                                <tr>
                                                    <td align="center">

                                                        <!-- Start Block Content -->
                                                        <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                            <tbody>
                                                            <tr>
                                                                <td valign="top" align="center">

                                                                    <!-- Start Column 1 -->
                                                                    <table width="550" align="center" cellspacing="0" cellpadding="0" border="0" class="content-width">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style=" mso-line-height-rule:exactly; line-height:50px; height:50px">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" style="font-size:15px; mso-line-height-rule:exactly; line-height:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">HELLO {{ strtoupper($order->cname) }}!</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="30" align="left"><img src="{{ url('images/email/green_line.jpg') }}" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size:13px; line-height: 20px; mso-line-height-rule:exactly; color:#414848; font-weight:normal; font-family: Open Sans, sans-serif;" align="left">Thank you for Considering <strong>All State To State Auto Transport.</strong></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="32" style="font-size:32px; mso-line-height-rule:exactly; line-height:32px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-size:15px; mso-line-height-rule:exactly; line-height:15px; color:#2c3e50; font-weight:bold; font-family: Open Sans, sans-serif;">Summary for Quote #{{ $order->id }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="30" align="center"><img src="{{ url('images/email/green_line.jpg') }}" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size:13px; mso-line-height-rule:exactly;  line-height:16px; color:#414848; font-weight:normal; font-family: Open Sans, sans-serif;" align="center">
                                                                                <table class="table" align="center">
                                                                                    <tr>
                                                                                        <td>Pick up :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            {{ $order->ocity }}, {{ $order->ostate }} {{ $order->ozip }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="background-color: #dddddd;">
                                                                                        <td>Delivery :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            {{ $order->dcity }}, {{ $order->dstate }} {{ $order->dzip }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        @if($order->vtype == 1 || $order->vtype == '')
                                                                                            <td>Vehicle :</td>

                                                                                        @elseif($order->vtype == 2)
                                                                                            <td>Motorcycle :</td>

                                                                                        @elseif($order->vtype == 3)
                                                                                            <td>Heavy Equipment :</td>

                                                                                        @endif

                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            @if(strpos($order->vmake, $searchString) !== false)
                                                                                                <?php
                                                                                                $make = explode(',',$order->vmake);
                                                                                                $model = explode(',',$order->vmodel);
                                                                                                $year = explode(',',$order->vyear);
                                                                                                $numItems = count($make)-1;
                                                                                                $i = 0;
                                                                                                ?>
                                                                                                @if(count($make) >= 1)
                                                                                                    @for($a = 0; $a < count($make); $a++)
                                                                                                        @if(isset($year[$a]))
                                                                                                            {{ ucwords($year[$a]) }}
                                                                                                        @endif
                                                                                                        @if(isset($make[$a]))
                                                                                                            {{ ucwords($make[$a]) }}
                                                                                                        @endif
                                                                                                        @if(isset($model[$a]))
                                                                                                            {{ ucwords($model[$a]) }}
                                                                                                        @endif
                                                                                                        @if(++$i === $numItems) | @endif
                                                                                                    @endfor
                                                                                                @endif
                                                                                            @else
                                                                                                @if($order->vtype == 1 || $order->vtype == '')
                                                                                                    {{ $order->vyear }} {{ $order->vmake }} {{ $order->vmodel }}
                                                                                                @else
                                                                                                    {{ $order->heading }}
                                                                                                @endif
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="background-color: #dddddd;">
                                                                                        <td>Condition :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            @if(strpos($order->vruns, $searchString) !== false)
                                                                                                <?php
                                                                                                $vruns = explode(',',$order->vruns);
                                                                                                $numItems = count($vruns)-1;
                                                                                                $i = 0;
                                                                                                ?>
                                                                                                @if(count($vruns) >= 1)
                                                                                                    @for($a = 0; $a < count($vruns); $a++)
                                                                                                        @if($vruns[$a] == 1)Running @else Non-Running @endif @if(++$i === $numItems) | @endif
                                                                                                    @endfor
                                                                                                @endif
                                                                                            @else
                                                                                                @if($order->vruns == 1)
                                                                                                    Running
                                                                                                @else
                                                                                                    Non-Running
                                                                                                @endif
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Transport type :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            @if(strpos($order->carrirer, $searchString) !== false)
                                                                                                <?php
                                                                                                $carrirer = explode(',',$order->carrirer);
                                                                                                $numItems = count($carrirer)-1;
                                                                                                $i = 0;
                                                                                                ?>
                                                                                                @if(count($carrirer) >= 1)
                                                                                                    @for($a = 0; $a < count($carrirer); $a++)
                                                                                                        {{ ucwords($carrirer[$a]) }} @if(++$i === $numItems) | @endif
                                                                                                    @endfor
                                                                                                @endif
                                                                                            @else
                                                                                                {{ ucwords($order->carrirer) }}
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="background-color: #dddddd;">
                                                                                        <td>Insurance :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            MINIMUM THREE QUARTER MILLION DOLLAR POLICY
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Service Type :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            Door to Door
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="background-color: #dddddd;">
                                                                                        <td>Discount Price :</td>
                                                                                        <td style="font-weight: bold;color: #000;">
                                                                                            ${{ $order->payment }}
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="32">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <table align="center" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        @if($id == 1)
                                                                                            <td style="border:#1E9FF2 solid 1px; border-radius:4px; color:#1E9FF2; display:block; font-family: Open Sans, sans-serif; font-size:12px; font-weight:bold; mso-line-height-rule:exactly; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:200px; -webkit-text-size-adjust:none;"><a style="color:#1E9FF2;font-family: Open Sans, sans-serif; font-size:13px; font-weight:800;" href="{{ url('complete-booking/'.base64_encode($order->id)) }}">COMPLETE BOOKING</a></td>
                                                                                        @elseif($id == 2)
                                                                                            <td style="border:#1E9FF2 solid 1px; border-radius:4px; color:#1E9FF2; display:block; font-family: Open Sans, sans-serif; font-size:12px; font-weight:bold; mso-line-height-rule:exactly; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:200px; -webkit-text-size-adjust:none;"><a style="color:#1E9FF2;font-family: Open Sans, sans-serif; font-size:13px; font-weight:800;" href="{{ url('ship/complete-booking/'.base64_encode($order->id)) }}">COMPLETE BOOKING</a></td>
                                                                                        @elseif($id == 3)
                                                                                            <td style="border:#1E9FF2 solid 1px; border-radius:4px; color:#1E9FF2; display:block; font-family: Open Sans, sans-serif; font-size:12px; font-weight:bold; mso-line-height-rule:exactly; line-height:12px; text-align:center; text-decoration:none; padding-top: 10px; padding-bottom: 10px; width:200px; -webkit-text-size-adjust:none;"><a style="color:#1E9FF2;font-family: Open Sans, sans-serif; font-size:13px; font-weight:800;" href="{{ url('heavy/complete-booking/'.base64_encode($order->id)) }}">COMPLETE BOOKING</a></td>
                                                                                        @endif
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="50">&nbsp;</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- End Column 1 -->

                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- Section 3 End -->

                                <!-- Section 4 Start -->

                                <!-- Section 6 Start -->
                                @include('partials.email.signverify')
                                <!-- Section 6 End -->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- End Space -->
                </td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection