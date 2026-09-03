<?php

// Vercel's deployment directory (/var/task) is read-only. Laravel writes its
// package/service manifests and compiled Blade views during boot, so redirect
// those runtime-generated files to the writable /tmp directory.
$runtimeCache = sys_get_temp_dir() . '/laravel-cache';
$runtimeViews = sys_get_temp_dir() . '/laravel-views';

foreach ([$runtimeCache, $runtimeViews] as $directory) {
    if (! is_dir($directory)) {
        @mkdir($directory, 0775, true);
    }
}

putenv("APP_PACKAGES_CACHE={$runtimeCache}/packages.php");
putenv("APP_SERVICES_CACHE={$runtimeCache}/services.php");
putenv("VIEW_COMPILED_PATH={$runtimeViews}");
// Keep the function stateless: these drivers do not attempt to write under
// the read-only deployment directory. Use a managed/external database for
// persistent application data.
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_DRIVER=array');
putenv('LOG_CHANNEL=stderr');
$_ENV['APP_PACKAGES_CACHE'] = "{$runtimeCache}/packages.php";
$_ENV['APP_SERVICES_CACHE'] = "{$runtimeCache}/services.php";
$_ENV['VIEW_COMPILED_PATH'] = $runtimeViews;
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['CACHE_DRIVER'] = 'array';
$_ENV['LOG_CHANNEL'] = 'stderr';

require __DIR__ . '/../public/index.php';
