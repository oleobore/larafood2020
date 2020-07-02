@include('admin.includes.alerts')

@csrf

<div class="form-group">
 <label>Nome:</label>
 <input type="text" name="name" class="form-control" placeholder="Digite o nome do plano" value="{{ $permission->name ?? ''}}">
</div>
<div class="form-group">
 <label>Descrição:</label>
 <input type="text" name="description" class="form-control" placeholder="Digite a descrição do plano" value="{{ $permission->description ?? ''}}">
</div>
<div class="form-group">
 <button class="btn btn-dark" type="submit">Salvar</button>
</div>