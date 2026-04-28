<style type="text/css">

.sentaku {
    display: block;
    width: 20px;
    height: 20px;
    background: url(/global/images/pn_current.png) no-repeat center center;
    color: #fff;
    text-align: center;
    line-height: 22px;
}

</style>

<?
	if(@$this->request->data['syokusyu_type'] == "executive") {
?>
	<img src="/resources/images/executive/ttl_executive_pc.jpg" alt="年収700万以上のエグゼクティブ求人" title="年収700万以上のエグゼクティブ求人" />

<?
	}
?>

  <div class="pageNav">
    <div class="nowshow">
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
      <span class="count"><?=$count?></span>件中　<?=$now?>～<?=$end?>件を表示
    </div>
    
	<div class="pagination">
		<ul>
		    <?php echo $this->Paginator->prev(__(''), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
		    <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'sentaku','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
		    <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
		</ul>                                          
	</div>
  </div>
  
  <div id="topList" class="topList">
    <ul class="list_new">
    
    <?
    	foreach($jobs as $job) {

			$new_flg = "";
			if($job['Jobs']['new_flg'] == "1") {
				$new_flg = "class='new'";
			}
			
	?>
			<li class="doubleDot">
				<section class="inner">
					<a href="/search/detail/<?=$job['Jobs']['id']?>" <?=$new_flg?>>
						<div class="date">求人ID：<?=$job['Jobs']['job_id']?></div>
						<h3 class="job"><?=$job['Jobs']['title']?></h3>
						<div class="location company-name">会社名：<?=$job['Jobs']['company_name']?></div>
						<div class="location">勤務地：<?=$job['Jobs']['kinmusaki_name_1']?></div>
						<dl class="ar">
							<dt>予定最高年収</dt>
							<dd><span><?=number_format($job['Jobs']['nensyu_max'])?></span>万円</dd>
						</dl>
						<hr />
						<p class="jobDesc">
							<?=$job['Jobs']['kinmu_naiyo']?>
						</p>
					</a>
				</section>
			</li>
	<?
		}
	?>
          </ul>
  </div>


  <div class="pageNav">
    <div class="nowshow">

      <span class="count"><?=$count?></span>件中　<?=$now?>～<?=$end?>件を表示
    </div>
    
	<div class="pagination">
		<ul>
		    <?php echo $this->Paginator->prev(__(''), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
		    <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'sentaku','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
		    <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
		</ul>                                          
	</div>
  </div>



<script>
$(function(){
	$('.job').trunk8({
		lines: 2
  });
	
	$('.company-name').trunk8({
		lines: 1
	});
	
	$(".jobDesc").trunk8({
		lines: 4
	});
	
	$('#topList a').tile(3);
	$('.job').tile(3);
});
</script>


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
<!--  サイト内検索/製品カテゴリ/製品一覧ページタグ ---->
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