<?php
// Declare the interface 'Template'
interface ReturnRoutes {
    public  function HomePage();
    public  function AboutPage();
}


class MakeRoutes implements ReturnRoutes
{

    public  function HomePage(){
        echo "<h1>Welcome to the home page</h1>";
    }

    public  function AboutPage(){
        echo  "<h1>About us</h1>";
    }

}

$HomePage = new MakeRoutes();

$HomePage->HomePage();
