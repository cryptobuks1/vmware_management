@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        function edit_user(user_id, name, email, company_id) {
            $('#user_id').val(user_id);
            $('#username').val(name);
            $('#email').val(email);
            $('#customerSelect').val(company_id);
            $('#modal-lg').modal('show');
            return;
            if (!confirm('Do you want to set this proposal accept?'))
                return;
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/vm/accept_proposal',
                data: {vmid: vmid},
                success: function () {
                    $('#userTable').DataTable().ajax.reload();
                }
            });
        }

        function delete_user(user_id) {
            if (!confirm('Do you want to delete user?'))
                return;
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/users/delete',
                data: {user_id: user_id},
                success: function () {
                    $('#userTable').DataTable().ajax.reload();
                }
            });
        }
    </script>
    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h3 class="card-title">User Management</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
                        <table id="userTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Customer</th>
                                <th>Register Date</th>
                                <th width="120px;">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg" aria-hidden="true">
        <form role="form" name="editUserForm" method="post" action="{{route('users.save')}}" novalidate="novalidate">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value=""/>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email"  id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="customerSelect">Customer Link</label>
                                <select name="customer_id" id="customerSelect" class="form-control">
                                    <option></option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->customerid}}">{{$customer->customername}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
@endsection
