<script>
    //パスワードが一致しなかったらエラーメッセージをフロントで表示

    const password = document.getElementById("password");//パスワード入力フォームの値を取得
    const passwordConfirm = document.getElementById("password-confirm");//確認用フォームの値を取得
    
    passwordConfirm.addEventListener('input',function(){
      if(password.value !== passwordConfirm.value){
        passwordConfirm.setCustomValidity('パスワードが一致しません'); // エラーメッセージのセット
      }else{
        passwordConfirm.setCustomValidity(''); // エラーメッセージのクリア
      }
    })
</script>