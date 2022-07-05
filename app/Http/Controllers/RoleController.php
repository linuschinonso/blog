<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function index(){

        return view('admin.roles.index', ['roles'=>Role::all()]);


    }
//creating roles,we used the method below
    public function store(){

            request()->validate([
                    'name'=>['required']
            ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);
      return back();
    }
   
   public function edit(Role $role){
            return view('admin.roles.edit', [
                'role'=>$role,
                'permissions'=>Permission::all()
            ]);

   }
   
   
   public function update(Role $role){
        $role->name= Str::ucfirst(request('name'));
        $role->slug= Str::of(request('name'))->slug('-');
    
        //flash message
        if($role->isDirty('name')){
            session()->flash('role-updated', 'Role Updated:'. request('name'));
            $role->save();  
        }else{
            session()->flash('role-updated', 'Nothing has been  Updated');
 
        }
        return back();
   }
   
   
    
// implementing the attach_permission
public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
            return back();
}

// implementing the detach_permission
public function detach_permission(Role $role){
    $role->permissions()->detach(request('permission'));
        return back();
}


    Public function destroy(Role $role){

        $role->delete();

        session()->flash('role-deleted', 'Deleted Role');
        return back();
    }

}