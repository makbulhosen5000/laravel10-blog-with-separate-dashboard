{{-- Post create model --}}
<div class="modal fade" id="addCategoryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        @include('sweetalert::alert');
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}" placeholder="Post Title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Post SubTitle</label>
                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                            name="sub_title" value="{{ old('sub_title') }}" placeholder="Post Sub Title" required>
                        @error('sub_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea type="text" id="tiny" class=" form-control @error('description') is-invalid @enderror"
                            name="description" rows="5" value="{{ old('description') }}" placeholder="Category Description" required></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Post Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post Thumbnail</label>
                        <input type="file" class="dropify" name="thumbnail" required>
                    </div>
                    <div class="form-check">
                        <label for="status" class="form-check-label">
                            <input type="checkbox" value='1' name="status" id="status"> status
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
