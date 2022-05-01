@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Project List
                    <div class="float-right">
                        <a class="btn btn-outline-primary" href="{{ route('project.create') }}">Create Project</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Solution Description</th>
                                <th>Target</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->product }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>
                                        @foreach (json_decode($project->target) as $target)
                                            <span class="badge badge-secondary">{{ $target}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $project->created_at->format('m/d/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
