<footer id="rn-footer">
<div class="rn-footer__inner inner">

    <!-- エリアから探す（SEO内部リンク） -->
    <section class="rn-footer-area">
        <details class="rn-footer-pref-details" open>
            <summary class="rn-footer-pref-summary">エリアから探す</summary>
            <div class="rn-footer-pref-grid">
                <?php foreach($prefs_count as $pref): ?>
                <a href="<?=TEST?>/prefs/list/<?=h($pref['Prefs']['pref_id'])?>" class="rn-footer-pref-link">
                    <?=h($pref['Prefs']['pref_name'])?><span class="rn-footer-pref-count"><?=h($pref['Prefs']['count'])?>件</span>
                </a>
                <?php endforeach; ?>
            </div>
        </details>
    </section>

    <div class="rn-footer__copy">
        <small>Copyright&copy; <a href="<?=TEST?>/">ノーレート麻雀ナビ</a> All Rights Reserved.</small>
        <span class="rn-footer__credit"><a href="https://template-party.com/" target="_blank" rel="noopener">Web Design:Template-Party</a></span>
    </div>

</div>
</footer>

<?php if($this->request->isMobile()): ?>
<footer class="rn-sp-nav-footer">
  <nav class="global-nav">
    <ul class="nav-list">
      <li class="nav-item">
        <a href="<?=TEST?>/">
          <i class="fas fa-home" style="color:black;"></i>
          <span style="color:black;">Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=TEST?>/prefs/pref_list">
          <i class="fas fa-search-location" style="color:green;"></i>
          <span style="color:green;">都道府県</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=TEST?>/new_stores">
          <i class="fas fa-map-marker-alt" style="color:blue;"></i>
          <span style="color:blue;">新着</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=TEST?>/pickup_stores">
          <i class="fas fa-map-marker-alt" style="color:orange;"></i>
          <span style="color:orange;">ピックアップ</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=TEST?>/google_maps">
          <i class="fas fa-map-marker-alt" style="color:red;"></i>
          <span style="color:red;">Map検索</span>
        </a>
      </li>
    </ul>
  </nav>
</footer>
<?php endif; ?>
