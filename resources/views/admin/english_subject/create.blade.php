@extends('admin.layouts.admin_master')

@section('content')
 <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <!-- <div class="card-icon">
                      <i class="material-icons"></i>
                    </div> -->
                    <h4 class="card-title"><span><a href="{{ route('admin.englishes.index') }}"  class="btn btn-primary">Back</a></span></h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                       <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">English Subject Create</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="POST" action="{{ route('admin.englishes.store') }}"  class="form-horizontal">
                   <!--  -->
                   @csrf
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="title">
                          <span class="bmd-help">Title Name</span>
                        </div>
                      </div>
                    </div>
                   <div class="row">
                      <label class="col-sm-2 col-form-label">Chapter</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="chapters[]" id="chapters" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" multiple="multiple" required>
                    @foreach($chapters as $id => $chapter)
                        <option value="{{ $id }}" {{ (in_array($id, old('chapters', [])) || isset($user) && $user->chapters->contains($id)) ? 'selected' : '' }}>{{ $chapter }}</option>
                    @endforeach
                </select>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Lesson</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <select name="lessons[]" id="roles" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" multiple="multiple" required>
                    @foreach($lessons as $id => $lesson)
                        <option value="{{ $id }}" {{ (in_array($id, old('lessons', [])) || isset($user) && $user->lessons->contains($id)) ? 'selected' : '' }}>{{ $lesson }}</option>
                    @endforeach
                </select>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <label class="col-sm-2 col-form-label">English Subject Description</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                         <input type="textarea" id="description" name="description" class="form-control">
                          <span class="bmd-help">Description</span>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                  </div>
                    </div> -->          
                  <div class="card-footer ">
                  <button type="submit" class="btn btn-fill btn-rose">Submit</button>
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

