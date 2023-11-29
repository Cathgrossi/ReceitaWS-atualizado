<h1 style="color:#9c6d3d">Novo Usuario</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar2">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn" style="background-color: #9c6d3d" > Enviar</button>
        <button type="button" class="btn" style="background-color: rgb(156, 109, 61)" onclick="limparInputs()"> Limpar Campos</button>
    </div>
</form>

<script>
    function limparInputs() {
        var inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="date"]');
        
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
    }
</script>
