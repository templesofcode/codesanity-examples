<?php


use TemplesOfCode\CodeSanity\DiffFinder;
use Doctrine\Common\Collections\ArrayCollection;
use TemplesOfCode\CodeSanity\Output\PrettyOutput;
use Symfony\Component\Console\Output\StreamOutput;
use TemplesOfCode\CodeSanity\Output\CsvOutput;

require_once(__DIR__.'/../../vendor/autoload.php');


$location1 = __DIR__ . '/source';
$location2 = 'remoteUser@remoteHost:/tmp/target2';
$targets = new ArrayCollection();
$targets->add($location2);

$diffFinder = new DiffFinder($location1, $targets);

/**
 * @var ArrayCollection $differences
 */
$differences = $diffFinder->find();

$outputStream = new StreamOutput(fopen('php://stdout', 'w'));

$prettyOutput = new PrettyOutput($differences,$outputStream);
$prettyOutput->setFileNameSpaceLength(
    $prettyOutput->getFileNameSpaceLength() + 25
);
$prettyOutput->setHeaderEnabled(true);
$prettyOutput->write();

$outputStream->writeln('');

$csvOutput = new CsvOutput($differences, $outputStream);
$csvOutput->setHeaderEnabled(true);
$csvOutput->write();

