document.addEventListener('DOMContentLoaded', () => {
    const id = document.querySelector('#id');
    const pw = document.querySelector('#pw');
    const btn = document.querySelector('#login_btn');
    btn.addEventListener('click', (e) => {
        e.preventDefault();

        //false 를 입력안하면 다음으로 넘어감
        if(id.value == ''){
            alert('아이디를 입력하세요')
            id.focus();
            return false;
        }

        if(pw.value == ''){
            alert('비밀번호를 입력하세요')
            pw.focus();
            return false;
        }

        document.login_form.submit();
    })
})