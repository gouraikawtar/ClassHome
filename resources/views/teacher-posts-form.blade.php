<div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Post's Title">
</div>
<div class="form-group">
    <label for="status">To</label>
    <select class="form-control" id="status" name="status" onChange="chooseDestination();" >
        <option value="specific">Groups</option>
        <option value="public">All</option>
    </select>
</div>
<div class="form-group" id="gp">
    <label for="destination">Choose group</label>
    <select class="form-control" id="destination" name="destination">
        <option value="group 1">Group 1</option>
        <option value="group 2">Group 2</option>
    </select>
</div>
<div class="form-group">
    <label for="image">Upload file</label>
    <div class="custom-file">
        <input type="file" id="file" name="content" class="custom-file-input" id="file">
        <label for="file" class="custom-file-label">Choose File</label>
    </div>
    <small class="form-text text-muted">Max Size X</small>
</div>
<div class="form-group">
    <label for="content">Body</label>
    <textarea name="content" id="content" class="form-control" cols="20" rows="5" placeholder="Post's Body"></textarea>
</div>

