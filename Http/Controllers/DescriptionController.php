<?php

namespace Modules\Description\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Description\Http\Requests\DescriptionRequest as StoreRequest;
use Modules\Description\Http\Requests\DescriptionRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Modules\Description\Repository\DescriptionRepositoryInterface;

/**
 * Class DescriptionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DescriptionController extends CrudController
{
    protected $description;

    public function __construct(DescriptionRepositoryInterface $description)
    {
        parent::__construct();
        $this->description = $description;
    }

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('Modules\Description\Entities\Description');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/description');
        $this->crud->setEntityNameStrings('description', 'descriptions');
        $this->crud->setEditView('description::layouts.edit');
        $this->crud->allowAccess('edit');
        $this->crud->orderBy('updated_at', 'desc');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        if (backpack_user()->hasRole(ADMIN)) {
            $this->setupAdminField();
        } else {
            $this->setupCustomerField();
        }

        // add asterisk for fields that are required in DescriptionRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function setupAdminField()
    {
        $this->crud->addField([
            'name' => 'mission',
            'label' => trans('labels.mission'),
            'type' => 'ckeditor',
            'extra_plugins' => ['justify'],
        ]);

        $this->crud->addField([
            'name' => 'vision',
            'label' => trans('labels.vision'),
            'type' => 'ckeditor',
            'extra_plugins' => ['justify'],
        ]);

        $this->crud->addField([
            'name' => 'core',
            'label' => trans('labels.core'),
            'type' => 'ckeditor',
            'extra_plugins' => ['justify'],
        ]);
    }

    public function setupCustomerField()
    {
        $this->crud->addField([
            'name' => 'mission',
            'label' => trans('labels.mission'),
            'type' => 'ckeditor_custom',
        ]);

        $this->crud->addField([
            'name' => 'vision',
            'label' => trans('labels.vision'),
            'type' => 'ckeditor_custom',
        ]);

        $this->crud->addField([
            'name' => 'core',
            'label' => trans('labels.core'),
            'type' => 'ckeditor_custom',
        ]);
    }

    public function index()
    {
        $defaultDescription = $this->description->find(DEFAULT_DESCRIPTION);
        return view('description::layouts.master', compact('defaultDescription'));
    }
    public function watch()
    {
        $defaultDescription = $this->description->find(DEFAULT_DESCRIPTION);
        return view('description::layouts.watch', compact('defaultDescription'));
    }
}

