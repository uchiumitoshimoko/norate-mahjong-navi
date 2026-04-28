  <h1 class="ttl"><img src="/sp/resources/images/search/title_result.png" alt="求人検索結果" width="154" height="24"></h1>
  <div id="topList" class="topList">

    <?
    	foreach($jobs as $job) {

			$new_flg = "";
			if($job['Jobs']['new_flg'] == "1") {
				$new_flg = "class='new'";
			}
			
	?>
	
    <section class="new">
      <div class="inner">
        <a href="/search/detail/<?=$job['Jobs']['id']?>" <?=$new_flg?>>
          <div class="date">求人ID：<?=$job['Jobs']['job_id']?></div>
          <h1 class="job"><?=$job['Jobs']['title']?></h1>
          <div class="date" style="margin-top:10px;">会社名：<?=$job['Jobs']['company_name']?></div>
          <div class="date">勤務地：<?=$job['Jobs']['kinmusaki_name_1']?></div>
          <dl class="ar">
            <dt>予定最高年収</dt>
            <dd><span><?=number_format($job['Jobs']['nensyu_max'])?></span>万円</dd>
          </dl>
        </a>
      </div>
    </section>

	<?
		}
	?>
    
    

      </div>
 
 
 
     <?
    	$page = $this->Paginator->request->params['paging']['Jobs'];
    	
    	$now = ($page['page']-1) * $page['current'] + 1;
    	$end = ($page['page']-1) * $page['current'] + $page['current'];
    	
    	if($end > $count) {
			$end = $count;
		}
		else if($count == 0) {
			$now = "0";
			$end = "0";
		}
    ?>

<span style="text-align:center">
<?
echo $this->Paginator->prev('[前へ]', array(), null, array('class' => 'prev disabled'));  
echo $this->Paginator->next('[次へ]', array(), null, array('class' => 'next disabled')); 
?>
</span>


<!--  サイト内検索/製品カテゴリ/製品一覧ページタグ ---->
<?
	$criteo_list = array();
	foreach($jobs as $job) {
		$criteo_list[] = "\"" . $job['Jobs']['job_id'] . "\"";
		
		// 3件になったら終わり
		if(count($criteo_list) >= 3) {
			break;
		}
	}
	
	$criteo_str = implode(",", $criteo_list);
?>	

<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">


var ua = navigator.userAgent;
var site_type = "";
if(ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0){
    site_type = "m";
}else if(ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0){
    site_type = "t";
}else{
    site_type = "d";
}

window.criteo_q = window.criteo_q || [];
window.criteo_q.push(
        { event: "setAccount", account: 37761 },
        { event: "setSiteType", type: site_type },
        { event: "viewList", item: [<?=$criteo_str?>] }
);
</script>