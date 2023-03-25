@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Users</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mt-4">
                    <a href="{{ route('admin.users.add') }}" class="btn btn-primary btn-flat btn-addon m-l-5" >
                        <i class="ti-plus"></i>
                        Add New User
                    </a>
                </div>

                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>

            <!-- /# row -->
            <section id="main-content">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Users List </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>email</th>
                                            <th>Status</th>
                                            <th class="text-left">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($items))
                                            @foreach($items as $k => $item)
                                                <tr>
                                                    <th scope="row">{{ $k + 1 }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        @if ($item->status === '1')
                                                            <span class="badge badge-success">Active</span>
                                                        @elseif ($item->status === '2')
                                                            <span class="badge badge-warning">Blocked</span>
                                                        @elseif ($item->status === '3')
                                                            <span class="badge badge-danger">Suspended</span>
                                                        @else
                                                            <span class="badge badge-info">InActive</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-left">
                                                        <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-success btn-flat btn-addon m-l-5" >
                                                            <i class="ti-pencil"></i>
                                                            Edit
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-flat btn-addon m-l-5" >
                                                            <i class="ti-minus"></i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@stop
