<?php

namespace App;

interface MailerInterface
{
    public function setVar($key, $value);
    public function getAllVars();
    public function render();
}
