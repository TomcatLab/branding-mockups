<div class="row">
    <div class="col-md-12">
    @if ($errors->count())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach
    @endif

    @if (session()->has('success'))
        @foreach (session()->get('success') as $message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endforeach
    @endif
    </div>
</div>