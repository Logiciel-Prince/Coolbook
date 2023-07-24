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
        <div class="container1">
            @foreach ($data as $d)
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
                    <label for="Tittle" id="tittle">Title :</label>
                    <label for="">{{$d->tittle}}</label>
                </div>
                <hr>
                <div class="description">
                    <label for="description" id="desc">Description :-</label>
                    <hr>
                    <label for="">{{$d->desc}}</label>
                </div>
            </div>
            <div class="post1">
                <div class="user">
                    <img src="images/Userimage/{{$d->user->image}}" alt=""width="40px" height="40px"style="border-radius:50%">
                    <label for="">{{$d->user->name}}</label>
                </div>
                <hr style="color:rgb(197, 187, 187)">
                <div class="commentbox">
                @if (!empty(session('userid')))
                    @foreach ($comment as $c)
                    <div class="comments">
                     <img src="images/Userimage/{{$c->user->image}}" alt=""width="40px" height="40px"style="border-radius:50%">
                     <label for="Username"id="username">{{$c->user->name}}</label>
                     <label for="Comments"id="comment">{{$c->comment}}</label>
                     <sup>
                         {{date('h:i A',strtotime($c->created_at))}}
                         <br>
                         {{date('d M Y',strtotime($c->created_at))}}
                    </sup>
                    </div>
                    @endforeach
                    
                    @else
                    <h3>Pls <a style="color:blue"href="login">Login In</a> to see commnets</h3>
                    @endif
                </div>
                    <hr>
                <div class="postcomment">
                    @if (!empty(session('userid')))
                    <form action="addcomment" method="post">
                        {{ csrf_field() }}
                        😀 <input type="text" autofocus class="no-outline"Placeholder="Add a Comment...."name="comment" id=""required>
                        <input type="hidden" name="user_id" value="{{session('userid')}}">
                        <input type="hidden" name="post_id" value="{{$d->id}}">
                        <input type="submit" value="POST">
                    </form>
                        
                    @else
                        <h4>Pls <a style="color:blue"href="login">Login</a> In To Continue
                            

                        </h4>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        
    </main-container>
    </main>
</body>
</html>