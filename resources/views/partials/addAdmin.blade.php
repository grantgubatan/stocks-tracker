<!-- Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Admin Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin-create')}}" method="POST">
          @csrf
          <div class="">
            <label for="">Admin Full Name</label>
            <input type="text" name="fullname" class="form-control" placeholder="Admin Full Name" required>
          </div>
          <br>

          <div class="">
            <label for="">Admin Email</label>
            <input type="email" name="email" class="form-control" placeholder="Admin Email" required>
          </div>
          <br>

          <div class="">
            <button type="submit" class="btn btn-secondary form-control" name="button">Confirm</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
