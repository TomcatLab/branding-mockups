@extends('master')

@section('page')

    @include('dashboard.partials.alerts')

    @foreach($resource['Emails'] as $Email)
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $Email->name }}</h6>
                    {{ Form::open(array('url' => route('admin.emails'))) }}
                        <input type="hidden" name="EmailId" value="{{ $Email->id }}">
                        <div class="form-group">
                            <label for="email-subject-{{ $Email->id }}">Email Subject</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email-subject-{{ $Email->id }}"
                                value="{{ old('EmailSubject') ?? $Email->subject }}"
                                name="EmailSubject"
                                placeholder="Email Subject">
                        </div>
                        <div class="form-group">
                            <textarea
                                class="form-control"
                                name="EmailContent"
                                id="simpleMdeExample"
                                rows="10">{!! old('EmailContent') ?? $Email->content !!}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection