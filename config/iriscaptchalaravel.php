<?php
return [
     'IrisCaptcha_Developing_Mode' => env('IrisCaptcha_Developing_Mode','FALSE'),
     'IrisCaptcha_Secret_Key' => env('IrisCaptcha_Secret_Key',''),
     'IrisCaptcha_Publick_Key' => str_replace("\\n", "\n", env('IrisCaptcha_Publick_Key',''))
];