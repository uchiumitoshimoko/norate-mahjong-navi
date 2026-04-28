<?php $this->set('body_class', 'top-page'); ?>
<div id="main">

<!-- ============================================================
     Section 1: Hero
     ============================================================ -->
<section class="rn-hero">
    <div class="rn-hero__inner">
        <h1 class="rn-hero__catch">全国の健康麻雀・ノーレート麻雀・雀荘を探そう</h1>
        <?php echo $this->Form->create('Searchs', array(
            'url'    => '/search/store_list',
            'method' => 'POST',
            'class'  => 'rn-hero__form',
            'id'     => false
        )); ?>
        <div class="rn-hero__fields">
            <?php echo $this->Form->select('pref_id', $prefectures_id_list, array(
                'label'  => false,
                'div'    => false,
                'class'  => 'rn-hero__select',
                'empty'  => '都道府県を選択'
            )); ?>
            <?php echo $this->Form->text('keyword', array(
                'label'       => false,
                'div'         => false,
                'class'       => 'rn-hero__input',
                'placeholder' => 'キーワードで探す（店名・住所・駅名など）'
            )); ?>
            <button type="submit" class="rn-hero__btn">検索</button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</section>


<!-- ============================================================
     Section 2: 特徴タグから探す
     ============================================================ -->
<section class="rn-tags">
    <h2 class="rn-section-title">特徴から探す</h2>
    <div class="rn-tag-list">
        <a href="<?php echo TEST; ?>/search/" class="rn-tag-btn">
            <span class="icon color3">健康麻雀</span>
            <span class="rn-tag-label">健康麻雀のお店</span>
        </a>
        <a href="<?php echo TEST; ?>/search/" class="rn-tag-btn">
            <span class="icon color2">ノーレートフリー</span>
            <span class="rn-tag-label">フリー営業のお店</span>
        </a>
        <a href="<?php echo TEST; ?>/search/" class="rn-tag-btn">
            <span class="icon color5">競技麻雀</span>
            <span class="rn-tag-label">競技麻雀のお店</span>
        </a>
        <a href="<?php echo TEST; ?>/search/" class="rn-tag-btn">
            <span class="icon color6">要確認</span>
            <span class="rn-tag-label">要電話・予約制</span>
        </a>
    </div>
</section>


<!-- ============================================================
     Section 3: エリアから探す（都道府県グリッド）
     ============================================================ -->
<section class="rn-prefs">
    <h2 class="rn-section-title">エリアから探す</h2>
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


<!-- ============================================================
     Section 4: 新着店舗
     ============================================================ -->
<?php if(!empty($new_store_list)): ?>
<section class="rn-stores-section">
    <h2 class="rn-section-title">
        新着店舗
        <a href="<?php echo TEST; ?>/new_stores" class="rn-section-more">もっと見る &rsaquo;</a>
    </h2>
    <div class="rn-card-scroll">
        <?php foreach($new_store_list as $row): ?>
            <?php echo $this->element('store_card', array('row' => $row)); ?>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>


<!-- ============================================================
     Section 5: ピックアップ店舗
     ============================================================ -->
<?php if(!empty($pickup_store_list)): ?>
<section class="rn-stores-section">
    <h2 class="rn-section-title">
        ピックアップ店舗
        <a href="<?php echo TEST; ?>/pickup_stores" class="rn-section-more">もっと見る &rsaquo;</a>
    </h2>
    <div class="rn-card-scroll">
        <?php foreach($pickup_store_list as $row): ?>
            <?php echo $this->element('store_card', array('row' => $row)); ?>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>


<!-- ============================================================
     Section 6: このサイトについて（折りたたみ）
     ============================================================ -->
<section class="rn-about">
    <details>
        <summary class="rn-about__summary">このサイトについて</summary>
        <div class="rn-about__content">

            <h3>どうしてこのホームページを作ったか</h3>
            <p>
            自分の趣味は雀荘巡りです。<br/>
            <br/>
            これまで多くのお店を巡ってきました。はじめはオンレートという言葉さえ知らないほどに、麻雀はかけるのが当然だと思っていました。<br/>
            <br/>
            その過程で初めて行った健康麻雀のお店が、池袋のパラディーでした。<br/>
            <br/>
            そこで見た圧倒的な光景は今までの自分の雀荘のイメージを根底から覆すものでした。<br/>
            <br/>
            その時から自分の健康麻雀店をはじめとする、ノーレート麻雀店巡りの旅がスタートします。<br/>
            <br/>
            様々なお店では多くのお客さんをお年寄りが占めていました。そういった場所で麻雀の大先輩の方々と麻雀談義をしながら打つのが楽しすぎて、そこからは病みつきになって健康麻雀のお店を巡ることになりました。<br/>
            <br/>
            そのうちに自然と日本健康麻将協会の存在を知り、その過程で偶然にもμ道場という場所にたどり着きます。<br/>
            <br/>
            そこではまた自分の全く知らなかった「競技麻雀」というものの存在がありました。<br/>
            <br/>
            「麻雀は賭けて楽しむもの」というほかに、「健康麻雀のようなマダムから老人まで関係なく楽しめるもの」というものがあるということを知り、ここで新たに「ガチな競技麻雀」というものの存在を知りました。<br/>
            <br/>
            これがまた非常に大きなインパクトでした。<br/>
            <br/>
            このホームページは、健康麻雀・ノーレート麻雀店に行きたいと思った人が、苦労せずにそのお店の存在に気付けることを目的に作りました。今後もしこのページを見た人が、健康麻雀・ノーレートの麻雀の世界に触れるきっかけとなっていただければ幸いです。<br/>
            </p>

            <h3>アイコンの種類について</h3>
            <p>
            <span class="icon color6">要電話</span>　初訪問時には念のために電話をしたほうがよさそうという意味です。完全予約制などのお店には全てこの印をつけました。<br/><br/>
            <span class="icon color2">ノーレートフリー</span>　1時間単位の料金制だった場合か、1ゲームごとの料金制だった場合にこの印をつけました。<br/><br/>
            <span class="icon color5">競技麻雀</span>　通常のノーレートフリーというよりも、競技麻雀よりの場合にこの印をつけてあります。
            </p>

            <h3>掲載依頼などでの未訪問での登録について</h3>
            <p>
            DMなどで掲載依頼をいただいた場合は、<span class="icon color4">訪問済み</span>アイコンが付かない状態でHPなどをチェックして掲載していこうと思います。<br/><br/>
            また、店舗のところには訪問時のブログ記事を紐づけてありますが、「訪問したけれどまだ記事がかけていない店舗」については、<span class="icon color4">訪問済み</span>アイコンを付けた状態で訪問時の一言コメントを添えて掲載する予定です。
            </p>

        </div>
    </details>
</section>

</div>
<!--/#main-->
