<?php 

/**
 * フォームの各フィールドの情報やバリデーションの処理をしようとしたクラス（使ってない）
 */

class FormField
{
  public $label;
  public $name;
  public $type;
  public $required;
  public $options;

  function __construct($label, $name, $type, $required = false, $options = [])
  {
    $this->label = $label;
    $this->name = $name;
    $this->type = $type;
    $this->required = $required;
    $this->options = $options;
  }

  function validate()
  {
    if (!isset($_POST[$this->name])) {
      return "{$this->label}が指定されていません";
    } else {
      $value = $_POST[$this->name];
    }
    
    if ($this->type === 'input:email') {
      if (!filter_var($value, FILTER_VALIDATE_EMAIL))
      return "{$this->label}に正しいメールアドレスが入力されていません";

    } elseif ($this->type === 'input:tel') {
      if (!preg_match('/^0[0-9]{9,10}\z/', $value))
      return "{$this->label}に正しい電話番号が入力されていません";

    } elseif ($this->type === 'select') {
      if ($value == "")
      return "{$this->label}が正しく選択されていません";
    }
  }
}

?>