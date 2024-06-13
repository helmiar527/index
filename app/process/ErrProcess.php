<?php

class ErrProcess extends controller
{
    public function index404()
    {
        $data['title'] = 'Error 404';
        return $data;
    }
}
