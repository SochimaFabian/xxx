<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('bootstrap.app')
    <title>Document</title>
</head>
<style>
    .error{
        color: red;
        font-size: 13px;
    }

    input[type="file"]{
        display: none;
    }
    label.image{
        background: dodgerblue;
        color: #fff;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<body>
    <main class="w-100 vh-100">
        <div class="container">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" class="form-control mt-1">
                @csrf
                <legend class="w-100 d-flex align-items-center justify-content-center">Create Post</legend>
                <div class="form-group mb-3">
                    <label for="image" class="image">Photo Upload</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('photo')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
