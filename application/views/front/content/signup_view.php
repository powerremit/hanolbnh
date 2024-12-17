<!-- MAIN -->
<main role="main">
    <!-- TOP SECTION -->
        <section class="grid margin">
        <div class="login-container s-12 m-10 l-4 center">
            <h2 class="text-white">JOIN MEMBER</h2>

            <form action="/signup" method="POST" onsubmit="return false" id="join_form">
                <!-- 아이디 입력 -->
                <div class="input-group">
                    <label for="id">ID</label>
                    <input type="text" id="id" name="id" placeholder="Enter your id">
                </div>

                <!-- 비밀번호 입력 -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>

                <!-- 비밀번호 확인 입력 -->
                <div class="input-group">
                    <label for="password_c">Confirm Password</label>
                    <input type="password" id="password_c" name="password_c" placeholder="Enter your password">
                    <span class="pwc text-orange"></span>
                </div>

                <!-- 이름 입력 -->
                <div class="input-group">
                    <label for="user_name">Name</label>
                    <input type="text" id="user_name" name="user_name" placeholder="Enter your name">
                </div>

                <!-- 이메일 입력 -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email address">
                </div>

                <!-- 생년월일 입력 -->
                <div class="input-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" placeholder="Enter your birthday">
                </div>

                <!-- 성별 입력 -->
                <div class="input-group">
                    <label for="gender">Gender</label>
                    <select class="join_select" name="gender" id="gender">
                        <option value="male" selected>Male</option>
                        <option value="femail">Female</option>
                    </select>
                </div>

                <!-- 국적 입력 -->
                <div class="input-group">
                    <label for="region">Country</label>
                    <select class="join_select" name="region" id="region">
                        <option value="KR" selected>South Korea</option>
                        <option value="VN">Vietnam</option>
                        <option value="MN">Mongolia</option>
                        <option value="ID">Indonesia</option>
                        <option value="PK">Pakistan</option>
                        <option value="IR">Iran</option>
                        <option value="MY">Malaysia</option>
                        <option value="etc">Other</option>
                    </select>
                </div>

                <!-- 가입 버튼 -->
                <button type="submit" class="signup-btn" id="signup_btn">Sign Up</button>
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
        display: block;
    }

    .join_select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: block;
    }

    .signup-btn {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .signup-btn:hover {
        background-color: #0056b3;
    }

</style>
<script>
</script>
