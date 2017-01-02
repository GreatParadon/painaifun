<div class="box-body table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th colspan="2">
                <h3>{{ $select->title }}</h3>
            </th>
            <th colspan="1">
                <button id="add_new_room" onclick="onAddroom()" class="btn btn-success pull-right"><span
                            class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Agency</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody id="subroom_list">
        </tbody>
    </table>
</div><!-- /.box-body -->

<script type="application/javascript">

    $(document).ready(function () {
        var id = '{{ $select->id }}';
        room(id);
    });

    function queryRoomData(result) {
        $("#subroom_list").empty();
        if (result.success == true) {
            $.each(result.sub_rooms, function (key, value) {
                var id = (value['id']) ? value['id'] : '';
                var name = (value['name']) ? value['name'] : '';
                var agency = (value['agency']) ? value['agency'] : '';

                $("#subroom_list").append('<tr id="subroom_' + id + '">'
                    + '<td><input type="text" id="name' + id + '" class="form-control input-sm" value="' + name + '"></td>'
                    + '<td><input type="text" id="agency' + id + '" class="form-control input-sm" value="' + agency + '"></td>'
//                    + '<td><select id="breakfast' + id + '" class="form-control input-sm" value="' + breakfast + '">'
//                    + '<option value="1">Yes</option>'
//                    + '<option value="0">No</option>'
//                    + '</select></td>'
                    + '<td><a onclick="saveRoom(' + id + ')" style="cursor: pointer"><span class="glyphicon glyphicon-floppy-disk"></span></a> | '
                    + '<a onclick="deleteRoom(' + id + ')" style="cursor: pointer"><span class="glyphicon glyphicon-trash"></span></a></td>'
                    + '</tr>');
            });
        }
    }

    function room(id) {
        $.ajax({
            url: '{{ url('admin/subroom') }}/' + id,
            type: 'GET',
            success: function (result) {
                queryRoomData(result);
            }
        });

    }

    function onAddroom() {
        var token = '{{ csrf_token() }}';
        var room_id = '{{ $select->id }}';
        var url = "{{ url('admin/subroom') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                room_id: room_id,
                _token: token
            },
            success: function (result) {
                queryRoomData(result);
            },
            error: function () {
                $("#room_list").append('<tr>'
                    + '<td colspan="4" align="center">No data</td>'
                    + '</tr>');
            }
        });
    }

    function saveRoom(id) {
        var token = '{{ csrf_token() }}';
        var name = $("#name" + id).val();
        var agency = $("#agency" + id).val();
        var url = "{{ url('admin/subroom') }}/" + id;
        var confirm = window.confirm('Are you sure to save?');
        if (confirm == true) {
            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    name: name,
                    agency: agency,
                    _token: token
                },
                success: function (result) {
                    if (result.success == true) {
                        alert(result.message);
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    alert('Save room failed!');
                }
            });
        }
    }

    function deleteRoom(id) {
        var url = "{{ url('admin/subroom') }}/" + id;
        var confirm = window.confirm('Are you sure to delete ?');
        if (confirm == true) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result.success == true) {
                        alert(result.message);
                        $('#subroom_' + id).remove();
                    } else {
                        alert(result.message);
                    }
                }
                ,
                error: function () {
                    alert('Delete room failed!');
                }
            })
            ;
        }
    }

</script>