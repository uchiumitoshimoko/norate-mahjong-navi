<?php $this->set('meta_description', '全国の健康麻雀・ノーレート麻雀のお店を都道府県から探せます。北海道から沖縄まで全国の雀荘一覧です。'); ?>
<div id="main">

<section class="rn-pref-section">
    <h1 class="rn-section-title">都道府県一覧</h1>

    <ul class="rn-prefs-grid">
        <?php foreach($prefs as $pref): ?>
        <li class="rn-pref-card">
            <a href="<?php echo TEST; ?>/prefs/list/<?php echo h($pref['Prefs']['pref_id']); ?>">
                <div class="rn-pref-card__img<?php echo empty($pref['Prefs']['store_id']) ? ' rn-pref-card__img--noimage' : ''; ?>">
                    <?php if(!empty($pref['Prefs']['store_id'])): ?>
                    <img
                        src="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($pref['Prefs']['store_id']); ?>/1"
                        alt="<?php echo h($pref['Prefs']['pref_name']); ?>"
                        loading="lazy"
                        onerror="this.onerror=null;this.style.display='none';this.parentElement.classList.add('rn-pref-card__img--noimage')">
                    <?php endif; ?>
                </div>
                <div class="rn-pref-card__body">
                    <span class="rn-pref-card__name"><?php echo h($pref['Prefs']['pref_name']); ?></span>
                    <span class="rn-pref-card__count"><?php echo h($pref['Prefs']['count']); ?>件</span>
                </div>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>

</div>
<!--/#main-->
