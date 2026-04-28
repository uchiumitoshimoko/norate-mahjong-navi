<!-- MAIN CONTENT -->

<script>
/*
    $(function() {

        $(".nensyu").on('click', function() {

            // 現在のチェック状況を確認する。
            var nensyu = $(this).attr("value");

            var now_value = $("#nensyu" + nensyu).val();

            // チェックされていなければ、チェックを付ける。
            if (now_value == "0") {
                $("#nensyu" + nensyu).val("1");
                $(this).addClass("active");
            } else {
                $("#nensyu" + nensyu).val("0");
                $(this).removeClass("active");
            }
        });
    });
*/
</script>


<script>
$(function(){
	
	$(".nensyu").on('click', function() {

		// 現在のチェック状況を確認する。
		var nensyu = $(this).attr("value");
		
		var now_value = $("#nensyu" + nensyu).val();
		
		// チェックされていなければ、チェックを付ける。
		if(now_value == "0" || now_value == "") {
			
			$("#nensyu_500").removeClass("active");
			$("#nensyu_501").removeClass("active");
			$("#nensyu_601").removeClass("active");
			$("#nensyu_701").removeClass("active");
			$("#nensyu500").val("0");
			$("#nensyu501").val("0");
			$("#nensyu601").val("0");
			$("#nensyu701").val("0");
			
			$("#nensyu" + nensyu).val("1");

			$(this).addClass("active");
		}
		else {
			$("#nensyu" + nensyu).val("0");
			$(this).removeClass("active");
		}
	});
});
</script>


<div class="main searchjob-result__page" id="oneColumn__block" style="visibility: visible; opacity: 1;">
    <div class="header">

        <div class="module__page-breadcrumb">
            <div class="container "><a href="/">トップページ</a><a href="/search/joblist?new_flg=1">求人検索</a><a href="#">検索結果</a></div>
        </div>

        <h2 class="htitle">SEARCH JOB<span>求人検索結果</span></h2>
    </div>

    
    <div class="content__blockA item__block">
                <div class="item__box">
                    <div class="itemlist__block">

    <!--
        <div>
            <div class="module__page-header">
                <div class="container ">
                    <div class="mobile-row">
                        <h2 class="title">求人検索</h2>
                        <div class="button-back">
                            <a href="#">戻る</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="module__page-breadcrumb">
                <div class="container "><a href="/">トップページ</a><a href="/search/">求人検索</a><a href="#">検索結果</a></div>
            </div>
-->

    <div class="module__page-2column">
        <div class="container row">
            <!-- Sidebar -->
            <aside class="sidebar">

                <!-- Searchs -->
                <div class="module__search-box">

                    <form action="/search/job_list/" name="frm1" method='POST'>

                        <?
									$search = $this->Session->read('search');
	
									$free_word = "";
											
									if(isset($search['free_word'])) {
										if(!empty($search['free_word'])) {
											$free_word = $search['free_word'];
										}
									}
								?>

                            <div class="division-search">
                                <h2 class="title">
                                フリーワード検索</h2>
                                <label for="" class="search-module">
                                    	<?=$this->Form->input('free_word',array('name'=>'free_word', 'class'=>'search-module-input', 'id'=>'search_freewords', 'type'=>'text','label'=>false,'div'=>false, 'placeholder'=>'例 : 東京 iOSエンジニア', 'default'=>$free_word))?>
                                   
                            		</label>

                            </div>
                            
                            <div class="division-type">
                                <h2 class="title">職種から探す</h2>


                                <? 
										$jobtype = Configure::read('jobtype');
										array_unshift($jobtype, array("all"=>"こだわらない"));

									?>

                                    <label for="" class="select-module">
										
										<?
											$default = "all";
											
											if(isset($search['syokusyu_id'])) {
												if(!empty($search['syokusyu_id'])) {
													
													$default = $search['syokusyu_id'][0][0];
												}
											}
										?>
										
										<?=$this->Form->input('syokusyu_id.][',array('id'=>'search_job', 'showParents' => true, 'type'=>'select', 'label'=>false, 'options'=>$jobtype ,'div'=>false, 'default'=>$default))?>
										
									</label>
                            </div>
                            
                            <div class="division-income">
                                <h2 class="title">年収から探す</h2>
                                <div class="row">


                                    <? 
										$nensyu = Configure::read('nensyu');
									?>

                                        <?
										foreach($nensyu as $key => $row) {
											
											$active_flg = "";
											
											if(isset($search['nensyu'])) {
												if(isset($search['nensyu'][$key])) {
													if($search['nensyu'][$key] == "1") {
														$active_flg = "active";
													}
												}
											}
									?>
                                            <a class="grid  nensyu <?=$active_flg?>" value="<?=$key?>" id="nensyu_<?=$key?>">
                                                <?=$row?>
                                            </a>
                                            <?=$this->Form->input('nensyu.' . $key,array('type'=>'hidden'))?>

                                                <?
										}
									?>

                                </div>
                            </div>


                            
                            <div class="division-button">
                                <button class="search-button">検索する</button>
                            </div>

                            <?=$this->Form->end(); ?>
                </div>


            </aside>
            <!-- /Sidebar -->
            <!-- content -->
            <div class="content">
                <div class="search__result">
                    検索結果一覧
                </div>

                <?
    	
    	$page = $this->Paginator->request->params['paging']['Jobs'];
    	
    	$now = ($page['page']-1) * $page['current'] + 1;
    	$end = ($page['page']-1) * $page['current'] + $page['current'];
    	$count = $page['count'];
    	
    	if($end > $count) {
			$end = $count;
		}
		else if($count == 0) {
			$now = "0";
			$end = "0";
		}
    ?>
                    <div class="search__pagenation-listtop">
                        <div class="row">
                            <div class="grid">
                                <div class="label-result">
                                    <?=$count?>件の検索結果</div>
                                <div class="label-num">
                                    <?=$now?>〜
                                        <?=$end?>件を表示</div>
                            </div>
                            <div class="grid">
                                <!--
                                    <div>並び替え
                                        <label for="" class="select-module">
                                                <select>
                                                <option value="">新着順</option>
                                                <option value="">XXXXXXXXXXXXXXX</option>
                                                <option value="">XXXXXXXXXXXXXXX</option>
                                            </select>
                                        </label>
                                    </div>
								-->
                            </div>
                        </div>

                        <div class="search__pagenation-module">
                            <?

echo $this->Paginator->numbers(array(
'first' => '1', //ページ数が多いとき最初のページを出すか（数字で指定）
'last' => '0',//ページ数が多いとき最後のページを出すか（数字で指定）
'before'=>'',//ページ番号の前に出力する文字を指定
'after'=>'',//ページ番号の後に出力する文字を指定
'modulus'=>6,//ページ番号を幾つ表示するか（デフォルト値：8）
'separator'=>false,//ページ番号を区切る文字列（デフォルト値：|）
'ellipsis'=>'<span class="omit">...</span>',//省略される時に表示される文字列（デフォルト値：・・・）
'currentClass'=>'current',//表示中のページ番号のクラスを設定（デフォルト値：current）
)
);
?>
                        </div>

                        <!--
                            <div class="search__pagenation-module">
                                <a class="left-arrow" href=""><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                <a class="current" href="">1</a>
                                <a href="">2</a><a href="">3</a>
                                <a href="">4</a><a href="">5</a>
                                <span class="omit">...</span>
                                <a class="last" href="">25</a>
                                <a class="left-arrow" href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
-->
                    </div>

                    <!-- LIST -->
                    <div class="search__list">

                        <ul class="search__list-list">

                            <?
    	foreach($jobs as $job) {

			$new_flg = "";
			if($job['Jobs']['new_flg'] == "1") {
				$new_flg = "is--new";
			}
			
	?>
                                <!-- item -->
                                <li class="search__list-item <?=$new_flg?>">
                                    <a href="/search/detail/<?=$job['Jobs']['id']?>">

<?
// PCのコンバージョンタグ
if(!$this->request->isMobile()) {
?>

                                        <h3 class="subject"><span class="has-view--pc"><?=$job['Jobs']['title']?> / </span>
                                            <?=$job['Jobs']['company_name']?>
                                        </h3>
<?
}
else {
?>

                                        <h3 class="subject"><span class="has-view--pc"><?=$job['Jobs']['company_name']?> / </span>
                                            <?=$job['Jobs']['title']?>
                                        </h3>
<?
}
?>
                                        <span class="button-detail">詳細を見る</span>
                                        <ul>
                                            <li class="is--corp">
                                                <?=$job['Jobs']['company_name']?>
                                            </li>
                                            <li class="is--map">
                                                <?=$job['Jobs']['kinmusaki_name_1']?>
                                            </li>
                                            <li class="is--income">予定最高年収 <strong><?=number_format($job['Jobs']['nensyu_max'])?>万円</strong></li>


                                        </ul>
                                        <p class="detail">
                                            <?=$job['Jobs']['kinmu_naiyo']?>
                                        </p>
                                    </a>
                                </li>
                                <?
		}
	?>

                        </ul>
                    </div>
                    <!-- / LIST -->
                    <!--pagenation-->
                    <div class="search__pagenation-listbottom">
                        <div class="row">
                            <div class="grid">
                                <div class="label-result">
                                    <?=$count?>件の検索結果</div>
                                <div class="label-num">
                                    <?=$now?>〜
                                        <?=$end?>件を表示</div>
                            </div>
                            <div class="grid">
                                <div class="search__pagenation-module">
                            <?

echo $this->Paginator->numbers(array(
'first' => '1', //ページ数が多いとき最初のページを出すか（数字で指定）
'last' => '0',//ページ数が多いとき最後のページを出すか（数字で指定）
'before'=>'',//ページ番号の前に出力する文字を指定
'after'=>'',//ページ番号の後に出力する文字を指定
'modulus'=>6,//ページ番号を幾つ表示するか（デフォルト値：8）
'separator'=>false,//ページ番号を区切る文字列（デフォルト値：|）
'ellipsis'=>'<span class="omit">...</span>',//省略される時に表示される文字列（デフォルト値：・・・）
'currentClass'=>'current',//表示中のページ番号のクラスを設定（デフォルト値：current）
)
);
?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Form button-->
                    <div class="module__form-button search">
                        <div class="form-button">
                            <a href="/entry/">
                                <span class="balloon">1分で簡単入力！</span> <strong>無料</strong>で今すぐ相談する
                                </a>
                        </div>
                        <p class="proviso">登録すると非公開求人を含むすべての求人がご覧になれます</p>

                    </div>
                    <!--/Form button-->


            </div>
            <!-- / content -->
        </div>

    </div>

</div>
</div>
</div>
</div>

<!-- MAIN CONTENT END -->

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