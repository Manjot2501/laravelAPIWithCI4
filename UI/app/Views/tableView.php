<table class="table  table-bordered">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Emp Code</th>
            <th scope="col">Punch Time</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Last Update</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($list) && is_array($list)) {
            foreach ($list as $key => $value) { ?>
                <tr>
                    <td scope="row"><?php echo $value->id; ?></td>
                    <td><?php echo $value->emp_code; ?></td>
                    <td><?php echo $value->punchTime; ?></td>
                    <td><?php echo $value->address; ?></td>
                    <td><?php echo $value->city; ?></td>
                    <td><?php echo $value->lastUpdate; ?></td>
                    <td data-id="<?php echo $value->id; ?>">
                        <div class="d-flex">
                            <button type="button" class="mj-edit btn btn-sm btn-primary me-2">Edit</button>
                            <button type="button" class="mj-delete btn btn-sm btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="7">No Data</td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mj-update">
                <div class="mb-3">
                    <label for="" class="form-label">Emp Code</label>
                    <select class="form-select mj-emp_code" aria-label="Default select example" required>
                        <?php if (!empty($emp) && is_array($emp)) {
                            foreach ($emp as $key => $value) { ?>
                                <option value="<?php echo $value->emp_code;?>"><?php echo $value->emp_code.'  '.$value->name;?></option>
                            <?php }
                        } else { ?>
                            <option disabled>no data</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Punch Time</label>
                    <input type="time" class="form-control mj-punchTime" id="" placeholder="" value="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">City</label>
                    <input type="text" class="form-control mj-city" id="" placeholder="" value="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea class="form-control mj-address" id="" rows="3" required></textarea>
                </div>
                <div class="mb-3 d-none">
                    <label for="" class="form-label">Last Update</label>
                    <input type="hidden" class="form-control mj-lastUpdate" id="" placeholder="" value="" readonly>
                </div>
                <input type="hidden" class="mj-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary mj-update-attendance">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Employee</label>
                    <select class="form-select mj-emp_code" aria-label="Default select example" required>
                        <?php if (!empty($emp) && is_array($emp)) {
                            foreach ($emp as $key => $value) { ?>
                                <option value="<?php echo $value->emp_code;?>"><?php echo $value->emp_code.'  '.$value->name;?></option>
                            <?php }
                        } else { ?>
                            <option disabled>no data</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Punch Time</label>
                    <input type="time" class="form-control mj-punchTime" id="" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">City</label>
                    <input type="text" class="form-control mj-city" id="" placeholder="" value="" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea class="form-control mj-address" id="" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary mj-create-attendance">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.mj-delete').click(function() {
        var data = {
            id: $(this).parent().parent().attr('data-id'),
            submit: 1
        }
        var url = '/home/delete';
        CallAjax(url, data, function(output) {
            getTable();
            swal(output.message);
        }, 1)
    })

    $('.mj-edit').click(function() {
        var data = {
            id: $(this).parent().parent().attr('data-id'),
            submit: 1
        }
        var url = '/home/get_details';
        CallAjax(url, data, function(output) {
            $('#updateModal .mj-address').val(output.address)
            $('#updateModal .mj-city').val(output.city)
            $('#updateModal .mj-emp_code').val(output.emp_code)
            $('#updateModal .mj-id').val(output.id)
            $('#updateModal .mj-lastUpdate').val(output.lastUpdate)
            $('#updateModal .mj-punchTime').val(output.punchTime)
            $('#updateModal').modal('show')
        }, 1)
    })
    
    $('.mj-create-attendance').click(function() {
        var data = {
            address: $('#createModal .mj-address').val(),
            city: $('#createModal .mj-city').val(),
            emp_code: $('#createModal .mj-emp_code').val(),
            lastUpdate: $('#createModal .mj-lastUpdate').val(),
            punchTime: $('#createModal .mj-punchTime').val(),
        }
        var url = '/home/create';
        CallAjax(url, data, function(output) {
            getTable();
            swal(output.message);
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $('body').css('overflow', 'auto')
            $('body').css('padding-right', '0')

        })
    })


    $('.mj-update-attendance').click(function() {
        var data = {
            address: $('#updateModal .mj-address').val(),
            city: $('#updateModal .mj-city').val(),
            emp_code: $('#updateModal .mj-emp_code').val(),
            id: $('#updateModal .mj-id').val(),
            lastUpdate: $('#updateModal .mj-lastUpdate').val(),
            punchTime: $('#updateModal .mj-punchTime').val(),
        }
        var url = '/home/update_attendance';
        CallAjax(url, data, function(output) {
            getTable();
            swal(output.message);
            $('#updateModal').modal('hide')

        })
    })

    function getTable() {
        var url = '/home/dashboardTable';
        CallAjax(url, '', function(output) {
            $('.mj-render').html(output.html);
        })
    }
    
    var requestNewUrl;

    function CallAjax(url, data, actionFunction, loadIcon) {
        requestNewUrl = url;
        $.ajax({
            url: url,
            data: data,
            type: 'post',
            dataType: "json",
            beforeSend: function() {
                if (loadIcon === 1) {
                    //to do loading
                    $('.loading').show();
                }
            },
            complete: function() {

                $('.loading').hide();
            },
            success: function(output) {

                if (output.redirect) {
                    // data.redirect contains the string URL to redirect to
                    window.location.href = output.redirect;
                } else {

                    //this is the function defined for the action 
                    actionFunction(output);
                }
            }
        });
    }
</script>