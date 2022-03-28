@extends('admin.layouts.admin_master')

@section('content')
 <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Role List <span>
                    @can('role_create')
                    <a href="{{ route('admin.roles.create') }}"  class="btn btn-primary">Role Create</a>
                    @endcan
                  </span></h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Permission</th>
                          <th>Created At</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Permission</th>
                          <th>Created At</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($roles as $role)
                        <tr>
                          <td>{{ $role->id }}</td>
                          <td>{{ $role->name }}</td>
                          <td>
                            @foreach($role->permissions as $permission)
                            <span class="badge badge-info">{{ $permission->name }}</span>
                            @endforeach
                          <td>{{ $role->created_at }}</td>
                          <td class="text-right">
                          @can('role_show')
                            <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                          @endcan
                          @can('role_edit')
                            <a href="{{route('admin.roles.edit', $role->id) }}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                          @endcan
                          @can('role_delete')
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('are you sure want to delete');" style="display: inline-block;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></button>
                            </form>
                          @endcan
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
              </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatables').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        //alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        //alert('You clicked on Like button');
      });
    });
  </script>
@endsection