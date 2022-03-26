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
                    <h4 class="card-title">Permission Edit</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{ route('admin.permissions.update', [$edit_permission->id]) }}"  class="form-horizontal">
                   @csrf
                   @method('PUT')
                    <div class="row">
                      <label class="col-sm-2 col-form-label"> Permission Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" value="{{ old('name', isset($edit_permission) ? $edit_permission->name : '') }}" >
                          <span class="bmd-help">Permission Name</span>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer ">
                  <button type="submit" class="btn btn-fill btn-rose">Update</button>
                </div>
                    
                  </form>
                </div>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
@endsection

