@extends('backend.layout')
@section('page_title')
<h1>文章 <a href="{{url('/admin/post/new')}}" class="btn btn-info">写文章</a></h1>
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
                    <th>标题</th>
                    <th>分类</th>
                    <th>浏览次数</th>
                    <th>评论次数</th>
                </tr>
            </thead>
            <tbody>
                @if(!count($posts))
                <tr>
                    <td colspan="6">目前没有文章</td>
                </tr>
                @else
                @foreach($posts as $post)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$post->id}}">
                    </td>
                    <td class="td-post-title">
                        {{$post->post_title}}
                        <div class="td-tool-bar-wrapper">
                            <div class="td-tool-bar">
                            <div class="tips-text">
                                    <a href="{{url('/admin/post/edit', array('id' => $post->id))}}" class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i>
                                        编辑
                                    </a>
                                    <a href="{{url('/admin/post/delete', array('id' => $post->id))}}" class="btn btn-danger btn-sm btn-icon icon-left" onclick="return confirm('确认删除吗？')">
                                        <i class="entypo-cancel"></i>
                                        删除
                                    </a>
                                </div>
                                <div class="tips-angle diamond"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if(!count($post->categories()))
                            无
                        @elseif(count($post->categories()))
                            {{join('、', array_fetch($post->categories(), 'name'))}}
                        @else
                        无
                        @endif
                    </td>
                    <td>{{$post->view_count}}</td>
                    <td>{{$post->comment_count}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
@endsection