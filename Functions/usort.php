<?php
$users = [
  ['name' => 'Igor', 'age' => 19],
  ['name' => 'Danil', 'age' => 1],
  ['name' => 'Vovan', 'age' => 4],
  ['name' => 'Matvey', 'age' => 16],
];

$cmp = function ($a, $b) {
  if ($a['age'] === $b['age']) {
    return 0;
  }
  return $a['age'] > $b['age'] ? 1 : -1;
};

usort($users, $cmp);

print_r($users);
// => [
//      ['name' => 'Danil', 'age' => 1],
//      ['name' => 'Vovan', 'age' => 4],
//      ['name' => 'Matvey', 'age' => 16],
//      ['name' => 'Igor', 'age' => 19],
//    ];

