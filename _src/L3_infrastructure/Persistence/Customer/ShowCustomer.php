<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Customer;

use Illuminate\Support\Facades\DB;

use yangpimpollo\L1_domain\Entity\Customer;
use DateTimeImmutable;

class ShowCustomer {
    public function execute(string $dni): ?Customer{

        $sql = "SELECT dni, firstname, lastname, phone, created_at FROM customers WHERE dni = ?";
        $bindings = [$dni];

        $row = DB::selectOne($sql,$bindings);

        if (!$row) return null;

        return new Customer(
            $row->dni,
            $row->firstname,
            $row->lastname,
            $row->phone,
            new DateTimeImmutable($row->created_at)
        );
    }
}