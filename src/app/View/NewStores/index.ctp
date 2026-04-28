<?php $this->set('meta_description', '全国の健康麻雀・ノーレート麻雀の新着店舗を紹介しています。毎回ランダムに表示されます。'); ?>
<div id="main">

<section class="rn-pref-section">

    <h1 class="rn-section-title">
        新着店舗
        <span class="rn-results__count">（<?php echo count($store_list); ?>件）</span>
    </h1>

    <p class="rn-stores-note">※新着フラグのついているお店の中から、毎回ランダムに最大10件表示しています。</p>

    <?php if(empty($store_list)): ?>

    <div class="rn-results__empty">
        <p class="rn-results__empty-msg">現在新着店舗はありません。</p>
        <a href="<?php echo TEST; ?>/" class="rn-results__back-btn">トップへ戻る</a>
    </div>

    <?php else: ?>

    <div class="rn-results-grid">
        <?php foreach($store_list as $row): ?>
            <?php echo $this->element('store_card', array('row' => $row)); ?>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

</section>

</div>
<!--/#main-->
