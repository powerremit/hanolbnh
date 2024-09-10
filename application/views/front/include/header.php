<script>
    $(function() {
        // 언어 셀렉트 박스
        let lang = $.cookie('lang')
        if (lang == 'korean') {
            $('#change_lang').val('korean')
        } else if(lang == 'english') {
            $('#change_lang').val('english')
        } else {
            $('#change_lang').val('vietnam')
        }

        // 언어 변경
        $('#change_lang').on('change', function () {
            let lang = $(this).val();
            if (lang == 'korean') {
                $.removeCookie('lang', {path: '/'});
                $.cookie('lang', lang, { expires: 1, path: '/' });
            } else if(lang == 'english') {
                $.removeCookie('lang', {path: '/'});
                $.cookie('lang', lang, { expires: 1, path: '/' });
            } else {
                $.removeCookie('lang', {path: '/'});
                $.cookie('lang', lang, { expires: 1, path: '/' });
            }
            location.reload();
        })

    })
</script>

<!-- HEADER -->
<header class="grid">
    <!-- Top Navigation -->
    <nav class="s-12 grid background-none background-primary-hightlight">
        <!-- logo -->
        <a href="/" class="m-12 l-3 padding-2x logo">
<!--            <img src="/assets/img/logo.svg">-->
            <img src="/assets/img/hanol_logo_new2.svg">
        </a>
        <div class="top-nav s-12 l-9">
            <ul class="top-ul right chevron">
                <li><a href="/">Hanol Education</a></li>
                <li class="<?=$this->uri->segment(1) == "history" ? 'active-item' : ''?>">
                    <a href="/history">History</a>
                </li>
                <li class="<?=$this->uri->segment(1) == "process" || $this->uri->segment(1) == "courses" || $this->uri->segment(1) == "documents" ? 'active-item' : ''?>">
                    <a href="javascript:void(0)">Study in Korea</a>
                    <ul class="dropdown">
                        <li><a href="/courses">Courses</a></li>
                        <li><a href="/process">Process</a></li>
                        <li><a href="/documents">Documents</a></li>
                    </ul>
                </li>
<!--                <li><a href="/university">Universities</a></li>-->
                <li>
                    <a href="javascript:void(0)">KUFS</a>
                    <ul class="dropdown">
                        <li><a href="/kufs/vietnam">KUFS Vietnam</a></li>
                        <li><a href="/kufs/mongolia">KUFS Mongolia</a></li>
                        <li><a href="/kufs/mongolia/festival">Mongolia Festival</a></li>
                    </ul></li>

                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="s-12 lang_select">
            <select class="background-dark text-aqua" alt='select language' id="change_lang" style="border: none">
                <option value="english" alt='English'>English</option>
                <option value="korean" alt='Korean'>Korean</option>
                <option value="vietnam" alt='Vietnam'>Vietnam</option>
            </select>
        </div>
    </nav>
</header>

<style>
    .lang_select {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
    }
</style>