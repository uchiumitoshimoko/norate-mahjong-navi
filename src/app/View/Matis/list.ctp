<div id="main">

<?php echo $pankuzu; ?>

<?php if(empty($matis)): ?>

<section class="rn-pref-section">
    <p class="rn-pref-empty">市区町村が見つかりませんでした。</p>
    <?php if(!empty($prefs)): ?>
    <a href="<?php echo TEST; ?>/prefs/list/<?php echo h($prefs['Prefs']['pref_id']); ?>" class="rn-mati-back-btn">
        <?php echo h($prefs['Prefs']['pref_name']); ?>の全エリアを見る &rsaquo;
    </a>
    <?php endif; ?>
</section>

<?php else: ?>

<?php
$_pref_name = $prefs['Prefs']['pref_name'];
$_pref_id   = $prefs['Prefs']['pref_id'];
$_mati_name = $matis['Matis']['mati'];
$_mati_count = $matis['Matis']['count'];
$this->set('meta_description', $_pref_name . $_mati_name . 'の健康麻雀・ノーレート麻雀のお店を' . $_mati_count . '件掲載しています。');
?>

<!-- ============================================================
     店舗一覧
     ============================================================ -->
<section class="rn-pref-section">
    <h1 class="rn-section-title">
        <?php echo h($_pref_name); ?>&nbsp;<?php echo h($_mati_name); ?>の健康麻雀・ノーレート麻雀
        <span class="rn-results__count">（<?php echo h($_mati_count); ?>件）</span>
    </h1>

    <?php if(empty($store_list)): ?>

    <div class="rn-mati-empty">
        <p class="rn-pref-empty">現在このエリアに掲載中の店舗はありません。</p>
    </div>

    <?php else: ?>

    <div class="rn-results-grid">
        <?php foreach($store_list as $row): ?>
            <?php echo $this->element('store_card', array('row' => $row)); ?>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

    <!-- エリアへ戻る導線 -->
    <div class="rn-mati-nav">
        <a href="<?php echo TEST; ?>/prefs/list/<?php echo h($_pref_id); ?>" class="rn-mati-back-btn">
            &lsaquo; <?php echo h($_pref_name); ?>の全エリアを見る
        </a>
    </div>
</section>

<?php endif; ?>

</div>
<!--/#main-->
