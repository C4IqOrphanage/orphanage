@extends('layout.app')

@section('content')
<link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css">
<div class="contact-us">
    <div class="container ">
        <div class="contact">
            <h2 class="text-center">تواصل معنا </h2>
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="/send">
                         {{ csrf_field() }}
                        <input class="f-contact form-control" type="text" name="name" placeholder="اسمك الكامل" />
                        <input class="f-contact form-control" type="email" name="email" placeholder="البريد الالكتروني" />
                        <textarea class="form-control" name="msg"></textarea>
                        <button type="submit" class="btn btn-success">ارسال رسالة</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d213393.64380417735!2d44.4959921380654!3d33.31160745095317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15577f67a0a74193%3A0x9deda9d2a3b16f2c!2z2KjYutiv2KfYrw!5e0!3m2!1sar!2siq!4v1545919503966" width="400" height="300"  style="border:0" ></iframe>
                        <div class="text text-center">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fa fa-phone"></i>
                                    <p class="phone">+(964)770....</p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-envelope"></i>
                                    <p>info@orphans.com</p>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-map-marker"></i>
                                    <p>العراق بغداد</p>
                                </div>
                            </div>
                        </div>
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
