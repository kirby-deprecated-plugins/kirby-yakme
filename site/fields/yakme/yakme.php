<?php

class YakmeField extends TextField {

/* Load some assets (yakme.* = 100% original https://simplemde.com) */

  static public $assets = array(
    "css" => array(
      "simplemde.css",
      "kirby.css"
    ),
    "js" => array(
      "simplemde.js",
      "kirby.js"
    )
  );

  public function content() {

    $content = parent::content();

/* The height of every field; 0 = "auto" (it grows with the content) | 240 = "integer" (a fixed height) */

    $yakme_height = c::get("yakme_height", 320);
    $yakme_height = $yakme_height < 1 ? $yakme_height = "auto" : $yakme_height . "px";
    $yakme_height = "<style>.yakme_wrapper .CodeMirror, .yakme_wrapper .CodeMirror-scroll {min-height: " . $yakme_height . ";height: " . $yakme_height . "}</style>";

/* Check markdown-images (not the Kirby-tag images) for their validity */

    $yakme_images = c::get("yakme_images", 0);
    $yakme_images = "var yakme_images = \"" . $yakme_images . "\";";

/* Autosave the text in memory (not server / local storage) */

    $yakme_autosave = c::get("yakme_autosave", 1);
    $yakme_autosave = "var yakme_autosave = \"" . $yakme_autosave . "\";";

/* Return all the preferences (script and style) */

    return $yakme_height . "<script>" . $yakme_images . $yakme_autosave . "</script>" . $content;

  }

/* Create the textarea, that will become the editor */

  public function input() {

    $input = parent::input();
    $input->tag("textarea");
    $input->removeAttr("type");
    $input->removeAttr("value");
    $input->html($this->value() ? htmlentities($this->value(), ENT_NOQUOTES, "UTF-8") : false);
    $input->data("field","yakmefield");
    $input->addClass("yakme_editor");

    return $input;

  }

/* Add class to wrapper field, that show | hide certain buttons in the toolbar */

/* Show buttons, always wins */

  public function element() {

    $element = parent::element();

    if(isset($this->show)) {

      if(count($this->show) != 0) {
        $visible = $this->show;

          foreach ($visible as &$value) {
            $value =  $value . "_show";
          }

        $element->addClass("yakme_show " . implode(" ", $visible));
      }

    }

/* Hide button, only when there is no show option */

    else if(isset($this->hide)) {

      if(count($this->hide) != 0) {
        $hidden = $this->hide;

          foreach ($hidden as &$value) {
            $value = $value . "_hide";
          }

        $element->addClass("yakme_hide " . implode(" ", $hidden));
      }

    }

    return $element;

  }

}

?>