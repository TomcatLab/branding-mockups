<div class="row">
    <div class="col-12">
    @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> {{ $message }}
        </div>
    @endif
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    </div>
</div>
<div class="col-12">
    <div class="card">
        @if(count($Resources['Orders']))
            @foreach($Resources['Orders'] as $order)
                <div>
                    <p>{{ $order->name }}</p>
                    <p>{{ $order->description }}</p>
                    <a href="{{ URL::to('user/download', 1)}}" class="download btn btn-primary">Download</a>                    
                </div>
            @endforeach
        @else
        <div class="card-body text-center">
            No orders found.
        </div>
        @endif
    </div>
</div>