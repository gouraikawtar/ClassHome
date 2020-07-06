@extends('Student.myLayouts.layout')

@section('title')
<title>ClassHome - Homework Details</title>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h4>Homework details</h4>
    </div>
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>Title</th>
                <td>{{$homework->title}}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{Carbon\Carbon::parse($homework->created_at)->format('Y-m-d')}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>
                    @if ($homework->description!=null)
                        {{$homework->description}}
                    @else
                        None
                    @endif
                </td>
            </tr>
            <tr>
                <th>Deadline</th>
                <td>{{$homework->deadline}}</td>
            </tr>
            <tr>
                <th rowspan="0">Files</th>
            </tr>
            @forelse ($files as $file)
            <tr>
                <td><a href="{{route('homeworks.download',$file->title)}}"><i class="far fa-file-alt"></i> {{$file->title}}</a></td>
            </tr>
            @empty
                <tr>
                    <td>No files</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection