<div class="card">
    <img src="{{URL::to('dashboard/assets/images/placeholder.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $Showcase->showcase_label }}</h5>
        <p class="card-text">{{ $Showcase->showcase_category }} . {{ $Showcase->showcase_user }}</p>
        <button type="button" class="btn btn-link" disabled><i data-feather="eye"></i> View</button>
        <button type="button" class="btn btn-link" disabled><i data-feather="thumbs-up"></i> Like</button>   
        <a href="#" class="btn btn-primary">Edit</a>
        <a href="#" class="btn btn-danger">Delete</a>
    </div>
</div>
