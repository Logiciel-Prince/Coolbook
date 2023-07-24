<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
    <main>
        @include('common/header')
    <main-container>
        <div class="container">
            @foreach ($data as $d)
            <a href="post{{$d->id}}">
            <div class="post">
                <div class="user">
                    <img src="images/Userimage/{{$d->user->image}}" alt=""width="35px" height="35px"style="border-radius:50%">
                    <label for="">{{$d->user->name}}</label>
                </div>
                <hr style="color:rgb(197, 187, 187)">
                <div class="image">
                    <img src="images/posts/{{$d->image}}" alt="" srcset="">
                </div>
                <div class="date">
                    <label for="date">
                        <sup>
                            {{date('h:i A',strtotime($d->created_at))}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{date('d M Y',strtotime($d->created_at))}}
                       </sup>
                    </label>
                </div>
                <hr style="color:rgb(197, 187, 187)">
                <div class="tittle">
                    <label for="Tittle" id="tittle">Title</label>
                    <label for="">{{$d->tittle}}</label>
                </div>
                <hr>
                {{-- <div class="description">
                    <label for="description" id="desc">Description</label>
                    <hr>
                    <label for="">{{$d->desc}}</label>
                </div> --}}
            </div>
            </a>    
            @endforeach
        </div>
        
    </main-container>
    </main>
</body>
</html>