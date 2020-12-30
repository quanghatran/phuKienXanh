<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('public/admin/')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{url('public/admin/')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{url('public/admin/')}}/css/AdminLTE.css" />
    <link rel="stylesheet" href="{{url('public/admin/')}}/css/_all-skins.min.css" />
    <link rel="stylesheet" href="{{url('public/admin/')}}/css/style.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ccc;
        }

        .main-child {
            width: 500px;
            height: 550px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: clolumn;
            background: #fff;
        }

        form legend {
            border: none;
            font-size: 30px;
            font-weight: bolder;
        }

        form div {
            padding: 2rem 0;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="text-center main-child  ">
            <form action="" method="POST" role="form" style="width:450px">

                @csrf
                <legend>Đăng nhập</legend>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    <span></span>
                    <div style="text-transform:uppercase;color:red;padding-top:10px;font-weight:bold">
                        @if($errors->has('email'))
                        {{$errors->first('email')}}
                        @endif()
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <span></span>
                    <div style="text-transform:uppercase;color:red;padding-top:10px;font-weight:bold">
                        @if($errors->has('password'))
                        {{$errors->first('password')}}
                        @endif()
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="rbm"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
    </div>


    <script src="{{url('admin/')}}/js/jquery.min.js"></script>
    <script src="{{url('admin/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('admin/')}}/js/adminlte.min.js"></script>

</body>

</html>