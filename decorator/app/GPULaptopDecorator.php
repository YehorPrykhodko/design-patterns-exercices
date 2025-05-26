<?php

require_once 'Computer.php';

class GPULaptopDecorator implements Computer {
    private Computer $computer;

    public function __construct(Computer $computer) {
        $this->computer = $computer;
    }

    public function description(): string {
        return $this->computer->description() . ' avec GPU';
    }
}
