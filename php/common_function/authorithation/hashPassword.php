<?php

function hashPassword($pswrd) {
    $salt = "saltQzxa7FCel173OnVNRfPj";
    return md5(md5($pswrd) . $salt);
}
