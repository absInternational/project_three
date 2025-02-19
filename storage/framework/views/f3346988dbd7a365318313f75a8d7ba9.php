<!-- Jquery js-->
<script src="<?php echo e(url('/assets/js/jquery-3.5.1.min.js')); ?>"></script>

<!-- Bootstrap4 js-->
<script src="<?php echo e(url('/assets/plugins/bootstrap/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>


<!-- INTERNAL Notifications js -->





<!--Othercharts js-->
<script src="<?php echo e(url('/assets/plugins/othercharts/jquery.sparkline.min.js')); ?>"></script>

<!-- Circle-progress js-->
<script src="<?php echo e(url('/assets/js/circle-progress.min.js')); ?>"></script>

<!-- Jquery-rating js-->
<script src="<?php echo e(url('/assets/plugins/rating/jquery.rating-stars.js')); ?>"></script>
<!-- Custom js-->
<script src="<?php echo e(url('/assets/js/custom.js')); ?>"></script>
<script>
    $(document).ready(function() {
        
        var now = new Date();
        var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 5, 0, 0, 0) - now;
        if (millisTill10 < 0) {
            millisTill10 += 86400000; 
        }
        setTimeout(function(){
            $.ajax({
                url:"<?php echo e(url('/logoutAllAccounts')); ?>",
                type:'GET',
                dataType:'json',
                success: function (res){
                    console.log(res);
                }
            });
        }, millisTill10);
    })
</script>
<?php /**PATH C:\xampp\htdocs\project_three\resources\views/partials/order/foot.blade.php ENDPATH**/ ?>