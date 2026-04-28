
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>詳細画面</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- <script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>


    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./js/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./js/slick/slick-theme.css">

    <script type="text/javascript" src="./js/slick/slick.min.js"></script>



    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
        var ua = navigator.userAgent;
        if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) || (ua.indexOf('windows') > 0 && ua.indexOf('phone') > 0) || (ua.indexOf('firefox') > 0 && ua.indexOf('mobile') > 0)) {

            document.write('<link rel="stylesheet" href="/css/style-smp.css">');

        } else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0 || (ua.indexOf('windows') > 0 && ua.indexOf('touch') > 0) || (ua.indexOf('firefox') > 0 && ua.indexOf('tablet') > 0)) {

            document.write('<link rel="stylesheet" href="/css/style-smp.css">');

        } else {
            document.write('<link rel="stylesheet" href="/css/style-pc.css">');
        }

    </script>
    <script type="text/javascript">
        window.onunload = function() {};

    </script>

</head>

<body>
    <div class="site " id="top">
        <noscript>
        <h1>このページはscriptをONにして御覧ください。</h1>
        </noscript>
        <!-- HAEDER -->

        <header class="global-header" id="global-header">
            <div class="container top-column">
                <h1 class="logo">
                    <a href="#">
                        <img src="img/logo-geekly.svg" title="ギークリー" alt="ギークリー">
                    </a>
                </h1>
                <div class="global-header__catchcopy">
                    IT/Web/ゲーム業界専門の人材紹介会社 ギークリー
                </div>
                <div class="global-header__service-nav">
                    <ul class="global-header__service-nav-list" id="global-header__service-nav-list">
                        <li><a href="#">アクセス</a></li>
                        <li><a href="#">会社概要</a></li>
                        <li><a href="#">お問い合わせ</a></li>
                    </ul>
                </div>
                <div class="global-header__form-button">
                    <a href="#"><span class="balloon">簡単</span> 無料相談<span class="pc">する</span></a>
                </div>
            </div>

            <div class="global-header__button-mobile-menu">
                <!-- Hamburger -->
            </div>

            <div class="global-header__nav ">
                <div class="container  second-column">
                    <ul class="global-header__nav-list">
                        <li class="global-header__nav-list-item is--home"><a href="#">HOME</a></li>
                        <li class="global-header__nav-list-item is--search"><a href="#">求人検索</a></li>
                        <li class="global-header__nav-list-item is--feature"><a href="#">Geeklyの特徴</a></li>
                        <li class="global-header__nav-list-item is--consultants"><a href="#">コンサルタント紹介</a></li>


                        <li class="global-header__nav-list-item is--testimonials"><a href="#">転職成功者の声</a></li>

                    </ul>
                    <div class="global-header__nav-service" id="global-header__nav-service"></div>
                </div>
                <div class="global-header__nav-blank"></div>
            </div>


        </header>

        <!-- MAIN CONTENT -->


        <div class="main ">
            <div class="module__page-header">
                <div class="container ">
                    <div class="mobile-row">
                        <h2 class="title">求人情報</h2>
                        <div class="button-back">
                            <a href="#">戻る</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="module__page-breadcrumb">
                <div class="container "><a href="#">IT/Web/ゲーム業界専門の人材紹介会社 ギークリー</a><a href="#">エムスリー株式会社 / プラットフォームディレクター</a></div>
            </div>

            <!-- 2Column -->
            <div class="module__page-2column">
                <div class="container row">
                    <!-- Sidebar -->
                    <aside class="sidebar detail">
                        <!-- Searchs -->
                        <div class="module__search-box">
                            <form action="">


                                <div class="division-search">
                                    <h2 class="title">フリーワード検索</h2>
                                    <label for="" class="search-module">
                                    <input type="text" placeholder="例 : 東京 iOSエンジニア" class="search-module-input">
                                   
                            </label>

                                </div>

                                <div class="division-income">
                                    <h2 class="title">年収から探す</h2>
                                    <div class="row">
                                        <a href="" class="grid  active">400万円〜</a>
                                        <a href="" class="grid">〜500万円</a>
                                        <a href="" class="grid">〜600万円</a>
                                        <a href="" class="grid">〜700万円</a>
                                        <a href="" class="grid">〜800万円</a>
                                        <a href="" class="grid">〜1000万円</a>

                                    </div>
                                </div>
                                <div class="division-type">
                                    <h2 class="title">職種から探す</h2>

                                    <a class="search-type-button" href="#modal-search-type">業種を選択してください</a>

                                    <!--
                                <label for="" class="select-module">
                                <select>
                                    <option value="">業種を選択してください</option>
                                    <option value="">XXXXXXXXXXXXXXX</option>
                                    <option value="">XXXXXXXXXXXXXXX</option>
                                </select>
                                </label>
                                -->

                                </div>
                                <div class="division-button">
                                    <button class="search-button">検索する</button>
                                </div>




                            </form>
                        </div>

                        <!--another -->
                        <div class="detail__another-offer">


                            <h2 class="title">この企業の求人</h2>

                            <ul class="detail__another-offer-list">

                                <!-- item -->
                                <li class="detail__another-offer-item is--new">
                                    <a href="">
                                        <h3 class="subject">SNSマーケター</h3>
                                        <ul>
                                            <li class="is--corp">社名非公開</li>
                                            <li class="is--map">東京都中目黒</li>
                                            <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                        </ul>
                                    </a>
                                </li>
                                <!-- item -->
                                <li class="detail__another-offer-item">
                                    <a href="">
                                        <h3 class="subject">SNSマーケター2</h3>
                                        <ul>
                                            <li class="is--corp">社名非公開</li>
                                            <li class="is--map">東京都中目黒</li>
                                            <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                        </ul>
                                    </a>
                                </li>




                            </ul>





                        </div>
                        <!-- /another -->

                    </aside>
                    <!-- /Sidebar -->
                    <!-- content -->
                    <div class="content">

                        <!-- Corporate Item -->
                        <div class="detail__item">

                            <div class="item-main">
                                <div class="title">エムスリー株式会社</div>
                                <div class="catchcopy">プラットフォームディレクター（未経験ハイポテンシャルの方でもご応募可能です）</div>
                                <div class="intro-income">予定最高年収 <strong>1000万円</strong></div>
                                <div class="intro-map">勤務地:東京都目黒区</div>

                                <table class="resume">
                                    <tr>
                                        <th>年収</th>
                                        <td>400〜1000万円</td>
                                    </tr>


                                    <!---->


                                    <tr class="pcs">
                                        <th>仕事内容</th>
                                        <td>
                                            <div class="movable" id="movable001">
                                                <p>
                                                    ・機能実現のための画面フローやスクリーンディテールを作成（ビジュアルデザインは別担当者が通常実施）
                                                    <br>・各担当者と協力しサイト制作管理を実施
                                                    <br>・医師や製薬企業からの意見、現状のサイト使用状況、業界動向等を基に新機能・改善を実施
                                                    <br>・ユーザーインタビュー、ユーザーテストの実施
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="smps">
                                        <td colspan="2" class="smps-td" id="smps-td001">
                                            <h3 class="mobile-th">仕事内容</h3>
                                        </td>
                                    </tr>

                                    <!---->
                                    <!---->
                                    <tr class="disable">
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="pcs">
                                        <th>求める経験</th>
                                        <td>
                                            <div class="movable" id="movable002">
                                                <p>
                                                    （１）WEBディレクター担当 <br>・ユーザビリティに関するスキルと知識・理解 <br>・画面フローやスクリーンディテールの制作経験
                                                </p>
                                                <p>（２）Webプランナー担当 <br>・事業開発、サービス開発、またはサイト立上げのプロジェクトで、リーダーまたはそれに準ずる役割を担い、成果を上げた経験
                                                </p>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="smps">
                                        <td colspan="2" class="smps-td" id="smps-td002">
                                            <h3 class="mobile-th">求める経験</h3>
                                        </td>
                                    </tr>
                                    <tr class="disable">
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!---->


                                    <tr>
                                        <th>
                                            雇用形態

                                        </th>
                                        <td>
                                            正社員



                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            就業時間

                                        </th>
                                        <td>9:00～18:00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            保険

                                        </th>
                                        <td>健康保険　厚生年金　雇用保険　労災保険
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            諸手当

                                        </th>
                                        <td>確定拠出年金制度 借上社宅制度 持株会制度
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>休日休暇</th>
                                        <td>慶弔休暇　年末年始　夏期休暇　有給休暇　週休二日制（土日祝）</td>
                                    </tr>



                                </table>
                                <!--Form button-->
                                <div class="module__form-button ">
                                    <div class="form-button">
                                        <a href="#">
                                <span class="balloon">1分で簡単入力！</span> <strong>無料</strong>で今すぐ相談する
                                </a>
                                    </div>
                                    <p class="proviso">登録すると非公開求人を含むすべての求人がご覧になれます</p>

                                </div>
                                <!--/Form button-->
                            </div>

                            <div class="corporate-info">
                                <div class="title">会社情報</div>
                                <table class="resume">
                                    <tr>
                                        <th>
                                            求人ID

                                        </th>
                                        <td>78920
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            会社名

                                        </th>
                                        <td>エムスリー株式会社
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            業種

                                        </th>
                                        <td>インターネット
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            資本金

                                        </th>
                                        <td>15億2,700万円
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            売上高

                                        </th>
                                        <td>646億6,000万円
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>所在地
                                        </th>
                                        <td>東京都港区
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>従業員数
                                        </th>
                                        <td>3556名
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            設立

                                        </th>
                                        <td>2010年1月</td>
                                    </tr>
                                    <!---->
                                    <tr class="pcs">
                                        <th>事業内容</th>
                                        <td>
                                            <div class="movable" id="movable003">
                                                <p>【”医療×ITプロダクト”　在宅医療分野でのICTイノベーションを展開】<br>同社は、「超高齢社会の新しい社会システムの創造」をビジョンに、2009年10月に設立致しました。以来、医療法人社団鉄祐会を中心としたTetsuyu Groupとして、在宅医療のさらなる普及と発展、地域包括ケアシステムの実現に向けた在宅医療・介護における情報連携の仕組みづくり、そして海外でのヘルスケアクラウドシステムの開発と普及に取り組んでおります。</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="smps">
                                        <td colspan="2" class="smps-td" id="smps-td003">
                                            <h3 class="mobile-th">事業内容</h3>
                                        </td>
                                    </tr>
                                    <tr class="disable">
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!---->
                                    <!---->

                                    <tr class="pcs">
                                        <th>会社の特徴</th>
                                        <td>
                                            <div class="movable" id="movable004">
                                                <p>
                                                    【日本/海外での展開】<br>(1)日本での取組み <br>・在宅医療の質・効率向上、リスク管理を実現するクラウド型のICTシステム開発プロジェクト企画 　<br>・在宅医療の多職種(病院、訪問看護ステーション、薬局、介護事業所、施設および患者・家族等)のチーム形成のためのクラウド型情報共有システムの企画開発と運用構築 </p>

                                                <p> (2)海外での取組み　<br>・2015年には、シンガポールでの在宅医療診療所、訪問看護ステーション事業展開にICTシステムを提供しました。超高齢社会先進国の日本発の良質な在宅医療・介護のグローバル展開に貢献しています。 </p>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr class="smps">
                                        <td colspan="2" class="smps-td" id="smps-td004">
                                            <h3 class="mobile-th">会社の特徴</h3>
                                        </td>
                                    </tr>
                                    <!---->

                                </table>
                                <!--Form button-->
                                <div class="module__form-button ">
                                    <div class="form-button">
                                        <a href="#">
                                <span class="balloon">1分で簡単入力！</span> <strong>無料</strong>で今すぐ相談する
                                </a>
                                    </div>
                                    <p class="proviso">登録すると非公開求人を含むすべての求人がご覧になれます</p>

                                </div>
                                <!--/Form button-->
                            </div>


                        </div>
                        <!-- / Corporate Item -->



                    </div>
                    <!-- / content -->
                </div>

            </div>

            <!-- /2Column -->

            <!-- Nearly -->
            <div class="detail__nearly-offer">
                <div class="container">
                    <h2 class="title">この求人と似た求人</h2>

                    <ul class="detail__nearly-offer-list">

                        <!-- item -->
                        <li class="detail__nearly-offer-item is--new">
                            <a href="">
                                <h3 class="subject">SNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開</li>
                                    <li class="is--map">東京都中目黒</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>
                        <!-- item -->
                        <li class="detail__nearly-offer-item">
                            <a href="">
                                <h3 class="subject">SNSマーケター2</h3>
                                <ul>
                                    <li class="is--corp">社名非公開</li>
                                    <li class="is--map">東京都中目黒</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>

                        <!-- item -->
                        <li class="detail__nearly-offer-item">
                            <a href="">
                                <h3 class="subject">SNSマーケターSNSマーケターSNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開社名非公開社名非公開社名非公開</li>
                                    <li class="is--map">社名非公開社名非公開社名非公開社名非公開社名非公開社名非公開</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>

                        <!-- item -->
                        <li class="detail__nearly-offer-item">
                            <a href="">
                                <h3 class="subject">SNSマーケターSNSマーケターSNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開社名非公開社名非公開社名非公開</li>
                                    <li class="is--map">社名非公開社名非公開社名非公開社名非公開社名非公開社名非公開</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>

                        <!-- item -->
                        <li class="detail__nearly-offer-item ">
                            <a href="">
                                <h3 class="subject">SNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開</li>
                                    <li class="is--map">東京都中目黒</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>
                        <!-- item -->
                        <li class="detail__nearly-offer-item ">
                            <a href="">
                                <h3 class="subject">SNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開</li>
                                    <li class="is--map">東京都中目黒</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>

                        <!-- item -->
                        <li class="detail__nearly-offer-item ">
                            <a href="">
                                <h3 class="subject">SNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開</li>
                                    <li class="is--map">東京都中目黒</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>
                        <!-- item -->
                        <li class="detail__nearly-offer-item">
                            <a href="">
                                <h3 class="subject">SNSマーケターSNSマーケターSNSマーケター</h3>
                                <ul>
                                    <li class="is--corp">社名非公開社名非公開社名非公開社名非公開</li>
                                    <li class="is--map">社名非公開社名非公開社名非公開社名非公開社名非公開社名非公開</li>
                                    <li class="is--income">予定最高年収 <strong>600万円</strong></li>
                                </ul>
                            </a>
                        </li>



                    </ul>



                </div>

            </div>
            <!-- /Nearly -->



        </div>





        <!-- MAIN CONTENT END -->


        <!-- FOOTER -->

        <footer class="global-footer">
            <div class="global-footer__container">
                <div class="global-footer__column">
                    <!--1-->
                    <div class="global-footer__grid">
                        <ul class="footer-nav">
                            <li>
                                <a href="">
                                    <h3 class="title">求人検索</h3>
                                </a>
                            </li>
                            <li><a href="">条件検索</a></li>
                            <li><a href="">新着求人</a></li>
                        </ul>
                    </div>


                    <!--2-->
                    <div class="global-footer__grid">
                        <ul class="footer-nav">
                            <li>
                                <a href="#">
                                    <h3 class="title">Geeklyの特徴</h3>
                                </a>
                            </li>
                            <li><a href="#">Geeklyの特徴</a></li>
                            <li><a href="">転職エージェントランキング</a></li>
                            <li><a href="">サービスの流れ</a></li>
                            <li><a href="">レジュメサンプル</a></li>
                        </ul>
                    </div>
                    <!--3-->
                    <div class="global-footer__grid">
                        <ul class="footer-nav">
                            <li>
                                <a href="#">
                                    <h3 class="title">コンサルタント紹介</h3>
                                </a>
                            </li>
                            <li><a href="#">松村 達哉</a></li>
                            <li><a href="#">西内 信</a></li>
                            <li><a href="#">篠原 百合</a></li>
                            <li><a href="#">片桐 智</a></li>
                        </ul>
                    </div>
                    <!--4-->
                    <div class="global-footer__grid">
                        <ul class="footer-nav">
                            <li>
                                <a href="#">
                                    <h3 class="title">転職者の声</h3>
                                </a>
                            </li>
                            <li><a href="#">アクセス</a></li>
                            <li><a href="#">お問い合わせ</a></li>
                            <li><a href="#">プライバシポリシー</a></li>
                            <li><a href="#">利用規約</a></li>
                            <li><a href="#">会社概要</a></li>
                            <li><a href="#">採用情報</a></li>
                            <li><a href="#">サイトマップ</a></li>
                        </ul>
                    </div>



                </div>

                <div class="global-footer__column">
                    <img src="img/logo_geekly_white.png" class="logo" title="ギークリー" alt="ギークリー">
                    <p>〒150-0002 東京都渋谷区渋谷1-17-2<br>ヒューリック渋谷宮下公園ビル 6F</p>
                    <div class="global-footer__button-map"><a href="" class="">アクセスマップ</a></div>
                    <p class="global-footer__copyright">Copyright © Geekly Co.,LTD. All Rights Reserved</p>
                </div>


            </div>

        </footer>




    </div>
    <!--modal 01 -->

    <div class="module__modal01" id="modal-search-type">
        <div class="overLay modalClose"></div>
        <div class="module__modal01-inner">
            <form action="">
                <div class="module__modal01-header">
                    <h2 class="title">
                        職種から探す
                    </h2>
                    <div class="modalClose button-close"></div>
                </div>
                <div class="module__modal01-body">


                    <div class="division">


                        <h3 class="subject">システムエンジニア</h3>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                    </div>
                    <div class="division">
                        <h3 class="subject">プロジェクトマネージャー・システムコンサルタント</h3>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                    </div>
                    <div class="division">
                        <h3 class="subject">ネットワーク・サーバー</h3>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（s自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                    </div>
                    <div class="division">
                        <h3 class="subject">社内SE・テクニカルサポート・その他</h3>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG</label>
                        <label><input type="checkbox"> web系SE・PG（自社製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆製品）</label>
                        <label><input type="checkbox"> web系SE・PG（自社☆☆製品）</label>
                    </div>


                </div>
                <div class="module__modal01-footer">
                    <div class="modalClose button-close">キャンセル</div>
                    <button class="button-submit">選択する</button>

                </div>
            </form>

        </div>
    </div>

    <!--/modal 01-->
    <script src="./js/script.js" type="text/javascript"></script>
</body>

</html>
