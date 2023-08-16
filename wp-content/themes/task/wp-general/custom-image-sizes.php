<?php

//region custom image sizes

$image_dimensions_increased = 50;

function custom_image_sizes()
{
  global $image_dimensions_increased;
  /* Please follow the following template to build all image sizes
  /*  add_image_size('img-48-48', 48 + $image_dimensions_increased, 48 + $image_dimensions_increased);
  image naming configuration
    ***** Round numbers to the nearest number up
    width = image width
    height =  image height
  */


  // region  sizes between 100
    \Theme\Helpers::add_image_size('img-48-48', 48, 48);
  // endregion  sizes between 100
  \Theme\Helpers::add_image_size('img-167-50', 167, 50);
  \Theme\Helpers::add_image_size('img-145-30', 145, 30);
  //  region sizes between  200

  //  endregion sizes between  200

  //  region sizes between  300
  \Theme\Helpers::add_image_size('img-385-250', 385, 250);
  \Theme\Helpers::add_image_size('img-325-240', 325, 240);

  //  endregion sizes between  300

  //  region sizes between  400
  \Theme\Helpers::add_image_size('img-400-255', 400, 225);

  //  region sizes between  500

  //  endregion sizes between  500

  //  region sizes between  600
  \Theme\Helpers::add_image_size('img-600-300', 600, 300);
  //  endregion sizes between  600

  //  region sizes between  800
  \Theme\Helpers::add_image_size('img-825-404', 825, 404);
  //  endregion sizes between  800
}

custom_image_sizes();

//endregion custom image sizes

