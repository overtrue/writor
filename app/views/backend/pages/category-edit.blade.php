@extends('backend.layout')
@section('page_title')
<h1>文章分类 <a href="{{url('/admin/category/all')}}" class="btn btn-info">分类列表</a></h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 row form-group">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form action="{{url('/admin/category/update', ['id' => $category->id])}}" method="post" accept-charset="utf-8" class="">
                        <div class="form-group">
                            <label class="control-label">名称</label>
                            <input type="text" name="name" class="form-control" placeholder="" value="{{Input::old('name', $category->name)}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">别名</label>
                            <input type="text" name="slug" class="form-control" placeholder="" value="{{Input::old('slug', $category->slug)}}">
                            <p class="help-block">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">父分类</label>
                            <select name="parent_id" class="selectboxit">
                                <option value="0">无</option>
                                @foreach($categories as $cate)
                                <option value="{{$cate['id']}}" @if(Input::old('parent_id', $category->parent) == $cate['id']) selected @endif>{{ $cate['icon'] . "  " . $cate['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">分类描述</label>
                            <textarea name="description" class="form-control" placeholder="">{{Input::old('description', $category->description)}}</textarea>
                            <p class="help-block">描述只会在一部分主题中显示。</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <button type="submit" class="btn btn-success">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /col-md-12-->
    </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
@endsection