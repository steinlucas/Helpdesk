
<h1>Bem-vindo ao seu HelpDesk</h1>
</br>

<form action="{{ route('session.login') }}" method="POST">
    @csrf
    <fieldset>
    <legend>Dados de Login</legend>
        <label for="txUsuario">Usuário</label>
        <input type="text" name="username" id="txUsuario" maxlength="25" />
        <label for="txSenha">Senha</label>
        <input type="password" name="password" id="txSenha" />

        <input type="submit" value="Entrar" />
    </fieldset>
</form>
