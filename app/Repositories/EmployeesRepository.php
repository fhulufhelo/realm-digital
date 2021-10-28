<?php

namespace App\Repositories;

use App\Models\Employee;
use App\WebServices\ApiRequest;

class EmployeesRepository
{
    protected $api = 'https://interview-assessment-1.realmdigital.co.za';
    protected $getEndpoint = 'employees';
    public function get()
    {
        $request = new ApiRequest($this->api);

        $results = $request->get($this->getEndpoint);

        $employees = collect();

        foreach ($results as $employee) {
            $employees->add(new Employee($employee));
        }

        return $employees;
    }

}
