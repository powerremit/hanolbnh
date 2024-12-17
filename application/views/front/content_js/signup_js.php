<script>
    $(function () {
        // 비밀번호 확인
        $('#password_c, #password').on('keyup', function (e) {
            console.log('aa')
            // 비밀번호 확인 검사
            let pw = $('#password').val()
            let pwc = $('#password_c').val();
            if (pw === pwc) {
                $('.pwc').text('')
            } else {
                $('.pwc').text('비밀번호가 일치하지 않습니다.')
            }
        })


        $('#signup_btn').on('click', function () {
            // 유효성 검사
            let isValid = true;
            $('#join_form input').each(function () {
                if ($(this).val() === '') {
                    isValid = false;
                    toast('값을 모두 넣어주세요.')
                    return false;
                }
            })

            // 비밀번호 불일치
            let pw = $('#password').val()
            let pwc = $('#password_c').val();
            if (pw !== pwc) {
                toast('비밀번호가 일치하지 않습니다.')
                $('#password_c').focus();
                return;
            }

            if (isValid) {
                _cmn.ajax.exec({
                    url: '/api/member/register',
                    data: {
                        'id': $('#id').val(),
                        'pw': $('#password').val(),
                        'pwc': $('#password_c').val(),
                        'name': $('#user_name').val(),
                        'email': $('#email').val(),
                        'birthday': $('#birthday').val(),
                        'gender': $('#gender').val(),
                        'region': $('#region').val(),
                        [_cmn.ajax.csrf_token_name]: _cmn.ajax.csrf_token,
                    },
                    success: function (res) {
                        if (res.status == 'success') {
                            toast('회원가입에 성공하였습니다. 메인화면으로 이동합니다.')
                            setTimeout(function () {
                                location.href = '/'
                            }, 1500)
                        } else {
                            toast(res.msg);
                        }
                    }
                })
            }


        })


    })
</script>