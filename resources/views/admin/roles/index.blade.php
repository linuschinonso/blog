<x-admin-master>

@section('content')
   <div class="row">


        @if(Session()->has('role-deleted'))
          <div class="alert alert-danger">
                  {{session('role-deleted')}}
          </div>
        @endif
            <div class="col-sm-6">
                <form  method="post" action="{{route('roles.store')}}">
                        @csrf

                        <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"  name="name" id="name" class="form-control  @error('name') is-invalid @enderror">
                 
                 
                          <!-- displaying error if a user did not enter anything -->
                       <div>
                              @error('name')
                              <span><strong>{{$message}}</strong></span>
                                @enderror
                       </div>
                       
                       
                       
                              </div>


                        <button class="btn btn-primary btn-block" type="submit">Create</button>
                </form>


            </div>
        <div class="col-sm-9">
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Slug</th>                      
                      <th>Delete</th>
                     
                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Delete</th>
                      
                     
                    </tr>



                  </tfoot>
                  
                   <tbody>
                     @foreach ($roles as $role)
                          <tr>
                              <td>{{$role->id}}</td>
                              <td> <a href="{{route('roles.edit', $role->id)}}">{{$role->name}}</a> </td>
                              <td>{{$role->slug}}</td>
                               <td>
                              <form method="post" action="{{route('roles.destroy', $role->id)}}">
                                @csrf
                                @method('POST')

                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              </td>
                          </tr>
                     @endforeach
</div>
</div>


        </div>
   </div>
@endsection
</x-admin-master>