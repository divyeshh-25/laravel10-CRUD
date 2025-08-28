<x-master>
    <div class="card bg-light">
        <div class="card-body">
            <div>
                <span style="float:left;margin-bottom:5px">
                    <img src="{{ asset('logo.jpg') }}" class="img-thumbnail" alt="..." height="40px" width="50px">
                </span>
                <span style="float:right;margin-bottom:5px">
                    <i class="fa fa-inbox text-primary" id="show-archive" style="font-size:21px;margin:10px;"
                        data-id="trash"></i>
                    <button onclick="createHandler()" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                    </button>
                </span>
            </div>
            <div class="table-div">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <!-- Page Level Script --->
    @push('page-script')
    {!! $dataTable->scripts() !!}
    <script>
        /* <==== Create Employe Handler ====> */
        const createHandler = () => {
                let url = "{{ route('employee.create') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        showModal('Add Employee', data.view);
                    },
                    error: function(textStatus, errorThrown) {
                        Success = false; //doesn't go here
                    }
                });
            };
        $(document).on('click', '#addEmployee', function() {
                let url = "{{ route('employee.store') }}";
                let formData = {
                    fname: $("#fname").val(),
                    lname: $("#lname").val(),
                    sex: $("input[name='gender']:checked").val(),
                    phone: $("#phone").val(),
                    email: $("#email").val(),
                    dob: $("#dob").val(),
                    salary: $("#salary").val(),
                    status: $("input[name='status']:checked").val(),
                };
                $(".form-control").removeClass("is-invalid");
                $(".err").html('');
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: formData,
                    success: function(data) {
                        hideModal();
                        toastr.success('Success', data.message);
                        $("#employee-table").DataTable().ajax.reload();
                    },
                    error: function(data) {
                        let errors = data.responseJSON.errors;
                        $.each(errors, function(key, val) {
                            $("#" + key).addClass('is-invalid');
                            $('#' + key + "-err").html(val);
                        });
                    }
                });
            });
        /* <==== Edit Employe Handler ====> */
        const editHandler = (id) => {
                let url = "{{ route('employee.edit', 'id') }}";
                url = url.replace('id', id);
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        showModal('Edit Employee', data.view);
                    },
                    error: function(textStatus, errorThrown) {
                        Success = false; //doesn't go here
                    }
                });
            };
        $(document).on('click', '#updateEmployee', function() {
                let url = "{{ route('employee.update', 'id') }}";
                url = url.replace('id', $(this).attr('data-id'));
                let formData = {
                    fname: $("#fname").val(),
                    lname: $("#lname").val(),
                    sex: $("input[name='gender']:checked").val(),
                    phone: $("#phone").val(),
                    email: $("#email").val(),
                    dob: $("#dob").val(),
                    salary: $("#salary").val(),
                    status: $("input[name='status']:checked").val(),
                };
                $(".form-control").removeClass("is-invalid");
                $(".err").html('');
                $.ajax({
                    type: "PUT",
                    url: url,
                    dataType: 'json',
                    data: formData,
                    success: function(data) {
                        hideModal();
                        toastr.success('Success', data.message);
                        $("#employee-table").DataTable().ajax.reload();
                    },
                    error: function(data) {
                        let errors = data.responseJSON.errors;
                        $.each(errors, function(key, val) {
                            $("#" + key).addClass('is-invalid');
                            $('#' + key + "-err").html(val);
                        });
                    }
                });
            });

        /* <==== Trash Employe Handler ====> */
        const removeHandler = (id) => {
                let url = "{{ route('employee.destroy', 'id') }}";
                url = url.replace('id', id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    dataType: 'json',
                    data: {id:id},
                    success: function(data) {
                        toastr.success('Success', data.message);
                        $("#employee-table").DataTable().ajax.reload();
                    },
                    error: function(textStatus, errorThrown) {
                        Success = false; //doesn't go here
                    }
                });
            };
        $(document).on('click', '#show-archive', function() {
                if($(this).attr('data-id') == 'trash'){
                    $(this).attr('data-id','all');
                    $('#employee-table').on('preXhr.dt', function ( e, settings, data ) {
                        data.showData = 'trash';
                    }).DataTable().ajax.reload();
                }else{
                    $(this).attr('data-id','trash');
                    $('#employee-table').on('preXhr.dt', function ( e, settings, data ) {
                        data.showData = 'all';
                    }).DataTable().ajax.reload();
                }

            });
        /* <==== Restore Employe Handler ====> */
        const restoreHandler = (id) => {
                let url = "{{ route('employee.restore', 'id') }}";
                url = url.replace('id', id);
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        toastr.success('Success', data.message);
                        $("#employee-table").DataTable().ajax.reload();
                    },
                    error: function(textStatus, errorThrown) {
                        console.log(textStatus);
                        Success = false; //doesn't go here
                    }
                });
            }
        /* <==== Hard Delete Employe Handler ====> */
        const deleteHandler = (id) => {
                let url = "{{ route('employee.delete', 'id') }}";
                url = url.replace('id', id);
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        toastr.success('Success', data.message);
                        $("#employee-table").DataTable().ajax.reload();
                    },
                    error: function(textStatus, errorThrown) {
                        console.log(textStatus);
                        Success = false; //doesn't go here
                    }
                });
            }

    </script>
    @endpush
</x-master>
