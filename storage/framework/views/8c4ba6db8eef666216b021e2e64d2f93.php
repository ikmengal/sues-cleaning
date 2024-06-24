
<?php $__env->startSection('title', $title); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/select2/select2.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('facilities.index')); ?>">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                            <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home /</span> <?php echo e($title); ?></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-item-center mt-4">
                        <!-- <div class="dt-buttons btn-group flex-wrap">
                            <button
                                class="btn btn-secondary add-new btn-success mx-3"
                                data-toggle="tooltip"
                                data-placement="top"
                                title=""
                                data-url=""
                                type="button"
                                id="gerenate_excel"
                                >
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span>
                                    <span class="d-none d-sm-inline-block">Generate Excel</span>
                                </span>
                            </button>
                        </div> -->

                        <div class="dt-buttons btn-group flex-wrap">
                            <button
                                class="btn btn-secondary add-new btn-danger mx-3"
                                data-toggle="tooltip"
                                data-placement="top"
                                title=""
                                data-url=""
                                type="button"
                                id="gerenate_pdf"
                                >
                                <i class="ti ti-download me-0 me-sm-1 ti-xs"></i>
                                <span>
                                    <span class="d-none d-sm-inline-block">Generate PDF</span>
                                </span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br />
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-4 status">
                        <select id="facility_status" name="facility_status" class="select2 form-select text-capitalize" >
                            <option value="All" selected> Select All </option>
                            <?php $__currentLoopData = $data['facilities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($facility->id); ?>"> <?php echo e($facility->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div> 
                    
                    <div class="col-md-4">
                        <select id="select_room" name="select_room" class="select2 form-select text-capitalize">
                        </select>
                    </div>
                    
                    <!--<div class="col-md-4">-->
                    <!--    <input type="text" name="date" id="date" class="form-control dob-picker" placeholder="YYYY-MM-DD" />-->
                    <!--</div> -->
                    
                    <div class="col-md-4">
                        <input type="text" class="form-control flatpickr-input date" placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" readonly="readonly">
                    </div>
                    
                    <!--<div class="col-md-4">-->
                    <!--    <input type="text" name="date" id="multicol-birthenddate" class="form-control dob-picker" placeholder="YYYY-MM-DD" />-->
                    <!--</div> -->
                    
                    <!--<div class="col-md-4">-->
                    <!--    <select id="status" name="status" class="select2 form-select text-capitalize">-->
                    <!--    </select>-->
                    <!--</div>-->
                
                </div>
            </div>

            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="container">
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Facility</th>
                                    <th>Room</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="show_raoom_data">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- View Department Details Modal -->
                <div class="modal fade" id="dept-details-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h3 class="mb-2" id="modal-label"></h3>
                                </div>

                                <div class="col-12">
                                    <span id="show-content"></span>
                                </div>

                                <div class="col-12 mt-3">
                                    <button
                                        type="reset"
                                        class="btn btn-label-secondary btn-reset"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- View Department Details Modal -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <!-- Page JS -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/form-layouts.js"></script>
    <script src="<?php echo e(asset('public/admin/assets/js/forms-pickers.js')); ?>"></script>


    <script>
       
        $(document).on('change', '#facility_status', function(e) {
            facility_id = $('#facility_status').val();
            $.ajax({
                url:'<?php echo e(url("completion_room_report")); ?>',
                method:'GET',
                data:{facility_id:facility_id},
                success: function(response) {
                    console.log(response);
                    var optionsHtml = '<option value="All" selected> Search Room </option>';
                    if(response.length>0){ 
                        $.each(response, function(index, option) {
                            optionsHtml += '<option value="' + option.id + '">' + option.name + '</option>';
                        });
                        $('#select_room').html(optionsHtml);
                    }else{
                        var optionsHtml = '<option selected> No Record Here </option>';
                        $('#select_room').html(optionsHtml);
                        $('#show_raoom_data').html('');
                    }   
                },
            })
        });
        
        // $(document).on('change', '#date', function(e) {

        //     date = $(this).val();
        //     room_id = $('#select_room').val();
        //     facility_id = $('#facility_status').val();

        //     if(room_id !="" || date!=""){
        //         $.ajax({
        //             url:'completion_room',
        //             method:'GET',
        //             data:{date:date, facility_id:facility_id, room_id:room_id},
        //             success: function(response){
        //                 if(response.length>0){
        //                     $('#show_raoom_data').html(response);
        //                 }else{
        //                     $('#show_raoom_data').html('');
        //                 }
        //             },
        //         });
        //     }
        // });
        
         var dateChanged = false;

        $(document).on('change', '.date', function(e) {
            dateChanged = true;
            checkAndMakeAjaxCall();
        });

        $(document).on('change', '#select_room', function(e) {
            checkAndMakeAjaxCall();
        });

        function checkAndMakeAjaxCall() {
            if (dateChanged && $('#select_room').val() !== "") {
                date = $('.date').val();
                room_id = $('#select_room').val();
                facility_id = $('#facility_status').val();

                $.ajax({
                    url:'<?php echo e(url("completion_room")); ?>',
                    method:'GET',
                    data:{date:date, facility_id:facility_id, room_id:room_id},
                    success: function(response){
                        if(response.length > 0){
                            $('#show_raoom_data').html(response);
                        } else {
                            $('#show_raoom_data').html(response);
                        }
                    },
                });
            }
        }

        $(document).on('click', '#show_room_detail', function(e){
            var showUrl = $(this).data('show-url');
            var modal_label = $(this).attr('title');

            $('#modal-label').html(modal_label);
            $.ajax({
                url: showUrl,
                method: 'GET',
                success: function(response) {
                    $('#show-content').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        
        
        $(document).on('click', '#gerenate_pdf', function(e){

            date = $('.date').val();
            facility_id = $('#facility_status').val();
            room_id = $('#select_room').val();

            console.log('Date :'+date);
            console.log('Facility Id :'+facility_id);
            console.log('Room Id :'+room_id);



            Url ='<?php echo e(route("generate-pdf-report")); ?>?date='+date+'&facility_id='+facility_id+'&room_id='+room_id
            if((date!="" && facility_id!="") && room_id!=""){
                $.ajax({
                    url:'generate_pdf_report',
                    method:'GET',
                    data:{date:date, facility_id:facility_id, room_id:room_id,},
                    success: function(response) {
                        console.log(response);
                        window.open(Url,'_blank');
                    },
                });
            }else{
                alert("Please First Select Facility Date and Room");
            }
        });

        // $(document).on('click', '#show_room_data_to_edit', function(e){
        //     var showUrl = $(this).data('show-url');
        //     var modal_label = $(this).attr('title');

            

        //     $('#modal-label').html(modal_label);
        //     $.ajax({
        //         url: showUrl,
        //         method: 'GET',
        //         success: function(response) {
        //             $('#show-content').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });

        // $(document).on('click', '#updatedata', function(e){
            
        //     var inputName = 'facility_name';
        //     var targetInput = $('input[name="' + inputName + '"]').first();
        //     var facility_id = targetInput.attr('id');

        //     user_id = $('#user').val();
        //     date = $('#date').val();
        //     room_id = $('#room_id').val();
        //     previous_user_id = $('#previous_user_id').val();
            
        //     $.ajax({
        //         url:'<?php echo e(url("assign_the_room_to_user")); ?>',
        //         method:'GET',
        //         data:{date:date, facility_id:facility_id, room_id:room_id, user_id:user_id, previous_user_id:previous_user_id},
        //         success: function(response) {
        //             //console.log(response);
        //         },
        //     });
        // });

        // $(document).on('click', '#gerenate_pdf', function(e){

        //     date = $('#date').val();
        //     facility_id = $('#facility_status').val();
        //     room_id = $('#select_room').val();

        //     console.log('Date :'+date);
        //     console.log('Facility Id :'+facility_id);
        //     console.log('Room Id :'+room_id);



        //     Url = Url ='<?php echo e(route("generate-pdf-report")); ?>?date='+date+'&facility_id='+facility_id+'&room_id='+room_id
        //     if((date!="" && facility_id!="") && room_id!=""){
        //         $.ajax({
        //             url:'<?php echo e(url("generate_pdf_report")); ?>',
        //             method:'GET',
        //             data:{date:date, facility_id:facility_id, room_id:room_id,},
        //             success: function(response) {
        //                 console.log(response);
        //                 window.open(Url,'_blank');
        //             },
        //         });
        //     }else{
        //         alert("Please First Select Facility Date and Room");
        //     }
        // });


        $(document).on('change', '#select_model_user', function(e){
            userId = $('#select_model_user').val();
            var selectedOption = $(this).find(':selected');
            var roomId = selectedOption.attr('room_id');
            var date = selectedOption.attr('date');
            var facilityId = selectedOption.attr('facility_id');
            
            console.log('Room ID:', roomId);
            console.log('User ID:', userId);
            console.log('Date:', date);
            console.log('Facility ID:', facilityId);
            
            var showUrl = $(this).data('show-url');
            var modal_label = $(this).attr('title');
            $('#modal-label').html(modal_label);

            $.ajax({
                url:'<?php echo e(url("room_detail_as_select_user")); ?>',
                method: 'GET',
                data:{roomId:roomId, userId:userId, facilityId:facilityId, date:date},
                success: function(response) {
                    console.log(response) 
                    $('#show-content').html(response);      
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // $(document).on('change', '#multicol-birthenddate', function(e) {
        //     date = $(this).val();
        //     facility_id = $('#facility_status').val();
        //     $.ajax({
        //         url:'completion_room_report',
        //         method:'GET',
        //         data:{date:date, facility_id:facility_id},
        //         success: function(response) {
        //             var optionsHtml = '<option value="All" selected> Search by Status </option>';
        //             if(response.length>0){ 
        //                 $.each(response, function(index, option) {
        //                     optionsHtml += '<option value="' + option.id + '">' + option.name + '</option>';
        //                 });
        //                 $('#status').html(optionsHtml);
        //             }else{
        //                 var optionsHtml = '<option selected> No Record Here </option>';
        //                 $('#status').html(optionsHtml);
        //                 $('#room_data').html('');
        //             }   
        //         },
        //     })
        // });

        // $(document).on('change', '#status', function(e) {
        //     room_id = $(this).val();
        //     date = $('#multicol-birthenddate').val();
        //     facility_id = $('#facility_status').val();

        //     $.ajax({
        //         url:'completion_room',
        //         method:'GET',
        //         data:{date:date, facility_id:facility_id, room_id:room_id},
        //         success: function(response) {
        //             $('#room_data').html(response);
        //         },
        //     });
        // });

        // $(document).on('click', '#show_room_detail', function(e){
        //     var showUrl = $(this).data('show-url');
        //     var modal_label = $(this).attr('title');

        //     $('#modal-label').html(modal_label);
        //     $.ajax({
        //         url: showUrl,
        //         method: 'GET',
        //         success: function(response) {
        //             $('#show-content').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });

        // $(document).on('click', '#show_room_data_to_edit', function(e){
        //     var showUrl = $(this).data('show-url');
        //     var modal_label = $(this).attr('title');

        //     $('#modal-label').html(modal_label);
        //     $.ajax({
        //         url: showUrl,
        //         method: 'GET',
        //         success: function(response) {
        //             $('#show-content').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });

        // $(document).on('click', '#updatedata', function(e){
            
        //     var inputName = 'facility_name';
        //     var targetInput = $('input[name="' + inputName + '"]').first();
        //     var facility_id = targetInput.attr('id');

        //     user_id = $('#user').val();
        //     date = $('#date').val();
        //     room_id = $('#room_id').val();
        //     previous_user_id = $('#previous_user_id').val();
            
        //     $.ajax({
        //         url:'assign_the_room_to_user',
        //         method:'GET',
        //         data:{date:date, facility_id:facility_id, room_id:room_id, user_id:user_id, previous_user_id:previous_user_id},
        //         success: function(response) {
        //             //console.log(response);
        //         },
        //     });
        // });

        // $(document).on('click', '#gerenate_pdf', function(e){

        //     date = $('#multicol-birthenddate').val();
        //     facility_id = $('#facility_status').val();
        //     room_id = $('#status').val();
        //     Url ='<?php echo e(route("generate-pdf-report")); ?>?date='+date+'&facility_id='+facility_id+'&room_id='+room_id
        //     if((date!="" && facility_id!="") && room_id!=""){
        //         $.ajax({
        //             url:'generate_pdf_report',
        //             method:'GET',
        //             data:{date:date, facility_id:facility_id, room_id:room_id,},
        //             success: function(response) {
        //                 console.log(response);
        //                 window.open(Url,'_blank');
        //             },
        //         });
        //     }else{
        //         alert("Please First Select Facility Date and Room");
        //     }
        // });

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/completion-tasks/room-index.blade.php ENDPATH**/ ?>