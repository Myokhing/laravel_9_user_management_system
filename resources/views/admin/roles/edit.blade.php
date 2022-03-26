@extends('admin.layouts.admin_master')

@section('content')
 <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <!-- <div class="card-icon">
                      <i class="material-icons"></i>
                    </div> -->
                    <h4 class="card-title"><span><a href="{{ route('admin.roles.index') }}"  class="btn btn-primary">Back</a></span></h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                       <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Role Edit</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{ route('admin.roles.update', [$role_edit->id]) }}"  class="form-horizontal">
                   @csrf
                   @method('PUT')
                    <div class="row">
                      <label class="col-sm-2 col-form-label"> Role Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" value="{{ old('name', isset($role_edit) ? $role_edit->name : '') }}" >
                          <span class="bmd-help">Role Name</span>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <label class="col-sm-2 col-form-label">Permission Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="permissions[]" id="permissions" class="selectpicker" data-style="select-with-transition" multiple title="Choose Permission" data-size="7" multiple="multiple" required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role_edit) && $role_edit->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
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

