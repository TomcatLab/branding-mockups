$(function() {
  'use strict';

  var img = $('.myDropify').dropify();
  img.on('file_upload.afterClear', function(event, element) {
      $.ajax({
          url: 'path/to/ajax',
          type: 'POST',
          data: {}
      });
  });
});