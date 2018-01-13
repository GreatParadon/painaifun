<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;

class RoomController extends BaseController
{
    protected $page = ['title' => 'Room', 'content' => 'room'];
    protected $list_data = [['field' => 'id', 'type' => 'number', 'label' => 'ID'],
        ['field' => 'title', 'type' => 'text', 'label' => 'Title']];
    protected $gallery_id_name = 'room_id';

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

    protected function tab()
    {
        return [
            'gallery',
            'rate',
            'room setting'
        ];
    }

    protected function model()
    {
        return new Room();
    }

    protected function model_gallery()
    {
        return new RoomImage();
    }

    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false, 'disabled' => false],
            ['field' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true, 'disabled' => false],
            ['field' => 'content', 'type' => 'wysiwyg', 'label' => 'Content', 'required' => true, 'disabled' => false],
            ['field' => 'active', 'type' => 'checkbox', 'label' => 'Active', 'required' => true, 'disabled' => false]
        ]);

        return $form_data;
    }
    
}
