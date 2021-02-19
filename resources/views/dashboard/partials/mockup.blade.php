<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Mockup->mockup_name }}</h5>
        <p class="card-text">{{ $Mockup->category_name}}</p>
        <a href="{{route('admin.products.mockups.presentation', $Mockup->id)}}" class="btn btn-primary mr-1"><i data-feather="layers" width="14" height="14" ></i></a>
        <a href="#" class="btn btn-primary mr-1"><i data-feather="edit" width="14" height="14" ></i></a>
        @if($page['show_delete'])
        <a href="{{ route('admin.products.mockups-delete', $Mockup->id) }}" type="submit" class="btn btn-danger">
            <i data-feather="trash" width="14" height="14" ></i>
        </a>
        @endif
        @if($page['show_restore'])
        <a href="{{ route('admin.products.mockup-restore', $Mockup->id) }}" type="submit" class="btn btn-danger">
            <i data-feather="refresh-cw" width="14" height="14" ></i>
        </a>
        @endif
    </div>
</div>
