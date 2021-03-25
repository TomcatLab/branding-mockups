
if(typeof PageId !== 'undefined' ){
    var editor = grapesjs.init({
        showOffsets: 1,
        noticeOnUnload: 0,
        container: '#page-'+PageId,
        height: '100%',
        fromElement: true,
        storageManager: { autoload: 0 },
        stylable: false,
        styleManager : {
          sectors: Styles,
        },  
        storageManager: {
          type: 'remote',
          // stepsBeforeSave: 3,
          // urlStore: _url +'admin/cms/page-edit/'+PageId,
          // urlLoad: _url +'admin/cms/page-edit/'+PageId,
          // // For custom parameters/headers on requests
          params: {
            _token: CSRF_token,
            publish: 0
          },
          // headers: { Authorization: 'Basic ' },
          id: 'gjs-',             // Prefix identifier that will be used on parameters
          //type: 'local',          // Type of the storage
          autosave: false,         // Store data automatically
          autoload: true,         // Autoload stored data on init
          stepsBeforeSave: 3,     // If autosave enabled, indicates how many changes are necessary before store method is triggered
        }
        
    });
    editor.Panels.addButton
    ('options',
      [{
        id: 'save-db',
        className: 'fa fa-floppy-o',
        command: 'save-db',
        attributes: {title: 'Save DB'}
      }]
    );
    editor.Commands.add
    ('save-db',
    {
        run: function(editor, sender)
        {
          sender && sender.set('active', 0); // turn off the button
          editor.store();

          var htmldata = editor.getHtml();
          var cssdata = editor.getCss();
          //_csrf_token
          //_url +'/admin/cms/page-edit/'+PageId
          $.ajax({
            type: "POST",
            url: _url +'/admin/cms/page-edit/'+PageId,
            data: {
              _token: _csrf_token,
            },
            success: function(){

            },
            dataType: 'json'
          });
        }
    });
    editor.Panels.addButton
    ('options',
      [{
        id: 'page-back',
        className: 'fa fa-arrow-left',
        command: 'page-back',
        attributes: {title: 'Page Back'}
      }]
    );
    editor.Commands.add
    ('page-back',
    {
        run: function(editor, sender)
        {
          //window.location.href = "http://www.w3schools.com";
          window.location.replace(_url+"/admin/cms/pages-list");
        }
    });

    if(typeof Blocks !== 'undefined'){
      $(Blocks).each(function(index, value) {
        editor.BlockManager.add(value.key, {
          label: value.name,
          attributes: { class:'gjs-fonts gjs-f-b1' },
          content: value.filename ? BlockContents[value.id] : value.content
        })    
      });
    }
}
if(typeof pages !== 'undefined'){
    $('#pages').jstree({
        "core" : {
            'data' : pages,
            "themes" : {
              "variant" : "large"
            }
          },
          "plugins" : [
            "contextmenu", "dnd", "search", "types", "wholerow"
          ]
    });

    // $('#pages').on("select_node.jstree", function (e, data) {
    //   if(data.node.data){
    //     editor = editor.replace('xxx',data.node.data);
    //     window.location.replace(editor);
    //   }
    // });

    // $('#pages').jstree({
    //   "core" : {
    //     "animation" : 0,
    //     // "check_callback" : true,
    //     "themes" : { "stripes" : true },
    //     'data' : pages
    //   },
    //   "types" : {
    //     "#" : {
    //       "max_children" : 1,
    //       "max_depth" : 4,
    //       "valid_children" : ["root"]
    //     },
    //     "root" : {
    //       "valid_children" : ["default"]
    //     },
    //     "default" : {
    //       "valid_children" : ["default","file"]
    //     },
    //     "file" : {
    //       "icon" : "glyphicon glyphicon-file",
    //       "valid_children" : []
    //     }
    //   },
    //   "plugins" : [
    //     "contextmenu", "dnd", "search",
    //     "state", "types", "wholerow"
    //   ]
    // });
}

$(function() {
  'use strict';

  /*simplemde editor*/
  if ($("#simpleMdeExample").length) {
    var simplemde = new SimpleMDE({
      element: $("#simpleMdeExample")[0]
    });
  }
  if(typeof actions !== 'undefined'){
    let allfields = [];
    $.each(actions, function( i, l ){
      allfields = allfields.concat(l['show'].split(","),l['hide'].split(","));
      $.each(allfields, function( fi, fn ){
        $("."+fn).hide();
      });
    });
    $('.action').change(function(){
      let show = actions[$(this).val()].show;
      let hide = actions[$(this).val()].hide;
      $.each(show.split(","), function( i, l ){
        $("."+l).show();
      });
      $.each(hide.split(","), function( i, l ){
        $("."+l).hide();
      });
    });
  }
});