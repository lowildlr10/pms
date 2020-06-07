@extends('layouts.app')

@section('main-contents')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">CONTENTS
            <a href="#" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modal-add-content">
                Add
            </a>
        </h5>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @if (count($contents) > 0)
                        @foreach ($contents as $ctrContent => $content)
                    <div class="col-md-12">
                        <div class="card p-2 mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {!! $content->unit_name !!} {!! $content->unit_name_abbrev ? "($content->unit_name_abbrev)" : '' !!}
                                </h5>
                                <hr>
                                <a href="#" class="btn btn-light btn-sm btn-block" data-toggle="modal" data-target="#modal-content-links-{{ $ctrContent }}">
                                    Document List
                                </a>
                                <hr>
                                <a href="#" class="card-link" data-toggle="modal" data-target="#modal-content-update-{{ $ctrContent }}">
                                    Edit
                                </a>
                                <a href="#" class="card-link" onclick="$('#content-destroy-{{ $ctrContent }}').submit();">
                                    <form id="content-destroy-{{ $ctrContent }}" action="{{ route('destroy', ['id' => $content->id]) }}"
                                          method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal show update -->
                    <div class="modal fade" id="modal-content-update-{{ $ctrContent }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('update', ['id' => $content->id]) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h6 class="modal-title">{!! $content->unit_name !!} {!! $content->unit_name_abbrev ? "($content->unit_name_abbrev)" : '' !!}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="unit-name">
                                                Unit Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="unit-name" name="unit_name"
                                                   value="{{ $content->unit_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit-name-abbrev">
                                                Unit Name Abbrevation <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="unit-name-abbrev" name="unit_name_abbrev"
                                                   value="{{ $content->unit_name_abbrev }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="links">
                                                Document Links <span class="text-danger">*</span>
                                                <small class="muted text-gray">Divide links using newline/enter</small>
                                            </label>
                                            <textarea name="links" id="links" rows="3" class="form-control" placeholder="Links" required
                                                >@if (count(unserialize($content->links)) > 0){{ implode("\n", unserialize($content->links)) }}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-link btn-sm">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal view links -->
                    <div class="modal fade" id="modal-content-links-{{ $ctrContent }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">{!! $content->unit_name !!} {!! $content->unit_name_abbrev ? "($content->unit_name_abbrev)" : '' !!}</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="list-group">
                                        @if (count(unserialize($content->links)) > 0)
                                            @foreach (unserialize($content->links) as $link)
                                        <a href="{{ $link }}" class="list-group-item list-group-item-action" target="_blank">
                                            {!! $link !!}
                                        </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @else
                    <a href="#" class="btn btn-link btn-sm btn-block" data-toggle="modal" data-target="#modal-add-content">
                        Add Content
                    </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal add content -->
<div class="modal fade" id="modal-add-content" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Add Content</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="unit-name">
                            Unit Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="unit-name" name="unit_name" required>
                    </div>
                    <div class="form-group">
                        <label for="unit-name-abbrev">
                            Unit Name Abbrevation <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="unit-name-abbrev" name="unit_name_abbrev" required>
                    </div>
                    <div class="form-group">
                        <label for="links">
                            Document Links <span class="text-danger">*</span>
                            <small class="muted text-gray">Divide links using newline/enter</small>
                        </label>
                        <textarea name="links" id="links" rows="5" class="form-control" placeholder="Links" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light btn-sm">Clear</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
