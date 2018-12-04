@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1 class="blue-header"> <i data-feather="users"></i> MANAGE CLIENTS</h1>
        </div>
        <div class="row">
          <a href="{{url('create-client')}}" class="btn btn-primary btn-sm">Create Client</a>
        </div>
        <br>

        <div class="row">
          <div class="table-responsive">
            <table class="table table-striped" id="clients-table">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <!-- <th>Alternate Email</th>
                  <th>Phone</th>
                  <th>Alternate Phone</th>
                  <th>Country</th> -->
                  <th>Commands</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($clients as $client)
                  <tr>
                    <td>{{$client->fullname}}</td>
                    <td>{{$client->email}}</td>
                    <!-- <td>{{$client->email2}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->phone2}}</td>
                    <td>{{$client->country}}</td> -->
                    <td>
                        <a href="{{url('client/'.$client->id)}}" class="btn btn-primary">Manage Client</a>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteClient{{$client->id}}">
                          Remove Client
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteClient{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form class="" action="{{url('client-delete')}}" method="POST">
                                @csrf
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Profile {{$client->fullname}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="">
                                    <h2>Are you sure?</h2>
                                    <input type="hidden" name="id" value="{{$client->id}}" class="form-control">
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
                @empty
                    <p>No users</p>
                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>
  </main>
<!-- page-content" -->
</div>

<script type="text/javascript">

$(document).ready(function() {
    $('#clients-table').DataTable({
    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
});
} );


</script>
@endsection
