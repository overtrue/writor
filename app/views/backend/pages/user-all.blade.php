@extends('backend.layout')
@section('page_title')
<h1>链接</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 form-group">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="select-all">
                    </th>
                    <th>登录名</th>
                    <th>邮箱</th>
                    <th>昵称</th>
                    <th>状态</th>
                    <th>添加时间</th>
                    <th class="do">操作</th>
                </tr>
            </thead>
            <tbody>
                @if(!count($users))
                <tr>
                    <td colspan="7">目前没有用户</td>
                </tr>
                @else
                @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$user->id}}">
                    </td>
                    <td>
                        {{$user->user_login}}
                    </td>
                    <td>{{$user->user_email}}</td>
                    <td>{{$user->nicename or '无'}}</td>
                    <td>{{$user->status}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <div class="td-tool-bar">
                            <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                编辑
                            </a>
                            @if($user->id > 1)
                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                <i class="entypo-cancel"></i>
                                删除
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div>
        {{$users->appends(Input::only('order', 'status'))->links('backend.pager')}}
        </div>
    </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
@endsection