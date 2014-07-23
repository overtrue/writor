$(document).ready(function($) {
    var editor = new Editor();
    editor.render();
    $(document).scroll(function() {
      var editorToobar = $($('.editor-toolbar')[0]);
      var cloneEditorToobar = editorToobar.clone();
          cloneEditorToobar.addClass('clone-editor-toolbar').css({'position':'fixed', 'top':'0','background':'#fff','z-index':999999999, width:editorToobar.width()});
      if ($(document).scrollTop() >= editorToobar.offset().top) {
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