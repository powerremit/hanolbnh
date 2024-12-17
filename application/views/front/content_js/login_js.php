<script>
    $(function () {
        $('#login_btn').on('click', function () {
            let id = $('#id').val();
            let pw = $('#password').val();
            _cmn.ajax.exec({
                url: '/api/member/login',
                data: {
                    'id' : id,
                    'pw' : _cmn.encrypt.cryptoJs(pw),
                    [_cmn.ajax.csrf_token_name]: _cmn.ajax.csrf_token
                },
                success: function (res) {
                    if (res.status == 'success') {
                        alert('로그인')
                    } else {
                        toast(res.msg);
                    }
                }
            })
        })
    })
</script>