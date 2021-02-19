<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AcWKfISRwz0nrP0wazGjeJ-tlezQzgLDJXlTR6VBE1WK1e9zyAvKE3aQrWSt0eYUneE297i-lZtMufC3'),
    'secret' => env('PAYPAL_SECRET','EEuz2dCvEhItrf4WfvZs7yE04emNQS84slE0E4VC-ouYqhi58Yzi-yV8oxM_dTlH8dWQn_S_PSiBgrNG'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];