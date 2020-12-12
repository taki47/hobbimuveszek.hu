<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'login' => [
        'email'        => 'E-mail cím',
        'password'     => 'Jelszó',
        'title'        => 'Bejelentkezés',
        'rememberme'   => 'Emlékezz rám!',
        'register'     => 'Regisztráció',
        'failed'       => 'A megadott felhasználónév vagy jelszó nem megfelelő!',
        'lostPassword' => 'Elfelejtettem a jelszavam',
    ],

    'register' => [
        'title' => 'Regisztráció',
        'nameFieldLabel' => 'Név',
        'nameFieldPlaceholder' => 'pl. Nagy József',
        'emailFieldLabel' => 'E-mail cím',
        'emailFieldPlaceholder' => 'nagy.jozsef@gmail.com',
        'passwordFieldLabel' => 'Jelszó',
        'passwordFieldPlaceholder' => 'Jelszó',
        'passwordRetryFieldLabel' => 'Jelszó újra',
        'passwordRetryFieldPlaceholder' => 'Jelszó újra',
        'passwordHelp' => 'Minimum 6 karakter, kis- és nagybetű valamint számot kell tartalmaznia!',
        'term' => 'A <a href="/felhasznalasi-feltetelek" class="term" target="_blank">felhasználási feltételeket</a> megismertem és elfogadom.',
        'submitButton' => 'Regisztrálok',
        'description' => 'Művészként/Eladóként vagy csak Érdeklődőként/Vásárlóként regisztrálnál? Tölsd ki az alábbi űrlapot, majd a regisztrálok gombra kattintva kapsz egy megerősítő levelet.<br/>A levélben kapott linkre kattintva folytathatod a regisztrációdat, ahol kiválaszthatod, hogy milyen titulusban akarsz regisztrálni az oldalra, majd megadhatod a további adataidat is.',
        'stepTwo' => [
            'description' => 'Sikeresen megerősítetted az e-mail címed!<br />Következő lépésként kérlek válaszd ki, hogy Művészként/Eladóként, vagy Érdeklődőként/Vásárlóként szeretnél-e regisztrálni.<br />Az itt megadott adatokat később bármikor módosíthatod a Profilodban!',
            'artTitle' => 'Művészként / Eladóként regisztrálok',
            'artDescription' => 'Művészként regisztrálva meg kell adnod a számlázási adataidat, amelyet bizalmasan kezelünk, harmadik fél részére nem adjuk ki. Kizárólag csak az előfizetésedhez tartozó számla kiállítása miatt van rá szükség!<br />Opcionálisan megadhatod a személyes adataidat (telefonszámod, avatarod, leírás magadról, közösségi oldalaid, weboldalad). Ezeket az adatokat érdemes megadnod, hogy könnyebben rád találjanak.',
            'visitorTitle' => 'Érdeklődőként / Vásárlóként regisztrálok',
            'visitorDescription' => 'Opcionálisan megadhatod a személyes adataidat. Kitöltése nem kötelező.',
            'billingDataTitle' => 'Számlázási címed',
            'billingDataDescription' => 'Nem jelennek meg az adatlapodon, pusztán a számlázás miatt szükségesek',
            'billingDataTypePerson' => "Magánszemély",
            'billingDataTypeCompany' => "Cég",
            'companyNameFieldLabel' => 'Cégnév',
            'companyNameFieldPlaceholder' => 'Cégnév',
            'taxNumberFieldLabel' => 'Adószám',
            'taxNumberFieldPlaceholder' => 'xxxxxxxx-y-zz',
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
            'otherDataTitle' => 'Egyéb adatok',
            'otherDataDescription' => 'Add meg az elérhetőségeidet, hogy az érdeklődők könnyen rádtaláljanak',
            'avatarFieldLabel' => 'Avatar',
            'avatarHelp' => 'jpeg,png,jpg,gif. Maximum '.env("UPLOAD_MAX_FILESIZE").' MB',
            'phoneFieldLabel' => 'Telefonszám',
            'phoneFieldPlaceholder' => '+36 1 111-1111',
            'websiteFieldLabel' => 'Weboldal',
            'websiteFieldPlaceholder' => 'https://azenweblapom.hu',
            'descriptionFieldLabel' => 'Leírás magadról',
            'socialMediaDataTitle' => 'Közösségi hálózatok',
            'socialMediaDataDescription' => 'Add meg a közösségi hálózatod címeit, amelyekkel rendelkezel',
            'submitButton' => 'Regisztráció befejezése'
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
            'companyName' => 'Céges számlázási címhez a cég nevének megadása kötelező!',
            'taxNumber' => 'Céges számlázási címhez az adószám megadása kötelező!',
            'avatarIsImage' => 'Avatarnak csak kép tölthető fel!',
            'avatarMimeType' => 'Avatar kiterjesztése a következő lehet: jpeg,png,jpg,gif',
            'avatarSize' => 'Avatar file mérete nem lehet nagyobb mint '.env("UPLOAD_MAX_FILESIZE").' MB',
        ],
        'success' => [
            'title' => 'Köszönjük a regisztrációdat!',
            'description' => 'A megadott e-mail címre kiküldtük a megerősítéshez szükséges linket. Kérjük ellenőrizd a postafiókodat!<br /><br />Ha nem érkezik meg a levél, nézd meg a levélszemét mappát is, ha oda se érkezett meg, vedd fel velünk a kapcsolatot a '.env("ADMIN_EMAIL").' email címen keresztül.'
        ],
        'confirmError' => [
            'title' => 'Regisztráció megerősítése nem sikerült!',
            'description' => 'Nem találtunk a megadott e-mail címre és regisztrációs kódra felhasználót!<br /><br />Kérjük próbáld meg újra!'
        ],
        'confirmOk' => [
            'title' => 'Köszönjük!',
            'description' => 'Sikeresen regisztráltál. Most már be tudsz jelentkezni az oldalra.'
        ]
    ],

    'lostPassword' => [
        'title'       => 'Elfelett jelszó',
        'description' => 'Add meg az e-mail címedet, amivel regisztráltál. Erre az e-mail címre kapsz egy linket, amin új jelszót adhatsz meg',
        'email'       => 'E-mail cím',
        'submit'      => 'Mehet',
        'emailError'  => 'A megadott e-mail címmel nem találtunk regisztrációt!',
        'sent' => [
            'title' => 'Elfelejtett jelszó',
            'description' => 'A megadott e-mail címre elküldtük a jelszó visszaállításhoz szükséges linket!',
        ],
        'confirmError' => [
            'title' => 'Az új jelszó megadása nem sikerült!',
            'description' => 'Nem találtunk a megadott e-mail címre és kódra felhasználót!<br /><br />Kérjük próbáld meg újra!'
        ],
        'confirmOk' => [
            'title' => 'A jelszó változtatás sikeres!',
            'description' => 'Sikeresen megerősítetted megváltozott a jelszavad, most már be tudsz jelentkezni az oldalra.'
        ],
        'generate' => [
            'title'         => 'Új jelszó megadása',
            'password'      => 'Új jelszó',
            'passwordRetry' => 'Új jelszó újra',
            'submit'        => 'Jelszó megváltoztatása'
        ]
    ]
];
