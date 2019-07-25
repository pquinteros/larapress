<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServiceRequest as StoreRequest;
use App\Http\Requests\ServiceRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ServiceCrudController extends CrudController
{

    use AdminPermissionTrait;

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Service');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service');
        $this->crud->setEntityNameStrings('service', 'services');
        $this->permissionSetup(['list','edit','update','delete','create']);

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();


             /*
        |--------------------------------------------------------------------------
        | BUTTONS
        |--------------------------------------------------------------------------
        */
        $this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');
        $this->crud->allowAccess('clone');


         /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'imagesquare',
            'label' => 'Image',
            'type' => 'image',
            'prefix' => 'uploads/service/'
        ]);


        $this->crud->addColumn([
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                            ]);
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Status',
                            ]);
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Title',
                            ]);
   

                            // ------ CRUD FIELDS



        $this->crud->addField([    // TEXT
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'placeholder' => 'Your title here',
        ]);
$this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Will be automatically generated from your title, if left empty.',
            // 'disabled' => 'disabled'
        ]);

$this->crud->addField([    // TEXT
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
            'value' => date('Y-m-d'),
        ], 'create');

        $this->crud->addField([    // WYSIWYG
            'name' => 'resumen',
            'label' => 'Resumen',
            'type' => 'textarea',
            'placeholder' => 'Your textarea text here',
        ]);


$this->crud->addField([    // WYSIWYG
            'name' => 'content',
            'label' => 'Content',
            'type' => 'ckeditor',
            'placeholder' => 'Your textarea text here',
        ]);

        $this->crud->addField([    // TEXT
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date_picker',
        ], 'update');


        $this->crud->addField([   // CustomHTML
            'name' => 'separator',
            'type' => 'custom_html',
            'value' => '<br>  <h4> Imagenes</h4> <hr>'
        ]);


        $this->crud->addField([    // Image
            'name' => 'imagesquare',
            'label' => 'Image',
            'hint'       => 'Size: 300 x 198',
            'type' => 'image',
            'upload' => true,
            'crop' => true,
            'prefix' => 'uploads/service/'
        ]);

$this->crud->addField([    // Image
            'name' => 'image',
            'label' => 'Header Image',
            'hint'  => 'Size: 1440 x 650',
            'type' => 'browse',
        ]);

        $this->crud->addField([   // CustomHTML
            'name' => 'separator2',
            'type' => 'custom_html',
            'value' => '<hr><br> '
        ]);

        $this->crud->addField([    // ENUM
            'name' => 'status',
            'label' => 'Status',
            'type' => 'enum',
        ]);




        // add asterisk for fields that are required in ServiceRequest
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
