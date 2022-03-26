
<?php 
class Validation{
    private static $maxLength=30;
    private static $minLenght=3;

public static function checkEmailFormat($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
     return false;
     return true;

}

public static function checkMaxLength($name)
{    
    $inputLength=strlen($name);
    if ($inputLength>self::$maxLength)
    {
        return false;
    }
    
     return true;
}

public static function checkMinLength($name)
{
    $inputLength=strlen($name);
    if ($inputLength < self::$minLenght)
    {
        return false;
    }
    
     return true;
}

public static function checkEmpty($element)
{
    foreach ($element as $key => $value) {
        $value = trim($value);
        if (empty($value))
            return true;
       
    }
    return false;
}

}

?>