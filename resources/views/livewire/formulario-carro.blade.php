<div>
    <form  wire:submit.prevent='guardar'>

        <div class = "row row-gap-3 row-cols-2 mb-3">

            <div class = "col">
                <label for="marca" >Marca:</label>
                <select name="marca" wire:model.live='marca' class="form-select bg-white border-2 @error('marca') is-invalid @enderror" aria-label="Default select example">
                    <option value="" selected>Selecciona Marca</option>
                    @foreach ($marcas as $marca_vista)
                        <option value="{{$marca_vista->id}}" wire:key='{{$marca_vista->id}}'>{{$marca_vista->nombre}}</option>
                    @endforeach
                  </select>
                  @error('marca')
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
            </div>

            <div class = "col">
                <label for="modelo">Modelo:</label>
                <select wire:model.live='modelo' name="modelo" class="form-select bg-white border-2 @error('modelo') is-invalid @enderror"  aria-label="Default select example">
                    <option value="" selected>Selecciona Modelo</option>
                    @foreach ($modelos as $modelo_vista)
                        <option value="{{$modelo_vista->id}}" wire:key='{{$modelo_vista->id}}'>{{$modelo_vista->nombre}}</option>
                    @endforeach
                  </select>
                @error('modelo')
                  <div class = "invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>

            <div class = "col">
                <label for="ano">Año:</label>
                <select name="ano" class="form-select bg-white border-2 @error('ano') is-invalid @enderror" wire:model='ano' aria-label="Default select example">
                    <option selected>Selecciona el año</option>
                    @for ($i = intval(date('Y')); $i >= 1900; $i--)
                        <option value = {{$i}}>{{$i}}</option>
                    @endfor
                  </select>
                
                  @error('ano')
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
            </div>

            <div class = "col">
                <label for="color">Color:</label>
                <select name="color" wire:model='color' class="form-select bg-white border-2 @error('color') is-invalid @enderror" aria-label="Default select example">
                    <option value="" selected>Selecciona el color</option>
                    @foreach ($colores as $color_vista)
                        <option value="{{$color_vista->id}}" wire:key='{{$color_vista->id}}'>{{$color_vista->nombre}}</option>
                    @endforeach
                  </select>

                  @error('color')
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
            </div>

            <div class = "col">
                <label for="precio">Precio:</label>
                <input type="number" wire:model='precio' class="form-control bg-white border-2 @error('precio') is-invalid @enderror" placeholder="0.00$" name="precio" step = "0.01" min = "0">

                @error('precio')
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class = "col">
                <label for="kilometraje">Kilometraje:</label>
                <input type="number" wire:model='kilometraje' class="form-control bg-white border-2 @error('kilometraje') is-invalid @enderror" placeholder="0Km" name="kilometraje" min = "0">

                @error('kilometraje')
                    <div class = "invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class = "d-flex justify-content-end">
            <input class = "d-block btn btn-primary fw-semibold" type="submit" value = "Enviar">
        </div>
    </form>
</div>
