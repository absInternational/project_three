<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <?php echo $__env->make('partials.order.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        
        th , div , tr , h1 , h2 , h3 , h4, h5, h6, p, span{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="h-100vh bg-primary">

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('partials.order.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('extraScript'); ?>

</body>
</html>
<?php /**PATH /home/n0aa435/crm.roadya.com/resources/views/layouts/order.blade.php ENDPATH**/ ?>