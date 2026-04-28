<!DOCTYPE html>
<html lang="ja">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143787333-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143787333-1');
</script>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php
$sub_title  = isset($sub_title)  ? $sub_title  : '';
$page_title = isset($page_title) ? $page_title : '';
?>

<?php
if (!empty($page_title)) {
    // 各 Controller で明示的にセットされた SEO 最適化タイトルを使用
    $title = $page_title;
} else {
    // 旧フォールバック（page_title 未設定のページはこのまま）
    if (!empty($sub_title)) {
        if ($this->name == "Stores" && $this->action == "detail") {
            $title = $sub_title . "の紹介";
        } else {
            $title = $sub_title . "の" . $title;
        }
    }
    if ($title == "ホームのノーレート麻雀ナビ") {
        $title = "ノーレート麻雀ナビ｜全国の健康麻雀・フリー雀荘検索";
    }
}
?>

<script type="application/ld+json">
{
"@context" : "http://schema.org",
"@type": "WebSite",
"name" : "ノーレート麻雀ナビ",
"url" : "https://kenko-norate-mahjong.com/"
}
</script>

<?php $_page_url = 'https://kenko-norate-mahjong.com' . $this->request->here; ?>
<title><?=$title?></title>
<link rel="canonical" href="<?php echo h($_page_url); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if(!empty($noindex)): ?>
<meta name="robots" content="noindex, follow">
<?php endif; ?>

<?php
$_template_desc = (!empty($sub_title) && $sub_title != 'ホーム')
    ? $sub_title . 'の健康麻雀、ノーレート麻雀店、ノーレート雀荘です。' . $sub_title . 'の健康麻雀・ノーレート麻雀店に行きたいと思った人が便利にお店を探せることを目的に作成しました。'
    : '健康麻雀、ノーレート麻雀店、ノーレート雀荘の検索サイトです。このホームページは、健康麻雀・ノーレート麻雀店に行きたいと思った人が、苦労せずにそのお店の存在に気付けることを目的に作りました。今後もしこのページを見た人が、健康麻雀・ノーレートの麻雀の世界に触れるきっかけとなっていただければ幸いです。';
$_desc = !empty($meta_description) ? $meta_description : $_template_desc;
?>
<meta name="title" content="<?=$title?>">
<meta name="description" content="<?php echo h($_desc); ?>">

<meta property="og:title" content="<?=$title?>">
<meta property="og:description" content="<?php echo h($_desc); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo h($_page_url); ?>">

<link rel="stylesheet" href="<?=TEST?>/css/style.css?<?=date('YmdHis')?>">
<script src="<?=TEST?>/js/openclose.js"></script>
<script src="<?=TEST?>/js/fixmenu.js"></script>
<script src="<?=TEST?>/js/fixmenu_pagetop.js"></script>
<script src="<?=TEST?>/js/ddmenu_min.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->

<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7005092173769674"
     crossorigin="anonymous"></script>


</head>

<body class="<?php echo !empty($body_class) ? h($body_class) : ''; ?>">

<div itemscope itemtype="https://schema.org/WebSite">
  <meta itemprop="url" content="https://kenko-norate-mahjong.com/"/>
  <meta itemprop="name" content="ノーレート麻雀ナビ"/>
</div>
  
<?php include("header.ctp");?>

<?php include("menubar.ctp");?>



<div id="contents" class="inner">
<div id="contents-in">

<?php echo $this->fetch('content'); ?>

<?php
/* サイドバー廃止（2025-04 Phase2）
   将来復活させる場合は以下のコメントを外し、style.css の
   "#sub, #side { display: none }" ブロックも削除すること。
include("left_sub.ctp");
*/
?>


</div>
<!--/#contents-in-->

<?php
/* サイドバー廃止（2025-04 Phase2）
include("right_sub.ctp");
*/
?>

</div>
<!--/#contents-->

<?php include("footer.ctp");?>

<!--ページの上部に戻る「↑」ボタン-->
<p class="nav-fix-pos-pagetop"><a href="#">↑</a></p>

<!--メニュー開閉ボタン-->
<div id="menubar_hdr" class="close"></div>
<!--メニューの開閉処理条件設定　900px以下-->
<script>
if (OCwindowWidth() <= 900) {
	open_close("menubar_hdr", "menubar-s");
}
</script>

</body>
</html>
