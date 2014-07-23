@extends('backend.layout')
@section('page_title')
<h1>控制面板</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 form-group">
        <h2 class="inline-block">欢迎回来！目前开发中，部分功能未完成！</h2>
        <hr>
        <div>
            <h3>进度如下：</h3>
            <ul>
                <li>
                <strong>文章</strong><br>
                        <label class="pad-x-5">列表: <span class="badge badge-sm badge-success">90%</span></label>
                        <label class="pad-x-5">发布: <span class="badge badge-sm badge-success">100%</span></label>
                        <label class="pad-x-5">编辑: <span class="badge badge-sm badge-success">100%</span></label>
                        <label class="pad-x-5">删除: <span class="badge badge-sm badge-success">100%</span></label>
                </li>
                <li>
                <strong>分类</strong><br>
                        <label class="pad-x-5">添加: <span class="badge badge-sm badge-success">100%</span></label>
                        <label class="pad-x-5">编辑: <span class="badge badge-sm badge-success">100%</span></label>
                        <label class="pad-x-5">删除: <span class="badge badge-sm badge-success">100%</span></label>
                </li>
                <li>
                <strong>用户</strong><br>
                        <label class="pad-x-5">添加: <span class="badge badge-sm badge-default">0%</span></label>
                        <label class="pad-x-5">编辑: <span class="badge badge-sm badge-default">0%</span></label>
                        <label class="pad-x-5">删除: <span class="badge badge-sm badge-default">0%</span></label>
                </li>
                <li>
                <strong>链接</strong><br>
                        <label class="pad-x-5">添加: <span class="badge badge-sm badge-default">0%</span></label>
                        <label class="pad-x-5">编辑: <span class="badge badge-sm badge-default">0%</span></label>
                        <label class="pad-x-5">删除: <span class="badge badge-sm badge-default">0%</span></label>
                </li>
                <li>
                <strong>评论</strong><br>
                        <label class="pad-x-5">回复: <span class="badge badge-sm badge-default">0%</span></label>
                        <label class="pad-x-5">删除: <span class="badge badge-sm badge-default">0%</span></label>
                </li>
                <li>
                <strong>设置</strong><br>
                        <label class="pad-x-5">基础: <span class="badge badge-sm badge-default">0%</span></label>
                        <label class="pad-x-5">高级: <span class="badge badge-sm badge-default">0%</span></label>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection