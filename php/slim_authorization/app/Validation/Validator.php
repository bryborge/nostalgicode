<?php

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{

  /**
   * Properties
   * @var $errors Array
   */
  protected $errors;

  /**
   * Validate each field's content from a submitted form, given the field's
   * unique set of validation rules.
   *
   * @param  Object $request
   * @param  Array  $rules Set of rules to test against.
   * @return Object
   */
  public function validate($request, array $rules)
  {
    foreach ($rules as $field => $rule) {
      try {
        $rule->setName(ucfirst($field))->assert($request->getParam($field));
      } catch (NestedValidationException $e) {
        $this->errors[$field] = $e->getMessages();
      }
    }

    $_SESSION['validation_errors'] = $this->errors;

    return $this;
  }

  /**
   * Return errors if any validations fail.
   *
   * @return Array $this->errors
   */
  public function failed()
  {
    return !empty($this->errors);
  }
}
