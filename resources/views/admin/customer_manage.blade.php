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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="card-title col">Customer List</h3>
                            <div class="card-tools col-8">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-tools col">
                                <button type="button" style="width: 200px;" class="btn btn-block btn-info btn-sm"
                                        data-toggle="modal" data-target="#modal-lg">Add Customer
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>CustomerName</th>
                                <th>Currency</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->customerid}}</td>
                                    <td>{{$customer->customername}}</td>
                                    <td>{{$customer->currency}}</td>
                                    <td>
                                        <form role="form" method="post" action="{{route('customers.delete')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$customer->customerid}}"/>
                                            <button type="submit" class="btn btn-block btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg" aria-hidden="true">
        <form role="form" name="addUserForm" method="post" action="{{route('customers.save')}}" novalidate="novalidate">
            @csrf
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
                                <input type="text" class="form-control" name="customername" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Currency</label>
                                <input type="text" class="form-control" name="currency" placeholder="Enter Currency">
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
