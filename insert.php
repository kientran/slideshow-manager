<?php

include('php/dbFacile.php');

$db = dbFacile::open('mysql', 'panel-manager', 'root', 'root', 'localhost');

$id = $db->insert(array(
    'title' => 'New Coordinators', 
    'subtitle' => 'Congratulations to Shawndra Hall and Lisa Frank', 
    'photourl' => 'http://www.fwyam.org/images/featured/hallfrank.jpg', 
    'photoalt' => 'Lisa and Shawndra',
    'linkurl' => 'http://www.fwyam.org/2009/08/new-coordinators-team-leaders/' , 
    'bannercolor' => 'red'
    ), 'Panels');

$id = $db->insert(array(
    'title' => 'Theology on Tap Tuesdays in September', 
    'subtitle' => 'Buffalo Wild Wings in South Hulen', 
    'photourl' => 'http://www.fwyam.org/images/featured/content16.jpg', 
    'photoalt' => 'Theology on Tap',
    'linkurl' => 'http://www.fwyam.org/teams/theology-on-tap/fort-worth/' , 
    'bannercolor' => 'blue'
    ), 'Panels');

$id = $db->insert(array(
    'title' => 'Young Adult Retreat October 10', 
    'subtitle' => 'Strength for the Journey One Day Retreat', 
    'photourl' => 'http://www.fwyam.org/images/featured/retreat.jpg', 
    'photoalt' => 'Retreat',
    'linkurl' => 'http://www.fwyam.org/teams/retreats/' , 
    'bannercolor' => 'orange'
    ), 'Panels');

$id = $db->insert(array(
    'title' => 'Flag Football November 7', 
    'subtitle' => 'Annual Charity Event at St. Andrews', 
    'photourl' => 'http://www.fwyam.org/images/featured/football.jpg', 
    'photoalt' => 'Flag Football',
    'linkurl' => 'http://www.fwyam.org/teams/athletics/flag-football/' , 
    'bannercolor' => 'blue'
    ), 'Panels');


?>
