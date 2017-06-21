<?php

/* build up an array with settings */

kirbytext::$tags['video'] = array(
  'attr' => array(
  'class',
  'id'
  ),
  'html' => function($tag)
    {

/* get the variables, when set */

  $yakme_video = $tag->attr('video');
  $class = $tag->attr('class');
  $id = $tag->attr('id');

/* return the input-string, with the selected settings */

  $yakme_video = strpos($yakme_video, '?v=')?substr($yakme_video, strpos($yakme_video, '?v=') + 3):substr($yakme_video, strrpos($yakme_video, '/') + 1);

  return '<iframe class="' . $class . '" src="https://www.youtube.com/embed/' . $yakme_video . '?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';

    });

?>