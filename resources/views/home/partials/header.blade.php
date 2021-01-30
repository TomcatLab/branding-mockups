
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
          urlStore: 'http://127.0.0.1:8000/admin/cms/page-edit/'+PageId,
          urlLoad: 'http://127.0.0.1:8000/admin/cms/page-edit/'+PageId,
          // For custom parameters/headers on requests
          params: {
            _token: CSRF_token,
            publish: 0
           },
          //headers: { Authorization: 'Basic ...' },
        }
    });
    if(typeof Blocks !== 'undefined'){
      $(Blocks).each(function(index, value) {
        editor.BlockManager.add(value.key, {
          label: value.name,
          attributes: { class:'gjs-fonts gjs-f-b1' },
          content: value.content
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
    //     "themes" : { "stripes" 