<h1>Add Form</h1>
    <form action="addBook" method="POST" class="my-4" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Seleccione una opcion</label>
            <select name="id_author" class="form-control">
                {foreach from =$authors item=$item}
                    <option value="{$item->id_author}">{$item->name}</option>
                {/foreach}
            </select>
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control"  name="titulo">
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Genero</label>
            <input type="text" class="form-control"  name="genero">
        </div>
        <div class="mb-3">
        <input type="file" class="form-control" name="input_name" id="imageToUpload">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>