<?php
include_once("./Classes/FormatEmail.php");
class FormatErrorEmailExtendedFromFormEmail extends FormatEmail
{

    private $header="Error";
    private $message="There was an Error in the API call.";
    private $error;

    public function setErrorMessage($message){
        $this->error = $message;
    }

    public function FormatErrorEmail(){
            $body = "<div>
                            <h3>$this->header</h3>
                            <p>$this->message</p>
                            <div>$this->error</div>
                         </div>";
            return $body;
        }

    }
