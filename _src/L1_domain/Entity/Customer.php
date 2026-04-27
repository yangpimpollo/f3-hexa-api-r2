<?php

namespace yangpimpollo\L1_domain\Entity;

use DateTimeImmutable;

class Customer
{
    public function __construct(
        private readonly string $dni,
        private readonly string $firstname,
        private readonly string $lastname,
        private readonly string $phone,
        private readonly DateTimeImmutable $createdAt = new DateTimeImmutable() 
    ) {}

    public function getDni(): string { return $this->dni; }
    public function getFirstname(): string { return $this->firstname; }
    public function getLastname(): string { return $this->lastname; }
    public function getPhone(): string { return $this->phone; }
    public function getCreatedAt(): DateTimeImmutable { return $this->createdAt; }

    public function toArray(): array
    {
        return [
            'dni'       => $this->dni,
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'phone'     => $this->phone,
            'created_at'=> $this->createdAt->format('Y-m-d H:i:s')
        ];
    }
}