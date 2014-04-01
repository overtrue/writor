@extends('backend.layout')
@section('page_title')
<h1>写文章 <a href="{{url('/admin/post/all')}}" class="btn btn-info">文章列表</a></h1>
@endsection
@section('content')
      <div class="row">
        <form action="{{url('/admin/post/create')}}" method="post" accept-charset="utf-8" class="form-horizontal">
          <div class="col-md-12 form-group">
            <input type="text" class="form-control " name="title" value="" placeholder="文章标题"><br>
          </div>
          <div class="col-md-12 form-group">
            <textarea name="content" id="content" class="col-md-12"></textarea>
          </div>
          <div class="col-md-12 form-group">
            <div class="col-md-12">
              
            </div>
          </div>
          <div class="col-md-12 form-group pull-right">
            <div class="col-md-3">
              <button type="submit" class="btn btn-success"> 发 布 </button>
              <button type="button" class="btn btn-default"> 存为草稿 </button>
            </div>
            <label class="col-md-1 control-label">文章分类: </label>
            <div class="col-md-4">
              <select name="category" class="selectboxit col-md-4">
                <option value="0">-- 请选择 --</option>}
                option
                @foreach($categories as $category)
                <option value="{{$category['id']}}" @if(Input::old('parent_id') == $category['id']) selected @endif>{{ $category['icon'] . "  " . $category['name'] }}</option>
                @endforeach
              </select>
            </div>
            <label class="col-md-1 control-label">查看密码: </label>
            <div class="col-md-3">
              <input type="text" class="form-control " name="post-password" value="" placeholder="查看密码，留空则不加密"><br>
            </div>
          </div>
        </form>       
      </div>
      <hr />
      <div class="row content"></div>

      <br />
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/backend/css/prettify.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/css/editor.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/css/markdown.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/backend/js/prettify.js') }}"></script>
<script src="{{ asset('/backend/js/marked.js') }}"></script>
<script src="{{ asset('/backend/js/editor.js') }}"></script>
<script src="{{ asset('/backend/js/post.js') }}"></script> 
@endsection