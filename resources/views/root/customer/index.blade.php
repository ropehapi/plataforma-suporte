@extends("layout.index")

@section("content_header")
    {{__("Cliente")}}
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <table id="customersTable" class="table table-bordered table-hover dataTable dtr-inline">
                <thead>
                    <tr>
                        <th class="sorting">{{__("Nome")}}</th>
                        <th class="sorting">{{__("Email")}}</th>
                        <th class="sorting">{{__("Documento")}}</th>
                        <th class="sorting">{{__("Celular")}}</th>
                        <th class="sorting">{{__("Status")}}</th>
                        <th class="sorting">{{__("Ações")}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->getMaskedDocument()}}</td>
                        <td>{{$customer->getMaskedMobilePhone()}}</td>
                        <td>{{$customer->status}}</td>
                        <td>
                            <form method="GET" action="{{route("editCustomer",$customer->id)}}" style="display: inline">
                                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </form>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" onclick="setDeleteModalContent({{$customer->id}},'{{$customer->name}}')"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form method="POST" action="{{route('deleteCustomer')}}">
        @csrf
        @method("DELETE")
        <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__("Excluir registro")}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__("Tem certeza que deseja excluir o registro ")}}<b id="record"></b></p>
                        <input type="text" name="id" id="id" hidden>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-outline-light" data-dismiss="modal">{{__("Cancelar")}}</button>
                        <button class="btn btn-outline-light">{{__("Excluir")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section("js")
    <script>
        $(document).ready(function(){
            $('#customersTable').DataTable();
        });

        function setDeleteModalContent(id, record){
            $("#id").val(id);
            $("#record").text(record);
        }
    </script>
@endsection
