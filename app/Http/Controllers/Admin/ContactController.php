<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Contact;

class ContactController extends BaseController
{
    protected $page = ['title' => 'Contact', 'content' => 'contact'];

    protected function feature()
    {
        return [
            'create' => true,
            'edit' => true,
            'delete' => false,
            'sort' => false
        ];
    }

    protected function model()
    {
        return new Contact();
    }

    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false, 'disabled' => false],
            ['field' => 'map_image', 'type' => 'image', 'label' => 'Map Image', 'required' => true, 'disabled' => false],
            ['field' => 'map_content', 'type' => 'wysiwyg', 'label' => 'Map Info', 'required' => true, 'disabled' => false]
            ]);

        return $form_data;
    }
}
