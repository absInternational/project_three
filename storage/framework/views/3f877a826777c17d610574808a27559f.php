<?php echo $__env->make('partials.mainsite_pages.return_function', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__currentLoopData = $getchat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chatrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <a class="dropdown-item border-bottom" href="<?php echo e(url('/chats/user/'.$chatrow->fromuserId)); ?>">
        <div class="d-flex align-items-center">
            <div class="">
                            <span
                                    class="avatar avatar-md brround align-self-center cover-image"
                                    data-image-src="<?php echo e(url('assets/images/users/user.jpg')); ?>"></span>
            </div>
            <div class="d-flex">
                <div class="pl-3">
                    <h6 class="mb-1"><?php echo e(get_user_name($chatrow->fromuserId)); ?>:</h6>

                    <p class="fs-13 mb-1">
                        <?php echo e($chatrow->description); ?>

                    </p>

                    <div class="small text-muted">
                        <?php echo e(\Carbon\Carbon::parse($chatrow->created_at)->format('M,d Y h:i A')); ?>

                    </div>
                </div>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $getGroupChat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chatrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="dropdown-item border-bottom" href="<?php echo e(url('/chats/group/'.$chatrow->group_id)); ?>">
        <div class="d-flex align-items-center">
            <div class="">
                <?php if($chatrow->grouplogo): ?>
                <span
                class="avatar avatar-md brround align-self-center cover-image"
                data-image-src="<?php echo e(asset('storage/images/group/'.$chatrow->group->logo)); ?>"></span>
                <?php else: ?>
                <span
                class="avatar avatar-md brround align-self-center cover-image"
                data-image-src="<?php echo e(asset('images/group-chat.png')); ?>"></span>
                <?php endif; ?>
            </div>
            <div class="d-flex">
                <div class="pl-3">
                    <h6 class="mb-1"><?php echo e($chatrow->group->name); ?>:</h6>

                    <p class="fs-13 mb-1">
                        <?php echo e($chatrow->user->name); ?>: <?php echo e(\Illuminate\Support\Str::words($chatrow->message,3)); ?>

                    </p>

                    <div class="small text-muted">
                        <?php echo e(\Carbon\Carbon::parse($chatrow->created_at)->format('M,d Y h:i A')); ?>

                    </div>
                </div>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/n0aa435/crm.roadya.com/resources/views/main/phone_quote/global_chat/chat-noti.blade.php ENDPATH**/ ?>