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