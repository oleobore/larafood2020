@include('admin.includes.alerts')

<div class="form-group">
 <label>Nome:</label>
 <input type="text" name="name" class="form-control" placeholder="Digite o nome do plano" value="{{ $plan->name ?? ''}}">
</div>
<div class="form-group">
 <label>Preço:</label>
 <input type="text" name="price" class="form-control" placeholder="Digite o preço do plano" value="{{ $plan->price ?? ''}}">
</div>
<div class="form-group">
 <label>Descrição:</label>
 <input type="text" name="description" class="form-control" placeholder="Digite a descrição do plano" value="{{ $plan->description ?? ''}}">
</div>
<div class="form-group">
 <button class="btn btn-dark" type="submit">Salvar</button>
</div>