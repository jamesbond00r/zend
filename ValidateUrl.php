<?php

//Checks to see if the url is valid before sending off api calls
class ValidateURL{

    public function ValidUrl($urlToCheck)
    {
        if (!$urlToCheck || !is_string($urlToCheck) || filter_var($urlToCheck, FILTER_VALIDATE_URL) === false) {
            return false;
        }
        return true;
    }
}
