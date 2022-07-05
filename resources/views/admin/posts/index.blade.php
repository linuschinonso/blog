<x-admin-master>
    @section('content')
            <h1>All Posts</h1>

            @if(Session::has('message'))
              
            <div class="alert alert-success">{{Session::get('message')}} </div>
                @elseif(session('post-created-message'))
            <div class="alert-success">{{session('post-created-message')}}</div>
            @else
            <div class="alert-success">{{session('post-updated-message')}}</div>
            
            @endif
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                     
                    </tr>
                  </thead>
                  
                   <tbody>
                     @foreach ($posts as $post )
                     <tr>
                     <td>{{$post->id}}</td>
                     <td>{{$post->user->name}}</td>
                     <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                     <td>{{$post->title}}</td>
                     <td>
                        
                    <img height="40px"src="{{$post->post_image}}" alt="" class="sr">
                    
                    </td>
                     <td>{{\Carbon\Carbon::parse($post->Created_at)->diffForHumans() }}</td>
                     <td>{{\Carbon\Carbon::parse($post->Updated_at)->diffForHumans() }}</td>
                    
                      <td>
                        
                          <form action="{{route('post.destroy', $post->id)}}" method="post"  enctype="multipart/form-data">
                                          @csrf
                                          @method('DELETE')


                                <button type="submit" class="btn  btn-danger">Delete</button>
                                 
                          </form>
                          
                      </td> 
                  </tr> 
                     @endforeach

                
                   </tbody>
                </table>
              </div>
            </div>
          </div>
          {{$posts->links()}}
    @endsection

    @section('script')

     <!-- Page level plugins -->
  <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> -->


    @endsection
    

</x-admin-master>