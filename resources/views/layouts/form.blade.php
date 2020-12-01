@csrf
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="postTitle">Post Title</label>
        <input type="text" name="title" placeholder="Post title" value="{{ isset($post) ? $post->title : old('email') }}" class="form-control @error('title') is-invalid @enderror" id="postTitle" required />
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="postContent">Post Content</label>
        <textarea name="description" placeholder="Post description / content" rows="5" class="form-control  no-resize @error('description') is-invalid @enderror" id="postContent" required>{!! isset($post) ? $post->description : old('email')  !!}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
