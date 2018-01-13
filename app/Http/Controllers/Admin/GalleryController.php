<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

use App\Http\Requests;

class GalleryController extends BaseController
{
    protected $page = ['title' => 'Gallery', 'content' => 'gallery'];
    protected $list_data = [['field' => 'id', 'type' => 'number', 'label' => 'ID'],
        ['field' => 'title', 'type' => 'text', 'label' => 'Title'],
        ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active']];
    protected $gallery_id_name = 'gallery_id';
        
    protected function feature()
    {
        return [
            'create' => true,
            'edit' => true,
            'delete' => true,
            'sort' => true
        ];
    }

    protected function tab()
    {
        return [
            'gallery'
        ];
    }

    protected function model()
    {
        return new Gallery();
    }

    protected function model_gallery()
    {
        return new GalleryImage();
    }

    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false, 'disabled' => false],
            ['field' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true, 'disabled' => false],
            ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active', 'required' => false, 'disabled' => false]]);

        return $form_data;
    }
}
