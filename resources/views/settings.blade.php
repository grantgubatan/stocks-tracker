@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1>Admin Settings</h1>
        </div>

        <div class="row">
          <div class="card col-12">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                          <h1>Admin Profile</h1>
                          <h3>{{Auth::user()->name}}</h3>
                          <div class="row">
                            <div class="col">
                              <!-- Button trigger modal -->
                              <a href="#" data-toggle="modal" data-target="#addAdminModal">
                                Create Admin Account
                              </a>

                              <a href="#" data-toggle="modal" data-target="#changPasswordModal">
                                Change Password
                              </a>
                              @include('partials.user.changepassword')
                              @include('partials.addAdmin')
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <form action="{{url('admin-edit')}}" method="POST">
                            @csrf

                                <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Full Name</label>
                                  <div class="col-8">
                                    <input id="name" name="fullname" placeholder="Full Name" class="form-control here" type="text" value="{{Auth::user()->name}}" disabled>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Email</label>
                                  <div class="col-8">
                                    <input id="name" name="email" placeholder="Email" class="form-control here" type="email" value="{{Auth::user()->email}}" disabled>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button id="triggerEdit" type="button" class="btn btn-secondary">Edit Profile</button>
                                    <button type="submit" id="editButton" type="button" class="btn btn-default">Update Profile</button>
                                    <button id="cancelButton" type="button" class="btn btn-secondary" onclick="disableEdit()">Cancel</button>
                                  </div>
                                </div>
                              </form>
                      </div>
                  </div>

              </div>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="card col-12">
              <div class="card-body">
                <div class="table-responsive">
                  <h3>Admin Accounts</h3>
                  <table class="table table-striped" id="admin-table">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Commands</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($admins as $admin)
                          <tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{ \Carbon\Carbon::parse($admin->created_at)->format('m/d/Y')}}</td>
                            <td>

                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#editAdmin{{$admin->id}}">
                                Delete Account
                              </button>


                              <!-- Modal -->
                              <div class="modal fade" id="editAdmin{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form class="" action="{{url('admin-delete')}}" method="POST">
                                      @csrf
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Profile {{$admin->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="">
                                          <h2>Are you sure?</h2>
                                          <input type="hidden" name="id" value="{{$admin->id}}" class="form-control">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary btn-sm">Confirm Deletion</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>


                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>

      </div>
  </main>
<!-- page-content" -->
</div>

<script type="text/javascript">
function enableEdit() {
    $('input:disabled, select:disabled, select:disabled').each(function () {
       $(this).removeAttr('disabled');
    });

    $('#triggerEdit').hide();
    $('#editButton').show();
    $('#cancelButton').show();
}

function disableEdit() {
  location.reload();
}

  $(document).ready(function()
  {
      $('#editButton').hide();
      $('#cancelButton').hide();
      $("#triggerEdit").click(function()
      {
        enableEdit();
      });

      $('#admin-table').DataTable(
      {
        "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
      });
  });
</script>
@endsection
