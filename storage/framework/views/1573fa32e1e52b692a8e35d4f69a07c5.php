<?php $__env->startSection('template_title'); ?>
    Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="https://www.google.com/recaptcha/api.js" 
async defer></script>
    <div class="box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <?php if(session('flash_message')): ?>
        <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  <?php echo e(session('flash_message')); ?></div>
    <?php endif; ?>
    <div class="page">
        <div class="page-content">
            <div class="container">
                <form action="<?php echo e(route('getlogin2')); ?>" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <div class="text-white">
                                    <div class="card-body">
                                        <h2 class="display-4 mb-2 font-weight-bold error-text text-center">
                                            <strong>Login</strong></h2>
                                        <h4 class="text-white-80 mb-7 text-center">Sign In to your account</h4>
                                        <div class="row">
                                            <div class="col-9 d-block mx-auto">
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    </div>
                                                    <input id="email" type="email"
                                                           class="form-control"
                                                           name="email" value="" required autofocus>
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-lock"></i>
                                                        </div>
                                                    </div>
                                                    <input id="password" type="password" class="form-control"
                                                           name="password" required>
                                                </div>
                                                <div class="col-sm-12 mb-2 p-0">
                                                    <div class="g-recaptcha" id="feedback-recaptcha" 
                                                         data-sitekey="6LeoLjknAAAAAMG7lg4VsHVuD17VTKVAt0rNElXa">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" id="loginBtn"
                                                                class="btn  btn-secondary btn-block px-4">
                                                            Login
                                                        </button>
                                                      
                                                    </div>
                                                    
                                                        
                                                           
                                                            
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                            
                                                    
                                                    
                                            
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-flex align-items-center">
                            <img src="assets/images/png/login.png" alt="img">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>

<script src="<?php echo e(url('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/jquery-ui-1.12.1/jquery-ui.min.js')); ?>"></script>
<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function(){
        $.ajax({
           url:"<?php echo e(url('/logoutAllAccounts')); ?>",
           type:"GET",
           dataType:"json",
           success:function(res)
           {
               console.log(res);
           }
        });
    });
</script>

<script type="text/javascript">
     var onloadCallback = function() {
       grecaptcha.render('feedback-recaptcha', {
         'sitekey' : '6LeoLjknAAAAAE1OyJALGEBVvZB3xZXX-CqaqLvK'
       });
     };
     $("#loginBtn").click(function(e){
        var response = grecaptcha.getResponse();
        $("#feedback-recaptcha").parent('.col-sm-12').siblings('.text-danger').remove();
        if(response.length == 0) 
        { 
            e.preventDefault();
            $("#feedback-recaptcha").parent('.col-sm-12').after('<div class="text-danger col-sm-12 p-0 mb-2">Please check recaptcha, if you are not a robot!</div>');
        }
     })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n0aa435/crm.roadya.com/resources/views/main/auth/login2.blade.php ENDPATH**/ ?>