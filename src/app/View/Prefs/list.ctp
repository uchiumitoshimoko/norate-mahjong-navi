<div id="main">

<?php echo $pankuzu; ?>

<?php if(empty($prefs)): ?>

<section class="rn-pref-section">
    <p class="rn-pref-empty">都道府県が見つかりませんでした。</p>
</section>

<?php else: ?>

<?php
$_pref_name = $prefs['Prefs']['pref_name'];
$_pref_id   = $prefs['Prefs']['pref_id'];
$this->set('meta_description', $_pref_name . 'の健康麻雀・ノーレート麻雀のお店を' . $all_count . '件掲載しています。各市区町村エリアから探せます。');
?>

<!-- ============================================================
     市区町村グリッド
     ============================================================ -->
<section class="rn-pref-section">
    <h1 class="rn-section-title">
        <?php echo h($_pref_name); ?>の健康麻雀・ノーレート麻雀
        <span class="rn-results__count">（<?php echo h($all_count); ?>件）</span>
    </h1>

    <?php if(!empty($matis)): ?>
    <div class="rn-mati-grid">
        <?php foreach($matis as $row): ?>
        <a href="<?php echo TEST; ?>/matis/list/<?php echo h($row['Matis']['pref_id']); ?>/<?php echo h($row['Matis']['mati']); ?>" class="rn-mati-card">
            <div class="rn-mati-card__img<?php echo empty($row['Matis']['store_id']) ? ' rn-mati-card__img--noimage' : ''; ?>">
                <?php if(!empty($row['Matis']['store_id'])): ?>
                <img
                    src="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($row['Matis']['store_id']); ?>/1"
                    alt="<?php echo h($row['Matis']['mati']); ?>"
                    loading="lazy"
                    onerror="this.onerror=null;this.style.display='none';this.parentElement.classList.add('rn-mati-card__img--noimage')">
                <?php endif; ?>
            </div>
            <div class="rn-mati-card__body">
                <span class="rn-mati-card__name"><?php echo h($row['Matis']['mati']); ?></span>
                <span class="rn-mati-card__count"><?php echo h($row['Matis']['count']); ?>件</span>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>


<!-- ============================================================
     店舗一覧（最大20件）
     ============================================================ -->
<section class="rn-pref-section">
    <h2 class="rn-section-title"><?php echo h($_pref_name); ?>の店舗一覧</h2>

    <?php if(empty($store_list)): ?>

    <p class="rn-pref-empty">現在掲載中の店舗はありません。</p>

    <?php else: ?>

    <?php $display_list = array_slice($store_list, 0, 20); ?>
    <div class="rn-results-grid">
        <?php foreach($display_list as $row): ?>
            <?php echo $this->element('store_card', array('row' => $row)); ?>
        <?php endforeach; ?>
    </div>

    <?php if(count($store_list) > 20): ?>
    <div class="rn-pref-more">
        <p class="rn-pref-more__text">
            他<?php echo count($store_list) - 20; ?>件のお店があります
        </p>
        <form method="POST" action="<?php echo TEST; ?>/search/store_list" class="rn-pref-more__form">
            <input type="hidden" name="data[Searchs][pref_id]" value="<?php echo h($_pref_id); ?>">
            <button type="submit" class="rn-pref-more__btn">
                <?php echo h($_pref_name); ?>の全店舗を検索で見る &rsaquo;
            </button>
        </form>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</section>

<?php endif; ?>

</div>
<!--/#main-->
