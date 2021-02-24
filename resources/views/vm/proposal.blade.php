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
        function accept_proposal(vmid) {
            if(!confirm('Do you want to set this proposal accept?'))
                return;
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/vm/accept_proposal',
                data: {vmid : vmid},
                success: function () {
                    $('#proposalTable').DataTable().ajax.reload();
                }
            });
        }
        function deny_proposal(vmid){
            if(!confirm('Do you want to set this proposal deny?'))
                return;
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/vm/deny_proposal',
                data: {vmid : vmid},
                success: function () {
                    $('#proposalTable').DataTable().ajax.reload();
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
                            <h3 class="card-title">Virtual Machine Config Change Proposal</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="max-height: 80%;">
                        <table id="proposalTable" class="table table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>VM Name</th>
                                <th>Nic Count</th>
                                <th>CPU Count</th>
                                <th>Proposed CPU Count</th>
                                <th>VM Disk Count</th>
                                <th>Proposed Disk Count</th>
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
@endsection
