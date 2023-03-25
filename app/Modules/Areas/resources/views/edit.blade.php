@extends('layouts.admin')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Categories, <span>Edit Category</span></h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                {{--                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>--}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Categories</a></li>
                                <li class="breadcrumb-item active">Edit Category</li>
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
                                <h4>Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('admin.categories.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_type">Category Type</label>
                                                    <select class="form-control" name="category_type" placeholder="Category Type" >
                                                        <option value="marketplace" @if (old('category_type', $item->category_type) == 'marketplace') selected @endif >Marketplace</option>
                                                        <option value="preferences" @if (old('category_type', $item->category_type) == 'preferences') selected @endif >Preferences</option>
                                                    </select>
                                                    @error('category_type')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control" name="parent_id" placeholder="Category" >
                                                        <option value="0" selected >Parent</option>
                                                        @if(isset($category))
                                                            @foreach($category as $cat)
                                                                @if($item->id !== $cat->id)
                                                                    <option
                                                                        value="{{ $cat->id }}"
                                                                        @if (old('parent_id', $item->parent_id) == $cat->id) selected @endif
                                                                    >{{ $cat->trans->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('parent_id')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $item->trans->name) }}" />
                                                    @error('name')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description" placeholder="Description" >{{ old('description', $item->trans->description) }}</textarea>
                                                    @error('description')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Image</label>
                                                    <input type="file" class="form-control" name="image" accept="image/*" />
                                                    @error('image')
                                                    <div class="text-danger" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <img src="{{ asset('uploads/categories/'.$item?->trans?->img) }}"
                                                         style="height: 100px; width: 150px;" />
                                                    <input type="hidden" name="old_image" value="{{ $item?->trans?->img }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{--<label for="active">Status</label>--}}
                                                    <div class="checkbox">
                                                        <label for="active">
                                                            <input type="checkbox" id="active" name="active" value="1" @if (isset($item->active) && $item->active === 1) checked @endif> Active
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@stop
