<?php
declare(strict_types = 1);

//************************LAB 3*************************************
//Add a class with methods that include type hinting and strict types
//Create 2 traits and use them in a class
trait CleanInput
{
   public function CleanInputsOfData(array $input): string{
        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );
        $output = preg_replace($search, '', $input);
        return implode($output);
    }
}

trait isEmailValid{
    function CheckEmail(string $email): bool{
        $bool = !filter_var($email, FILTER_VALIDATE_EMAIL) ? false : true;
        return $bool;
    }

}

class GetUserInput {
    use CleanInput;
    use isEmailValid;
}


$test = new GetUserInput();
$tryItOut = $test->CleanInputsOfData(["<script>alert('test')</script>", "1", "2", "3", "<h1>test</h1>"]);
$testEmail = $test->CheckEmail("rob@google.com");
$testEmail2 = $test->CheckEmail("not my email");
echo($tryItOut);
echo ("<br />");
var_dump($testEmail);
var_dump($testEmail2);


