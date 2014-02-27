@extends('backend.layout')
@section('content')
<div class="row">
    <div class="col-md-12 form-group">
        <h2 class="inline-block">所有文章</h2>
        <button class="btn btn-xs btn-info" onclick="javascript:window.location.href='{{ url('admin/post/new') }}'" >写文章</button>
    </div>
    <div class="col-md-12 form-group">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="select-all">
                    </th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>浏览次数</th>
                    <th>评论次数</th>
                    <th class="do">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$post->id}}">
                    </td>
                    <td class="td-post-title">
                        {{$post->post_title}}
                    </td>
                    <td>
                        @if(!count($post->categorys()))
                            无
                        @else
                            {{join('、', array_fetch($post->categorys(), 'name'))}}
                        @endif
                    </td>
                    <td>{{$post->view_count}}</td>
                    <td>{{$post->comment_count}}</td>
                    <td>
                        <div class="td-tool-bar">
                            <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                编辑
                            </a>
                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                <i class="entypo-cancel"></i>
                                删除
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/assets/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
<link rel="stylesheet" href="{{ asset('/assets/js/icheck/skins/minimal/_all.css') }}"  id="style-resource-5">
@endsection

@section('page_js')
<script src="{{ asset('/assets/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
<script src="{{ asset('/assets/js/icheck/icheck.min.js') }}" id="script-resource-18"></script>
@endsection