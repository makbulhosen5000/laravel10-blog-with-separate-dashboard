{{-- post edit model --}}
<div class="modal fade" id="{{ 'Edit' . $post->id . 'PostModel' }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        @include('sweetalert::alert');
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="title"
                            value="{{ $post->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <label for="">Post Category</label>
                            <select name="category_id" id="" class="form-control" >
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>
                                {{ $category->name }}
                            </option>
                            @endforeach
                            </select>  
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                       
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                            >{{ $post->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Post Thumbnail</label>
                    <input type="hidden" name='old_thumbnail' value={{ $post->thumbnail }}>
                    <input type="file" class="dropify form-control" name="thumbnail" required>
                </div>
                <div class="form-check">
                    <label for="status" class="form-check-label">
                        <input type="checkbox" value='1' name="status" id="status" @if($post->status == 1) checked @endif> status
                      
                    </label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update post</button>
                </div>
            </form>
        </div>
    </div>
</div>
