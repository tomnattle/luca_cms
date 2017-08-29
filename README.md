# luca_cms

<?php include $view . "/top.blade.php"?>

<?php include $view . "/bottom.blade.php"?>

<a href="<?php echo $_url('news',[]);?>">新闻</a>
<a href="<?php echo $_url('products',[]);?>">商品</a>

{{str_limit(strip_tags($article['context']), 150)}}
