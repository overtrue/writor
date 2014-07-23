@extends('backend.layout')
@section('page_title')
<h1>编辑文章 <a href="{{url('/admin/post/all')}}" class="btn btn-info">文章列表</a></h1>
@endsection
@section('content')
      <div class="row">
        <form action="{{url('/admin/post/update', array('id' => $post->id))}}" method="post" accept-charset="utf-8" class="form-horizontal">
          <div class="col-md-12 form-group">
            <input type="text" class="form-control " name="title" value="{{$post->post_title}}" placeholder="文章标题"><br>
          </div>
          <div class="col-md-12 form-group">
            <textarea name="content" id="content" class="col-md-12">{{$post->post_content}}</textarea>
          </div>
          <div class="col-md-12 form-group">
            <div class="col-md-12">
              
            </div>
          </div>
          <div class="col-md-12 form-group pull-right">
            <div class="col-md-2">
              <input type="hidden" name="old_category" value="{{join(',', array_pluck($post->categories(), 'id'))}}">
              <button type="submit" class="btn btn-success"> 保存 </button>
              <button type="button" class="btn btn-default"> 存为草稿 </button>
            </div>
            <label class="col-md-1 control-label">分类: </label>
            <div class="col-md-4">
              <select name="category" class="selectboxit col-md-4">
                @foreach($categories as $category)
                <option value="{{$category['id']}}" @if(in_array($category['id'], array_pluck($post->categories(), 'id')) || Input::old('parent_id') == $category['id']) selected @endif>{{ $category['icon'] . "  " . $category['name'] }}</option>
                @endforeach
              </select>
            </div>
            <label class="col-md-2 control-label">查看密码: </label>
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