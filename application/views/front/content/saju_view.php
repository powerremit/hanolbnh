<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
    <header class="grid">
        <div class="s-12 padding-2x">
            <h1 class="text-strong text-white text-center center text-size-60 text-uppercase margin-bottom-20"><?= $this->lang->line('history_title') ?></h1>
            <p class="text-size-20 text-white text-center center text-uppercase"><?= $this->lang->line('history_subtitle') ?></p>
        </div>
    </header>

    <section class="grid margin">
        <div class="m-12 l-10 center">
            <label for="gan"></label>
            <input type="text" id="gan" placeholder="무계경병"/>
            <br>
            <label for="ji"></label>
            <input type="text" id="ji" placeholder="오해자자"/>
            <button id="saju_btn">입력</button>
        </div>
        <div class="m-12 l-10 center saju_table">
            <table>
                <tr>
                    <th colspan="2">비겁</th>
                    <th colspan="2">인성</th>
                    <th colspan="2">관성</th>
                    <th colspan="2">재성</th>
                    <th colspan="2">식상</th>
                </tr>
                <tr id="gan_row">
                    <th>비견</th>
                    <th>겁재</th>
                    <th>편인</th>
                    <th>인수</th>
                    <th>편관</th>
                    <th>정관</th>
                    <th>편재</th>
                    <th>정재</th>
                    <th>식신</th>
                    <th>상관</th>
                </tr>
                <tr id="gan_value">
                </tr>
                <tr id="ji_value">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr id="total">

                </tr>
            </table>
        </div>
    </section>

</main>

<script>
    $(function () {
        let b_arr = ['비견', '겁재', '편인', '인수', '편관', '정관', '편재', '정재', '식신', '상관'];
        let gan_arr = {
            갑: ['갑', '을', '임', '계', '경', '신', '무', '기', '병', '정'],
            을: ['을', '갑', '계', '수', '신', '경', '기', '무', '정', '병'],
            계: ['계', '임', '신', '경', '기', '무', '정', '병', '을', '갑'],
            경: ['경', '신', '무', '기', '병', '정', '갑', '을', '임', '계'],
            기: ['기', '무', '정', '병', '을', '갑', '계', '임', '신', '경'],
            병: ['병', '정', '갑', '을', '임', '계', '경', '신', '무', '기'],
            정: ['정', '병', '을', '갑', '계', '임', '신', '경', '기', '무'],
            임: ['임', '계', '경', '신', '무', '기', '병', '정', '갑', '을'],
            신: ['신', '경', '기', '무', '정', '병', '을', '갑', '계', '임'],
            무: ['무', '기', '병', '정', '갑', '을', '임', '계', '경', '신'],
        }

        const 자 = {임: 10.35, 계: 20.65}
        const 축 = {계: 9.3, 신: 3.1, 기: 18.6}
        const 인 = {무: 7.23, 병: 7.23, 갑: 16.54}
        const 묘 = {갑: 10.35, 을: 20.65}
        const 진 = {을: 9.3, 계: 3.1, 무: 18.6}
        const 사 = {무: 5.17, 경: 9.3, 병: 16.53}
        const 오 = {병: 10.35, 기: 9.3, 정: 11.35}
        const 미 = {정: 9.3, 을: 3.1, 기: 18.6}
        const 신 = {기: 7.2, 무: 3.1, 기: 3.1, 정: 17.30}
        const 유 = {경: 10.35, 신: 20.65}
        const 술 = {신: 9.3, 정: 3.1, 무: 18.6}
        const 해 = {무: 7.23, 갑: 5.17, 임: 18.6}


        $("#saju_btn").on('click', function () {
            resetTable();
            // 갑을병정 row생성
            let gan = $('#gan').val();
            if (gan == '') {
                return;
            }
            let gan_start = gan[2];
            let gan_detail = gan_arr[gan_start]

            for (let i = 0; i < $('#gan_row th').length; i++) {
                $('#gan_value').append('<td data-gan_val="' + gan_detail[i] + '">' + gan_detail[i] + '</td>');
            }

            // 간 수치 입력(ex.무계경병)
            $('#gan_value td').each(function (index, element) {
                let td_val = $(this).data('gan_val');
                for (let i = 0; i < gan.length; i++) {
                    let word = gan[i]
                    if (td_val == word) {
                        $('#ji_value td').eq(index).append('10');
                        $('#ji_value td').eq(index).append('<br>');
                    } else {
                        $('#ji_value td').eq(index).append('');
                    }
                }
            });

            // 지 수치 입력(ex.오해자자)
            let ji = $('#ji').val();
            for (let i = 0; i < ji.length; i++) {
                let ji_word = ji[i]
                let aa = jiSwitch(ji_word)
                console.log(ji_word)

                $('#gan_value td').each(function (index, element) {
                    let td_val = $(this).data('gan_val');
                    let txt = ''
                    for (let key in aa) {
                        if (key == td_val) {
                            txt = aa[key]
                            $('#ji_value td').eq(index).append(txt);
                            $('#ji_value td').eq(index).append('<br>');
                        } else {
                            txt = '';
                            $('#ji_value td').eq(index).append('');
                        }
                    }

                });
            }

            // 합계 계산

        })

        // 합계 계산 함수


        function resetTable() {
            $('#gan_value').empty();
            $('#ji_value td').empty();
        }

        function jiSwitch(ji) {
            let arr = [];
            switch (ji) {
                case '자' :
                    arr = {임: 10.35, 계: 20.65};
                    break;
                case '축' :
                    arr = {계: 9.3, 신: 3.1, 기: 18.6};
                    break;
                case '인' :
                    arr = {무: 7.23, 병: 7.23, 갑: 16.54};
                    break;
                case '묘' :
                    arr = {갑: 10.35, 을: 20.65};
                    break;
                case '진' :
                    arr = {을: 9.3, 계: 3.1, 무: 18.6};
                    break;
                case '사' :
                    arr = {무: 5.17, 경: 9.3, 병: 16.53};
                    break;
                case '오' :
                    arr = {병: 10.35, 기: 9.3, 정: 11.35};
                    break;
                case '미' :
                    arr = {정: 9.3, 을: 3.1, 기: 18.6};
                    break;
                case '신' :
                    arr = {기: 7.2, 무: 3.1, 기: 3.1, 정: 17.30};
                    break;
                case '유' :
                    arr = {경: 10.35, 신: 20.65};
                    break;
                case '술' :
                    arr = {신: 9.3, 정: 3.1, 무: 18.6};
                    break;
                case '해' :
                    arr = {무: 7.23, 갑: 5.17, 임: 18.6};
                    break;
            }
            return arr;
        }
    })
</script>

<style>
    table {
        color: black;
    }

    table td:nth-of-type(2) {
        font-weight: normal;
    }

    td, tr {
        text-align: center;
    }
</style>