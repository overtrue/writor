@extends('backend.layout')
@section('page_title')
<h1>
    添加用户
    <a href="{{url('/admin/user/all')}}" class="btn btn-info">用户列表</a>
</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
                <form action="{{url('/admin/user/create')}}" method="post" accept-charset="utf-8" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_login" class="form-control" placeholder="" value="{{Input::old('user_login')}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_email" class="form-control" placeholder="例如：http://writor.me" value="{{Input::old('user_email')}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">昵称</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_nicename" class="form-control" placeholder="" value="{{Input::old('user_nicename')}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">显示名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="display_name" class="form-control" placeholder="" value="{{Input::old('display_name')}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">主页</label>
                        <div class="col-sm-10">
                            <input type="text" name="user_url" class="form-control" placeholder="" value="{{Input::old('user_url')}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" placeholder="" value="{{Input::old('password')}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="" value="{{Input::old('password_confirmation')}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">添加用户</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /col-md-4-->
</div>
@endsection