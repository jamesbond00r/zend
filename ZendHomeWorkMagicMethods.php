<?php

class CleanUp{
    public function __destruct(){
        echo "<h1>Script has finished running</h1>";
        //Run clean up
        //Disconnect from DB
    }
}
function RunCleanup(){
    $cleanup = new CleanUp();
}

class TransportUserData {
    private $username, $password;
    public function __construct( $username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function serializeUserData(){
        return base64_encode(serialize( ['username' => $this->username, 'password' => $this->password]));
    }
    public function unserializeUserData(string $data)
    {
        RunCleanup();
        return unserialize($data);
    }

}

$userName_PassWord = new TransportUserData("Rob", "pAzsWoRd123");
$test = $userName_PassWord->serializeUserData();

$test2 = $userName_PassWord->unserializeUserData(base64_decode($test));

echo($test);
echo("<br />");
echo("<br />");
echo(implode($test2));


