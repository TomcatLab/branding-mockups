
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
          "plugins" : [ "wholerow"]
    });
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