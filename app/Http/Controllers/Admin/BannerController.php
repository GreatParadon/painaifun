<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Banner;

class BannerController extends BaseController
{
    protected $page = ['title' => 'Banner', 'content' => 'banner'];
    protected $list_data = [['field' => 'id', 'type' => 'number', 'label' => 'ID'],
        ['field' => 'title', 'type' => 'text', 'label' => 'Title'],
        ['field' => 'image', 'type' => 'image', 'label' => 'Logo'],
        ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active']];

    protected function feature()
    {
        return [
            'create' => true,
            'edit' => true,
            'delete' => true,
            'sort' => true,
            'duplicate' => true
        ];
    }

    protected function model()
    {
        return new Banner();
    }

    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false, 'disabled' => false],
            ['field' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true, 'disabled' => false],
            ['field' => 'image', 'type' => 'image', 'label' => 'Logo (Suggest 1280*300)', 'required' => false, 'disabled' => false],
            ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active', 'required' => false, 'disabled' => false]]);

        return $form_data;
    }

}
