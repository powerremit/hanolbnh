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
                        <li><a href="/subpage5">KUFS Vietnam</a></li>
                        <li><a href="/subpage6">KUFS Mongolia</a></li>
                    </ul></li>

                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<style>
    /*.dropdown {*/
    /*    display: none;*/
    /*    position: absolute;*/
    /*    !*background-color: white;*!*/
    /*    !*min-width: ;*!*/
    /*    color: #1f1d1d;*/
    /*    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
    /*    z-index: 1;*/
    /*}*/

</style>