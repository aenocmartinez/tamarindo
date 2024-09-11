<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'Please enter a valid email address.',
    'password' => [
        'required' => 'Password is required.',
        'min' => 'Password must be at least :min characters.',
    ],
    'g-recaptcha-response' => [
        'required' => 'Please verify that you are not a robot.',
        'captcha' => 'Captcha verification failed, please try again.',
    ],

    'attributes' => [
        'email' => 'email address',
        'password' => 'password',
        'g-recaptcha-response' => 'captcha verification',
    ],
];
