<?php $this->set('body_class', 'store-detail-page'); ?>
<div id="main">

<?php echo $pankuzu; ?>

<?php if(empty($store_list)): ?>

<section class="rn-detail">
    <p class="rn-detail__not-found">店舗が見つかりませんでした。</p>
    <a href="<?php echo TEST; ?>/" class="rn-results__back-btn">トップへ戻る</a>
</section>

<?php else: ?>

<?php
$row      = $store_list[0]['Stores'];
$_pref    = isset($prefectures_id_list[$row['pref_id']]) ? $prefectures_id_list[$row['pref_id']] : '';
$_location = $_pref . (!empty($row['mati']) ? $row['mati'] : '');
$this->set('sub_title', $row['store_name'] . '｜' . $_location);

$_desc_parts = array($row['store_name'] . 'は' . $_location . 'の健康麻雀・ノーレート麻雀店です。');
if(!empty($row['address']))  $_desc_parts[] = $row['address'] . '。';
if(!empty($row['comment']))  $_desc_parts[] = mb_substr($row['comment'], 0, 120) . '...';
$this->set('meta_description', implode('', $_desc_parts));
?>

<?php
// --- LocalBusiness 構造化データ ---
$_ld = array(
    '@context' => 'https://schema.org',
    '@type'    => 'LocalBusiness',
    'name'     => $row['store_name'],
    'address'  => array(
        '@type'          => 'PostalAddress',
        'addressCountry' => 'JP',
        'addressRegion'  => $_pref,
    ),
    'url' => Router::url(null, true),
);
if(!empty($row['mati'])) {
    $_ld['address']['addressLocality'] = $row['mati'];
}
if(!empty($row['address'])) {
    $_ld['address']['streetAddress'] = $row['address'];
}
if(!empty($row['comment'])) {
    $_ld['description'] = mb_substr($row['comment'], 0, 200);
}
if(!empty($row['store_mime_1'])) {
    $_ld['image'] = Router::url('/top_pages/read_store_image/' . $row['id'] . '/1', true);
}
if(!empty($row['twitter'])) {
    $_ld['sameAs'] = 'https://twitter.com/' . $row['twitter'];
}
?>
<script type="application/ld+json">
<?php echo json_encode($_ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<article class="rn-detail">

    <!-- 1 + 2. 店舗名 + タグ（カード化） -->
    <div class="store-header">
        <header class="rn-detail__header">
            <h1 class="rn-detail__name store-title">
                <?php echo h($row['store_name']); ?>
                <?php if($row['close_flg']): ?>
                <span class="rn-badge rn-badge--closed">閉店</span>
                <?php endif; ?>
            </h1>
        </header>

        <?php if($row['visit_flg'] && !empty($row['visit_date'])): ?>
        <p class="rn-detail__visit-date">訪問日：<?php echo date('Y年n月j日', strtotime($row['visit_date'])); ?></p>
        <?php endif; ?>

        <div class="rn-detail__tags store-tags">
            <?php if($row['new_flg']):    ?><span class="icon color7">NEW</span><?php endif; ?>
            <?php if($row['pickup_flg']): ?><span class="icon color1">ピックアップ</span><?php endif; ?>
            <?php if($row['kenko_flg']):  ?><span class="icon color3">健康麻雀</span><?php endif; ?>
            <?php if($row['norate_flg']): ?><span class="icon color2">ノーレートフリー</span><?php endif; ?>
            <?php if($row['kyogi_flg']):  ?><span class="icon color5">競技麻雀</span><?php endif; ?>
            <?php if($row['yoyaku_flg']): ?><span class="icon color6">要電話</span><?php endif; ?>
            <?php if($row['visit_flg']):  ?><span class="icon color4">訪問済み</span><?php endif; ?>
        </div>
    </div>

    <!-- 訪問日注意文 -->
    <?php if($row['visit_flg'] && !empty($row['visit_date'])): ?>
    <p class="rn-detail__visit-notice">※ 本記事の内容は<?php echo date('Y年n月j日', strtotime($row['visit_date'])); ?>訪問時点の情報です。最新の営業状況・料金・ルール等は店舗へご確認ください。</p>
    <?php endif; ?>

    <!-- 3. メイン画像 -->
    <?php if(!empty($row['store_mime_1'])): ?>
    <div class="rn-detail__main-img">
        <a href="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($row['id']); ?>/1" target="_blank">
            <img
                src="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($row['id']); ?>/1"
                alt="<?php echo h($row['store_name']); ?>"
                loading="lazy">
        </a>
    </div>
    <?php endif; ?>

    <!-- 4. サブ画像 横スクロール -->
    <?php $has_sub = !empty($row['store_mime_2']) || !empty($row['store_mime_3']) || !empty($row['store_mime_4']); ?>
    <?php if($has_sub): ?>
    <div class="rn-detail__sub-imgs">
        <?php for($i = 2; $i <= 4; $i++): ?>
            <?php if(!empty($row['store_mime_' . $i])): ?>
            <a href="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($row['id']); ?>/<?php echo $i; ?>" target="_blank" class="rn-detail__sub-img-item">
                <img
                    src="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($row['id']); ?>/<?php echo $i; ?>"
                    alt="<?php echo h($row['store_name']); ?> サブ画像<?php echo $i - 1; ?>"
                    loading="lazy">
            </a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

    <!-- 5. 基本情報カード -->
    <div class="store-info-card">
        <?php if(!empty($row['address'])): ?>
        <div class="info-row">
            <span class="label">住所</span>
            <span class="value"><?php echo h($row['address']); ?></span>
        </div>
        <?php endif; ?>
        <?php if(!empty($row['station'])): ?>
        <div class="info-row">
            <span class="label">最寄駅</span>
            <span class="value"><?php echo h($row['station']); ?></span>
        </div>
        <?php endif; ?>
        <?php for($i = 1; $i <= 3; $i++): ?>
            <?php if(!empty($row['homepage_' . $i . '_url'])): ?>
            <div class="info-row">
                <span class="label"><?php echo $i === 1 ? 'HP' : 'HP' . $i; ?></span>
                <span class="value">
                    <a href="<?php echo h($row['homepage_' . $i . '_url']); ?>" target="_blank" rel="noopener">
                        <?php echo !empty($row['homepage_' . $i . '_title']) ? h($row['homepage_' . $i . '_title']) : h($row['homepage_' . $i . '_url']); ?>
                    </a>
                </span>
            </div>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if(!empty($row['twitter'])): ?>
        <div class="info-row">
            <span class="label">Twitter</span>
            <span class="value">
                <a href="https://twitter.com/<?php echo h($row['twitter']); ?>" target="_blank" rel="noopener">
                    @<?php echo h($row['twitter']); ?>
                </a>
            </span>
        </div>
        <?php endif; ?>
        <?php if($row['visit_flg'] && !empty($row['visit_date'])): ?>
        <div class="info-row">
            <span class="label">訪問日</span>
            <span class="value"><?php echo h($row['visit_date']); ?></span>
        </div>
        <?php endif; ?>
        <?php if(!empty($row['blog_url'])): ?>
        <div class="info-row">
            <span class="label">ブログ</span>
            <span class="value">
                <a href="https://free-mj-blog.com/archives/<?php echo h($row['blog_url']); ?>" target="_blank" rel="noopener">
                    トッシイの麻雀日記｜<?php echo h($row['store_name']); ?>
                </a>
            </span>
        </div>
        <?php endif; ?>
    </div>

    <!-- 6. コメント -->
    <?php if(!empty($row['comment'])): ?>
    <div class="rn-detail__comment">
        <h2 class="rn-detail__comment-heading">コメント</h2>
        <p><?php echo nl2br(h($row['comment'])); ?></p>
    </div>
    <?php endif; ?>

    <!-- 7. エリアへのリンク -->
    <div class="rn-detail__area-links">
        <?php if(!empty($_pref)): ?>
        <a href="<?php echo TEST; ?>/prefs/list/<?php echo h($row['pref_id']); ?>" class="rn-detail__area-btn">
            <?php echo h($_pref); ?>のお店一覧
        </a>
        <?php endif; ?>
        <?php if(!empty($row['mati'])): ?>
        <a href="<?php echo TEST; ?>/matis/list/<?php echo h($row['pref_id']); ?>/<?php echo urlencode($row['mati']); ?>" class="rn-detail__area-btn">
            <?php echo h($row['mati']); ?>のお店一覧
        </a>
        <?php endif; ?>
    </div>

</article>

<?php endif; ?>

</div>
<!--/#main-->
