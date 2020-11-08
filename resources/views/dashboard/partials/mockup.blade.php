<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Mockup->mockup_name }}</h5>
        <p class="card-text">{{ $Mockup->category_name}}</p>
        <a href="#" class="btn btn-primary">Edit</a>
        {{ Form::open(array('url' => route('admin.products.mockups.list'), 'method' => 'delete', 'class' => 'form-inline')) }}
            <input type="hidden" name="MockupId" value="{{ $Mockup->id }}">
            <button type="submit" class="btn btn-danger">Delete</button>
        {{ Form::close() }}
    </div>
</div>
