@extends('backend.layout')
@section('page_title')
<h1>评论</h1>
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
                    <th>访客</th>
                    <th>内容</th>
                    <th>文章</th>
                    <th>时间</th>
                    <th class="do">操作</th>
                </tr>
            </thead>
            <tbody>
                @if(!count($comments))
                <tr>
                    <td colspan="6">目前没有评论</td>
                </tr>
                @else
                @foreach($comments as $comment)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$comment->id}}">
                    </td>
                    <td>
                        {{$comment->comment_author}}
                        {{$comment->comment_author_email}}
                    </td>
                    <td>
                        {{$comment->comment_content}}
                    </td>
                    <td>{{$comment->post->post_title}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <div class="td-tool-bar">
                            <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                回复
                            </a>
                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                <i class="entypo-cancel"></i>
                                删除
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="pull-right">
            {{$comments->links()}}
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