<?php

use TemplesOfCode\CodeSanity\DiffFinder;
use TemplesOfCode\CodeSanity\Location\LocalLocation;
use Doctrine\Common\Collections\ArrayCollection;
use TemplesOfCode\CodeSanity\Output\PrettyOutput;
use Symfony\Component\Console\Output\StreamOutput;
use TemplesOfCode\CodeSanity\Output\CsvOutput;
use TemplesOfCode\CodeSanity\Location\RemoteLocation;
use TemplesOfCode\CodeSanity\RemoteConnection;

require_once(__DIR__.'/../../vendor/autoload.php');


$location1 = new LocalLocation(__DIR__ . '/source');
$location2 = new RemoteLocation('/tmp/target');

$options = array(
    'executable' => 'ssh',
    'host' => 'remoteHost',
    'port' => 22,
    'username' => 'remoteUser',
);

$remoteConnection = new RemoteConnection($options);
$location2->setRemoteConnection($remoteConnection);

$diffFinder = new DiffFinder();

$diffFinder->setSourceOfTruth($location1);
$diffFinder->addTargetLocation($location2);

/**
 * @var ArrayCollection $differences
 */
$differences = $diffFinder->find();

$outputStream = new StreamOutput(fopen('php://stdout', 'w'));

$prettyOutput = new PrettyOutput($differences,$outputStream);
$prettyOutput->setHeaderEnabled(true);
$prettyOutput->write();

$outputStream->writeln('');

$csvOutput = new CsvOutput($differences, $outputStream);
$csvOutput->setHeaderEnabled(true);
$csvOutput->write();

