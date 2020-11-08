<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Showcase->label }}</h5>
        <p class="card-text">{{ $Showcase->category_name }} . {{ $Showcase->user }}</p>
        <button type="button" class="btn btn-link" disabled><i data-feather="eye"></i> View</button>
        <button type="button" class="btn btn-link" disabled><i data-feather="thumbs-up"></i> Like</button>   
        <a href="#" class="btn btn-primary">Edit</a>
        {{ Form::open(array('url' => route('admin.products.showcases'),'method' => 'delete')) }}
            <input type="hidden" name="ShowcaseId" value="{{  $Showcase->id  }}">
            <button type="submit" class="btn btn-danger">Delete</button>
        {{ Form::close() }}
    </div>
</div>
