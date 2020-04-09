<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        

        $this->crud->setColumns([
            'codeProduit', 
            'nom', 
            'prix', 
            'catID', 
            'remise', 
            'date_debut', 
            'date_fin', 
            'isPromo', 
            'imgPath'
            ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProduitRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'codeProduit',
            'type' => 'number',
            'label' => "Code Produit",
            'attributes' => [
                'readonly'=>'readonly',
                'disabled'=>'disabled',
            ]
        ]);

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addField([
            'name' => 'prix',
            'type' => 'number',
            'label' => "Prix"
        ]);

        $this->crud->addField([
            'name' => 'catID',
            'type' => 'select2',
            'label' => "CatID",
            'entity' => 'categories',
            'attribute' => 'id_name'
        ]);

        $this->crud->addField([
            'name' => 'remise',
            'type' => 'number',
            'label' => "Remise"
        ]);

        $this->crud->addField([
            'name' => 'date_debut',
            'type' => 'datetime_picker',
            'label' => "Date debut",
        ]);

        $this->crud->addField([
            'name' => 'date_fin',
            'type' => 'datetime_picker',
            'label' => "Date fin",
        ]);

        $this->crud->addField([
            'name' => 'isPromo',
            'type' => 'number',
            'label' => "isPromo",
        ]);

        $this->crud->addField([
            'name' => 'imgPath',
            'type' => 'text',
            'label' => "Img path",
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
