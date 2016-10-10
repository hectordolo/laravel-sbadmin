@extends('layouts.app')

@section('title')
    Add Book
@endsection

@section('page-header')
    Add Book
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'books.save', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Name
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Description
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('description', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ route('books.index') }}" type="button" class="btn btn-primary">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection