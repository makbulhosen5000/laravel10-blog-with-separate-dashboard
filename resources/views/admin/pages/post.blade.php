@extends('admin.layouts.app')
@section('admin-title')
    Posts
@endsection
@php
    $pageTitle = 'Posts';
@endphp

@section('admin-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('post.create') }}" class="btn btn-success" data-toggle="modal"
                data-target="#addCategoryModel"><i class="fa-solid fa-circle-plus"></i> Add posts</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Sub-Total</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->sub_title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->description }}</td>
                                <td><img src="{{asset('images/post/'.$post->thumbnail) }}" width="100" height="100" alt=""></td>
                                <td>
                                    <div class="d-flex">
                                    <button class="btn btn-primary mr-2" data-toggle="modal"
                                        data-target="{{ '#Edit'.$post->id.'PostModel' }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                    
                                    <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden"  name='_method' value="DELETE">
                                         <button type="submit" class="delete btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    </div>
                                   
                                </td>
                            </tr>
                            <!-- post edit modal-->
                            @include('admin.component.post.post-edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- post create modal-->
    @include('admin.component.post.post-create')
@endsection
