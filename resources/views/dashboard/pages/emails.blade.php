@extends('master')

@section('page')
    @foreach($resource['Emails'] as $Email)
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $Email->name }}</h6>
                    {{ Form::open(array('url' => route('admin.emails'))) }}
                        <input type="hidden" name="EmailId" value="{{ $Email->email_id }}">
                        <div class="form-group">
                            <label for="email-subject-{{ $Email->email_id }}">Email Subject</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email-subject-{{ $Email->email_id }}"
                                value="{{ $Email->email_subject }}"
                                name="EmailSubject"
                                placeholder="Email Subject">
                        </div>
                        <div class="form-group">
                            <textarea
                                class="form-control"
                                name="EmailContent"
                                id="tinymceExample"
                                rows="10">
                                {{ $Email->email_content}}
                            </textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection