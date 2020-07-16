<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Post's Title">
</div>

<div class="form-group">
    <label for="status">To</label>
    <select class="form-control" id="status" name="status" onChange="chooseDestination();" >
        <option selected disabled value="">-- Please choose an option --</option>
        <option value="specific">Groups</option>
        <option value="public">All</option>
    </select>
</div>

<div class="form-group">
    <label for="destination">Choose group</label>
    <select class="form-control" id="destination" name="destination">
        <option selected disabled value="">-- Please choose a group --</option>
        @forelse ($groups as $group)
            <option value="{{ $group->id }}"> {{$group->name}}  </option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group">
    <label for="content">Body</label>
    <textarea name="content" id="content" class="form-control" cols="20" rows="5" placeholder="Post's Body"></textarea>
</div>

<div class="form-group">
    <div class="custom-file ">
        <input type="file" class="@error('files') is-invalid @enderror" name="files[]" id="file" multiple="true">
        <small class="form-text text-muted">Max size : 2mb</small>
        <small class="form-text text-muted">Authorized extensions : pdf,docx,doc,ppt,pptx,xls,xlsx,png,jpg,jpeg,zip</small>
            @error('files')
                <div class="invalid-feedback" id="files_error">{{ $message }}</div>
            @enderror
        </div>
</div>
