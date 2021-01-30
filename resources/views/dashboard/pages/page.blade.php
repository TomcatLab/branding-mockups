@extends('master')

@section('page')
<style>
.sidebar,
.navbar,
.footer{
  display:none;
}
.main-wrapper .page-wrapper .page-content,
.page-wrapper{
  padding: 0px !important;
  margin: 0px !important;
  width: 100% !important;
}
.gjs-pn-panel.gjs-pn-devices-c{
  padding:0;
}
.gjs-pn-panel.gjs-pn-devices-c .gjs-devices-c{
  padding:1px;
}
.gjs-pn-btn.fa.fa-paint-brush,
.gjs-pn-btn.fa.fa-code,
.gjs-pn-btn.fa.fa-bars,
.gjs-pn-btn.fa.fa-cog{
  display:none !important;
}
</style>
<script>
    var PageId = '{{ $PageId }}';
    var Styles = [{
              name: 'General',
              open: false,
              buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom']
            },{
              name: 'Flex',
              open: false,
              buildProps: ['flex-direction', 'flex-wrap', 'justify-content', 'align-items', 'align-content', 'order', 'flex-basis', 'flex-grow', 'flex-shrink', 'align-self']
            },{
              name: 'Dimension',
              open: false,
              buildProps: ['width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
            },{
              name: 'Typography',
              open: false,
              buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-shadow'],
            },{
              name: 'Decorations',
              open: false,
              buildProps: ['border-radius-c', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
            },{
              name: 'Extra',
              open: false,
              buildProps: ['transition', 'perspective', 'transform'],
            }
          ];
    var Blocks = {!! json_encode($Resources['PageBlocks'])!!};
    var BlockContents = {!! json_encode($Resources['BlockContents'])!!}
    var CSRF_token = "{{ csrf_token() }}";
</script>

<div id="page-{{ $PageId }}" style="height:0px; overflow:hidden;">
    <div class="container">
      {!! $Resources['PageContent']->value !!}
    </div>
    <style>
    {{ $Resources['PageContent']->styles }}
    </style>
</div>
@endsection