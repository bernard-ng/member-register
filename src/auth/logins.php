<?php

return [
    'name' => ['bernard ng', 'marco muyaya'],
    'password' => [ 
        'bernard ng' => password_hash("#root-" . date('d'), PASSWORD_BCRYPT),
        'marco muyaya' => password_hash("#root-" . date('d'), PASSWORD_BCRYPT),
    ]
];