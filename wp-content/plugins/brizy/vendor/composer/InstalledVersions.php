<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => '3465441709effb3416861daa420f53619ad36ca5',
    'name' => 'brizy/brizy',
  ),
  'versions' => 
  array (
    'bagrinsergiu/brizy-merge-page-assets' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '883490c9302aa2da9ccfd71b74c4e216ce1cd6f2',
    ),
    'bagrinsergiu/brizy-migration-utils' => 
    array (
      'pretty_version' => '1.4.2',
      'version' => '1.4.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '6af1f8e3e181d1d262bd32cb96bf08ef9ead59df',
    ),
    'bagrinsergiu/content-placeholder' => 
    array (
      'pretty_version' => '2.0.5',
      'version' => '2.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '3be1d4e2033c6c074f12391fc796e5ab9a9bc72d',
    ),
    'brizy/brizy' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '3465441709effb3416861daa420f53619ad36ca5',
    ),
    'enshrined/svg-sanitize' => 
    array (
      'pretty_version' => '0.13.3',
      'version' => '0.13.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bc66593f255b7d2613d8f22041180036979b6403',
    ),
    'knplabs/gaufrette' => 
    array (
      'pretty_version' => 'v0.7.0',
      'version' => '0.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a0627e91e8753f442eea6560cb347151cd306b2c',
    ),
    'select2/select2' => 
    array (
      'pretty_version' => '4.1.0-rc.0',
      'version' => '4.1.0.0-RC0',
      'aliases' => 
      array (
      ),
      'reference' => '9ce61fd297fd2922fe771debea8b24dfd219a49a',
    ),
    'shortpixel/shortpixel-php' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => '940c299b7a449d6621103c195d7094b1976861a7',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
        0 => '2.5.x-dev',
      ),
      'reference' => '6f981ee24cf69ee7ce9736146d1c57c2780598a8',
    ),
    'symfony/dotenv' => 
    array (
      'pretty_version' => '5.4.x-dev',
      'version' => '5.4.9999999.9999999-dev',
      'aliases' => 
      array (
      ),
      'reference' => '7189ac0d3f99c7526950f13ff337d2b9a2bedf21',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
        0 => '1.23.x-dev',
      ),
      'reference' => '46cd95797e9df938fdd2b03693b5fca5e64b01ce',
    ),
    'tburry/pquery' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
        0 => '9999999-dev',
      ),
      'reference' => 'c28159447f4cec57f2a016c2ec15f5b754b58052',
    ),
    'twig/twig' => 
    array (
      'pretty_version' => 'v1.42.5',
      'version' => '1.42.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '87b2ea9d8f6fd014d0621ca089bb1b3769ea3f8e',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {

foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
