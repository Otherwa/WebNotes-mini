<?php
namespace CustomException;

class ContentsException extends \Exception
{
    protected $msg = null;
    function __construct($msg)
    {
        $this->msg = $msg;
    }

    function getmsg(): string
    {
        return $this->msg;
    }
}
?>