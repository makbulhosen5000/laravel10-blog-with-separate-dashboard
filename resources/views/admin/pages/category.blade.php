@extends('admin.layouts.app')
@section('admin-title')
    Category
@endsection
@php
    $pageTitle = 'Category';
@endphp

@section('admin-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('category.create') }}" class="btn btn-success" data-toggle="modal"
                data-target="#addCategoryModel"><i class="fa-solid fa-circle-plus"></i> Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="d-flex">
                                    <button class="btn btn-primary mr-2" data-toggle="modal"
                                        data-target="{{ '#Edit'.$category->id.'CategoryModel' }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                    
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden"  name='_method' value="DELETE">
                                         <button type="submit" class="delete btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    </div>
                                   
                                </td>
                            </tr>
                            <!-- Category edit Modal-->
                            @include('admin.component.category.category-edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Category create Modal-->
    @include('admin.component.category.category-create')
@endsection
