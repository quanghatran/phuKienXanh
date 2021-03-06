<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-inverse">
        <!-- <a class="navbar-brand" href="">Title</a> -->
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Category</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active">
                <a href="{{route('home')}}">Cart ( {{$cart_total}} )</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category</h3>
                    </div>

                    <ul class="list-group">

                        @foreach($category as $cat)
                        <li class="list-group-item">
                            <span class="badge">{{$cat->products->count()}}</span>
                            <a href="{{route('view',['slug' =>$cat->slug])}}"> {{$cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="col-md-9">
                @yield('main')
            </div>
        </div>


    </div>




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>