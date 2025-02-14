<?php echo $__env->make('partials.mainsite_pages.return_function', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$respn = trim("$_SERVER[REQUEST_URI]", '/');
if (isset($_GET['titlee'])) {
    $respn = $_GET['titlee'];
}
?>
<?php
    $check_panel = check_panel();
    $check_call = check_call();

  if ($check_panel == 1) {
     $phoneaccess = explode(',', Auth::user()->emp_access_phone);
 } elseif ($check_panel == 2) {
     $phoneaccess = explode(',', Auth::user()->emp_access_web);
 } elseif ($check_panel == 3) {
     $phoneaccess = explode(',', Auth::user()->emp_access_test);
 } elseif ($check_panel == 4) {
     $phoneaccess = explode(',', Auth::user()->panel_type_4);
 } elseif ($check_panel == 5) {
     $phoneaccess = explode(',', Auth::user()->panel_type_5);
 } elseif ($check_panel == 6) {
     $phoneaccess = explode(',', Auth::user()->panel_type_6);
 } else {
     $phoneaccess = []; // Default case if $ptype is not within 1-6
 }
?>
<style>
    /*.table-bordered {*/
    /*    font-size: 13px; !important;*/
    /*}*/
    /*.badge{*/
    /*    font-size: 14px!important;*/
    /*}*/
    /*.table-bordered, .text-wrap table, .table-bordered th, .text-wrap table th, .table-bordered td, .text-wrap table td {*/
    /*    border: 1px solid rgb(0 0 0) !important;*/
    /*}*/
    .table {
        /*color: rgb(0 0 0);*/
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
    }

    .table>thead>tr>td,
    .table>thead>tr>th {
        font-weight: 400;
        -webkit-transition: all .3s ease;
        font-size: 18px;
        color: rgb(0 0 0);
    }

    .table-data-align {
        display: flex;
        align-items: flex-end;
    }

    .table-btn-style {}

    .bg-white th {
        border: 1px solid #000000 !important;
    }

    .bg-white td {
        border: 1px solid #000000 !important;
    }

    /*====================modalnew================*/
    .tab-pane.active {
        display: block;
    }

    .tab-pane {
        display: none;
    }

    .btn-success.active {
        display: block;
    }

    .btn-success {
        dispaly: none
    }

    .mf-content.w-100 {
        background: #8080802e;
        padding: 20px;
    }

    div#tab2 {
        overflow-y: scroll;
    }

    .modal-dialog.modal-dialog-centered {
        max-width: 50%;
    }

    .modal-backdrop.fade.show {
        width: 100%;
        height: 100%;
    }

    /*====================modalnew================*/
</style>

<div class="table-responsive" id="usedAndNewTableBody">
    
    <table class="table table-bordered table-sm col-lg-2 fs-18 text-center pd-2 bd-l" role="grid" aria-describedby="">
        <thead class="table-dark">
        <tr>
            <th>Sr. #</th>
            <th width="15%">Client Name</th>
            <th width="15%">Number</th>
            <th width="15%">Phone2</th>
            <th width="15%">Phone3</th>
            <?php if(Auth::user()->role === 1 || Auth::user()->role === 3 || Auth::user()->role === 9): ?>
                <th width="10%">Action</th>
            <?php endif; ?>
            <th width="10%">Address</th>
            <th width="10%">State</th>
            <th width="10%">Type</th>
            <th width="10%">Email</th>
            <th width="10%">Send Email</th>
            <th width="10%">Other Detail</th>
            <th width="10%">Created At</th>
        </tr>
        </thead>
        <tbody id="usedAndNewTableBody">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                // $key = $key + 1;
                $i = $data->firstItem();
            ?>
            <tr class="parent1<?php echo e($key); ?>">
                <td><?php echo e($key + $i); ?></td>
                <td><?php echo e($val->name); ?></td>
                <td>
                        <?php
                        $digits = \App\PhoneDigit::first();
                        if (in_array('61', $phoneaccess)) {
                            $new = $val->phone;
                        } else {
                            $new = putX($digits->hide_digits, $digits->left_right_status, $val->phone);
                        }
                        ?>
                    <span class="badge badge-primary mb-2">
                            <a onclick="call('<?php echo e(base64_encode($val->phone)); ?>', '<?php echo e($val->id); ?>')"
                               class="btn btn-outline-info mobile count_user"
                               style="padding: 3px 5px; font-size: 16px;">
                                <i class="fa fa-phone"></i>
                                <span><?php echo e($new); ?></span>
                            </a>
                        </span><br>
                    <span class="badge badge-success mb-2">
                            <a class="btn btn-outline-info  sms mb-2" onclick="msg('<?php echo e(base64_encode($val->phone)); ?>')"
                               style="padding: 3px 5px; font-size: 16px;"><i
                                        class="fa fa-envelope"></i>&nbsp;<?php echo e($new); ?>

                            </a>
                        </span><br>
                    <?php if(in_array('104', $phoneaccess)): ?>
                        <span class="badge badge-success mb-2">
                                <a onclick="openWhatsApp('<?php echo e($val->phone); ?>', '<?php echo e($val->id); ?>')"
                                   class="btn btn-success" style="padding: 3px 5px; font-size: 16px;">
                                    <i class="fa fa-whatsapp"></i>
                                    <span><?php echo e($new); ?></span>
                                </a>
                            </span>
                    <?php endif; ?>

                    <script>
                        function openWhatsApp(phone, approachId) {
                            const formattedPhone = '+' + phone.replace(/[^\d]+/g, '');
                            const whatsappLink = `https://wa.me/${formattedPhone}`;
                            window.open(whatsappLink, '_blank');
                            $.ajax({
                                url: '<?php echo e(route('autosapproachnew.phone.count')); ?>',
                                type: 'GET',
                                data: {
                                    'approachId': approachId,
                                    'type': 2,
                                },
                                success: function(data) {
                                    alert(data);
                                },
                                error: function(data) {
                                    var errors = data.responseJSON;
                                }
                            });
                        }
                    </script>
                </td>
                <td>
                    <?php if($val->phone2): ?>
                            <?php
                            $digits = \App\PhoneDigit::first();
                            if (in_array('61', $phoneaccess)) {
                                $new = $val->phone2;
                            } else {
                                $new = putX($digits->hide_digits, $digits->left_right_status, $val->phone2);
                            }
                            ?>
                        <span class="badge badge-primary mb-2">
                                <a onclick="call('<?php echo e(base64_encode($val->phone2)); ?>', '<?php echo e($val->id); ?>')"
                                   class="btn btn-outline-info mobile count_user"
                                   style="padding: 3px 5px; font-size: 16px;">
                                    <i class="fa fa-phone"></i>
                                    <span><?php echo e($new); ?></span>
                                </a>
                            </span><br>
                        <?php if(in_array('104', $phoneaccess)): ?>
                            <span class="badge badge-success mb-2">
                                    <a onclick="openWhatsApp('<?php echo e($val->phone2); ?>', '<?php echo e($val->id); ?>')"
                                       class="btn btn-success" style="padding: 3px 5px; font-size: 16px;">
                                        <i class="fa fa-whatsapp"></i>
                                        <span><?php echo e($new); ?></span>
                                    </a>
                                </span>
                        <?php endif; ?>
                        <span class="badge badge-success mb-2">
                                <a class="btn btn-outline-info  sms mb-2"
                                   onclick="msg('<?php echo e(base64_encode($val->phone3)); ?>')"
                                   style="padding: 3px 5px; font-size: 16px;"><i
                                            class="fa fa-envelope"></i>&nbsp;<?php echo e($new); ?>

                                </a>
                            </span><br>

                        <script>
                            function openWhatsApp(phone, approachId) {
                                const formattedPhone = '+' + phone.replace(/[^\d]+/g, '');
                                const whatsappLink = `https://wa.me/${formattedPhone}`;
                                window.open(whatsappLink, '_blank');
                                $.ajax({
                                    url: '<?php echo e(route('autosapproachnew.phone.count')); ?>',
                                    type: 'GET',
                                    data: {
                                        'approachId': approachId,
                                        'type': 2,
                                    },
                                    success: function(data) {
                                        alert(data);
                                    },
                                    error: function(data) {
                                        var errors = data.responseJSON;
                                    }
                                });
                            }
                        </script>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('autosApproachNew.save.email')); ?>"
                              data-compid="<?php echo e($val->id); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="comp_id" value="<?php echo e($val->id); ?>">
                            <input type="text" class="form-control" name="phone2" required
                                   placeholder="Enter Number2">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($val->phone3): ?>
                            <?php
                            $digits = \App\PhoneDigit::first();
                            if (in_array('61', $phoneaccess)) {
                                $new = $val->phone3;
                            } else {
                                $new = putX($digits->hide_digits, $digits->left_right_status, $val->phone3);
                            }
                            ?>
                        <span class="badge badge-primary mb-2">
                                <a onclick="call('<?php echo e(base64_encode($val->phone3)); ?>', '<?php echo e($val->id); ?>')"
                                   class="btn btn-outline-info mobile count_user"
                                   style="padding: 3px 5px; font-size: 16px;">
                                    <i class="fa fa-phone"></i>
                                    <span><?php echo e($new); ?></span>
                                </a>
                            </span><br>
                        <?php if(in_array('104', $phoneaccess)): ?>
                            <span class="badge badge-success mb-2">
                                    <a onclick="openWhatsApp('<?php echo e($val->phone3); ?>', '<?php echo e($val->id); ?>')"
                                       class="btn btn-success" style="padding: 3px 5px; font-size: 16px;">
                                        <i class="fa fa-whatsapp"></i>
                                        <span><?php echo e($new); ?></span>
                                    </a>
                                </span>
                        <?php endif; ?>
                        <span class="badge badge-success mb-2">
                                <a class="btn btn-outline-info  sms mb-2"
                                   onclick="msg('<?php echo e(base64_encode($val->phone3)); ?>')"
                                   style="padding: 3px 5px; font-size: 16px;"><i
                                            class="fa fa-envelope"></i>&nbsp;<?php echo e($new); ?>

                                </a>
                            </span><br>

                        <script>
                            function openWhatsApp(phone, approachId) {
                                const formattedPhone = '+' + phone.replace(/[^\d]+/g, '');
                                const whatsappLink = `https://wa.me/${formattedPhone}`;
                                window.open(whatsappLink, '_blank');
                                $.ajax({
                                    url: '<?php echo e(route('autosapproachnew.phone.count')); ?>',
                                    type: 'GET',
                                    data: {
                                        'approachId': approachId,
                                        'type': 2,
                                    },
                                    success: function(data) {
                                        alert(data);
                                    },
                                    error: function(data) {
                                        var errors = data.responseJSON;
                                    }
                                });
                            }
                        </script>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('autosApproachNew.save.email')); ?>"
                              data-compid="<?php echo e($val->id); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="comp_id" value="<?php echo e($val->id); ?>">
                            <input type="text" class="form-control" name="phone3" required
                                   placeholder="Enter Number3">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    <?php endif; ?>
                </td>
                <?php if(Auth::user()->role === 3 || Auth::user()->role === 1 || Auth::user()->role === 9): ?>
                    <td>
                        <button type="button" class="btn btn-primary add-history" data-toggle="modal"
                                data-target="#exampleModal8">Add History
                            <input hidden type="text" class="Company-ID" value="<?php echo e($val->id); ?>">
                            <input hidden type="text" class="Company-Name" value="<?php echo e($val->name); ?>">
                        </button>
                    </td>
                <?php endif; ?>
                <td>
                   <form method="POST" action="<?php echo e(route('autosApproachNew.save.email')); ?>"
                      data-compid="<?php echo e($val->id); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="comp_id" value="<?php echo e($val->id); ?>">
                    <textarea type="text" style="width: 150px;font-size: 11px" class="form-control" name="address" required
                           placeholder="Enter Address"><?php echo e($val->address); ?></textarea>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                </td>
                <td>
                    <?php echo e($val->states); ?>

                </td>
                <td>
                    <?php echo e(($val->type == 1 ? 'Shipper' : ($val->type == 2 ? 'Carrier' : 'Broker'))); ?>

                </td>

                <td>
                    <?php if(Auth::user()->role === 1): ?>
                        <?php if($val->email != null && $val->email != '-'): ?>
                            <?php echo e($val->email); ?>

                        <?php else: ?>
                            <form class="addEmailForm" data-compid="<?php echo e($val->id); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="comp_id" value="<?php echo e($val->id); ?>">
                                <input type="email" class="emailInput" name="email" required
                                       placeholder="Enter Email">
                                <button type="button" class="btn btn-primary submitBtn">Add</button>
                            </form>

                            <div class="alert alert-danger mt-2" style="display: none;"
                                 id="invalidEmailAlert_<?php echo e($val->id); ?>">
                                Please enter a valid email address.
                            </div>

                            <script>
                                $(document).ready(function() {
                                    // Handle form submission with Ajax
                                    $('.addEmailForm[data-compid="<?php echo e($val->id); ?>"] .submitBtn').on('click', function() {
                                        var form = $(this).closest('form');
                                        var formData = form.serialize();

                                        // Validate email here if needed
                                        var emailInput = form.find('.emailInput');
                                        var emailValue = emailInput.val();
                                        if (!isValidEmail(emailValue)) {
                                            $('#invalidEmailAlert_' + form.data('compid')).show();
                                            return;
                                        } else {
                                            $('#invalidEmailAlert_' + form.data('compid')).hide();
                                        }

                                        // Ajax request
                                        $.ajax({
                                            url: '<?php echo e(route('autosApproachNew.save.email')); ?>',
                                            type: 'POST',
                                            data: formData,
                                            success: function(response) {
                                                // Clear the content of the <td>
                                                form.closest('td').html(response.email);
                                            },
                                            error: function(error) {
                                                console.error('Error:', error);
                                                // Handle errors if needed
                                            }
                                        });
                                    });

                                    function isValidEmail(email) {
                                        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                        return emailRegex.test(email);
                                    }
                                });
                            </script>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($val->email): ?>
                        <button type="button" class="btn btn-primary send-email">Send Email
                            <input hidden type="text" class="Email-Address" value="<?php echo e($val->email); ?>">
                        </button>
                        <?php
                            $emailHistory = \App\EmailHistory::where('recipient', $val->email)
                                ->orderby('id', 'DESC')
                                ->first();
                        ?>
                        
                        <a href="javascript:void(0)" class="view_email_history" data-toggle="modal"
                           data-target="#exampleModal11">
                            <input hidden type="text" class="History-Email-Address"
                                   value="<?php echo e($val->email); ?>">
                            View History
                        </a>
                    <?php endif; ?>
                </td>

                <td>
                    <?php echo e(!empty($val->other_details) ? $val->other_details : '-'); ?>

                    <br>
                    <?php echo e($val->website); ?>

                </td>
                <td>
                    <?php echo e($val->created_at); ?>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <div class="text-secondary my-auto">
            Showing <?php echo e($data->firstItem() ?? 0); ?> to <?php echo e($data->lastItem() ?? 0); ?> from total <?php echo e($data->total()); ?>

            entries
        </div>
        <div>
            <?php echo e($data->links()); ?>

        </div>

    </div>
    <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel8"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    

                    <h5 class="modal-title" id="exampleModalLabel">Add History For: <span class="history_id"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <form id="addHistoryForm" action="<?php echo e(route('autosapproachnew.store.call.history')); ?>" method="POST"
                                  class="needs-validation" novalidate class="tablelist-form" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body">
                                    <input type="hidden" name="CompanyID" value="" class="history_val">
                                    <div class="row g-3">
                                        <div class="row">
                                            <!--=============new modal===============-->
                                            <div class=" tab-menu-heading p-0 bg-light">
                                                <div class="tabs-menu1 ">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs  gap-2">
                                                        <li class=""><a href="#tab1"
                                                                        class="active btn btn-success"
                                                                        data-toggle="tab">HISTORY/STATUS</a>
                                                        </li>
                                                        <li><a href="#tab2" data-toggle="tab"
                                                               class="btn btn-success">VIEW HISTORY</a></li>
                                                        <li></li>
                                                        <li class="position-relative">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--=============new modal===============-->
                                        </div>
                                        <div class="tab-pane active" id="tab1">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                               id="connected" name="connectStatus" value="Connected"
                                                               checked>
                                                        <label class="custom-control-label form-label"
                                                               for="connected">Connected</label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input type="radio" class="custom-control-input"
                                                               id="notConnected" name="connectStatus"
                                                               value="Not Connected">
                                                        <label class="custom-control-label form-label"
                                                               for="notConnected">Not Connected</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="label-field" class="form-label">Add
                                                            Comments</label>
                                                        <textarea rows="3" name="comment" id="comment" placeholder="Enter Comments" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success"
                                                        id="add-btn close">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="chat-body-style ChatBody" id="calhistory" style=" height:300px;">

                                            <div class="message-feed media">
                                                <div class="media-body">
                                                    <div class="mf-content w-100 history-content">
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel8"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    

                    <h5 class="modal-title" id="exampleModalLabel">Email History For: <span
                                class="history_id"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group email-history-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>
</div>
<style>
    .tx-white {
        color: white !important;
    }

    .badge-orange {
        color: #212529;
        background-color: #F49917;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!--=============================modal view history==========================-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabLinks = document.querySelectorAll('.panel-tabs a');

        // Activate the default tab
        var defaultTab = document.querySelector('.panel-tabs .active');
        document.querySelector(defaultTab.getAttribute('href')).classList.add('active');

        tabLinks.forEach(function(tabLink) {
            tabLink.addEventListener('click', function(event) {
                event.preventDefault();

                // Deactivate all tabs
                tabLinks.forEach(function(link) {
                    link.classList.remove('active');
                });

                var tabs = document.querySelectorAll('.tab-pane');
                tabs.forEach(function(tab) {
                    tab.classList.remove('active');
                });

                // Activate the clicked tab
                this.classList.add('active');
                document.querySelector(this.getAttribute('href')).classList.add('active');
            });
        });
    });
</script>
<!--=============================modal view history==========================-->
<script>
    function call(num, approachId) {
        var num1 = atob(num);

        var check_panel = '<?php echo e($check_panel); ?>';
        var check_call = '<?php echo e($check_call); ?>';

        if (check_call == 134) {
            var formattedNum = num1.replace(/\D/g, '');
            window.location.href = 'tel:' + formattedNum;
        } else if (check_call == 135) {
            window.location.href = 'rcmobile://call/?number=' + num1;
        }
        $.ajax({
            url: "<?php echo e(route('autosapproachnew.phone.count')); ?>",
            type: "GET",
            data: {
                approachId: approachId,
                type: 1,
            },
            success: function(res) {
                console.log(res);
            }
        });
    }

    function msg(num) {
        var num1 = atob(num);
        var check_panel = '<?php echo e($check_panel); ?>';
        var check_call = '<?php echo e($check_call); ?>';

        if (check_call == 134) {
            var formattedNum = num1.replace(/\D/g, '');
            // window.location.href = 'sms:' + formattedNum;
            window.location.href = 'rcmobile://sms/?number=' + num1;
        } else if (check_call == 135) {
            window.location.href = 'rcmobile://sms/?number=' + num1;
        }
    }

    $(".add-history").click(function() {
        var company_id = $(this).find('.Company-ID').val();
        var CompanyName = $(this).find('.Company-Name').val();

        $(".history_id").html(CompanyName);
        $(".history_val").val(company_id);

        $.ajax({
            url: '<?php echo e(route('autosapproachnew.call.history')); ?>',
            type: 'GET',
            data: {
                'company_id': company_id,
            },
            success: function(data) {
                // Handle the success response
                console.log('datas', data);
                //showing history
                $(".history-content").html('');
                html = "";
                $.each(data, function(index, val) {
                    // Assuming val['created_at'] is a string representation of the date
                    var createdAt = new Date(val['created_at']);

                    // Format the date
                    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                        "Aug", "Sep", "Oct", "Nov", "Dec"
                    ];
                    var formattedDate = monthNames[createdAt.getMonth()] + "," +
                        ("0" + createdAt.getDate()).slice(-2) + " " +
                        createdAt.getFullYear() + " " +
                        ("0" + createdAt.getHours()).slice(-2) + ":" +
                        ("0" + createdAt.getMinutes()).slice(-2) +
                        (createdAt.getHours() >= 12 ? " PM" : " AM");

                    // Append formatted date to HTML
                    html += "<h6>" + val['user']['name'] + "</h6>";
                    html += "<h6>" + val['connectStatus'] + "</h6>";
                    html += "<h6>" + val['comment'] + ".</h6>";
                    html += "<strong class='mf-date'><i class='fa fa-clock-o'></i>" +
                        formattedDate + "</strong> <hr>";
                });
                $(".history-content").html(html);
                // resetting form
            },
            error: function(error) {
                // Handle the error response
                console.error('Error submitting the form:', error);
                // Optionally, you can display an error message or take other actions
            }
        });
    });

    $(".add-email").click(function() {
        var company_id = $(this).find('.Company-ID').val();
        var CompanyName = $(this).find('.Company-Name').val();

        $(".history_id").html(CompanyName);
        $(".history_val").val(company_id);

    });

    // Add history with ajax
    $("#addHistoryForm").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $(this).serialize();

        // Perform AJAX submission
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(data) {
                // Handle the success response
                console.log('data', data);
                //showing history
                $(".history-content").html('');
                html = "";
                $.each(data, function(index, val) {
                    // Assuming val['created_at'] is a string representation of the date
                    var createdAt = new Date(val['created_at']);

                    // Format the date
                    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                        "Aug", "Sep", "Oct", "Nov", "Dec"
                    ];
                    var formattedDate = monthNames[createdAt.getMonth()] + "," +
                        ("0" + createdAt.getDate()).slice(-2) + " " +
                        createdAt.getFullYear() + " " +
                        ("0" + createdAt.getHours()).slice(-2) + ":" +
                        ("0" + createdAt.getMinutes()).slice(-2) +
                        (createdAt.getHours() >= 12 ? " PM" : " AM");

                    // Append formatted date to HTML
                    html += "<h6>" + val['user']['name'] + "</h6>";
                    html += "<h6>" + val['connectStatus'] + "</h6>";
                    html += "<h6>" + val['comment'] + ".</h6>";
                    html += "<strong class='mf-date'><i class='fa fa-clock-o'></i>" +
                        formattedDate + "</strong> <hr>";
                });
                $(".history-content").html(html);
                // resetting form
                $('#addHistoryForm')[0].reset();

                location.reload();
            },
            error: function(error) {
                // Handle the error response
                console.error('Error submitting the form:', error);
                // Optionally, you can display an error message or take other actions
            }
        });
    });
</script>

<?php /**PATH C:\xampp\htdocs\project_three\resources\views/main/phone_quote/ShipperDetails/table.blade.php ENDPATH**/ ?>