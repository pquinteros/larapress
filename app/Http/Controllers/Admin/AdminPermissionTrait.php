<?php

namespace App\Http\Controllers\Admin;

trait AdminPermissionTrait
{
    public function permissionSetup(array $default_access = ['list']){
        
        $user = auth()->user();
        $user_access = [];

        foreach ($default_access as $access){
            if($user->can($access)){
                array_push($user_access,$access);
            }
        }

        $this->crud->access = $user_access;
    }
}
