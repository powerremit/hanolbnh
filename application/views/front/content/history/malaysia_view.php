<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20">Malaysia</h1>
        </div>
    </header>
    <?php $this->load->view('front/content/history/history_component.php'); ?>

    <section class="grid">
        <div class="s-12 padding">
            <h3 class="text-strong text-size-40"><?=$this->lang->line('malaysia_01')?></h3>
            <h3 class="text-strong text-size-20"><?=$this->lang->line('hanol_in_malaysia')?></h3>
            <p class="text-padding text-center">
                <?=$this->lang->line('malaysia_02')?>
            </p>
        </div>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201612/malaysia_201612_01.jpg">
            <img src="/assets/img/history/malaysia/201612/malaysia_201612_01.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201612/malaysia_201612_02.jpg">
            <img src="/assets/img/history/malaysia/201612/malaysia_201612_02.jpg" alt="Image" >
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201612/malaysia_201612_03.jpg">
            <img src="/assets/img/history/malaysia/201612/malaysia_201612_03.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201612/malaysia_201612_04.jpg">
            <img src="/assets/img/history/malaysia/201612/malaysia_201612_04.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201612/malaysia_201612_05.jpg">
            <img src="/assets/img/history/malaysia/201612/malaysia_201612_05.jpg" alt="Image">
        </a>
    </section>

    <section class="grid">
        <div class="s-12 padding">
            <h3 class="text-strong text-size-40"><?=$this->lang->line('malaysia_03')?></h3>
            <h3 class="text-strong text-size-20"><?=$this->lang->line('hanol_in_malaysia')?></h3>
            <p class="text-padding text-center">
                <?=$this->lang->line('malaysia_02')?>
            </p>
        </div>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201606/malaysia_201606_01.jpg">
            <img src="/assets/img/history/malaysia/201606/malaysia_201606_01.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201606/malaysia_201606_02.jpg">
            <img src="/assets/img/history/malaysia/201606/malaysia_201606_02.jpg" alt="Image" >
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201606/malaysia_201606_03.jpg">
            <img src="/assets/img/history/malaysia/201606/malaysia_201606_03.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201606/malaysia_201606_04.jpg">
            <img src="/assets/img/history/malaysia/201606/malaysia_201606_04.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201606/malaysia_201606_05.jpg">
            <img src="/assets/img/history/malaysia/201606/malaysia_201606_05.jpg" alt="Image">
        </a>
    </section>

    <section class="grid">
        <div class="s-12 padding">
            <h3 class="text-strong text-size-40"><?=$this->lang->line('malaysia_04')?></h3>
            <h3 class="text-strong text-size-20"><?=$this->lang->line('hanol_in_malaysia')?></h3>
            <p class="text-padding text-center">
                <?=$this->lang->line('malaysia_02')?>
            </p>
        </div>
        <a class="s-12 m-6 l-6 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201503/malaysia_201503_03.jpg">
            <img src="/assets/img/history/malaysia/201503/malaysia_201503_03.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-6 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201503/malaysia_201503_04.jpg">
            <img src="/assets/img/history/malaysia/201503/malaysia_201503_04.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201503/malaysia_201503_02.jpg">
            <img src="/assets/img/history/malaysia/201503/malaysia_201503_02.jpg" alt="Image" >
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201503/malaysia_201503_01.jpg">
            <img src="/assets/img/history/malaysia/201503/malaysia_201503_01.jpg" alt="Image">
        </a>
        <a class="s-12 m-6 l-4 padding vertical-center" data-fslightbox href="/assets/img/history/malaysia/201503/malaysia_201503_05.jpg">
            <img src="/assets/img/history/malaysia/201503/malaysia_201503_05.jpg" alt="Image">
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