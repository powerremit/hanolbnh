<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Indonesia</h1>
        </div>
    </header>

    <?php $this->load->view('front/content/history/history_component.php'); ?>

    <!-- SECTION  -->
    <section class="grid">
        <div class="s-12 padding">
            <h3 class="text-strong text-size-40"><?=$this->lang->line('indonesia_01')?></h3>
            <h3 class="text-strong text-size-20"><?=$this->lang->line('hanol_in_indonesia')?></h3>
            <p class="text-padding text-center">
                <?=$this->lang->line('indonesia_02')?>
            </p>
        </div>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_01.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_01.jpg" alt="Image">
        </a>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_02.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_02.jpg" alt="Image">
        </a>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_03.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_03.jpg" alt="Image">
        </a>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_04.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_04.jpg" alt="Image">
        </a>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_05.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_05.jpg" alt="Image">
        </a>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_06.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_06.jpg" alt="Image">
        </a>
        <a class="s-12 m-4 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_07.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_07.jpg" alt="Image">
        </a>
        <a class="s-12 m-4 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_08.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_08.jpg" alt="Image">
        </a>
        <a class="s-12 m-4 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_09.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_09.jpg" alt="Image">
        </a>
        <a class="s-12 m-5 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_10.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_10.jpg" alt="Image">
        </a>
        <a class="s-12 m-5 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_11.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_11.jpg" alt="Image">
        </a>
        <a class="s-12 m-2 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_12.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_12.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_13.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_13.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 padding vertical-center" data-fslightbox href="/assets/img/history/indonesia/201606/indonesia_201606_14.jpg">
            <img src="/assets/img/history/indonesia/201606/indonesia_201606_14.jpg" alt="Image">
        </a>

    </section>
</main>



<style>
    a.vertical-center {
        display: flex;         /* a 요소를 flex container로 만듭니다 */
        justify-content: center; /* 이미지가 a 요소의 중앙에 배치되도록 합니다 */
        align-items: center;     /* 이미지가 수직 중앙에 배치되도록 합니다 */
        overflow: hidden;        /* 이미지가 부모 요소를 벗어날 때 잘리도록 합니다 */
    }

    a.vertical-center img {
        width: 100%;            /* 이미지 너비를 부모 요소에 맞춥니다 */
        height: 100%;           /* 이미지 높이를 부모 요소에 맞춥니다 */
        object-fit: cover;      /* 이미지 비율을 유지하며 잘 맞추기 위해 잘림 */
        border-radius: 10px;
    }
</style>
<script>
    $(function () {
        refreshFsLightbox();
    })
</script>