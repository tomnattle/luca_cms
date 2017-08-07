<?php 
$name = "cmsa";
$views = [
    'zkgk',
    'lrld',
    'zkdt',
    'zkzj',
    'msjt',
    'msyj',
    'zkjl',
    'msyl',
    'lxwm'
];

$viewContent = '<?php include $view . "/top.blade.php"?>
<?php include $view . "/bottom.blade.php"?>';

$replaceTags = [
    '/cmsa//' => '/cmsa/'
    //'src="' => 'src="/company/' . $name . '/'
];


#buildView($views, $name, $viewContent);

function buildView(){
    global $views, $name, $viewContent;

    foreach ($views as $view) {
        $file = __dir__ . '/resources/views/company/' . $name . '/' . $view . '.blade.php';
        if(!is_file($file)){
            system('touch ' . $file);
        }else{
            file_put_contents($file, $viewContent);
        }
        
    }
}

function replaceView(){
    global $views, $name, $replaceTags;
    foreach ($views as $view) {
        $file = __dir__ . '/resources/views/company/' . $name . '/' . $view . '.blade.php';
        $html = file_get_contents($file);
        foreach ($replaceTags as $key => $value) {
            $html = str_replace($key, $value, $html);
        }
        file_put_contents($file, $html);
    }
}

if(!isset($argv[1])){
    print(' --buildView' . PHP_EOL);
    print(' --replaceView' . PHP_EOL);
}else{
    $func = $argv[1];
    $func(); 
}



?>