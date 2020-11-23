<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Mockup->mockup_name }}</h5>
        <p class="card-text">{{ $Mockup->category_name}}</p>
        {{ Form::open(array('url' => route('admin.products.mockups.list'), 'method' => 'delete', 'class' => 'form-inline mt-2')) }}
            <input type="hidden" name="MockupId" value="{{ $Mockup->id }}">
            <div class="form-group">
                <a href="#" class="btn btn-primary mr-1"><i data-feather="layers" width="14" height="14" ></i></a>
            </div>
            <div class="form-group">
                <a href="#" class="btn btn-primary mr-1"><i data-feather="edit" width="14" height="14" ></i></a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger"><i data-feather="trash" width="14" height="14" ></i></button>
            </div>
        {{ Form::close() }}
    </div>
</div>
