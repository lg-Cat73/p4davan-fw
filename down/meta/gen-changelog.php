#!/usr/bin/php
<?php
/* --------------------------------------------
changelog generator by HuangYeWuDeng
----------------------------------------------*/

$devices = [
  'A3004NS',
  'NEWIFI-D1',
  'NEWIFI-Y1',
  'PSG1218-K2',
  'PSG1218-256M',
  'YOUKU-L1',
];

$todayDate = date('Y-m-d');

if (isset($argv[1]) && !empty($argv[1])) {
  $date = $argv[1];
} else {
  $date = $todayDate;
}

//find changelog
$changlogRaw = __DIR__ . '/changelog/' . $date . '.txt';

if(!file_exists($changlogRaw))  {
  touch($changlogRaw);
  die(sprintf("Err: changelog file: %s does not exists.\n", $changlogRaw));
}

$changelogContent = file_get_contents($changlogRaw);

foreach($devices as $deviceName) {
  writeNewChangelog($deviceName, $changelogContent);
}

function writeNewChangelog($deviceName, $changelogContent) {
  $deviceChangelogFileName = @file_get_contents(__DIR__ . '/../../docs/release/'. $deviceName . '.txt');
  $deviceChangelogFileName = trim($deviceChangelogFileName);
  if (empty($deviceChangelogFileName)) {
    printf("err: device ver file %s does not exists, skip ...\n", $deviceName);
    return;
  }
  $deviceChangelogFileName = __DIR__ . '/../rom/'. $deviceName . '/' . $deviceChangelogFileName .'.changelog.txt';
  $deviceId = file_get_contents(__DIR__ . '/'. $deviceName . '.txt');
  $header = file_get_contents(__DIR__ . '/_header.txt');
  $footer = file_get_contents(__DIR__ . '/_footer.txt');
  $changelog = $deviceId . $header . $changelogContent . $footer;
  printf("gen changelog: %s\n", $deviceChangelogFileName);
  file_put_contents($deviceChangelogFileName, $changelog);
}
