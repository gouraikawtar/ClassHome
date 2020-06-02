@extends('Teacher.layouts.teacher-class-layout')

@section('title')
<title>ClassHome - Settings</title>
@endsection

@section('content')
<div class="col-md-8">
    @if (session()->has('code_reset'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('code_reset') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session()->has('info_edited'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('info_edited') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Edit Class</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('myclasses.update', $teachingClass->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="class_name">Class name</label>
                    <input type="text" class="form-control @error('class_name') is-invalid @enderror" name="class_name" id="class_name" value="{{ old('class_name', $teachingClass->name) }}">
                    @error('class_name')
                    <div class="invalid-feedback" id="section_error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="class_section">Section</label>
                    <select name="class_section" class="custom-select @error('class_section') is-invalid @enderror" id="class_section">
                        @switch(old('class_section', $teachingClass->section))
                            @case('Primary')
                            <option value="Primary" selected>Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Highschool">Highschool</option>
                            <option value="University/College">University/College</option>
                            <option value="Other">Other</option>
                                @break
                            @case('Secondary')
                            <option value="Primary">Primary</option>
                            <option value="Secondary" selected>Secondary</option>
                            <option value="Highschool">Highschool</option>
                            <option value="University/College">University/College</option>
                            <option value="Other">Other</option>
                                @break
                            @case('Highschool')
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Highschool" selected>Highschool</option>
                            <option value="University/College">University/College</option>
                            <option value="Other">Other</option>
                                @break
                            @case('University/College')
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Highschool">Highschool</option>
                            <option value="University/College" selected>University/College</option>
                            <option value="Other">Other</option>
                                @break
                            @case('Other')
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Highschool">Highschool</option>
                            <option value="University/College">University/College</option>
                            <option value="Other" selected>Other</option>
                                @break
                        @endswitch
                    </select>
                    @error('class_section')
                    <div class="invalid-feedback" id="section_error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="class_object">Object (optional)</label>
                    <input type="text" class="form-control @error('class_object') is-invalid @enderror" name="class_object" id="class_object" value="{{ old('class_object', $teachingClass->object) }}">
                    @error('class_object')
                    <div class="invalid-feedback" id="section_error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="class_desc">Description (optional)</label>
                    <input type="text" class="form-control @error('class_desc') is-invalid @enderror" name="class_desc" id="class_desc" value="{{ old('class_desc', $teachingClass->description) }}">
                    @error('class_desc')
                    <div class="invalid-feedback" id="section_error">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="text-center">
                    <button class="btn btn-success btn-block" type="submit">
                        <i class="fas fa-lock"></i> Save Changes
                    </button>
                    <a href="{{route('myclasses.homeworks.index',$teachingClass->id)}}" class="btn btn-danger btn-block">
                        <i class="fas fa-trash"></i> Discard Changes
                    </a>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="card shadow-sm">
        <div class="card-header">
            <h4>Reset Code</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/code/'.$teachingClass->id.'/reset') }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="class_code">Code <button type="submit" class="btn btn-info" id=""><i class="fas fa-edit"></i> Reset Code</button></label>
                    <input type="text" class="form-control" name="class_code" id="class_code" value="{{ old('class_code', $teachingClass->code) }}" readonly="true">
                </div>
            </form>
        </div>
    </div>
    <br>
</div>
@endsection