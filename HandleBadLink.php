<?php

//Checks to see if the url is valid before sending off api calls
class HandleBadLink
{
    private  function MakeTheEditLink($NIDExploded, $DIV){
        switch ([$NIDExploded[1], $DIV]) {
            case ['lp', 'land pride']:
                return "https://landpride.com/node/$NIDExploded[0]/edit";
                break;
            case ['gp', 'great plains']:
                return "https://greatplainsag.com/en/node/$NIDExploded[0]/edit";
                break;
            case ['da', 'land pride']:
                return "https://landpride.com/dealer_access/content/en/node/$NIDExploded[0]/edit";
                break;
            case ['da', 'great plains']:
                return "https://greatplainsmfg.com/dealer_access/content/en/node/$NIDExploded[0]/edit";
                break;
            default:
                return "https://landpride.com/node/$NIDExploded[0]/edit";
        }

    }
    public function BadLink($APIInfo)
    {
        $URL = $APIInfo['asset_url'];
        $DIV = strtolower($APIInfo['division']);
        $NID = $APIInfo['nid'];
        $NIDExploded = explode('_', $NID);
        $editLinkcms = MakeTheEditLink($NIDExploded,$DIV );
        $InfoToSend = "$URL returned status code $statusCode. NID $NID for the $DIV division. You can edit it here at <a href='$editLinkcms'>$editLinkcms</a>";
        return $InfoToSend;
    }

    public function MalformedLink($APIInfo, $URLEncoded ){
        $DIV = $APIInfo['division'];
        $NID = $APIInfo['nid'];
        $NIDExploded = explode('_', $NID);
        $editLinkcms = MakeTheEditLink($NIDExploded,$DIV );
        $InfoToSend = "$URLEncoded did not pass the valid URL check. NID $NID for the $DIV division. You can edit it here at <a href='$editLinkcms'>$editLinkcms</a>";
        return $InfoToSend;
    }


}


