<?php

namespace App\Repositories;

use App\Models\Employee;
use App\WebServices\ApiRequest;

class EmployeesRepository
{
    protected $api = 'https://interview-assessment-1.realmdigital.co.za';
    protected $getEndpoint = 'employees';
    protected $data;

    public function __construct()
    {
        $this->fill();
    }

    public function collection()
    {
        return $this->data;
    }

    protected function fill()
    {
        $this->data = collect();

        $request = new ApiRequest($this->api);

        foreach ($request->get($this->getEndpoint) as $employee) {
            $this->data->add(new Employee($employee));
        }
    }

}
