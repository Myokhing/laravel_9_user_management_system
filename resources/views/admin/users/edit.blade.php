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
                    <h4 class="card-title">User Edit</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{ route('admin.users.update', [$edit_user->id]) }}"  class="form-horizontal">
                   @csrf
                   @method('PUT')
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" value="{{ old('name', isset($edit_user) ? $edit_user->name : '') }}" >
                          <span class="bmd-help">User Name</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="email" value="{{ old('name', isset($edit_user) ? $edit_user->email : '') }}">
                          <span class="bmd-help">User Email</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="password" class="form-control" name="password" value="{{ old('name', isset($edit_user) ? $edit_user->password : '') }}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <label class="col-sm-2 col-form-label">Role Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="roles[]" id="permissions" class="selectpicker" data-style="select-with-transition" multiple title="Choose Permission" data-size="7" multiple="multiple" required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($role_edit) && $role_edit->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
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

