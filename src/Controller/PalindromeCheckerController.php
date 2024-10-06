<?php

namespace Drupal\palindrome_checker\Controller;


use Drupal\Core\Controller\ControllerBase;

class PalindromeCheckerController extends ControllerBase
{
    public function content($name)
    {
        if ($name === strrev($name)) {
            return ['#markup' => $this->t('@name is a palindrome', ['@name' => $name])];
        } else {
            return ['#markup' => $this->t('@name is not a palindrome', ['@name' => $name])];
        }
    }
}
