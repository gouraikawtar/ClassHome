@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Homework Details</title>
@endsection

@section('content')
<div class="col-md-9">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>{{$homework->title}}</h4>
        </div>
        <table class="table table-hover">
            <tbody id="hwInfo">
                <tr>
                    <th>Created at</th>
                    <td id="creatDateView">{{Carbon\Carbon::parse($homework->created_at)->format('Y-m-d')}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td id="descrView">
                        @if ($homework->description!=null)
                            {{$homework->description}}
                        @else
                            None
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Deadline</th>
                    <td id="deadlineView">{{$homework->deadline}}</td>
                </tr>
                <tr>
                    <th>Expires at</th>
                    <td id="expView">{{Carbon\Carbon::parse($homework->expire_at)->format('H:i')}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td id="statusView">{{$homework->status}}</td>
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
</div>
@endsection