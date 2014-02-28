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
                    <th>名称</th>
                    <th>链接</th>
                    <th>添加时间</th>
                    <th class="do">操作</th>
                </tr>
            </thead>
            <tbody>
                @if(!count($links))
                <tr>
                    <td colspan="6">目前没有链接</td>
                </tr>
                @else
                @foreach($links as $link)
                <tr>
                    <td>
                        <input type="checkbox" value="{{$link->id}}">
                    </td>
                    <td>
                        {{$link->link_name}}
                    </td>
                    <td>{{$link->link_url}}</td>
                    <td>{{$link->created_at}}</td>
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
                @endif
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