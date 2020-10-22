<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Mockup->name }}</h5>
        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        {{ Form::open(array('url' => route('admin.products.mockups.list'), 'method' => 'delete', 'class' => 'form-inline')) }}
        <a href="#" class="btn btn-primary">Edit</a>
        <input type="hidden" name="MockupId" value="{{ $Mockup->id }}">
        <button type="submit" class="btn btn-danger">Delete</button>
        {{ Form::close() }}
    </div>
</div>
