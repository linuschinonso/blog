<x-admin-master>

@section('content')
    <h1>User Profile for :{{$user->name}}</h1>

    <div class="row">
            <div class="col-sm-6">
            <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                         @method('PUT')
                        <div class="mb-3"><img class="img-profile rounded-circle" src="https://img.freepik.com/free-photo/asian-woman-posing-looking-camera_23-2148255359.jpg?size=338&ext=jpg&ga=GA1.2.1095683823.1653975816"></div>

                    <div class="form group">
                                <input type="file"   name="avatar">

                                </div>          
                    </div>

                

                      <div class="mb-3">
                            <label for="username" class="form-label">UserName</label>
                            <input type="text"
                            name="username"
                            class="form-control" 
                            id="username"
                            value="{{$user->username}}"
                            >
                            @error('username')
                        <div class="invalidfeedback">{{$message}}</div>     
                            @enderror
                     </div>
                    <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text"
                            name="name"
                            class="form-control" 
                            id="name"
                            value="{{$user->name}}"
                            >
                            @error('name')
                        <div class="invalidfeedback">{{$message}}</div>     
                            @enderror
                     </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                            <input type="text"
                            name="email"
                            class="form-control" 
                            id="email"
                            value="{{$user->email}}"
                            >
                            @error('email')
                        <div class="invalidfeedback">{{$message}}</div>     
                            @enderror
            </div>

            <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                            <input type="password"
                            name="password"
                            class="form-control" 
                            id="password"
                           
                            >
                            @error('password')
                        <div class="invalidfeedback">{{$message}}</div>     
                            @enderror
                                </div>
                                <div class="mb-3">
                    <label for="password-confirmation" class="form-label">Confirm Password</label>
                            <input type="password"
                            name="password-confirmation"
                            class="form-control" 
                            id="password-confirmation"
                      
                            >
                            @error('password-confirmation')
                        <div class="invalidfeedback">{{$message}}</div>     
                            @enderror

                            <button type="submit" class="btn btn-primary">Submit</button>
                            

            <div class="row">
            <div class="col-sm-12">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">ROLES </h6>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                      
                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Options</th>
                    <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($roles as $role)
                      <tr>
                          <td><input type="checkbox"
                                        @foreach ($user->roles as $user_role)
                                        @if($user_role->slug==$role->slug)
                                          checked
                                        @endif
                                        @endforeach
                          
                          >
                        
                        </td>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>{{$role->slug}}</td>
                          <td>
                            <form action="{{route('users.role.attach', $user)}}" method="post">
                            @method('PUT')  
                            @csrf


                            <input type="hidden" name="role" value="{{$role->id}}">

                            <button 
                                type="submit"
                                class="btn btn-primary"
                                
                                @if ($user->roles->contains($role))
                                      disabled
                                @endif
                                
                                
                                
                                
                                >

                               
                               
                               
                               
                               
                                Attach 
                              
                          </button>

                            </form>

                          </td>
                          <td><form action="{{route('users.role.detach', $user)}}" method="post">
                            @method('PUT')  
                            @csrf


                            <input type="hidden" name="role" value="{{$role->id}}">

                            <button 
                             type="submit"
                              class="btn btn-danger"
                              @if (!$user->roles->contains($role))
                                      disabled
                                @endif
                                




                              >Detach
                            </button>

                            </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
            
            
            </div>
                    </div>

                  
                                            </form>

            </div>
    
            @endsection



</x-admin-master>