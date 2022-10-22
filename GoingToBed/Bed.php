<?php
class StringUtils {
  public static function secondCase($name) {
    if (strlen($name) === 1) {
    return $name;
    } else {
      $name = strtolower($name);
      $name[1] = strtoupper($name[1]);
      return $name;
    }
  }
}

class Pajamas {
  private $owner;
  private $fit;
  private $color;
  
  function __construct(
    $owner = "none",
    $fit = "great",
    $color = "blue"
  ) {
    $this->owner = StringUtils::secondCase($owner);
    $this->fit = $fit;
    $this->color = $color;
  }
  public function describe() {
    return "$this->owner owns these $this->fit $this->color pajamas.\n";
  }
  public function setFit($new_fit) {
    $this->fit = $new_fit;
  }
}

$chicken_PJs = new Pajamas("CHICKEN", "noice", "pink");
echo $chicken_PJs->describe();
$chicken_PJs->setFit("smol");
echo $chicken_PJs->describe();

class ButtonablePajamas extends Pajamas {
  private $button_state = "unbuttoned";
  public function describe() {
    return parent::describe() . "These also have buttons that are $this->button_state.\n";
  }
  public function toggleButtons() {
    if ($this->button_state === "unbuttoned") {
      $this->button_state = "buttoned";
    } else {
      $this->button_state = "unbuttoned";
    }
  }
}

$moose_PJs = new ButtonablePajamas("moose");
$moose_PJs->toggleButtons();
echo $moose_PJs->describe();