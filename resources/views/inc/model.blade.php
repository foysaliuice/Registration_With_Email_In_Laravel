<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Profile Update</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="member_name">Member name</label>
            <input type="text" name="member_name" value="{{ $row->member_name }}" class="form-control" id="member_name">
          </div>
          <div class="form-group">
            <label for="member_email">Member email</label>
            <input type="text" name="member_email" value="{{ $row->member_email }}" class="form-control" id="member_email">
          </div>
          <div class="form-group">
            <label for="member_email">Member phone</label>
            <input type="text" name="member_phone" value="{{ $row->member_phone }}" class="form-control" id="member_phone">
          </div>
          <div class="form-group">
            <label for="member_email">Member designation</label>
            <input type="text" name="member_designation" value="{{ $row->member_designation }}" class="form-control" id="member_designation">
          </div>
          <div class="form-group">
            <label for="member_email">Member address</label>
            <input type="text" name="member_address" value="{{ $row->member_address }}" class="form-control" id="member_address">
          </div>
          <div class="form-group">
            <label for="member_email">Member Image</label>
            <input type="file" name="member_image" class="form-control" id="member_image">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
