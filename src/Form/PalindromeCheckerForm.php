<?php

namespace Drupal\palindrome_checker\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class PalindromeCheckerForm extends FormBase
{
    public function getFormId()
    {
        return 'palindrome_checker_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Enter a word'),
            '#required' => true,
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Check'),
        ];
        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $name = $form_state->getValue('name');
        if (empty($name)) {
            $form_state->setErrorByName('name', $this->t('The name field cannot be empty.'));
        }
    }


    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $name = $form_state->getValue('name');
        $form_state->setRedirect('palindrome_checker.content', ['name' => $name]);
        \Drupal::messenger()->addMessage($this->t('You are checking the word: @name', ['@name' => $name]));
    }
}
