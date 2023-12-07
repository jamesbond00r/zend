<?php

class FormatEmail
{

    private $header="Hello!";
    private $message="Here are the links that did not return a 200 status code.";
    private $linksToEmail;


    public function setLinks($newLinks){
        $this->linksToEmail = $newLinks;
    }
  public function FormatEmail(){
        $body = "<div>
                    <h3>$this->header</h3>
                    <p>$this->message</p>
                    <div>$this->linksToEmail</div>
                 </div>";
        return $body;
    }

}
