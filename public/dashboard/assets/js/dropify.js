$(function() {
  'use strict';

  var img = $('.myDropify').dropify();
  img.on('file_upload.afterClear', function(event, element) {
    console.log("asdf");
     
  });
  $( ".myDropify" ).change(function() {
    let id = $(this).attr('data-id');
    $(this).parents('form').submit();
  });
});