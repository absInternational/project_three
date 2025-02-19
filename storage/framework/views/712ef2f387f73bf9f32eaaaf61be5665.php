
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    
    <!-- Title -->
    <title><?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> | <?php endif; ?> <?php echo e(config('app.name', Lang::get('titles.app'))); ?></title>


    <!--Favicon -->
    <link rel="icon" href="<?php echo e(url('assets/images/brand/favicon.ico')); ?>" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="<?php echo e(url('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(url('assets/js/jquery-ui-1.12.1/jquery-ui.min.css')); ?>">

    <!-- Style css -->
    <link href="<?php echo e(url('assets/css/style.css')); ?>?id=1" rel="stylesheet"/>
    <link href="<?php echo e(url('assets/css/dark.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(url('assets/css/skin-modes.css')); ?>" rel="stylesheet"/>

    <!-- Animate css -->
    <link href="<?php echo e(url('assets/css/animated.css')); ?>" rel="stylesheet"/>

    <!--Sidemenu css -->
    <link href="<?php echo e(url('assets/css/sidemenu.css')); ?>" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="<?php echo e(url('assets/plugins/p-scrollbar/p-scrollbar.css')); ?>" rel="stylesheet"/>

    <!---Icons css-->
    <link href="<?php echo e(url('assets/css/icons.css')); ?>" rel="stylesheet"/>


    <!-- INTERNAl WYSIWYG Editor css -->
    <link href="<?php echo e(url('assets/plugins/wysiwyag/richtext.css')); ?>" rel="stylesheet"/>

    <!-- Simplebar css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/plugins/simplebar/css/simplebar.css')); ?>">

    <!-- Color Skin css -->
    <link id="theme" href="<?php echo e(url('assets/colors/color1.css')); ?>" rel="stylesheet" type="text/css"/>

    <!-- Switcher css -->
    <link rel="stylesheet" href="<?php echo e(url('assets/switcher/css/switcher.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/switcher/demo.css')); ?>">

    <style>
        .img_border {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 35px;
        }
    </style>


    <style>
        .fade {
            transition: opacity 0.15s linear;
        }

        .modal_Style {
            background: black;
            opacity: 0.5;
        }

        #btn_center {
            max-width: 720px;
            margin: auto;
        }

        .radio_btn {
            margin: 31px;
        }

        textarea.form-control {
            height: 99px;
        }

        .form-group i {
            color: #705ec8;
        }

        .form-group i {
            margin-right: 10px;
            font-weight: bold;
            font-size: 16px;
            /* padding-top: 10px; */
            line-height: 1;
        }

        #add_btn {
            font-size: 20px;
            color: blue;

        }

        #remove_btn {
            font-size: 20px;
            color: red;
            padding: 9px;
        }

        .margin_lft {
            margin-left: -10px;
        }

        .nav {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: initial;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .modal_style {
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px #404040;
        }

        .heading_style {

            justify-content: center;
            font-family: fangsong;
            color: black;
            border-bottom: 3px solid black;
            font-size: 25px;
            padding: 2px;


        }

        .form-control {
            color: #020402;
            opacity: 2;
            border: 1px solid black;
        }

        .heading_font {
            font-size: 30px;
            border-bottom: 0px solid black;

        }

        .modal-title {

            font-size: 18px;
            color: black;
            font-family: revert;
            padding: 7px;
        }

        .modal_subtitle {

            font-size: 20px;
            color: black;
            font-family: revert;
            padding: 7px;
        }
    </style>

    <style>
        @keyframes fa-blink {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 0;
            }
        }

        .fa-blink {
            -webkit-animation: fa-blink .75s linear infinite;
            -moz-animation: fa-blink .75s linear infinite;
            -ms-animation: fa-blink .75s linear infinite;
            -o-animation: fa-blink .75s linear infinite;
            animation: fa-blink .75s linear infinite;

        }
    </style>

    <style>

        .ql-picker-label {
            width: 30px;
        }

        .bottompopups a {
            background: none;
            margin: auto;
            position: fixed;
            bottom: 1%;
            width: 50px;
            height: 50px;
            z-index: 999;
            text-decoration: none;
            color: #ffffff;
            border-radius: 5px;
        }

        .bottompopups .bp1 {
            right: 20px;
            /* background-color: #cae01e; */
            background-color: #004992;
            color: #00d0ff;
            border: 1px solid black;
        }

        .bottompopups .bp2 {
            right: 80px;
            background-color: #0052ff;
            border: 1px solid #000000;

            /* background-color: #ff9800; */
        }

        .bottompopups .bp3 {
            right: 140px;
            background-color: #2196f3;
            border: 1px solid black;

        }

        .bottompopups .bp4 {
            right: 200px;
            background-color: #f7ce5b;
            border: 1px solid black;

        }

        .bottompopups .bp5 {
            right: 260px;
            background-color: #f7625b;
            border: 1px solid black;

        }

        .bottompopups i {
            font-size: 40px;
            margin: 5px;
        }

        .bottompopups i img {
            height: 40px;
        }

        #back-to-top {
            bottom: 61px;
        }

        .nav-tabs .nav-link.active {
            color: rgb(255, 255, 255);
            background: #007bff;
            size: 50px;
            /* width: 51px; */
            height: 44px;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #17a2b8;
            border-color: #705ec8;
            box-shadow: 0 0px 10px -5px rgba(112, 94, 200, 0.5);
        }

        .nav-tabs .nav-item .nav-link:hover {
            color: black;
            border: 1px solid black;

        }

        select.form-control:not([size]):not([multiple]) {
            height: 3.375rem;
        }
        .nav-link.icon .header-icon {
            padding: 3px;!important;
        }

        body {
            margin: 0;
            font-family: "Roboto", "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #040406;
            text-align: left;
            background-color: #f0f2f7;
        }

    </style>
<?php /**PATH C:\xampp\htdocs\project_three\resources\views/partials/mainsite_p/head.blade.php ENDPATH**/ ?>