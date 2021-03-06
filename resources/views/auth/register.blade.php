@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="register">
    <div class="container">
        <div class="log">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">تسجيل </h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label for="name">اسم المستخدم</label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="اسم المستخدم" />
                        <label for="email">البريد الالكتروني</label>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="البريد الالكتروني" />
                        <label for="name">كلمة المرور</label>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="كلمة المرور" />
                        
                        <button type="submit" class="btn btn-primary">
                            تسجيل 
                        </button>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="img">
                        <img src="{{asset('image/header.jpg')}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- start footer -->
<div class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook-f"></i></a>
            </div>
            <div class="col-7">
                <p>جميع الحقوق &copy; محفوظة لدار الايتام</p>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
@endsection
