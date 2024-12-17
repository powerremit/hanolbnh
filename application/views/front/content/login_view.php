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
        <div class="login-container s-12 m-10 l-4 center">
            <h2 class="text-white">LOGIN</h2>

            <form action="/login" method="POST">
                <!-- 이메일 입력 -->
                <div class="input-group">
                    <label for="id">ID</label>
                    <input type="text" id="text" name="id" required placeholder="Enter your id">
                </div>

                <!-- 비밀번호 입력 -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>

                <!-- 로그인 버튼 -->
                <button type="submit" class="login-btn">Login</button>

                <!-- 회원가입 및 비밀번호 찾기 버튼 -->
                <div class="additional-options">
                    <a href="/signup" class="signup-btn">Sign Up</a>
                    <span>/</span>
                    <a href="/forgot-password" class="forgot-password-btn">Forgot Password?</a>
                </div>
            </form>
        </div>
    </section>

</main>

<style>
    .login-container {
        /*background-color: #fff;*/
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    .input-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .input-group label {
        font-size: 14px;
        color: #fff;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-btn {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .login-btn:hover {
        background-color: #0056b3;
    }

    .additional-options {
        margin-top: 15px;
        margin-right: 10px;
    }

    .signup-btn, .forgot-password-btn {
        display: inline-block;
        margin-top: 10px;
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
    }

    .signup-btn:hover, .forgot-password-btn:hover {
        text-decoration: underline;
    }
</style>
<script>
</script>
