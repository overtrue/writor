@extends('backend.layout')
@section('content')
      <div class="row">
        <form action="" method="post" accept-charset="utf-8" class="form-horizontal">
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
              <button type="button" class="btn btn-success"> 发 布 </button>
              <button type="button" class="btn btn-default"> 存为草稿 </button>
            </div>
            <label class="col-md-1 control-label">文章分类: </label>
            <div class="col-md-4">
              <select name="category" class="selectboxit col-md-4">
                <option value="2">Boston</option>
                <option value="3">Ohaio</option>
                <option value="4">New York</option>
                <option value="5">Washington</option>
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
<link rel="stylesheet" href="{{ asset('/assets/css/prettify.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/editor.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/markdown.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
@endsection

@section('page_js')
<script src="{{ asset('/assets/js/prettify.js') }}"></script>
<script src="{{ asset('/assets/js/marked.js') }}"></script>
<script src="{{ asset('/assets/js/editor.js') }}"></script>

<script>
  $(document).ready(function($) {
    var editor = new Editor();
    editor.render();
    $(document).scroll(function() {
      var editorToobar = $($('.editor-toolbar')[0]);
      var cloneEditorToobar = editorToobar.clone();
          cloneEditorToobar.addClass('clone-editor-toolbar').css({'position':'fixed', 'top':'0','background':'#fff','z-index':999999999, width:editorToobar.width()});
      if ($(document).scrollTop() >= editorToobar.offset().top - editorToobar.height()) {
        $('.clone-editor-toolbar').length || editorToobar.after(cloneEditorToobar);
      } else {
        $('.clone-editor-toolbar').remove();
      }
    });

    // SelectBoxIt Dropdown replacement
    if($.isFunction($.fn.selectBoxIt))
    {
      $("select.selectboxit").each(function(i, el)
      {
        var $this = $(el),
          opts = {
            showFirstOption: attrDefault($this, 'first-option', true),
            'native': attrDefault($this, 'native', false),
            defaultText: attrDefault($this, 'text', ''),
          };
          
        $this.addClass('visible');
        $this.selectBoxIt(opts);
      });
    }
  })  
</script>   
@endsection