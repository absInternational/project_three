@include('partials.mainsite_pages.return_function')
<?php
$respn = trim("$_SERVER[REQUEST_URI]", '/');
if (isset($_GET['titlee'])) {
    $respn = $_GET['titlee'];
}
?>

<style>
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
.status-port {
    background: #027d91;
    text-align: center;
    color: white;
    border-radius: 34px;
}
    /*====================modalnew================*/
</style>
<div class="table-responsive">
    <!--<select name="status" id="status_check" class="form-select">-->
    <!--    <option value="">Select Status</option>-->
    <!--    <option value="1">Active</option>-->
    <!--    <option value="0">Blocked</option>-->
    <!--</select>-->
    <table id="example1" class="table table-striped table-bordered text-wrap">
        <thead>
            <tr>
                <th class="border-bottom-0">Order #</th>
                <th class="border-bottom-0">Dock Receive CreatedBy</th>
                <th class="border-bottom-0">Shipment #</th>
                <th class="border-bottom-0">VIN #</th>
                <th class="border-bottom-0">Port Line</th>
                <th class="border-bottom-0">Status</th>
                <th class="border-bottom-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $val)
                <tr>
                    <td>
                        {{ $val->id }}
                    </td>
                    <td>
                        @if ($val->dockRec_createdBy == "us")
                            {{ $val->dockRec_createdBy }}
                        @elseif ($val->dockRec_createdBy == "other")
                            {{ $val->dockRec_company }}
                        @else
                            Null
                        @endif
                    </td>
                    <td>
                        {{ $val->dshipment_no }}
                    </td>
                    <td>
                        {{ $val->vin_num }}
                    </td>
                    <td>
                        {{ $val->port_line }}
                    </td>
                    <td>
                        @if ($val->pstatus == 0) 
                            New
                        @elseif ($val->pstatus == 1) 
                            Interested
                        @elseif ($val->pstatus == 2) 
                            FollowUp/More
                        @elseif ($val->pstatus == 3) 
                            AskingLow
                        @elseif ($val->pstatus == 4) 
                            NotInterested
                        @elseif ($val->pstatus == 5) 
                            NoResponse
                        @elseif ($val->pstatus == 6) 
                            TimeQuote
                        @elseif ($val->pstatus == 7) 
                            PaymentMissing
                        @elseif ($val->pstatus == 8) 
                            Booked
                        @elseif ($val->pstatus == 9) 
                            Listed
                        @elseif ($val->pstatus == 10) 
                            Dispatch
                        @elseif ($val->pstatus == 11) 
                            Pickup
                        @elseif ($val->pstatus == 12) 
                            Delivered
                        @elseif ($val->pstatus == 13) 
                            Completed
                        @elseif ($val->pstatus == 14) 
                            Cancel
                        @elseif ($val->pstatus == 15) 
                            Deleted
                        @elseif ($val->pstatus == 16) 
                            OwesMoney
                        @elseif ($val->pstatus == 17) 
                            CarrierUpdate
                        @elseif ($val->pstatus == 18) 
                            On Approval
                        @elseif ($val->pstatus == 19) 
                            Cancel Approval
                        @endif
                        </br>
                        <div class="status-port">
                        @if ($val->portTrackHistory->isNotEmpty())
                            {{ $val->portTrackHistory->last()->status }}
                        </div>
                        @endif
                    </td>
                    <td>
                        <div class="statusBox{{ $val->id }}">
                            @if ($val->port_line == 'girmadi')
                                <a href="https://www.gnet.grimaldi-eservice.com/GNET/Pages_RoroTracking/WFRoroTracking" target="_blank" class="btn btn-primary">
                                    Tracking
                                </a>
                            @elseif ($val->port_line == 'sallum')
                                <a href="https://sallaumlines.com/track-shipment/" target="_blank" class="btn btn-primary">
                                    Tracking
                                </a>
                            @endif
                            <button type="button" class="btn btn-primary confirm-dlts"
                                data-toggle="modal" data-target="#exampleModal">Add History

                                <input hidden type="text" class="Order-ID" value="{{ $val->id }}">
                                <input hidden type="text" class="Order-Phone"
                                    value="{{ $val->companyname }}">
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- $data->links() --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add History For: <span
                            class="this_user"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <form id="addHistoryForm" action="{{ route('add.port.history') }}" method="GET"
                                class="needs-validation" novalidate class="tablelist-form" autocomplete="off">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="order_id" value="" class="history_val">
                                    <div class="row g-3">
                                        <div class="row">
                                            <!--=============new modal===============-->
                                            <div class=" tab-menu-heading p-0 bg-light">
                                                <div class="tabs-menu1 ">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs  gap-2">
                                                        <li class=""><a href="#tab1" class=" btn btn-success"
                                                                data-toggle="tab">HISTORY/STATUS</a>
                                                        </li>
                                                        <li><a href="#tab2" data-toggle="tab"
                                                                class="active btn btn-success">VIEW HISTORY</a></li>
                                                        <li></li>
                                                        <li class="position-relative">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--=============new modal===============-->
                                        </div>
                                        <div class="tab-pane " id="tab1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="label-field" class="form-label">Tracking Status</label>
                                                        <label>
                                                            <input type="radio" name="status" value="In Process"> In Process
                                                        </label>
                                                    
                                                        <label>
                                                            <input type="radio" name="status" value="Delivered"> Delivered
                                                        </label>
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
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="add-btn close">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                        <div class="active tab-pane" id="tab2">
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var order_id;
    var CompanyName;

    // Use event delegation for click event
    $(document).on("click", ".confirm-dlts", function() {
        // Set values when the button is clicked
        order_id = $(this).find('.Order-ID').val();
        CompanyName = $(this).find('.Order-Phone').val();

        // Your other code...
        $(".this_user").html(order_id);
        $(".history_val").val(order_id);

        $.ajax({
            url: `{{ route('add.port.history') }}`,
            type: 'GET',
            data: {
                'order_id': order_id,
            },
            success: function(data) {
                // Handle the success response
                console.log('datas', data);

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

                    // Handle status
                    html += "<h6>";

                    html += "</h6>";

                    html += "<h6>" + val['history'] + ".</h6>";
                    html += "<strong class='mf-date'><i class='fa fa-clock-o'></i>" +
                        formattedDate + "</strong> <hr>";
                });
                $(".history-content").html(html);
            },
            error: function(error) {
                // Handle the error response
                console.error('Error submitting the form:', error);
                // Optionally, you can display an error message or take other actions
            }
        });
    });

    // Add history with ajax
    $("#addHistoryForm").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $(this).serialize();

        // Perform AJAX submission
        $.ajax({
            url: $(this).attr('action'),
            type: 'GET',
            data: formData,
            success: function(data) {
                // Handle the success response
                console.log('datadata', data);

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

                    // Handle status
                    html += "<h6>";

                    html += "</h6>";

                    html += "<h6>" + val['history'] + ".</h6>";
                    html += "<strong class='mf-date'><i class='fa fa-clock-o'></i>" +
                        formattedDate + "</strong> <hr>";
                });
                $(".history-content").html(html);

                // Resetting form
                $('#addHistoryForm')[0].reset();
                // $("#exampleModal").modal("hide");
            },
            error: function(error) {
                // Handle the error response
                console.error('Error submitting the form:', error);
                // Optionally, you can display an error message or take other actions
            }
        });
    });

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
