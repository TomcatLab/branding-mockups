<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">{{ $page['header']['label'] ?? '' }}</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
    @foreach($page['header']['buttons'] as $button)
        @if($button['action'] == "link" )
        <a type="button" class="btn btn-outline-{{$button['style'] ? $button['style'] : 'info' }} btn-icon-text mr-2 mb-2 mb-md-0" href="{{ URL::to($button['link']) ?? '' }}">
            <i class="btn-icon-prepend" data-feather="{{ $button['icon'] ?? 'alert-circle'}}"></i>
            {{ $button['label'] ?? ''}}
        </a>
        @elseif($button['action'] == "model" )
        <a type="button" class="btn btn-outline-{{$button['style'] ? $button['style'] : 'info' }} btn-icon-text mr-2 mb-2 mb-md-0" data-toggle="modal" data-target="#{{$button['target'] ?? ''}}">
            <i class="btn-icon-prepend" data-feather="{{ $button['icon'] ?? 'alert-circle'}}"></i>
            {{ $button['label'] ?? ''}}
        </a>
        @endif
    <!-- 
     <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
        <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
        <input type="text" class="form-control">
    </div>
        <a type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
        <i class="btn-icon-prepend" data-feather="download"></i>
        Import
    </a>

    <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="printer"></i>
        Print
    </button>
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
        Download Report
    </button> -->
    @endforeach
    </div>
</div>