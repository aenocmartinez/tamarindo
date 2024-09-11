<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'Por favor, introduce una dirección de correo válida.',
    'password' => [
        'required' => 'La contraseña es obligatoria.',
        'min' => 'La contraseña debe tener al menos :min caracteres.',
    ],
    'g-recaptcha-response' => [
        'required' => 'Por favor, verifica que no eres un robot.',
        'captcha' => 'La validación de reCaptcha ha fallado, intenta de nuevo.',
    ],

    'attributes' => [
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'g-recaptcha-response' => 'verificación reCaptcha',
    ],
];
