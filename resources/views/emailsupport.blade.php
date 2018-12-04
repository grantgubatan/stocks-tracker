@extends('layouts.app')

@section('content')
<style media="screen">
  .card {
    border: none;
    border-radius: 5px;
  }
  iframe{
    overflow:hidden;
}
</style>

<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1 class="blue-header"> <i data-feather="mail"></i> Email Support Ticket</h1>
          <div class="col-12">
            <div class="card shadow-sm p-3 mb-5 bg-white rounded">
              <div class="card-body">
                <form class="" action="{{url('email-support')}}" method="post">
                  @csrf
                  <div class="">
                    <label for="">Full Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="">
                  </div>

                  <div class="">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="">
                  </div>

                  <div class="">
                    <label for="">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Subject" value="">
                  </div>

                  <div class="">
                    <label for="">Message</label>
                    <textarea name="message" rows="8" class="form-control" cols="80"></textarea>
                  </div>
                  <br>
                  <input type="submit" class="form-control btn btn-primary" value="Send Message">
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
  </main>
</div>

<!-- page-content" -->
</div>
@endsection
