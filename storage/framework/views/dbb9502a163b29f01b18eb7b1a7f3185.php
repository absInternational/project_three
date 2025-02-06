<?php if(isset($price->id)): ?>
<?php
$price1 = (json_decode($price->carrier_price1) !== null) ? json_decode($price->carrier_price1) : ['0'];
$price2 = (json_decode($price->carrier_price2) !== null) ? json_decode($price->carrier_price2) : ['0'];
$price3 = (json_decode($price->carrier_price3) !== null) ? json_decode($price->carrier_price3) : ['0'];
$price4 = (json_decode($price->carrier_price4) !== null) ? json_decode($price->carrier_price4) : ['0'];
$price5 = (json_decode($price->carrier_price5) !== null) ? json_decode($price->carrier_price5) : ['0'];
$price6 = (json_decode($price->carrier_price6) !== null) ? json_decode($price->carrier_price6) : ['0'];
$price7 = (json_decode($price->carrier_price7) !== null) ? json_decode($price->carrier_price7) : ['0'];
$price8 = (json_decode($price->carrier_price8) !== null) ? json_decode($price->carrier_price8) : ['0'];
$price9 = (json_decode($price->carrier_price9) !== null) ? json_decode($price->carrier_price9) : ['0'];
$price10 = (json_decode($price->carrier_price10) !== null) ? json_decode($price->carrier_price10) : ['0'];
$price11 = (json_decode($price->carrier_price11) !== null) ? json_decode($price->carrier_price11) : ['0'];
$price12 = (json_decode($price->carrier_price12) !== null) ? json_decode($price->carrier_price12) : ['0'];
$price13 = (json_decode($price->carrier_price13) !== null) ? json_decode($price->carrier_price13) : ['0'];
$price14 = (json_decode($price->carrier_price14) !== null) ? json_decode($price->carrier_price14) : ['0'];
$price15 = (json_decode($price->carrier_price15) !== null) ? json_decode($price->carrier_price15) : ['0'];
$price16 = (json_decode($price->carrier_price16) !== null) ? json_decode($price->carrier_price16) : ['0'];
$price17 = (json_decode($price->carrier_price17) !== null) ? json_decode($price->carrier_price17) : ['0'];
$price18 = (json_decode($price->carrier_price18) !== null) ? json_decode($price->carrier_price18) : ['0'];
$price19 = (json_decode($price->carrier_price19) !== null) ? json_decode($price->carrier_price19) : ['0'];
$price20 = (json_decode($price->carrier_price20) !== null) ? json_decode($price->carrier_price20) : ['0'];

?>
<?php $__currentLoopData = $price1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 border p-4 my-3">
        <h4>Carrier Prices (Car) <?php echo e($price->miles ?? 'N/A'); ?> Miles</h4>
        <table class="table table-hover">
            <tr>
                <th>Price 1: </th>
                <td>$<?php echo e($price1[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 2: </th>
                <td>$<?php echo e($price2[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 3: </th>
                <td>$<?php echo e($price3[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 4: </th>
                <td>$<?php echo e($price4[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 5: </th>
                <td>$<?php echo e($price5[$key]); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 border p-4 my-3">
        <h4>Carrier Prices (SUV) <?php echo e($price->miles ?? 'N/A'); ?> Miles</h4>
        <table class="table table-hover">
            <tr>
                <th>Price 6: </th>
                <td>$<?php echo e($price6[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 7: </th>
                <td>$<?php echo e($price7[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 8: </th>
                <td>$<?php echo e($price8[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 9: </th>
                <td>$<?php echo e($price9[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 10: </th>
                <td>$<?php echo e($price10[$key]); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 border p-4 my-3">
        <h4>Carrier Prices (Pickup) <?php echo e($price->miles ?? 'N/A'); ?> Miles</h4>
        <table class="table table-hover">
            <tr>
                <th>Price 11: </th>
                <td>$<?php echo e($price11[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 12: </th>
                <td>$<?php echo e($price12[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 13: </th>
                <td>$<?php echo e($price13[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 14: </th>
                <td>$<?php echo e($price14[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 15: </th>
                <td>$<?php echo e($price15[$key]); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 border p-4 my-3">
        <h4>Carrier Prices (Van) <?php echo e($price->miles ?? 'N/A'); ?> Miles</h4>
        <table class="table table-hover">
            <tr>
                <th>Price 16: </th>
                <td>$<?php echo e($price16[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 17: </th>
                <td>$<?php echo e($price17[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 18: </th>
                <td>$<?php echo e($price18[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 19: </th>
                <td>$<?php echo e($price19[$key]); ?></td>
            </tr>
            <tr>
                <th>Price 20: </th>
                <td>$<?php echo e($price20[$key]); ?></td>
            </tr>
        </table>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/n0aa435/crm.roadya.com/resources/views/main/phone_quote/prices/price.blade.php ENDPATH**/ ?>