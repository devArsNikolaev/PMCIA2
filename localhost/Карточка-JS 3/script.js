var Authorise = function(){
    var LoginText = document.getElementById('login-input');
    var PasswordText = document.getElementById('password-input');
    
    alert(`Логин - ${LoginText.value} \n Пароль - ${PasswordText.value}`);

};


var WriteCookie = function(){
    var LoginText = document.getElementById('login-input').value;
    var PasswordText = document.getElementById('password-input').value;
    document.cookie = `login=${LoginText}`;
    document.cookie = `password=${PasswordText}`;
    alert(LoginText);
    alert(PasswordText);
};

var ShowCookie = function(){
    alert(document.cookie);
};

var CleanCookie = function(){
    document.cookie = `max-age=-1`;
};


var submitSimple = function(){
    LoginText = document.getElementById('login-input').value;
    PasswordText = document.getElementById('password-input').value;
    if(LoginText.length == 0 || PasswordText.length == 0){
        alert("Все поля должны быть ззаполнены!");
    }
    else{
        alert("Успешно!");
    }
};

var submitRegex = function(){
    LoginText = document.getElementById('login-input').value;
    PasswordText = document.getElementById('password-input').value;
    //LoginRegex = /^[a-zA-Z1-9]+$/
    //PasswordRegex = /[0-9a-zA-Z!@#$%&*]{6,}/


    if(/[0-9a-zA-Z!@#$%&*]{6,}/.test(PasswordText) && /^[a-zA-Z1-9]+$/.test(LoginText)){
        alert("Успешно!");
    }
    else{
        alert("Заполните поля в соответствие с условиями!");
    }


};


var WriteJson = function(){
    LoginText = document.getElementById('login-input').value;
    PasswordText = document.getElementById('password-input').value;

    let info = {
        login: LoginText,
        password: PasswordText
    };

    
    var file = JSON.stringify(info);

    alert(file);

}