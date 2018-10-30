<!-- Modal -->
<div class="modal fade" id="clientCreateTrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Trade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app-6">
        <form action="{{url('trade-create')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{Auth::user()->client->id}}">
          <div class="">
            <label for="">Company Name</label>
            <input type="text" name="company" id="company" class="form-control" placeholder="Company Name" required>
          </div>

          <div class="">
            <label for="">Stock Ticker</label>
            <input type="text" name="ticker" id="ticker" class="form-control" placeholder="Stock Ticker" required>
          </div>

          <div class="">
            <label for="">Stock Volume</label>
            <input type="number" id="volume" name="volume" class="form-control" placeholder="Stock Volume" min="0" required>
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
