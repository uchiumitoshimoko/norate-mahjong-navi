<?php
/*
 * GoogleMap検索ページ
 *
 * 現在は Google マイマップの iframe 埋め込みで実装。
 * ただし Google My Maps は iframe 経由の埋め込みに制限があり、
 * ブラウザ設定や Google 側の仕様変更により 403 / 表示不可になる場合がある。
 * そのため「別画面で開く」導線を必ず併記すること。
 *
 * 将来的に Google Maps JavaScript API（マーカークラスタリング等）へ
 * 移行する可能性がある。その場合は AppController の $this->set() で
 * 店舗座標データを渡し、このビューで JS 描画に切り替える想定。
 */
?>
<div id="main">

<section class="rn-pref-section">

    <h1 class="rn-section-title">GoogleMap検索</h1>

    <div class="rn-gmap-card">

        <p class="rn-gmap-desc">
            健康麻雀店・ノーレート麻雀店について、訪問したり存在確認が取れた店舗を順次追加しています。<br>
            各ピンの詳細情報には店舗ごとのコメントを記載しています。
        </p>

        <!-- 別画面で開く導線（iframe が表示されない場合の主要導線） -->
        <div class="rn-gmap-open-btn-wrap">
            <a href="https://www.google.com/maps/d/viewer?mid=1jjSOPuAia8-dv_7WYvLbvsrENWyUeCaT"
               target="_blank" rel="noopener" class="rn-gmap-open-btn">
                地図を別画面で開く &rsaquo;
            </a>
        </div>

        <!-- iframe（My Maps 制限により表示されない場合あり） -->
        <div class="rn-gmap-iframe-wrap">
            <iframe
                src="https://www.google.com/maps/d/u/0/embed?mid=1jjSOPuAia8-dv_7WYvLbvsrENWyUeCaT&ehbc=2E312F&noprof=1"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <p class="rn-gmap-note">
            ※ Google My Maps の仕様により、地図が表示されない場合があります。その場合は上のボタンからご覧ください。
        </p>

        <div class="rn-gmap-links">
            <a href="<?php echo TEST; ?>/prefs/pref_list" class="rn-gmap-links__item rn-gmap-links__item--pref">
                都道府県一覧から探す
            </a>
        </div>

    </div>

</section>

</div>
<!--/#main-->
