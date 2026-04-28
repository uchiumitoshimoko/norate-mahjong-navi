<script src="/global/lib/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js"></script>
<script src="/global/lib/trunk8/trunk8.js"></script>
<script src="/resources/scripts/top.js?v=20130704"></script>
<script src="/global/lib/isotope/jquery.isotope.min.js"></script>
<script>

$(function() {
	
	$(".submit").on('click', function() {
		$("#SyokusyuIndexForm").submit();
		return;
	});
});

</script>

  <h1 class="ttl"><img src="/sp/resources/images/search/title.png" alt="求人検索" width="114" height="24"></h1>
  <form action="/search/job_list/" name="frm1" method='POST'>
    <div class="inner">
      <label for="free">フリーワードから探す</label>
      <?=$this->Form->input('free_word',array('name'=>'free_word', 'id'=>'search_freewords', 'type'=>'text','label'=>false,'div'=>false))?>
              
              
      <hr class="border">
      <label for="select-ar" class="select">年収から探す</label>

		<? 
			$nensyu = Configure::read('nensyu');
		
		?>
		<?=$this->Form->input('nensyu',array('dara-role'=>'none', 'id'=>'search_ar', 'showParents' => true, 'type'=>'select', 'label'=>false, 'options'=>$nensyu ,'div'=>false, 'default'=>'0'))?>
			
      <hr class="border">
      <label for="select-job" class="select">職種から探す</label>


		<? 
			$jobtype = Configure::read('jobtype');
			array_unshift($jobtype, array("all"=>"こだわらない"));
		?>
		<?=$this->Form->input('syokusyu_id.][',array('dara-role'=>'none', 'id'=>'search_job', 'showParents' => true, 'type'=>'select', 'label'=>false, 'options'=>$jobtype ,'div'=>false, 'default'=>'all'))?>
					
    </div>
    <div class="submit">
      <a id="all_check" href="javascript:document.frm1.submit();">検索</a>
    </div>
  </form>







