<?php $this->set('body_class', 'search-results-page'); ?>
<?php $this->set('noindex', true); ?>
<div id="main">

<section class="rn-results">

    <h2 class="rn-results__heading">
        <?php if(!empty($search_text)): ?>
            <?php echo h($search_text); ?>&nbsp;の検索結果
        <?php else: ?>
            検索結果
        <?php endif; ?>
        <span class="rn-results__count">（<?php echo count($store_list); ?>件）</span>
    </h2>

    <?php if(empty($store_list)): ?>

    <div class="rn-results__empty">
        <p class="rn-results__empty-msg">条件に一致するお店が見つかりませんでした。</p>
        <ul class="rn-results__empty-tips">
            <li>キーワードを変えて再検索してみてください。</li>
            <li>都道府県のみで検索すると件数が増えることがあります。</li>
        </ul>
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
