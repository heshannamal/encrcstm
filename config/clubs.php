<?php

declare(strict_types=1);

// Default club roster (managed on the Laravel backend). A future admin module
// may override it with database records; do not inject raw HTML into names.
return [
 'volleyball' => [
  ['name'=>'Marin Volleyball'], ['name'=>'Woodcreek High School'],
  ['name'=>'Infinite Training Volleyball Club'], ['name'=>'Endless Beach Volleyball'],
  ['name'=>'High Impact Volleyball'], ['name'=>'Kingtide Volleyball Club'],
  ['name'=>'Evolve Volleyball Club'], ['name'=>'Amplify Volleyball'],
  ['name'=>'Holy Angels School'], ['name'=>'Antelope Volleyball Club'],
 ],
 'default' => [
  ['name'=>'Redwood Lacrosse'], ['name'=>'Baytown Baddies'],
  ['name'=>'San Rafael Blue Jays'], ['name'=>'Corte Madera FC'],
  ['name'=>'Metta Yoga'], ['name'=>'San Rafael Soccer Club'],
  ['name'=>'FC Nova'], ['name'=>'24/8 Basketball'],
 ],
];
