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
        'term' => 'A <a href="/felhasznalasi-feltetelek" class="term" target="_blank">felhasználási feltételeket</a> megismertem és elfogadom.',
        'submitButton' => 'Regisztrálok',
        'validation' => [
            'name' => 'Név mező kitöltése kötelező!',
            'email' => 'E-mail cím mező kitöltése kötelező!',
            'emailFormat' => 'E-mail cím formátuma hibás!',
            'emailExists' => 'A megadott e-mail cím már létezik!',
            'password' => 'A jelszó mező kitöltése kötelező!',
            'passwordLength' => 'A jelszónak minimum 6 karakternek kell lennie!',
            'passwordRegex' => 'A jelszónak tartalmaznia kell kisbetűt, nagybetűt és számot!',
            'passwordConfirm' => 'A két beírt jelszó nem egyezik meg!',
            'address1' => 'A cím mező kitöltése kötelező!',
            'city' => 'A város megadása kötelező!',
            'state' => 'A tartomány megadása kötelező!',
            'zip' => 'Az irányítószám megadása kötelező!',
            'zipInteger' => 'Az irányítószám mezőben csak szám adható meg!',
            'term' => 'A regisztrációhoz kérjük fogadja el a felhasználási feltételeket!',
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
            'title' => 'Regisztráció megerősítése sikeres!',
            'description' => 'Sikeresen megerősítetted a regisztrációdat ezzel az e-mail címmel. Most már be tudsz jelentkezni az oldalra.'
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
        ]
    ]
];
