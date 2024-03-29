@extends("layout.index")

@section("content_header")
{{__("Cliente")}}
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{__("Cadastrar cliente")}}</h3>
            </div>

            @if(isset($softwareHouse))
                <form method="POST" action="{{route("updateSoftwareHouse", $softwareHouse->id)}}">@csrf @method("PUT")
            @else
                <form method="POST" action="{{route("storeSoftwareHouse")}}">@csrf
            @endif
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>{{__("Nome")}}</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{__("Ex: João sistemas")}}" value="{{$softwareHouse->name??old("name")}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{__("Email")}}</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="{{__("Ex: joao@mail.com")}}" value="{{$softwareHouse->email??old("email")}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>{{__("Documento")}}</label>
                            <input onkeyup="return changeDocumentType(this.value)" maxlength="18" type="text" class="form-control" name="document" id="document" placeholder="{{__("Ex: 999.999.999-99")}}" value="{{$softwareHouse->document??old("document")}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{__("Celular")}}</label>
                            <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="{{__("Ex: (99) 99999-9999")}}" value="{{$softwareHouse->mobile_phone??old("mobile_phone")}}">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section("js")
    <script>
        $(document).ready(function(){
           $("#mobile_phone").mask("(99)99999-9999");
           @if(isset($softwareHouse))
           if({{strlen($softwareHouse->documento)}} <= 14){
                $('#document').mask('###.###.###-##');
            }else{
                $('#document').mask('##.###.###/####-##');
            }
           @endif
        });

        function changeDocumentType(document){
            if(document.length <= 14){
                $('#document').mask('###.###.###-##');
            }else{
                $('#document').mask('##.###.###/####-##');
            }
        }
    </script>
@endsection
