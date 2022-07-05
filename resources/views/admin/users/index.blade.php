<x-admin-master>


    @section('content')

    <h1>Users</h1>
    @if(session('user-deleted'))
    <div class="alert alert-danger">{{session('user-deleted')}}</div>
        
    @endif
    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Avatar</th>
                <th>Name </th>
                <th>Registered date </th>
                <th> Updated profile date</th>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user )
                
          
            <tr>
                 
             
         <td>{{$user->id}}</td>
         <td>{{$user->username}}</td>
         <td>
             <img height="50px" src="{{$user-> avatar}}" alt="">

         </td>
         <td>{{$user->name }}</td>
         <td>{{ \Carbon\Carbon::parse($user-> Created_At)->diffForhumans()}}</td>
         <td>{{\Carbon\Carbon::parse($user->Updated_At)->diffForhumans()}}</td>
         <td>

         <form method="post" action="{{route('user.destroy', $user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
         </form>
         </td>        
            </tr>

            @endforeach
    </tbody> 
    </table>

    @endsection



    @section('script')

<!-- Page level plugins -->
<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js')}}"></script>
@endsection
</x-admin-master>