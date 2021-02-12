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
        "categoriesMenu" => "Kategóriák",
        "categoryImagesMenu" => "Kategória képek",
        "pagesMenu" => "Oldalak kezelése",
        "provincesMenu" => "Megyék",
        "billingTypesMenu" => "Számlázási típusok",
        "globalSettingsMenu" => "Globális beállítások",
        "mainPageTitle" => "Főoldal elemek",
        "slidersMenu" => "Slider",
        "topCategoriesMenu" => "Top kategóriák",
        "blogTitle" => "Blog kezelése",
        "blogsMenu" => "Blog",
        "blogTagsMenu" => "Blog tag",
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
    "categories" => [
        "title" => "Kategóriák kezelése",
        "updateFailed" => "Módosítás sikertelen!",
        "updateSuccess" => "Módosítás sikerült!",
        "emptyList" => "A lista üres",
    ],
    "categoryImages" => [
        "title" => "Kategória képek",
        "newCategoryImage" => "Új kategória kép felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név",
            "categoryName" => "Kategória neve",
            "image" => "Kép",
        ],
        "create" => [
            "title" => "Új kategória kép létrehozása",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "categoryFieldLabel" => "Kategória",
            "imageFieldLabel" => "Kép",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "submitButton" => "Mehet",
            "success" => "Az új kép felvétele sikerült!",
        ],
        "edit" => [
            "title" => "Kategória kép szerkesztése",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "categoryFieldLabel" => "Kategória",
            "imageFieldLabel" => "Kép (módosítás esetén)",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "submitButton" => "Mehet",
            "deleteButton" => "Törlés",
            "success" => "Kategória kép módosítása sikerült!",
            "deleteTitle" => "Törlés",
            "deleteConfirm" => "Biztosan törölni szeretnéd ezt a kategória képet?",
            "deleteCancel" => "Mégse",
        ],
        "validation" => [
            "name" => "A név megadása kötelező!",
            "category" => "Kategória kiválasztása kötelező",
            "categoryExists" => "A kiválasztott kategória nem létezik!",
            "image" => "Kép feltöltése kötelező!",
            "imageSize" => "A feltölthető kép maximális mérete 2MB!",
            "isNotImage" => "A feltöltött fájl nem kép!",
            "imageMimeType" => "A feltöltött kép kiterjesztése csak jpeg, jpg, png, gif lehet!",
        ],
        "delete" => [
            "success" => "A kategória kép törlése sikerült!"
        ]
    ],
    "sliders" => [
        "title" => "Slider-ek kezelése",
        "newCategoryImage" => "Új slider felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név",
            "position" => "Sorrend",
            "image" => "Kép",
        ],
        "create" => [
            "title" => "Új slide létrehozása",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "imageFieldLabel" => "Kép",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "textFieldLabel" => "Szöveg",
            "positionFieldLabel" => "Sorrend",
            "positionFieldPlaceholder" => "Csak szám!",
            "submitButton" => "Mehet",
            "success" => "Az új slider felvétele sikerült!",
        ],
        "edit" => [
            "title" => "Slider szerkesztése",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "imageFieldLabel" => "Kép (módosítás esetén)",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "textFieldLabel" => "Szöveg",
            "positionFieldLabel" => "Sorrend",
            "positionFieldPlaceholder" => "Csak szám!",
            "submitButton" => "Mehet",
            "deleteButton" => "Törlés",
            "success" => "Slider módosítása sikerült!",
            "deleteTitle" => "Törlés",
            "deleteConfirm" => "Biztosan törölni szeretnéd ezt a slidert?",
            "deleteCancel" => "Mégse",
        ],
        "validation" => [
            "name" => "A név megadása kötelező!",
            "image" => "Kép feltöltése kötelező!",
            "imageSize" => "A feltölthető kép maximális mérete 2MB!",
            "isNotImage" => "A feltöltött fájl nem kép!",
            "imageMimeType" => "A feltöltött kép kiterjesztése csak jpeg, jpg, png, gif lehet!",
        ],
        "delete" => [
            "success" => "A slider törlése sikerült!"
        ]
    ],
    "topcategories" => [
        "title" => "Top kategóriák kezelése",
        "newCategoryImage" => "Új top kategória felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Név",
            "position" => "Sorrend",
            "link" => "Link",
            "image" => "Kép",
        ],
        "create" => [
            "title" => "Új top kategória létrehozása",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "imageFieldLabel" => "Kép",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "textFieldLabel" => "Szöveg",
            "positionFieldLabel" => "Sorrend",
            "positionFieldPlaceholder" => "Csak szám!",
            "linkFieldLabel" => "Hivatkozás",
            "linkFieldPlaceholder" => "Hivatkozás",
            "submitButton" => "Mehet",
            "success" => "Az új top kategória felvétele sikerült!",
        ],
        "edit" => [
            "title" => "Top kategória szerkesztése",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "imageFieldLabel" => "Kép (módosítás esetén)",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "textFieldLabel" => "Szöveg",
            "positionFieldLabel" => "Sorrend",
            "positionFieldPlaceholder" => "Csak szám!",
            "linkFieldLabel" => "Hivatkozás",
            "linkFieldPlaceholder" => "Hivatkozás",
            "submitButton" => "Mehet",
            "deleteButton" => "Törlés",
            "success" => "Top kategória módosítása sikerült!",
            "deleteTitle" => "Törlés",
            "deleteConfirm" => "Biztosan törölni szeretnéd ezt a top kategóriát?",
            "deleteCancel" => "Mégse",
        ],
        "validation" => [
            "name" => "A név megadása kötelező!",
            "image" => "Kép feltöltése kötelező!",
            "imageSize" => "A feltölthető kép maximális mérete 2MB!",
            "isNotImage" => "A feltöltött fájl nem kép!",
            "imageMimeType" => "A feltöltött kép kiterjesztése csak jpeg, jpg, png, gif lehet!",
            "link" => "Hivatkozás megadása kötelező!",
        ],
        "delete" => [
            "success" => "A top kategória törlése sikerült!"
        ]
    ],
    "blog" => [
        "title" => "Blog bejegyzések",
        "newBlog" => "Új blog bejegyzés felvétele",
        "table" => [
            "id" => "ID",
            "name" => "Cím",
            "created_at" => "Létrehozva",
            "updated_at" => "Módosítva",
        ],
        "create" => [
            "title" => "Új blog bejegyzés létrehozása",
            "nameFieldLabel" => "Cím",
            "nameFieldPlaceholder" => "Cím",
            "imageFieldLabel" => "Kép",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "metaKeywordsLabel" => "Meta keywords",
            "metaKeywordsPlaceholder" => "Meta keywords",
            "metaDescriptionLabel" => "Meta description",
            "metaDescriptionPlaceholder" => "Meta description",
            "leadFieldLabel" => "Bevezető",
            "bodyFieldLabel" => "Törzs",
            "tagsTitle" => "Címkék",
            "newTag" => "Új cimke",
            "submitButton" => "Mehet",
            "success" => "Az új blog bejegyzés felvétele sikerült!",
            "newTagTitle" => "Új címke felvétele",
            "tagNameFieldLabel" => "Címke neve",
            "tagNameFieldPlaceholder" => "Címke neve",
            "newTagSave" => "Mentés",
            "newTagCancel" => "Mégse"
        ],
        "edit" => [
            "title" => "Új blog bejegyzés létrehozása",
            "nameFieldLabel" => "Cím",
            "nameFieldPlaceholder" => "Cím",
            "imageFieldLabel" => "Kép",
            "imageTitleFieldLabel" => "Kép title",
            "imageTitleFieldPlaceholder" => "Kép title",
            "imageAltFieldLabel" => "Kép alt",
            "imageAltFieldPlaceholder" => "Kép alt",
            "metaKeywordsFieldLabel" => "Meta keywords",
            "metaKeywordsFieldPlaceholder" => "Meta keywords",
            "metaDescriptionFieldLabel" => "Meta description",
            "metaDescriptionFieldPlaceholder" => "Meta description",
            "leadFieldLabel" => "Bevezető",
            "bodyFieldLabel" => "Törzs",
            "tagsTitle" => "Címkék",
            "newTag" => "Új cimke",
            "submitButton" => "Módosítás",
            "deleteButton" => "Törlés",
            "success" => "Az új blog bejegyzés módosítása sikerült!",
            "newTagTitle" => "Új címke felvétele",
            "tagNameFieldLabel" => "Címke neve",
            "tagNameFieldPlaceholder" => "Címke neve",
            "newTagSave" => "Mentés",
            "newTagCancel" => "Mégse",
            "deleteTitle" => "Törlés",
            "deleteConfirm" => "Biztosan törölni szeretnéd ezt a blog bejegyzést?",
            "deleteCancel" => "Mégse",
        ],
        "validation" => [
            "name" => "A név megadása kötelező!",
            "image" => "Kép feltöltése kötelező!",
            "imageSize" => "A feltölthető kép maximális mérete 2MB!",
            "isNotImage" => "A feltöltött fájl nem kép!",
            "imageMimeType" => "A feltöltött kép kiterjesztése csak jpeg, jpg, png, gif lehet!",
            "link" => "Hivatkozás megadása kötelező!",
        ],
        "delete" => [
            "success" => "A top kategória törlése sikerült!"
        ]
    ],
    "blogTag" => [
        "title" => "Cimkék",
        "table" => [
            "id" => "ID",
            "name" => "Név"
        ],
        "edit" => [
            "title" => "Cimke módosítása",
            "nameFieldLabel" => "Név",
            "nameFieldPlaceholder" => "Név",
            "blogs" => "Cimkéhez rendelt blog bejegyzések",
            "submitButton" => "Módosítás",
            "deleteButton" => "Törlés",

            "success" => "Az új blog bejegyzés módosítása sikerült!",
            "deleteTitle" => "Törlés",
            "deleteConfirm" => "Biztosan törölni szeretnéd ezt a címkét?",
            "deleteCancel" => "Mégse",
        ],
        "validation" => [
            "name" => "A név megadása kötelező!",
            "image" => "Kép feltöltése kötelező!",
            "imageSize" => "A feltölthető kép maximális mérete 2MB!",
            "isNotImage" => "A feltöltött fájl nem kép!",
            "imageMimeType" => "A feltöltött kép kiterjesztése csak jpeg, jpg, png, gif lehet!",
            "link" => "Hivatkozás megadása kötelező!",
        ],
        "delete" => [
            "success" => "A top kategória törlése sikerült!"
        ]
    ]    

];