<script>
    $(function () {
        // 언어 셀렉트 박스
        let lang = $.cookie('lang')
        if (lang == 'korean') {
            $('#change_lang').val('korean')
        } else if (lang == 'english') {
            $('#change_lang').val('english')
        } else {
            $('#change_lang').val('vietnam')
        }

        // 언어 변경
        $('#change_lang').on('change', function () {
            let lang = $(this).val();
            if (lang == 'korean') {
                $.removeCookie('lang', {path: '/'});
                $.cookie('lang', lang, {expires: 1, path: '/'});
            } else if (lang == 'english') {
                $.removeCookie('lang', {path: '/'});
                $.cookie('lang', lang, {expires: 1, path: '/'});
            } else {
                $.removeCookie('lang', {path: '/'});
                $.cookie('lang', lang, {expires: 1, path: '/'});
            }
            location.reload();
        })
        
        // 로그아웃
        $('.logout-btn').on('click', function () {
            _cmn.ajax.exec({
                url: '/api/member/logout',
                data: {
                    [_cmn.ajax.csrf_token_name]: _cmn.ajax.csrf_token
                },
                success: function (res) {
                    if(res.status == 'success') {
                        location.href = '/login'
                    } else {
                        toast('로그아웃실패')
                    }
                }
            })
        })

    })
</script>
<style>
    .login-btn {
        /*background-color: #ff6600; !* 버튼 배경 색 *!*/
        color: white; /* 글자 색 */
        padding: 10px 20px; /* 패딩 */
        border-radius: 5px; /* 둥근 모서리 */
        text-decoration: none; /* 링크 밑줄 제거 */
        font-weight: bold; /* 글씨 굵게 */
    }
</style>

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
                <li class="<?= $this->uri->segment(1) == "history" ? 'active-item' : '' ?>">
                    <a href="/history">History</a>
                </li>
                <li class="<?= $this->uri->segment(1) == "process" || $this->uri->segment(1) == "courses" || $this->uri->segment(1) == "documents" ? 'active-item' : '' ?>">
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
                    </ul>
                </li>
                <li>
                    <a href="/qna">Q&A</a>
                </li>

                <li><a href="/contact">Contact</a></li>
                <?php if(isset($this->session->idx)) {?>
                    <li><a href="/login" class="login-btn text-white">Logout</a></li>
                <?php } else {?>
                    <li><a href="/login" class="login-btn text-white">Login</a></li>
                <?php } ?>
                <li><a href="javascript:void(0)" class="logout-btn text-white">logout tmp</a></li>
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