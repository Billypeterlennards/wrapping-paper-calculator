<?php
/**
 * Challenge Yourselph - 032
 * Wrapping Paper
 *
 * The elves are running low on wrapping paper, and so they need to submit an order for more. They have a list of the dimensions (length l, width w, and height h)
 * of each present, and only want to order exactly as much as they need.
 *
 * Fortunately, every present is a box (a perfect right rectangular prism), which makes calculating the required wrapping paper for each gift a little easier:
 * find the surface area of the box, which is 2 * l * w + 2 * w * h + 2 * h * l. The elves also need a little extra paper for each present: the area of the
 * smallest side.
 *
 * For example:
 *  - A present with dimensions 2x3x4 requires 2 * 6 + 2 * 12 + 2 * 8 = 52 square feet of wrapping paper plus 6 square feet of slack, for a total of 58 square feet.
 *  - A present with dimensions 1x1x10 requires 2 * 1 + 2 * 10 + 2 * 10 = 42 square feet of wrapping paper plus 1 square foot of slack, for a total of 43 square feet.
 *
 * All numbers in the elves’ list are in feet. How many total square feet of wrapping paper should they order?
 *
 * Usage:
 *  php calculate-wrapping-paper.php
 *  php calculate-wrapping-paper.php -v
 *  php calculate-wrapping-paper.php -f box-sizes.txt
 *
 * @author Konr Ness <konr.ness@gmail.com>
 */

use WrapCalculator\BoxFactory;
use WrapCalculator\WrapCalculator;

// parse command options
$options = getopt("f:vh");
$file    = isset($options['f']) ? $options['f'] : "box-sizes.txt";
$verbose = (boolean) isset($options['v']) ? true : false;
$help    = (boolean) isset($options['h']) ? true : false;

if ($help) {
    echo <<<HELP
Usage:
  php calculate-wrapping-paper.php [-f] <file> -v

  -f <file>   Parse file as having a box dimension on each line
  -v          Verbose
HELP;
}

require_once __DIR__ . '/vendor/autoload.php';

$totalSurfaceArea = 0;
$wrapCalculator   = new WrapCalculator();
$boxFactory       = new BoxFactory();

$handle = fopen($file, "r");

while (false !== ($line = fgets($handle, 4096))) {

    $line = trim($line);

    $box = $boxFactory->createBox($line);
    $surfaceArea = $wrapCalculator->getTotalSurfaceArea($box);

    $totalSurfaceArea += $surfaceArea;

    if ($verbose) {
        $verboseOutput = "Dimensions: %' 9s, Total Surface Area: %d";
        echo sprintf($verboseOutput, $line, $surfaceArea) . PHP_EOL;
    }
}

fclose($handle);

$output = "Total Surface Area is: %s sq ft";

echo sprintf($output, number_format($totalSurfaceArea)) . PHP_EOL;
