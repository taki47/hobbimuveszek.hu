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
    "menu" => [
        "usersTitle" => "Felhasználók",
        "usersMenu" => "Regisztrált felhasználók",
        "userRolesMenu" => "Jogosultságok",
        "userStatusesMenu" => "Státuszok",
        "masterDataTitle" => "Törzsadatok",
        "pagesMenu" => "Oldalak kezelése",
        "provincesMenu" => "Megyék",
        "billingTypesMenu" => "Számlázási típusok",
        "globalSettingsMenu" => "Globális beállítások"
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
    ],
    "userRoles" => [
        "title" => "Felhasználó jogosultságok",
        "newRole" => "Új jogosultság felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Módosítás",
            "success" => "A jogosultság módosítása sikerült"
        ],
        "create" => [
            "title" => "Új jogosultság felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Létrehozás",
            "success" => "Az új jogosultság létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező",
            "nameUnique" => "A megadott jogosultság név már létezik!"
        ]
        ],
        "userRoles" => [
        "title" => "Felhasználó jogosultságok",
        "newRole" => "Új jogosultság felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Módosítás",
            "success" => "A jogosultság módosítása sikerült"
        ],
        "create" => [
            "title" => "Új jogosultság felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Létrehozás",
            "success" => "Az új jogosultság létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező",
            "nameUnique" => "A megadott jogosultság név már létezik!"
        ]
    ],
    "userStatuses" => [
        "title" => "Felhasználó státuszok",
        "newRole" => "Új státusz felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Módosítás",
            "success" => "A státusz módosítása sikerült"
        ],
        "create" => [
            "title" => "Új státusz felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Létrehozás",
            "success" => "Az új státusz létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező",
            "nameUnique" => "A megadott státusz név már létezik!"
        ]
    ],
    "provinces" => [
        "title" => "Megyék",
        "newProvince" => "Új megye felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Módosítás",
            "success" => "A megye módosítása sikerült"
        ],
        "create" => [
            "title" => "Új megye felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Létrehozás",
            "success" => "Az új megye létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező",
            "nameUnique" => "A megadott megye név már létezik!"
        ]
    ],
    "billingTypes" => [
        "title" => "Számlázási típusok",
        "newBillingType" => "Új számlázási típus felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Módosítás",
            "success" => "A számlázási típus módosítása sikerült"
        ],
        "create" => [
            "title" => "Új számlázási típus felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "submitButton" => "Létrehozás",
            "success" => "Az új számlázási típus létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező!",
            "nameUnique" => "A megadott számlázási típus név már létezik!"
        ]
    ],
    "globalSettings" => [
        "title" => "Globális beállítások",
        "newGlobalSetting" => "Új globális beállítás felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "valueFieldLabel" => "Érték",
            "valueFieldPlaceholder" => "Érték",
            "fileNameFieldLabel" => "Fájlnév",
            "fileNameFieldPlaceholder" => "Pl. logo.png, logo-hosszu.png, favicon.ico",
            "altFieldLabel" => "Alt text",
            "altFieldPlaceholder" => "Alt text",
            "titleFieldLabel" => "Title text",
            "titleFieldPlaceholder" => "Title text",
            "submitButton" => "Módosítás",
            "success" => "A globális beállítás módosítása sikerült"
        ],
        "create" => [
            "title" => "Új globális beállítás felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "typeFieldLabel" => "Kép?",
            "submitButton" => "Létrehozás",
            "success" => "Az új globális beállítás létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező!",
            "nameUnique" => "A megadott globális beállítás neve már létezik!",
            "imageSize" => "A feltöltőtt fájl mérete nem lehet nagyobb mint ".env("UPLOAD_MAX_FILESIZE")." MB",
            "isImage" => "A feltöltött fájl csak kép lehet!",
            "mimeType" => "A feltöltött fájl kiterjesztése a következőek lehetnek: jpeg, jpg, png, gif"
        ]
    ],
    "pages" => [
        "title" => "Oldalak",
        "newPage" => "Új oldal felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "title" => "Új oldal felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "titleFieldLabel" => "Title",
            "titleFieldPlaceholder" => "Title",
            "descriptionFieldLabel" => "Meta description",
            "descriptionFieldPlaceholder" => "Meta description",
            "keywordsFieldLabel" => "Meta keywords",
            "keywordsFieldPlaceholder" => "Meta keywords",
            "bodyFieldLabel" => "Törzs",
            "submitButton" => "Módosítás",
            "success" => "Az oldal módosítása sikerült"
        ],
        "create" => [
            "title" => "Új oldal felvétele",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "titleFieldLabel" => "Title",
            "titleFieldPlaceholder" => "Title",
            "descriptionFieldLabel" => "Meta description",
            "descriptionFieldPlaceholder" => "Meta description",
            "keywordsFieldLabel" => "Meta keywords",
            "keywordsFieldPlaceholder" => "Meta keywords",
            "bodyFieldLabel" => "Törzs",
            "submitButton" => "Létrehozás",
            "success" => "Az új oldal létrehozása sikerült"
        ],
        "validation" => [
            "name" => "Név megadása kötelező",
            "nameUnique" => "A megadott oldalnév már létezik!",
            "title" => "Title megadása kötelező"
        ]
    ],
];