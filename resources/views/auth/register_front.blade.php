@extends('frontend.layouts.master')
@section('title')
<title>Đăng kí</title>
@endsection

@section('content')
<main class="main">
    <div class="page-content">

        <div class="col-lg-12 col-md-12 col-xs-12">
           
            <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6" method="POST" action="{{ route('front-register') }}">
                 @csrf
                <h3 class="ls-m mb-1">Đăng kí tài khoản</h3>
                <p class="text-grey">Các thông tin có dấu * là bắt buộc nhập
                </p>
                <div class="row">
                    
                    <div class="col-md-12 mb-4">
                        <input class="form-control" name = "name" id="name" type="text" placeholder="Tên *" value = "{{old('name')}}"required>
                        {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="email" name = "email" id="email" placeholder="Email *" value = "{{old('email')}}" required>
                        {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="password" name = "password" id="password" placeholder="Mật khẩu *" required>
                        {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="password" name = "password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu *" required>
                        {!! $errors->first('password_confirmation', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>


                </div>
                <button type = "submit" class="btn btn-md btn-primary mb-2">Đăng kí</button>
            </form>
        </div>


    </div>
</main>



@endsection

