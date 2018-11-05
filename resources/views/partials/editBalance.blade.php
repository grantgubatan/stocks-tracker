<!-- Modal -->
<div class="modal fade" id="editBalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Balance for {{$client->fullname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('edit-balance')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$client->id}}">
          <div class="">
            <label for="">Account Balance ($)</label>
            <input type="number" name="account_balance" value="{{$client->account_balance}}" class="form-control" placeholder="Account Balance" required>
          </div>
          <hr>
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
