<?php
namespace Resource;
interface API {

    public function addParameter(string $key, string $value): void;

    public function request(): void;

}