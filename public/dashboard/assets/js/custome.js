
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
          stepsBeforeSave: 3,
          urlStore: 'http://127.0.0.1:8000/admin/cms/page-edit/3',
          urlLoad: 'http://127.0.0.1:8000/admin/cms/page-edit/3',
          // For custom parameters/headers on requests
          params: { _some_token: '....' },
          headers: { Authorization: 'Basic ...' },
        }
    });

      editor.BlockManager.add('testBlock', {
        label: 'Block',
        attributes: { class:'gjs-fonts gjs-f-b1' },
        content: `<div style="padding-top:50px; padding-bottom:50px; text-align:center">Test block</div>`
      })
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

    $('#pages').on("select_node.jstree", function (e, data) {
      if(data.node.data){
        editor = editor.replace('xxx',data.node.data);
        window.location.replace(editor);
      }
    });

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
});