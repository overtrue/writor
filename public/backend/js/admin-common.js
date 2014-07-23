/**
 *   Main JavaScript File
 *
 *  Theme by: www.laborator.co
 **/

var public_vars = public_vars || {};

;(function($, window, undefined){
  
  "use strict";
  
  $(document).ready(function()
  {
    // Sidebar Menu var
    public_vars.$body     = $("body");
    public_vars.$pageContainer  = public_vars.$body.find(".page-container");
    public_vars.$sidebarMenu  = public_vars.$pageContainer.find('.sidebar-menu');
    public_vars.$mainMenu     = public_vars.$sidebarMenu.find('#main-menu');
    public_vars.$mainContent  = public_vars.$pageContainer.find('.main-content');
    
    public_vars.$body.addClass('loaded');
    
    // Just to make sure...
    $(window).on('error', function(ev)
    { 
      // Do not let page without showing if JS fails somewhere
      //init_page_transitions();
    });
        
    // Sidebar Menu Setup
    setup_sidebar_menu();
    
    // Sidebar Collapse icon
    public_vars.$sidebarMenu.find(".sidebar-collapse-icon").on('click', function(ev)
    {
      ev.preventDefault();
      
      var with_animation = $(this).hasClass('with-animation');
      
      toggle_sidebar_menu(with_animation);
    });

    // Mobile Sidebar Collapse icon
    public_vars.$sidebarMenu.find(".sidebar-mobile-menu a").on('click', function(ev)
    {
      ev.preventDefault();
      var with_animation = $(this).hasClass('with-animation');
      if(with_animation)
      {
        public_vars.$mainMenu.stop().slideToggle('normal', function()
        {
          public_vars.$mainMenu.css('height', 'auto');
        });
      }
      else
      {
        public_vars.$mainMenu.toggle();
      }
    });
    
    // Close Sidebar if Tablet Screen is visible
    public_vars.$sidebarMenu.data('initial-state', (public_vars.$pageContainer.hasClass('sidebar-collapsed') ? 'closed' : 'open'));
    if(is('tabletscreen'))
    {
      hide_sidebar_menu(false);
    }
  
    // NiceScroll
    if($.isFunction($.fn.niceScroll))
    {
      var nicescroll_defaults = {
        cursorcolor: '#d4d4d4',
        cursorborder: '1px solid #ccc',
        railpadding: {right: 3},
        cursorborderradius: 1,
        autohidemode: true,
        sensitiverail: true
      };
      
      var fixed_sidebar = $(".sidebar-menu.fixed");
      
      if(fixed_sidebar.length == 1)
      {
        var fs_tm = 0;
        
        fixed_sidebar.niceScroll({
          cursorcolor: '#454a54',
          cursorborder: '1px solid #454a54',
          railpadding: {right: 3},
          railalign: 'right',
          cursorborderradius: 1
        });
        
        fixed_sidebar.on('click', 'li a', function()
        { 
          fixed_sidebar.getNiceScroll().resize();
          fixed_sidebar.getNiceScroll().show();
          
          window.clearTimeout(fs_tm);
          
          fs_tm = setTimeout(function()
          {           
            fixed_sidebar.getNiceScroll().resize();
          }, 500);
        });
      }
    }
    
    // Panels
    // Added on v1.1.4 - Fixed collapsing effect with panel tables
    $(".panel-heading").each(function(i, el)
    {
      var $this = $(el),
        $body = $this.next('table');
      $body.wrap('<div class="panel-body with-table"></div>');
      $body = $this.next('.with-table').next('table');
      $body.wrap('<div class="panel-body with-table"></div>');
      
    });
    
    continueWrappingPanelTables();

    // End of: Added on v1.1.4
    $('body').on('click', '.panel > .panel-heading > .panel-options > a[data-rel="reload"]', function(ev)
    {
      ev.preventDefault();
      
      var $this = jQuery(this).closest('.panel');
      
      blockUI($this);
      $this.addClass('reloading');
      
      setTimeout(function()
      {
        unblockUI($this)
        $this.removeClass('reloading');
      }, 900);
      
    }).on('click', '.panel > .panel-heading > .panel-options > a[data-rel="close"]', function(ev)
    {
      ev.preventDefault();
      var $this = $(this),
        $panel = $this.closest('.panel');
      var t = new TimelineLite({
        onComplete: function()
        {
          $panel.slideUp(function()
          {
            $panel.remove();
          });
        }
      });
      
      t.append( TweenMax.to($panel, .2, {css: {scale: 0.95}}) );
      t.append( TweenMax.to($panel, .5, {css: {autoAlpha: 0, transform: "translateX(100px) scale(.95)"}}) );
      
    }).on('click', '.panel > .panel-heading > .panel-options > a[data-rel="collapse"]', function(ev)
    {
      ev.preventDefault();
      
      var $this = $(this),
        $panel = $this.closest('.panel'),
        $body = $panel.children('.panel-body, .table'),
        do_collapse = ! $panel.hasClass('panel-collapse');
      
      if($panel.is('[data-collapsed="1"]'))
      {
        $panel.attr('data-collapsed', 0);
        $body.hide();
        do_collapse = false;
      }
      
      if(do_collapse)
      {
        $body.slideUp('normal', fit_main_content_height);
        $panel.addClass('panel-collapse');
      }
      else
      {       
        $body.slideDown('normal', fit_main_content_height);
        $panel.removeClass('panel-collapse');
      }
    });
    
    // Popovers and tooltips
    $('[data-toggle="popover"]').each(function(i, el)
    {
      var $this = $(el),
        placement = attrDefault($this, 'placement', 'right'),
        trigger = attrDefault($this, 'trigger', 'click'),
        popover_class = $this.hasClass('popover-secondary') ? 'popover-secondary' : ($this.hasClass('popover-primary') ? 'popover-primary' : ($this.hasClass('popover-default') ? 'popover-default' : ''));
      
      $this.popover({
        placement: placement,
        trigger: trigger
      });

      $this.on('shown.bs.popover', function(ev)
      {
        var $popover = $this.next();
        
        $popover.addClass(popover_class);
      });
    });
    
    $('[data-toggle="tooltip"]').each(function(i, el)
    {
      var $this = $(el),
        placement = attrDefault($this, 'placement', 'top'),
        trigger = attrDefault($this, 'trigger', 'hover'),
        popover_class = $this.hasClass('tooltip-secondary') ? 'tooltip-secondary' : ($this.hasClass('tooltip-primary') ? 'tooltip-primary' : ($this.hasClass('tooltip-default') ? 'tooltip-default' : ''));
      
      $this.tooltip({
        placement: placement,
        trigger: trigger
      });

      $this.on('shown.bs.tooltip', function(ev)
      {
        var $tooltip = $this.next();
        
        $tooltip.addClass(popover_class);
      });
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
    
    
    // Auto Size for Textarea
    if($.isFunction($.fn.autosize))
    {
      $("textarea.autogrow, textarea.autosize").autosize();
    }
    
    // Tagsinput
    if($.isFunction($.fn.tagsinput))
    {
      $(".tagsinput").tagsinput();
    }
    
    
    // Datepicker
    if($.isFunction($.fn.datepicker))
    {
      $(".datepicker").each(function(i, el)
      {
        var $this = $(el),
          opts = {
            format: attrDefault($this, 'format', 'mm/dd/yyyy'),
            startDate: attrDefault($this, 'startDate', ''),
            endDate: attrDefault($this, 'endDate', ''),
            daysOfWeekDisabled: attrDefault($this, 'disabledDays', ''),
            startView: attrDefault($this, 'startView', 0),
            rtl: rtl()
          },
          $n = $this.next(),
          $p = $this.prev();
                
        $this.datepicker(opts);
        
        if($n.is('.input-group-addon') && $n.has('a'))
        {
          $n.on('click', function(ev)
          {
            ev.preventDefault();
            
            $this.datepicker('show');
          });
        }
        
        if($p.is('.input-group-addon') && $p.has('a'))
        {
          $p.on('click', function(ev)
          {
            ev.preventDefault();
            
            $this.datepicker('show');
          });
        }
      });
    }
    
    // Timepicker
    if($.isFunction($.fn.timepicker))
    {
      $(".timepicker").each(function(i, el)
      {
        var $this = $(el),
          opts = {
            template: attrDefault($this, 'template', false),
            showSeconds: attrDefault($this, 'showSeconds', false),
            defaultTime: attrDefault($this, 'defaultTime', 'current'),
            showMeridian: attrDefault($this, 'showMeridian', true),
            minuteStep: attrDefault($this, 'minuteStep', 15),
            secondStep: attrDefault($this, 'secondStep', 15)
          },
          $n = $this.next(),
          $p = $this.prev();
        
        $this.timepicker(opts);
        
        if($n.is('.input-group-addon') && $n.has('a'))
        {
          $n.on('click', function(ev)
          {
            ev.preventDefault();
            
            $this.timepicker('showWidget');
          });
        }
        
        if($p.is('.input-group-addon') && $p.has('a'))
        {
          $p.on('click', function(ev)
          {
            ev.preventDefault();
            
            $this.timepicker('showWidget');
          });
        }
      });
    }
    
  
    // Modal Static
    public_vars.$body.on('click', '.modal[data-backdrop="static"]', function(ev)
    {
      var $modal_dialog = $(this).find('.modal-dialog .modal-content');
      
      var tt = new TimelineMax({paused: true});
      
      tt.append( TweenMax.to($modal_dialog, .1, {css: {scale: 1.1}, ease: Expo.easeInOut}) );
      tt.append( TweenMax.to($modal_dialog, .3, {css: {scale: 1}, ease: Back.easeOut}) );
      
      tt.play();
    });
    
    // Fit main content height
    fit_main_content_height();
    
    var fmch = 0,
      fmch_fn = function(){
      
      window.clearTimeout(fmch);
      fit_main_content_height();
      
      fmch = setTimeout(fmch_fn, 800);
    };
    
    fmch_fn();

  });
  
  //tips
  $('.tips i').click(function(){
    $(this).parent().hide(600, function(){ $(this).remove()});
  });
  $('.tips').each(function(){
    var _this = $(this);
    setTimeout(function(){
      _this.slideUp(800, function(){ $(this).remove() });
    }, 20000);
  });

  // Enable/Disable Resizable Event
  var wid = 0;
  
  $(window).resize(function() {
    clearTimeout(wid);
    wid = setTimeout(trigger_resizable, 200);
  });

  
  
})(jQuery, window);


/* Functions */
function fit_main_content_height()
{
  if(public_vars.$sidebarMenu.length && public_vars.$sidebarMenu.hasClass('fixed') == false)
  {
    public_vars.$sidebarMenu.css('min-height', '');
    public_vars.$mainContent.css('min-height', '');
    
    if(isxs())
    { 
      if(typeof reset_mail_container_height != 'undefined')
        reset_mail_container_height();
      return;
      
      if(typeof fit_calendar_container_height != 'undefined')
        reset_calendar_container_height();
      return;
    }
    
    var sm_height  = public_vars.$sidebarMenu.outerHeight(),
      mc_height  = public_vars.$mainContent.outerHeight(),
      doc_height = $(document).height(),
      win_height = $(window).height();
    
    if(win_height > doc_height)
    {
      doc_height = win_height;
    }
      
    
    public_vars.$mainContent.css('min-height', doc_height);
    public_vars.$sidebarMenu.css('min-height', doc_height);
    //public_vars.$chat.css('min-height', doc_height);
    
    if(typeof fit_mail_container_height != 'undefined')
      fit_mail_container_height();
    
    if(typeof fit_calendar_container_height != 'undefined')
      fit_calendar_container_height();
  }
}


// Sidebar Menu Setup
function setup_sidebar_menu()
{
  var $items_with_submenu   = public_vars.$sidebarMenu.find('li:has(ul)'),
    submenu_options     = {
      submenu_open_delay: 0.5,
      submenu_open_easing: Sine.easeInOut,
      submenu_opened_class: 'opened'
    },
    root_level_class    = 'root-level',
    is_multiopen      = public_vars.$mainMenu.hasClass('multiple-expanded');
  
  public_vars.$mainMenu.find('> li').addClass(root_level_class);
  
  $items_with_submenu.each(function(i, el)
  {
    var $this = $(el),
      $link = $this.find('> a'),
      $submenu = $this.find('> ul');
    
    $this.addClass('has-sub');
    
    $link.click(function(ev)
    {
      ev.preventDefault();
      
      if( ! is_multiopen && $this.hasClass(root_level_class))
      {
        var close_submenus = public_vars.$mainMenu.find('.' + root_level_class).not($this).find('> ul');
        
        close_submenus.each(function(i, el)
        {
          var $sub = $(el);
          menu_do_collapse($sub, $sub.parent(), submenu_options);
        });
      }
      
      if( ! $this.hasClass(submenu_options.submenu_opened_class))
      {
        var current_height;
        
        if( ! $submenu.is(':visible'))
        {
          menu_do_expand($submenu, $this, submenu_options);
        }
      }
      else
      {
        menu_do_collapse($submenu, $this, submenu_options);
      }
      
      fit_main_content_height();
    });

  });
  
  // Open the submenus with "opened" class
  public_vars.$mainMenu.find('.'+submenu_options.submenu_opened_class+' > ul').addClass('visible');
  
  // Well, somebody may forgot to add "active" for all inhertiance, but we are going to help you (just in case) - we do this job for you for free :P!
  if(public_vars.$mainMenu.hasClass('auto-inherit-active-class'))
  {
    menu_set_active_class_to_parents( public_vars.$mainMenu.find('.active') );
  }
  
  // Search Input
  var $search_input = public_vars.$mainMenu.find('#search input[type="text"]'),
    $search_el = public_vars.$mainMenu.find('#search');
    
  public_vars.$mainMenu.find('#search form').submit(function(ev)
  {
    var is_collapsed = public_vars.$pageContainer.hasClass('sidebar-collapsed');
    
    if(is_collapsed)
    {
      if($search_el.hasClass('focused') == false)
      {
        ev.preventDefault();
        $search_el.addClass('focused');
        
        $search_input.focus();
        
        return false;
      }
    }
  });
  
  $search_input.on('blur', function(ev)
  {
    var is_collapsed = public_vars.$pageContainer.hasClass('sidebar-collapsed');
    
    if(is_collapsed)
    {
      $search_el.removeClass('focused');
    }
  });
  
  
  // Collapse Icon (mobile device visible)
  var show_hide_menu = $('');
  
  public_vars.$sidebarMenu.find('.logo-env').append(show_hide_menu);
}


function menu_do_expand($submenu, $this, options)
{
  $submenu.addClass('visible').height('');
  current_height = $submenu.outerHeight();
  
  var props_from = {
    opacity: .2, 
    height: 0, 
    top: -20
  },
  props_to = {
    height: current_height, 
    opacity: 1, 
    top: 0
  };
  
  if(isxs())
  {
    delete props_from['opacity'];
    delete props_from['top'];
    
    delete props_to['opacity'];
    delete props_to['top'];
  }
  
  TweenMax.set($submenu, {css: props_from});

  $this.addClass(options.submenu_opened_class);
  
  TweenMax.to($submenu, options.submenu_open_delay, {css: props_to, ease: options.submenu_open_easing, onComplete: function()
  {
    $submenu.attr('style', '');
    fit_main_content_height();
  }});
}


function menu_do_collapse($submenu, $this, options)
{
  if(public_vars.$pageContainer.hasClass('sidebar-collapsed') && $this.hasClass('root-level'))
  {
    return;
  }
  
  $this.removeClass(options.submenu_opened_class);
  
  TweenMax.to($submenu, options.submenu_open_delay, {css: {height: 0, opacity: .2}, ease: options.submenu_open_easing, onComplete: function()
  {
    $submenu.removeClass('visible');
    fit_main_content_height();
  }});
}


function menu_set_active_class_to_parents($active_element)
{
  if($active_element.length)
  {
    var $parent = $active_element.parent().parent();
    
    $parent.addClass('active');
    
    if(! $parent.hasClass('root-level'))
      menu_set_active_class_to_parents($parent)
  }
}


jQuery(public_vars, {
  hover_index: 4
});


// Block UI Helper
function blockUI($el)
{
  $el.block({
    message: '',
    css: {
      border: 'none',
      padding: '0px',
      backgroundColor: 'none'
    },
    overlayCSS: {
      backgroundColor: '#fff',
      opacity: .3,
      cursor: 'wait'
    }
  });
}

function unblockUI($el)
{
  $el.unblock();
}


// Element Attribute Helper
function attrDefault($el, data_var, default_val)
{
  if(typeof $el.data(data_var) != 'undefined')
  {
    return $el.data(data_var);
  }
  
  return default_val;
}

// Root Wizard Current Tab
function setCurrentProgressTab($rootwizard, $nav, $tab, $progress, index)
{
  $tab.prevAll().addClass('completed');
  $tab.nextAll().removeClass('completed');
  
  var items         = $nav.children().length,
    pct           = parseInt((index+1) / items * 100, 10),
    $first_tab    = $nav.find('li:first-child'),
    margin        = (1/(items*2) * 100) + '%';//$first_tab.find('span').position().left + 'px';
  
  if( $first_tab.hasClass('active'))
  {
    $progress.width(0);
  }
  else
  {
      $progress.width( ((index-1) /(items-1)) * 100 + '%' ); //$progress.width( $tab.prev().position().left - $tab.find('span').width()/2 );
  }
  
  
  $progress.parent().css({
    marginLeft: margin,
    marginRight: margin
  });
  
  /*var m = $first_tab.find('span').position().left - $first_tab.find('span').width() / 2;
  
  $rootwizard.find('.tab-content').css({
    marginLeft: m,
    marginRight: m
  });*/
}

// Scroll to Bottom
function scrollToBottom($el)
{
  if(typeof $el == 'string')
    $el = $($el);
    
  $el.get(0).scrollTop = $el.get(0).scrollHeight;
}


// Check viewport visibility (entrie element)
function elementInViewport(el) 
{ 
  var top = el.offsetTop;
  var left = el.offsetLeft;
  var width = el.offsetWidth;
  var height = el.offsetHeight;

  while (el.offsetParent) {
    el = el.offsetParent;
    top += el.offsetTop;
    left += el.offsetLeft;
  }

  return (
    top >= window.pageYOffset &&
    left >= window.pageXOffset &&
    (top + height) <= (window.pageYOffset + window.innerHeight) &&
    (left + width) <= (window.pageXOffset + window.innerWidth)
  );
}

// X Overflow
function disableXOverflow()
{
  public_vars.$body.addClass('overflow-x-disabled');
}

function enableXOverflow()
{
  public_vars.$body.removeClass('overflow-x-disabled');
}


function continueWrappingPanelTables()
{
  var $tables = jQuery(".panel-body.with-table + table");
  
  if($tables.length)
  {
    $tables.wrap('<div class="panel-body with-table"></div>');
    continueWrappingPanelTables();
  }
}