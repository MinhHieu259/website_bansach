<?php

namespace App\Services;

use App\Models\Publisher;

class PublisherService
{
    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    function findAll() {
        try {
            $publishers = $this->publisher->get();
            if($publishers) {
                return $publishers;
            }
        } catch (\Throwable $e) {
            report($e);
            return array();
        }
    }

    function save($data)
    {
        try {
            $publisher = new Publisher();
            $publisher->name = $data['name'];
            $publisher->save();
            return true;
        } catch (\Throwable $e) {
            report($e);
            return false;
        }
    }
}
