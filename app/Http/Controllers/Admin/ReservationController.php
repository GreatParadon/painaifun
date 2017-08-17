<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\About;

class AboutController extends BaseController
{
    protected $page = ['title' => 'About', 'content' => 'about'];
    protected $list_data = [['field' => 'id', 'type' => 'number', 'label' => 'ID'],
        ['field' => 'title', 'type' => 'text', 'label' => 'Title']];

    protected function feature()
    {
        return [
            'create' => false,
            'edit' => true,
            'delete' => false,
            'sort' => false
        ];
    }

    protected function model()
    {
        return new About();
    }

    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false],
            ['field' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true],
            ['field' => 'content', 'type' => 'wysiwyg', 'label' => 'Content', 'required' => true]]);

        return $form_data;
    }

}
