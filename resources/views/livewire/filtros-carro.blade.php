<div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Filtros
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body row row-gap-3 row-cols-2 mb-3">
              
                <div class = "col">
                    <label for="marca" >Marca:</label>
                    <select name="marca" wire:model.live='marca' class="form-select @error('marca') is-invalid @enderror" aria-label="Default select example">
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
                    <select wire:model.live='modelo' name="modelo" class="form-select @error('modelo') is-invalid @enderror"  aria-label="Default select example">
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
                    <label for="color">Color:</label>
                    <select name="color" wire:model.live='color' class="form-select @error('color') is-invalid @enderror" aria-label="Default select example">
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
            </div>
          </div>
        </div>
      </div>
    <div class = "row row-gap-3 row-cols-2 mb-3">

    </div>
</div>
