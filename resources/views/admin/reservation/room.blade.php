@extends('layouts.app')
@section('htmlheader_title')
    {{ $page['title'] or '' }}
@stop
@section('content')
    <style>
        .cursor-pointer{
            cursor: pointer
        }
    </style>

    <table class="table table-hover">
        <thead>
        <tr>
            @foreach($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @forelse ($select as $r)
        <tr class="cursor-pointer" data-toggle="modal" data-target="#reservationModal" onclick="reservationData('{{ $r->id }}','{{$r->name}}','{{$r->agency}}')">
            <td>{{ $r->name }}</td>
            <td>{{ $r->agency }}</td>
        </tr>
        @empty
        <tr>
            <td>No Subroom</td>
        </tr>
        @endforelse
        </tbody>
    </table>
        <!-- Modal -->
    <div id="reservationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <input id="customer_name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Tel</label>                
                    <input id="tel" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="agency">Agency</label>                                
                    <input id="agency" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>                                                
                    <input id="cost" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Cost</label>                                                
                    <select id="status"class="form-control">
                        <option value="0">Not pay</option>
                        <option value="1">Pay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>                                                                
                    <textarea id="note" rows="5" cols="5" class="form-control"></textarea>
                </div>
                <input id="subroom_id" type="hidden" disabled>
                <input id="subroom_name" type="hidden" disabled>
                <input id="id" type="hidden" disabled>
                <input id="method" type="hidden" disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="reservationSubmit()">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        function reservationData(subroom_id, subroom_name ,agency) {
            let date = '{{ $date }}';
            let token = '{{ csrf_token() }}';
            $("#modal-title").html(subroom_name+' : '+date)
            $("#agency").val(agency)
            $("#subroom_id").val(subroom_id)
            $("#subroom_name").val(subroom_name)
            $.ajax({
                    url: '/admin/reservation/check',
                    type: 'GET',
                    data: {
                        subroom_id: subroom_id,
                        date: date,
                        _token: token
                    },
                    success: function (result) {
                        if (result.success === true) {
                            $("#id").val(result.select.id)
                            $("#subroom_id").val(result.select.subroom_id)
                            $("#subroom_name").val(result.select.subroom_name)
                            $("#customer_name").val(result.select.customer_name);
                            $("#tel").val(result.select.tel);

                            if(result.select.agency){
                                $("#agency").val(result.select.agency);
                            }else{
                                $("#agency").val(agency);
                            }
                            
                            $("#status").val(result.select.status);
                            $("#cost").val(result.select.cost);
                            $("#note").val(result.select.note);
                        }
                    }
                });
        }

        function reservationSubmit() {
            let id = $("#id").val();
            let subroom_id = $("#subroom_id").val();
            let subroom_name = $("#subroom_name").val();
            let customer_name = $("#customer_name").val();
            let tel = $("#tel").val();
            let agency = $("#agency").val();
            let status = $("#status").val();
            let cost = $("#cost").val();
            let note = $("#note").val();
            let date = '{{ $date }}';
            let token = '{{ csrf_token() }}';
            
            var confirm = window.confirm('Are you sure to save?');
            if (confirm === true) {
                $.ajax({
                    url: '/admin/reservation/'+id,
                    type: 'PUT',
                    data: {
                        subroom_id: subroom_id,
                        subroom_name: subroom_name,
                        customer_name: customer_name,
                        tel: tel,
                        agency: agency,
                        status: status,
                        cost: cost,
                        note: note,
                        date: date,
                        _token: token
                    },
                    success: function (result) {
                        if (result.success === true) {
                            alert(result.message);
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function () {
                        alert('Failed!');
                    }
                });
            }
        }
    </script>
@stop