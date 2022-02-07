<?php

interface IUser {
    public function getName(): string;
    public function setName(string $name);
    public function getAge(): int;
    public function setAge(int $age);
    public function getGender(): string;
    public function setGender(string $gender);
}

interface IEmployee extends IUser {
    public function getSalary(): float;
    public function setSalary(float $salary);
}

Class Employee implements IEmployee {
    protected string $name;
    protected int $age;
    protected string $gender;
    protected float $salary;

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setAge(int $age) {
        $this->age = $age;
        return $this;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function setGender(string $gender) {
        $this->gender = $gender;
        return $this;
    }

    public function getSalary(): float {
        return $this->salary;
    }

    public function setSalary(float $salary) {
        $this->salary = $salary;
        return $this;
    }

}
?>
