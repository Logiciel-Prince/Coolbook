<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{asset('form.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('form.css')}}">

</head>
<body>
    <form method="post" action="upload-image" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h3 id="logo">Upload ...</h3>
      
        <label for="username">Tittle</label>
        <input type="text" id="username" name="tittle" placeholder="Enter Image Tittle ..." autocomplete="off" required />

        <input type="hidden" name="user_id" value="{{session('userid')}}">
      
        <label for="password">Category</label>
        <select name="category" >
            <option value="">Pls Select Category....</option>
            @foreach ($data as $d)
                <option value="{{$d->id}}">{{$d->category_name}}</option>
            @endforeach
        </select>

        <label for="password">Description</label>
        <input type="text" id="password" name="desc" placeholder="Enter Description ..." autocomplete="off" required />

        <label for="password">File</label>
        <input type="file" id="password" name="image" placeholder="Enter Description ..." autocomplete="off" required />
      
        <a class="forgot" href="home">Back</a>
      
        <input type="submit" name="submit" value="Post" />
      
      </form>
</body>
</html>