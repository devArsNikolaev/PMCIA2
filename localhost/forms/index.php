<html>
    <head>
        <script defer src="script.js"></script>
    
    </head>


    <body>
        <script>
            var Authorise = function(){
            let LoginText = document.getElementById('login-input');
            alert(LoginText.text);

            };
        </script>
    <form name="Auth">
        <div>Пожалуйста, авторизуйтесь</div>
        <div>Логин</div>
        <input id="login-input" type="text" required>
        <div>Пароль</div>
        <input id="password-input" type="text" required>
        <p><input id="remember-checkbox" type="checkbox"> Запомнить меня на этом компьютере</p>
        <input id="authorise-button" type="button" value="Авторизоваться" onclick="Authorise()"> 
        <input id="write-cookie-button" type="button" value="Записать Cookie" onclick="WriteCookie()"> 
        <input id="show-cookie-button" type="button" value="Вывести Cookie" onclick="ShowCookie()"> 
        <input id="clean-cookie-button" type="button" value="Очистить Cookie" onclick="CleanCookie()"> 

        <div></div>

        <input type="button" id="submit1" value="Проверить на заполнение" onclick="submitSimple()">
        <input type="button" id="checkregex" value="проверить в соответствие с условием" onclick="submitRegex()">

        <input type="button" id="write-json" value="Вывести JSON" onclick="WriteJson()">

    </form>
    </body>



</html>