<?php
namespace obj;
class Person {
    public string $name = '';
    public int $companyid = 0;
    public string $department = '';

    public function setName(string $name): void {

        $this->name = $name;
    }

    public function setInfo(int $companyid, string $department): void {

        $this->companyid = $companyid;
        $this->department = $department;
    }
}
?>