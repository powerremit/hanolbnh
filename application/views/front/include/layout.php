<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hanol B&H Co. LTD.</title>
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/icons.css">
    <link rel="stylesheet" href="/assets/css/responsee.css">
    <link rel="stylesheet" href="/assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="/assets/css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,700,800&amp;subset=latin-ext" rel="stylesheet">
    <script type="text/javascript" src="/assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script type="text/javascript" src="/assets/js/loading.js"></script>
    <!--  swiper.js  -->
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<script type="text/javascript" src="/assets/js/responsee.js"></script>
<script type="text/javascript" src="/assets/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/assets/js/template-scripts.js"></script>
<!--
 You can change the color scheme of the page. Just change the class of the <body> tag.
 You can use this class: "primary-color-white", "primary-color-red", "primary-color-orange", "primary-color-blue", "primary-color-aqua", "primary-color-dark"
 -->

<!--
Each element is able to have its own background or text color. Just change the class of the element.
You can use this class:
"background-white", "background-red", "background-orange", "background-blue", "background-aqua", "background-primary"
"text-white", "text-red", "text-orange", "text-blue", "text-aqua", "text-primary"
-->

<script>
    $(function () {
        // 스크롤 이벤트 리스너
        window.addEventListener('scroll', () => {
            // 스크롤 위치가 100px 이상일 때 위로 가기 버튼을 보이게 함
            if (
                document.body.scrollTop > 100 ||
                document.documentElement.scrollTop > 20
            ) {
                document.getElementById('btn-back-to-top').style.display = 'block';
            } else {
                document.getElementById('btn-back-to-top').style.display = 'none';
            }
        });

        // 클릭 시 페이지 맨 위로 스크롤 (애니메이션 효과 추가)
        function backToTop() {
            const position =
                document.documentElement.scrollTop || document.body.scrollTop;
            if (position) {
                window.requestAnimationFrame(() => {
                    window.scrollTo(0, position - position / 10);
                    backToTop();
                });
            }
        }

        $('#btn-back-to-top').on('click', function () {
            backToTop();
        })

    })
</script>
<style>
    #btn-back-to-top {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 9999;
        border: none;
        outline: none;
        background-color: #555;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 10px;
    }

    #btn-back-to-top:hover {
        background-color: #333;
    }
</style>
<body class="size-1520 primary-color-blue background-dark">
    <?php echo $header?>
    <?php echo $contents?>
    <?php echo $contents_js?>
    <?php echo $common_js?>
    <?php echo $footer?>
    <button id="btn-back-to-top" title="위로 가기">Top</button>
</body>
</html>