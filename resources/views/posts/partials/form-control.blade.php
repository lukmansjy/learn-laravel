<div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="{{ old('title') ?? $post->title }}" name="title" id="title" class="form-control">
    @error('title')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="category">Category</label>
    <select name="category" id="category" class="form-control">
        <option disabled selected>Select category</option>
        @foreach ($categories as $category)
            <option {{ $post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="tags">Tag</label>
    <select name="tags[]" id="tags" class="form-control select2" multiple>
        @foreach ($post->tags as $tag)
            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    @error('tags')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>