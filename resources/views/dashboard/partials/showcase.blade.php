<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Showcase->label }}</h5>
        <p class="card-text">{{ $Showcase->category_name }}{{ $Showcase->user }}</p>
        {{ Form::open(array('url' => route('admin.products.mockups.list'), 'method' => 'delete', 'class' => 'form-inline mt-2')) }}
            <button type="button" class="btn btn-link" disabled><i data-feather="eye"></i> View</button>
            <button type="button" class="btn btn-link" disabled><i data-feather="thumbs-up"></i> Like</button>   
            <input type="hidden" name="MockupId" value="{{ $Showcase->id }}">
            <div class="form-group">
                <a href="#" class="btn btn-primary mr-1"><i data-feather="edit" width="14" height="14" ></i></a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger"><i data-feather="trash" width="14" height="14" ></i></button>
            </div>
        {{ Form::close() }}
    </div>
</div>
