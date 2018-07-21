<?php
namespace Deployer;

require 'recipe/yii2-app-advanced.php';

// Project name
set('application', 'basic');

// Project repository
set('repository', '');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('release_path','release');
// Hosts
/*
host('project.com')
    ->set('deploy_path', '~/{{application}}');    
   */ 
// Tasks
task('test', function () {
    run('cd {{release_path}}');
});

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

