<?php

    class Person {
        public $name;
        public $age;
        public $email;

        public function __construct($name, $age, $email) {
            $this->name = $name;
            $this->age = $age;
            $this->email = $email;
        }

        public function print(){
            echo " NAme : " . $this->name . " [".$this->age."] : " . $this->email;
        }
    }

    function renderPersonProfile(Person $person){
        $name = $person->name ?? "Max Mustermann";
        return <<<HTML
        <div class="profile">
            <p> PROFILE </p>
            <p class="profile">My name is $name, and I'm $person->age!</p>
        </div>
        HTML;
    }

?>