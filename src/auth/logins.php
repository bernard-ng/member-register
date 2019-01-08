<?php

return [
    'name' => ['bernard ng', 'marco muyaya'],
    'password' => [ 
        'bernard ng' => password_hash("#bernard-" . date('d'), PASSWORD_BCRYPT),
        'marco muyaya' => password_hash("#marco-" . date('d'), PASSWORD_BCRYPT),
    ]
];