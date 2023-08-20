<?php
class Animal {
    public function makeSound() {
        return "Some generic sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class Cow extends Animal {
    public function makeSound() {
        return "Moo!";
    }
}

// Usage
$animals = [new Dog(), new Cat(), new Cow()];

foreach ($animals as $animal) {
    echo get_class($animal) . " says: " . $animal->makeSound() . "<br>";
}
?>