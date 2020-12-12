<?php

return [
    "title"           => "Adminisztráció",
    "returnToPage"    => "Vissza az oldalra",
    "welcome"         => "Üdvözöllek",
    "logout"          => "Kijelentezés",
    "showAllMessages" => "Összes üzenet megtekintése",
    "dropdown" => [
        "profile" => "Profil"
    ],
    "users" => [
        "table" => [
            "id"      => "ID",
            "name"    => "Név",
            "email"   => "E-mail cím",
            "phone"   => "Telefonszám",
            "status"  => "Státusz",
            "role"    => "Jogosultság",
            "created" => "Regisztrált"
        ],
        "edit" => [
            'nameFieldLabel' => 'Név',
            'nameFieldPlaceholder' => 'pl. Nagy József',
            'emailFieldLabel' => 'E-mail cím',
            'emailFieldPlaceholder' => 'nagy.jozsef@gmail.com',
            'passwordFieldLabel' => 'Jelszó',
            'passwordFieldPlaceholder' => 'Jelszó',
            'passwordFieldHelp' => "Csak változtatás esetén",
            'address1FieldLabel' => 'Címsor 1',
            'address1FieldPlaceholder' => 'Művészetek útja 2.',
            'address2FieldLabel' => 'Címsor 2',
            'address2FieldPlaceholder' => 'Emelet, ajtó',
            'cityFieldLabel' => 'Város',
            'cityFieldPlaceholder' => 'Város',
            'stateFieldLabel' => 'Megye',
            'stateFieldPlaceholder' => 'Válassz egyet...',
            'zipFieldLabel' => 'Irányítószám',
            'zipFieldPlaceholder' => 'Irányítószám',
            "submitButton" => "Módosítás"
        ],
        'validation' => [
            'name' => 'Név mező kitöltése kötelező!',
            'email' => 'E-mail cím mező kitöltése kötelező!',
            'emailFormat' => 'E-mail cím formátuma hibás!',
            'emailExists' => 'A megadott e-mail cím már létezik!',
            'password' => 'A jelszó mező kitöltése kötelező!',
            'passwordLength' => 'A jelszónak minimum 6 karakternek kell lennie!',
            'passwordRegex' => 'A jelszónak tartalmaznia kell kisbetűt, nagybetűt és számot!',
            'passwordConfirm' => 'A két beírt jelszó nem egyezik meg!',
            'address' => 'A cím mező kitöltése kötelező!',
            'city' => 'A város megadása kötelező!',
            'state' => 'A tartomány megadása kötelező!',
            'zip' => 'Az irányítószám megadása kötelező!',
            'zipInteger' => 'Az irányítószám mezőben csak szám adható meg!',
            'term' => 'A regisztrációhoz kérjük fogadja el a felhasználási feltételeket!',
        ],
        'success' => "A felhasználó módosítása sikerült!",
    ]
];