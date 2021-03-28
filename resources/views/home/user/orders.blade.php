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
    @if(count($Resources['Orders']))
        @foreach($Resources['Orders'] as $order)
            <div class="card mb-3">
                <div class="row py-3">
                    <div class="col-4">
                        <div class="pl-3">
                            <img src="{{ URL::to($order->full_url)}}" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col-8">
                        <h3>{{ $order->name }}</h3>
                        <p>{{ $order->description }}</p>
                        <a href="{{ URL::to('user/download', $order->package_id)}}" class="download btn btn-primary">Download</a>                    
                    </div>
                </div>
            </div>
        @endforeach
    @else
    <div class="card-body text-center">
        No orders found.
    </div>
    @endif
</div>