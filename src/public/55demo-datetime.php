<?php

/**
 * 55demo-datetime.php
 * 
 * Date and Time Handling
 *     - This script demonstrates how to handle date and time in PHP.
 *     - PHP provides a DateTime class for date and time manipulation.
 *     - Use cases:
 *         - Formatting dates and times
 *         - Calculating differences between dates
 *         - Handling time zones
 *         - Parsing date strings
 *     - The DateTime class provides methods for creating, formatting, and manipulating date and time.
 * 
 * Methods:
 *    - DateTime::createFromFormat() - Create a DateTime object from a specific format.
 * *    - DateTime::format() - Format a DateTime object as a string.
 *   - DateTime::setTimezone() - Change the timezone of a DateTime object.
 * *   - DateTime::getTimezone() - Get the timezone of a DateTime object.
 * *   - DateTime::diff() - Calculate the difference between two DateTime objects.
 *      - DateTime::setDate() - Set the date of a DateTime object.
 * *      - DateTime::setTime() - Set the time of a DateTime object.
 */

require __DIR__.'/../vendor/autoload.php';

$dateTime = new DateTime('2025-06-12 3:30PM');

var_dump($dateTime);

echo "\n".$dateTime->getTimezone()->getName() .' - ' . $dateTime->format('m/d/Y g:i A'); // Get the timezone name

//change the timezone
$dateTime->setTimezone(new DateTimeZone('Asia/Kolkata'));

echo "\n".$dateTime->getTimezone()->getName() . ' - '.$dateTime->format('m/d/Y g:i A');; // Get the timezone name after changing it

var_dump($dateTime);

echo "Use of creatFromFormat() to create a DateTime object from a specific format:\n";

//use case for DateTime::createFromFormat()
$date = '11/06/2025'; // m/d/Y H:i:s format
$dateTime = DateTime::createFromFormat('m/d/Y', $date);
var_dump($dateTime);

//Compare two DateTime objects
$dateTime1 = new DateTime('2025-06-12 3:30PM');
$dateTime2 = new DateTime('2025-06-12 4:30PM');
$diff = $dateTime1->diff($dateTime2);
echo "\nDifference between two DateTime objects:\n";
var_dump($diff); // this is the DateInterval object
echo "Difference in days: " . $diff->days . "\n"; // Get the difference in days
echo "Difference in hours: " . $diff->h . "\n"; // Get the difference in hours

echo "\n" . $diff->format('%R%a days %H hours %I minutes %S seconds') . "\n"; // Format the difference

var_dump($dateTime1 < $dateTime2);

//Example of DateInterval object
$interval = new DateInterval('P1D'); // 1 day interval
$dateTime1->add($interval); // Add 1 day to the first DateTime object
echo "\nAfter adding 1 day to the first DateTime object:\n";
var_dump($dateTime1->format('Y-m-d H:i:s')); // Print the updated date and time
//Example of DatePeriod object
//DatePeriod is used to iterate over a range of dates
$start = new DateTime('2025-06-01');
$end = new DateTime('2025-06-10');
$period = new DatePeriod($start, new DateInterval('P1D'), $end);
echo "\nDatePeriod object:\n";
foreach ($period as $date) {
    echo $date->format('Y-m-d') . "\n"; // Print each date in the period
}
//Example of DateTimeImmutable
$dateTimeImmutable = new DateTimeImmutable('2025-06-12 3:30PM');
echo "\nDateTimeImmutable object:\n";
var_dump($dateTimeImmutable);