<?php

// Константы можно объявить с помощью функции define():
define('ROOT', realpath(__DIR__.'/../'));

// Или ключевого слова const:
const APP_ENV = 'local';
define('APP_DEBUG', false);
const APP = ROOT.'/app';
const VIEWS = ROOT.'/app/Views';
const CONTROLLERS = ROOT.'/app/Controllers';
const MODELS = ROOT.'/app/Models';
const CONFIG = ROOT.'/config';
const CORE = ROOT.'/core';
const EXT = '.php';
const APPNAME = 'Great Shopaholic';
const SLOGAN = "Let's Build Cool Site";
const LOGS = ROOT.'/logs';
define('DB_CONFIG_FILE', CONFIG.'/db.php');
define('ROUTES', CONFIG.'/routes.php');

const SESSION_PREFIX = 'shop_';

// Cookie defines
define( 'COOKIE_TIMEOUT', (52*7*60*60) ); //cookies set to a year by default

// current time
if( !defined( 'TIME_NOW' ) ) define( 'TIME_NOW', time() );