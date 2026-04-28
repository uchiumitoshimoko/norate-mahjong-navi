<?php
// $row: UtilityComponent::getStores() の1行分
// $prefectures_id_list: AppController::beforeFilter() でセット済み
$_id       = $row['Stores']['id'];
$_name     = $row['Stores']['store_name'];
$_pref     = isset($prefectures_id_list[$row['Stores']['pref_id']]) ? $prefectures_id_list[$row['Stores']['pref_id']] : '';
$_mati     = $row['Stores']['mati'];
$_station  = $row['Stores']['station'];
$_comment  = $row['Stores']['comment'];
$_close    = $row['Stores']['close_flg'];
$_kenko    = $row['Stores']['kenko_flg'];
$_norate   = $row['Stores']['norate_flg'];
$_kyogi    = $row['Stores']['kyogi_flg'];
$_yoyaku   = $row['Stores']['yoyaku_flg'];
$_visit      = $row['Stores']['visit_flg'];
$_visit_date = $row['Stores']['visit_date'];
$_pickup     = $row['Stores']['pickup_flg'];
$_new        = $row['Stores']['new_flg'];
?>
<article class="store-card<?php echo $_close ? ' store-card--closed' : ''; ?>">
    <a href="<?php echo TEST; ?>/stores/detail/<?php echo h($_id); ?>" class="store-card__link">

        <div class="store-card__img<?php echo empty($row['Stores']['store_mime_1']) ? ' store-card__img--noimage' : ''; ?>">
            <?php if(!empty($row['Stores']['store_mime_1'])): ?>
            <img
                src="<?php echo TEST; ?>/top_pages/read_store_image/<?php echo h($_id); ?>/1"
                alt="<?php echo h($_name); ?>"
                loading="lazy">
            <?php endif; ?>
            <?php if($_close): ?>
            <div class="store-card__closed-label">閉店</div>
            <?php endif; ?>
        </div>

        <div class="store-card__body">

            <div class="store-card__tags">
                <?php if($_new):    ?><span class="icon color7">NEW</span><?php endif; ?>
                <?php if($_pickup): ?><span class="icon color1">ピックアップ</span><?php endif; ?>
                <?php if($_kenko):  ?><span class="icon color3">健康麻雀</span><?php endif; ?>
                <?php if($_norate): ?><span class="icon color2">ノーレートフリー</span><?php endif; ?>
                <?php if($_kyogi):  ?><span class="icon color5">競技麻雀</span><?php endif; ?>
                <?php if($_yoyaku): ?><span class="icon color6">要電話</span><?php endif; ?>
                <?php if($_visit):  ?><span class="icon color4">訪問済み</span><?php endif; ?>
            </div>

            <h3 class="store-card__name"><?php echo h($_name); ?></h3>

            <p class="store-card__area">
                <?php echo h($_pref); ?>
                <?php if(!empty($_mati)): ?>&nbsp;<?php echo h($_mati); ?><?php endif; ?>
            </p>

            <?php if(!empty($_station)): ?>
            <p class="store-card__station"><?php echo h($_station); ?></p>
            <?php endif; ?>

            <?php if($_visit && !empty($_visit_date)): ?>
            <p class="store-card__visit-date">訪問日：<?php echo h($_visit_date); ?></p>
            <?php endif; ?>

            <?php if(!empty($_comment)): ?>
            <p class="store-card__comment"><?php echo h($_comment); ?></p>
            <?php endif; ?>

        </div>
    </a>
</article>
