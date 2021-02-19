<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Showcase->label }}</h5>
        <p class="card-text">{{ $Showcase->category_name }}{{ $Showcase->user }}</p>
            <button type="button" class="btn btn-link" disabled><i data-feather="eye"></i> View</button>
            <button type="button" class="btn btn-link" disabled><i data-feather="thumbs-up"></i> Like</button>   
            <a href="#" class="btn btn-primary mr-1">
                <i data-feather="edit" width="14" height="14" ></i>
            </a>
            @if($page['show_delete'])
            <a href="{{ route('admin.showcase-delete', $Showcase->id) }}" type="submit" class="btn btn-danger">
                <i data-feather="trash" width="14" height="14" ></i>
            </a>
            @endif
            @if($page['show_restore'])
            <a href="{{ route('admin.cms.showcase-restore', $Showcase->id) }}" type="submit" class="btn btn-danger">
                <i data-feather="refresh-cw" width="14" height="14" ></i>
            </a>
            @endif
    </div>
</div>
