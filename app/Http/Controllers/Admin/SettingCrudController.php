<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SettingRequest as StoreRequest;
use App\Http\Requests\SettingRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SettingCrudController extends CrudController
{
    use AdminPermissionTrait;
    
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Setting');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/settings');
        $this->crud->setEntityNameStrings('setting', 'settings');
        $this->permissionSetup(['list','edit','update','delete','create']);

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => 'key',
            'label' => 'Key',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'value',
            'label' => 'Value',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'active',
            'label' => 'Active',
            'type' => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                0 => "📝 Borrador",
                1 => "🟢✅  Publicado🟢🟢"
            ],          
        ]);

        // FILEDS

        $this->crud->addField([
            'name' => 'key',
            'label' => 'Key',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text',
        ]);


        $this->crud->addField([
            'name' => 'field',
            'label' => 'Field',
            'type' => 'text',
           
        ]);


        $this->crud->addField([
            'name' => 'value',
            'label' => 'Value',
            'type' => 'text',
         

        ]);

       


        $this->crud->addField([
            'name' => 'active',
            'label' => 'Active',
            'type' => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                0 => "Borrador",
                1 => "🟢Publicado🟢🟢"
            ], 
               
        ]);


        


       
        // add asterisk for fields that are required in SettingRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}


//**/// */


