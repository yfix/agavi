<?php

/**
 * Data file for Pacific/Guam timezone, compiled from the olson data.
 *
 * Auto-generated by the phing olson task on 08/17/2009 13:26:25
 *
 * @package    agavi
 * @subpackage translation
 *
 * @copyright  Authors
 * @copyright  The Agavi Project
 *
 * @since      0.11.0
 *
 * @version    $Id$
 */

return array (
  'types' => 
  array (
    0 => 
    array (
      'rawOffset' => 34740,
      'dstOffset' => 0,
      'name' => 'LMT',
    ),
    1 => 
    array (
      'rawOffset' => 36000,
      'dstOffset' => 0,
      'name' => 'GST',
    ),
    2 => 
    array (
      'rawOffset' => 36000,
      'dstOffset' => 0,
      'name' => 'ChST',
    ),
  ),
  'rules' => 
  array (
    0 => 
    array (
      'time' => -3944626740,
      'type' => 0,
    ),
    1 => 
    array (
      'time' => -2177487540,
      'type' => 1,
    ),
    2 => 
    array (
      'time' => 977493600,
      'type' => 2,
    ),
  ),
  'finalRule' => 
  array (
    'type' => 'static',
    'name' => 'ChST',
    'offset' => 36000,
    'startYear' => 2001,
  ),
  'name' => 'Pacific/Guam',
);

?>