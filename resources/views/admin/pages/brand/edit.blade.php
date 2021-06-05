@extends('admin.layout.app')

@section('title', ' | Sửa nhãn hiệu')

@section('content')


    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Nhãn hiệu</strong></div>
        <div class="panel-body">
        <h1>
            Sửa nhãn hiệu <strong class="panel-color-id" >#{{ $brand->id }}</strong>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/brands') }}"> Các nhãn hiệu </a></li>
            <li class="active">Sửa</li>
        </ol>
        <a href="{{ url('/khalaadmin/brands') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
    </div>
</div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Nhập thông tin bên dưới</strong></div>
        <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/khalaadmin/brands/' . $brand->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.pages.brand.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection