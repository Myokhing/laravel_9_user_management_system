@extends('admin.layouts.admin_master')

@section('content')
 <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <!-- <div class="card-icon">
                      <i class="material-icons"></i>
                    </div> -->
                    <h4 class="card-title"><span><a href="{{ route('admin.users.index') }}"  class="btn btn-primary">Back</a></span></h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                       <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">User Detail</h4>
                  </div>
                </div>
                <div class="card-body ">
                 <div class="table-responsive">
                  <table class="table">
                   <tr>
                    <th>ID</th>
                    <td>{{ $user_show->id }}</td>
                   </tr>
                   <tr>
                    <th>Name</th>
                    <td>{{ $user_show->name }}</td>
                   </tr>
                   <tr>
                    <th>Email</th>
                    <td>{{ $user_show->email }}</td>
                   </tr>
                   <tr>
                    <th>Created_At</th>
                    <td>{{ $user_show->created_at }}</td>
                   </tr>
                  </table>
                </div>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
@endsection

