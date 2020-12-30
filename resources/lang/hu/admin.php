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
        "title" => "Regisztrált felhasználók",
        "searchTitle" => "Keresés",
        "search" => [
            "nameFieldPlaceholder"   => "Név",
            "emailFieldPlaceholder"  => "E-mail cím",
            "statusFieldPlaceholder" => "Státusz",
            "statusFieldAll"         => "Mind",
            "roleFieldPlaceholder"   => "Jogosultság",
            "roleFieldAll"           => "Mind",
            "submitButton"           => "Keresés",
            "resetButton"            => "Alaphelyzet",
        ],
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
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "pl. Nagy József",
            "emailFieldLabel" => "E-mail cím",
            "emailFieldPlaceholder" => "nagy.jozsef@gmail.com",
            "passwordFieldLabel" => "Jelszó",
            "passwordFieldPlaceholder" => "Jelszó",
            "passwordFieldHelp" => "Csak változtatás esetén",
            "cityFieldLabel" => "Város",
            "cityFieldPlaceholder" => "Város",
            "stateFieldLabel" => "Megye",
            "stateFieldPlaceholder" => "-- Nincs megadva --",
            "statusFieldLabel" => "Státusz",
            "roleFieldLabel" => "Jogosultság",
            "phoneFieldLabel" => "Telefonszám",
            "phoneFieldPlaceholder" => "Telefonszám",
            "descriptionFieldLabel" => "Leírás",
            "avatarFieldLabel" => "Avatar",
            "avatarRemoveButton" => "Törlés",
            "billingDataTitle" => "Számlázási adatok",
            "billingDataTypePerson" => "Magánszemély",
            "billingDataTypeCompany" => "Cég",
            "billingStateFieldLabel" => "Megye",
            "billingStateFieldPlaceholder" => "-- Nincs megadva --",
            "billingZipFieldLabel" => "Irányítószám",
            "billingZipFieldPlaceholder" => "1234",
            "billingCityFieldLabel" => "Város",
            "billingCityFieldPlaceholder" => "pl. Budapest",
            "billingAddress1FieldLabel" => "Címsor1",
            "billingAddress1FieldPlaceholder" => "Címsor1",
            "billingAddress2FieldLabel" => "Címsor2",
            "billingAddress2FieldPlaceholder" => "Címsor2",
            "billingCompanyNameFieldLabel" => "Cégnév",
            "billingCompanyNameFieldPlaceholder" => "Cégnév",
            "billingTaxNumberFieldLabel" => "Adószám",
            "billingTaxNumberFieldPlaceholder" => "Adószám",
            "submitButton" => "Módosítás"
        ],
        "validation" => [
            "name" => "Név mező kitöltése kötelező!",
            "email" => "E-mail cím mező kitöltése kötelező!",
            "emailFormat" => "E-mail cím formátuma hibás!",
            "billingState" => "Számlázási adatoknál a megye kiválasztása kötelező!",
            "billingZip" => "Számlázási adatoknál az irányítószám megadása kötelező!",
            "billingCity" => "Számlázási adatoknál a város megadása kötelező!",
            "billingAddress" => "Számlázási adatoknál a cím megadása kötelező!",
            "billingCompanyName" => "Számlázási adatoknál a cégnév megadása kötelező!",
            "billingTaxNumber" => "Számlázási adatoknál az adószám megadása kötelező!",
            "emailUnique" => "A megadott e-mail cím már létezik!",
            "passwordLength" => "A jelszónak minimum 6 karakternek kell lennie!",
            "passwordRegex" => "A jelszónak tartalmaznia kell kisbetűt, nagybetűt és számot!",
            "avatarSize" => "A feltöltőtt Avatar mérete nem lehet nagyobb mint ".env("UPLOAD_MAX_FILESIZE")." MB",
            "avatarIsImage" => "A feltöltött Avatar csak kép lehet!",
            "avatarMimeType" => "A feltöltött avatar kiterjesztése a következőek lehetnek: jpeg, jpg, png, gif"
        ],
        "success" => "A felhasználó módosítása sikerült!",
    ]
];