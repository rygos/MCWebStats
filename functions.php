<?php

function m2km($meters) {
	
}

function intervall($sek) {
    $i = sprintf('%dT %dS %dM %ss',
            $sek / 86400,
            $sek / 3600 % 24,
            $sek / 60 % 60,
            $sek % 60
         );
    return $i;
}