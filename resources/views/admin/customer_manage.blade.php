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
        function add_customer() {
            $('#customer_id').val('');
            $('#customername').val('');
            $('#currency').val('');
            $('#modal-lg').modal('show');
        }
        function edit_customer(customer_id, customer_name, currency){
            $('#customer_id').val(customer_id);
            $('#customername').val(customer_name);
            $('#currency').val(currency);
            $('#modal-lg').modal('show');
        }
    </script>
    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-10">
                            <h3 class="card-title">Customer Management</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
                        <table id="customerTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>CustomerName</th>
                                <th>Currency</th>
                                <th>Action</th>
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
        <form role="form" name="addCustomerForm" method="post" action="{{route('customers.save')}}" novalidate="novalidate">
            @csrf
            <input type="hidden" id="customer_id" name="customer_id" value=""/>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Customer Name</label>
                                <input type="text" class="form-control" name="customername" id="customername" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Currency</label>
                                <input type="text" class="form-control" name="currency" id="currency" placeholder="Enter Currency">
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
