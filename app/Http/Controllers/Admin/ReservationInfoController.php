<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\ReservationInfo;

class ReservationInfoController extends BaseController
{
    
    protected $page = ['title' => 'ReservationInfo', 'content' => 'reservationinfo'];
    
    protected function feature()
    {
        return [
        'create' => true,
        'edit' => true,
        'delete' => false,
        'sort' => false,
        'duplicate' => false
        ];
    }
    
    protected function model()
    {
        return new ReservationInfo();
    }
    
    protected function formData()
    {
        $form_data = collect([['field' => 'id', 'type' => 'number', 'label' => 'ID', 'required' => false, 'disabled' => false],
        ['field' => 'content', 'type' => 'wysiwyg', 'label' => 'Content', 'required' => true, 'disabled' => false]]);
    
        return $form_data;
    }
}
