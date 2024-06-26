@extends('layouts.app')
@section('datatable-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <a class="btn btn-success" href="javascript:void(0)" id="createNewBook"> Create New Book</a>

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

        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="bookForm" name="bookForm" class="form-horizontal">
                            <input type="hidden" name="book_id" id="book_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Details</label>
                                <div class="col-sm-12">
                                    <textarea id="author" name="author" required="" placeholder="Enter Author" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                                </button>
                            </div>
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

    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users') }}",
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

        });
    </script>

@endsection