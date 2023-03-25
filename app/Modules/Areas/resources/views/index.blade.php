@extends('layouts.admin')
@section('title')
    Areas
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Areas</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mt-4">
                    <a href="{{ route('admin.areas.add') }}" class="btn btn-primary btn-flat btn-addon m-l-5" >
                        <i class="ti-plus"></i>
                        Add Area
                    </a>
                </div>

                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Areas</li>
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
                                <h4>Areas List </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="70%">Name</th>
                                            <th class="text-left">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($items))
                                            @foreach($items as $k => $item)
                                                <tr>
                                                    <th scope="row">{{ $k + 1 }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td class="text-left">
                                                        <a href="{{ route('admin.areas.edit', $item->id) }}" class="btn btn-success btn-flat btn-addon m-l-5" >
                                                            <i class="ti-pencil"></i>
                                                            Edit
                                                        </a>

                                                        <a href="{{ route('admin.areas.delete', $item->id) }}"  onclick="return confirm('Are you sure to delete this record?')"class="btn btn-danger btn-flat btn-addon m-l-5" >
                                                            <i class="ti-trash"></i>
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
