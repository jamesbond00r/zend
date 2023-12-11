<?php

abstract class AbstractMongoConnection
{
    protected $userName;
    protected $password; //Get this from env file
    protected $ssl = true;

    abstract protected function connectToMogoDB();

}


class MogoDb extends AbstractMongoConnection{
    protected $userName = "Guy";
    protected $password = "password"; //Get this from env file
    protected $ssl = true;
    public function connectToMogoDB(){
//        $connectionString = new MongoDB\Client('mongodb://rs1.example.com,rs2.example.com/'['username' => $this->userName,'password' => $this->password, 'ssl' => $this->ssl]);
        echo "Connection to database successfully";
    }

    public function insertData($user, $email, $occupation){
        $job = $occupation != null ? $occupation : "Not provided";

//        $insertOneResult = $collection->insertOne([
//            'user' => $user,
//            'email' => $email,
//            'name' => $job,
//        ]);

        echo "Document inserted into database";
        echo "<br/>";
        echo $user;
        echo "<br/>";
        echo $email;
        echo "<br/>";
        echo $job;
    }
}

$connect = new MogoDb();
$connect->connectToMogoDB();
$connect->insertData("Rob", "email@gmail.com", "DEV");
