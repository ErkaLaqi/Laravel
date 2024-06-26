@extends('layouts.app')
@section('datatable-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
@endsection
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-action')

@endsection
@section('content')

    <div class="header-right flex-wrap mt-2 mt-sm-0">
        <div class=" align-items-center">
            <h4 style="text-align: center "><strong>Users Information</strong></h4>
            <br>
            <button type="button" id="addUser" class="btn btn-primary addUser" data-toggle="modal" data-target="#exampleModal">
               Add New User
            </button>
            <br>
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Role</th>
                    <th width="300px">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" id="btn_dismiss" name="btn_dismiss" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="userForm" name="userForm" class="form-horizontal" method="POST">

                            <input type="hidden" name="user_id" id="user_id">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                    <span id="nameError" class="error-message d-none"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastame" value="" maxlength="50" required="">
                                    <span id="lastnameError" class="error-message d-none"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="" maxlength="50" required="">
                                    <span id="usernameError" class="error-message d-none"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                                    <span id="emailError" class="error-message d-none"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="col-sm-2 control-label">Birthday</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Enter Birthday" value="" maxlength="50" required="">
                                    <span id="birthdayError" class="error-message d-none"></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="role" class="col-sm-2 control-label">Role</label>
                                <div class="col-sm-12">

                                <select name="role" id="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="manager">Manager</option>
                                    <option value="admin">Admin</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="" maxlength="50">
                                    <span id="passwordError" class="error-message d-none"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-sm control-label">Confirm Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="" maxlength="50">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btn_close"class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" id="saveBtn" name="saveBtn" class="btn btn-primary" value="Save"></input>
                            </div>

                            <div id="message-container"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('datatable-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>


    <script>
        $(document).ready(function() {
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'birthday', name: 'birthday'},
                    {data: 'role', name: 'role'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

           $(document).on('click', '#btn_close', function ()
            {   closeModal();
                clearMessages();
            });

            $(document).on('click', '#btn_dismiss', function ()
            {   closeModal();
                clearMessages();
            });

            $(document).on('click', '.addUser', function ()
            {   $('.modal-title').text('Add New User');
                $('#saveBtn').text('Save User');
                resetForm();
                openModal();
            });

            $('.modal').on('click', function (event){
                if(!$(event.target).closest('.modal-content').length && !$(event.target).hasClass('addUser'))
                {
                    closeModal();
                    clearMessages();
                }
            });


/*
            $(document).on('submit', '#userForm', function(e) {
                e.preventDefault();

                $('#nameError').addClass('d-none');
                $('#lastnameError').addClass('d-none');
                $('#usernameError').addClass('d-none');
                $('#emailError').addClass('d-none');
                $('#birthdayError').addClass('d-none');
                $('#passwordError').addClass('d-none');

                $.ajax({
                    data: $('#userForm').serialize(),
                    url: "{{ route('users.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        showMessage('success', data.success);
                    },
                    error: function (data) {
                        let errors;
                        try{
                            errors = JSON.parse(data.responseText);
                        }catch (e) {
                            console.error('Error parsing JSON:', e);
                        }

                        if(errors && errors.errors){
                            $.each(errors.errors, function (key, value){

                                var errorID = '#' + key + 'Error';
                                $(errorID).removeClass("d-none");
                                $(errorID).text(value);
                            });
                        }
                    }
                });

            });
*/

            $(document).on('submit', '#userForm', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var userId = $('#user_id').val();

                // Determine the appropriate URL based on whether userId is present
                var url = userId ? "{{ route('users.update', ':id') }}".replace(':id', userId) : "{{ route('users.store') }}";

                $.ajax({
                    data: formData,
                    url: url,
                    type: userId ? 'PUT' : 'POST',
                    dataType: 'json',
                    success: function (data) {
                        showMessage('success', data.success);
                    },
                    error: function (data) {
                        let errors;
                        try{
                            errors = JSON.parse(data.responseText);
                        }catch (e) {
                            console.error('Error parsing JSON:', e);
                        }

                        if(errors && errors.errors){
                            $.each(errors.errors, function (key, value){
                                var errorID = '#' + key + 'Error';
                                $(errorID).removeClass("d-none");
                                $(errorID).text(value);
                            });
                        }
                    }
                });
            });


//Edit call
            $(document).on('click', '.editUser', function () {
                var user_id = $(this).data('id');
                $.get("{{ url('users/') }}" +'/' + user_id +'/edit', function (data) {
                    $('.modal-title').text('Edit User Details');
                    $('#saveBtn').text("Edit User");
                    $('#exampleModal').modal('show');
                    $('#user_id').val(data.id);
                    $('#name').val(data.name);
                    $('#lastname').val(data.lastname);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#birthday').val(data.birthday);
                    $('#role').val(data.role);
                    $('#password').closest('.form-group').hide();
                    $('#password_confirmation').closest('.form-group').hide();
                    openModal();
                });
            });


            $(document).on('click', '.deleteUser', function () {
                var user_id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure you want to delete this user?",
                    text: "You will no longer be able to recover this user!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                    customClass:
                        {
                            popup: 'custom-swal-popup'
                    }
                }).then((result) =>{
                    if(result.isConfirmed){
                        console.log(user_id);
                        var formData = new FormData();
                        formData.append('user_id', user_id);
                        formData.append('operation', 'Delete');
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('users/delete') }}"+'/'+user_id,
                            success: function (data){
                                Swal.fire({
                                    icon: 'success',
                                    title: "User deleted successfully",
                                    showCancelButton: true,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                table.draw();
                            },
                            error: function (data){
                                console.log('Error:', data);
                            }
                        });

                    }
                });
            });
        });


            function closeModal(){
                resetForm();
                $('#userForm').trigger("reset");
                $('#password').closest('.form-group').show();
                $('#password_confirmationpassword_confirmation').closest('.form-group').show();
                clearMessages();
                $('#exampleModal').modal("hide");
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open');
                $('.modal-title').text("Add New User");
                $('#saveBtn').val("Save User");
                $('.data-table').DataTable().draw();
               /* table.draw()*/
            }

            function openModal(){
                $('body').addClass('modal-open').append('<div class="in"></div>');
                $('#exampleModal').modal("show");
            }

            function showMessage(type, message){
                var messageContainer = $('#message-container');
                var alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                message +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                 '</div>';
                messageContainer.html(alertHtml);
            }

            function clearMessages(){
                $('#message-container').html('');
                $('#nameError').html('');
                $('#lastnameError').html('');
                $('#usernameError').html('');
                $('#emailError').html('');
                $('#birthdayError').html('');
                $('#passwordError').html('');
            }
            function resetForm(){
                $('#user_id').val('');
                $('#userForm')[0].reset();
                $('#password').closest('.form-group').show(); // Show password field
                $('#password_confirmation').closest('.form-group').show(); // Show confirm password field
            }
        });
    </script>

@endsection
