@extends('backend.layout')
@section('page_title')
<h1>文章分类</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 row form-group">
        <div class="col-md-4">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form action="{{url('/admin/category/create')}}" method="post" accept-charset="utf-8" class="">
                        <div class="form-group">
                            <label class="control-label">名称</label>
                            <input type="text" name="name" class="form-control" placeholder="" value="{{Input::old('name')}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">别名</label>
                            <input type="text" name="slug" class="form-control" placeholder="" value="{{Input::old('slug')}}">
                            <p class="help-block">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">父分类</label>
                            <select name="parent_id" class="selectboxit">
                                <option value="0">无</option>
                                @foreach($categories as $category)
                                <option value="{{$category['id']}}" @if(Input::old('parent_id') == $category['id']) selected @endif>{{ $category['icon'] . "  " . $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">分类描述</label>
                            <textarea name="description" class="form-control" placeholder="">{{Input::old('description')}}</textarea>
                            <p class="help-block">描述只会在一部分主题中显示。</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <button type="submit" class="btn btn-success">添加分类目录</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /col-md-4-->
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="select-all"></th>
                        <th>ID</th>
                        <th>分类名</th>
                        <th>描述</th>
                        <th>别名</th>
                        <th>文章</th>
                    </tr>
                </thead>

                <tbody>
                    @if(!count($categories))
                    <tr>
                        <td colspan="6">目前没有分类</td>
                    </tr>
                    @else
                    @foreach($categories as $category)
                    <tr>
                        <td><input type="checkbox" value="{{$category['id']}}"></td>
                        <td>{{ $category['id'] }}</td>
                        <td>
                            {{ $category['icon'] . "  " . $category['name'] }}
                            <div class="td-tool-bar-wrapper">
                                <div class="td-tool-bar">
                                    <div class="tips-text">
                                        <a href="{{url('/admin/category/edit', array('id' => $category['id']))}}" class="btn btn-default btn-sm btn-icon icon-left">
                                            <i class="entypo-pencil"></i>
                                            编辑
                                        </a>
                                        @if($category['id'] != 1)
                                        <a href="{{url('/admin/category/delete', array('id' => $category['id']))}}" class="btn btn-danger btn-sm btn-icon icon-left" onclick="return confirm('确认删除吗？')">
                                            <i class="entypo-cancel"></i>
                                            删除
                                        </a>
                                        @endif
                                    </div>
                                    <div class="tips-angle diamond"></div>
                                </div>
                            </div>
                        </td>
                        <td>{{ !empty($category['description']) ? $category['description'] : '无' }}</td>
                        <td>{{ $category['slug'] }}</td>
                        <td>{{ $category['count'] }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /col-md-4 --> 
    </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
@endsection