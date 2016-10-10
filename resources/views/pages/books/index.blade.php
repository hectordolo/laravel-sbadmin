@extends('layouts.app')

@section('title')
    Books
@endsection

@section('page-header')
    Books <a href="{{ route('books.add') }}" type="button" class="btn btn-sm btn-success">Add Book</a>
@endsection

@section('page-content')
    @include('flash::message')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Book List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 25%">Name</th>
                                <th>Description</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <td>{{$book->id?$book->id:''}}</td>
                                        <td>{{$book->name?$book->name:''}}</td>
                                        <td>{{$book->description?$book->description:''}}</td>
                                        <td>
                                            <a href="{{route('books.edit', [$book->id])}}" title="Edit" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a type="button" class="btn btn-default btn-sm" title="Delete" data-toggle="modal" data-target="#deleteModal{{ $book->id }}"><i class="fa fa-trash"></i></a>
                                            <div id="deleteModal{{ $book->id }}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this item?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                                                            {!! Form::submit('Yes', ['class' => 'btn btn-success btn-flat']) !!}
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }} entries
                            <span class="pull-right">{!! $books->setPath('')->appends(Input::query())->render() !!}</span>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection