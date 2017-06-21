<?php

/* --------------------------------------------------

  YAKME - Settings

--

  'yakme_height' > the height of every field

     0    : the height grows with the content itself
     240  : a fixed height in pixels for the editfield

--

  'yakme_images' > check markdown-images url

    0     : do not check image validity (default)
    1     : check markdown-images for validity

--

  'yakme_autosave' > autosave text while editing

    0     : do not autosave the text
    1     : autosave the text (default)

  Please note; the text is saved in memory, not on
  server or local storage - so closing the browser
  will always delete the unsaved text

--

  'panel.stylesheet' > style the editor / preview
  Check out : '/site/fields/yakme/assets/css/kirby.css'

-------------------------------------------------- */

c::set('yakme_height', 200);
c::set('yakme_images', 1);
c::set('yakme_autosave', 1);
c::set("panel.stylesheet", 'assets/css/yakme.css');

?>