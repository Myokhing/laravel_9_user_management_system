@extends('admin.layouts.admin_master')

@section('content')
 <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <!-- <div class="card-icon">
                      <i class="material-icons"></i>
                    </div> -->
                    <h4 class="card-title"><span><a href="{{ route('admin.permissions.index') }}"  class="btn btn-primary">Back</a></span></h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                       <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Permission Detail</h4>
                  </div>
                </div>
                <div class="card-body ">
                 <div class="table-responsive">
                  <table class="table">
                   <tr>
                    <th>ID</th>
                    <td>{{ $show_permission->id }}</td>
                   </tr>
                   <tr>
                    <th>Name</th>
                    <td>{{ $show_permission->name }}</td>
                   </tr>
                  
                   <tr>
                    <th>Created_At</th>
                    <td>{{ $show_permission->created_at }}</td>
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

