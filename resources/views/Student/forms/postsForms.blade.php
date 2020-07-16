<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Post's title" >
</div>

<div class="form-group">
    <label for="content">Body</label>
    <textarea name="content" id="content" rows="5" class="form-control" placeholder="Post's body" ></textarea>
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

