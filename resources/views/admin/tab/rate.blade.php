<div class="box-body table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th colspan="4">
                <h3>{{ $select->title }}</h3>
            </th>
            <th colspan="4">
                <button id="add_new_rate" onclick="onAddRate()" class="btn btn-success pull-right"><span
                            class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
        <tr>
            <th>From Date</th>
            <th>To Date</th>
            <th>Sun-thu</th>
            <th>Fri-Sat</th>
            <th>Holiday</th>
            <th>Breakfast</th>
            <th>Extra Bed</th>
            <th>Option</th>
        </tr>
        </thead>
        <tbody id="rate_list">
        </tbody>
    </table>
</div><!-- /.box-body -->

<script type="application/javascript">

    $(document).ready(function () {
        var id = '{{ $select->id }}';
        rate(id);
    });

    function queryRateData(result) {
        $("#rate_list").empty();
        if (result.success == true) {
            $.each(result.rates, function (key, value) {
                var id = (value['id']) ? value['id'] : '';
                var from_date = (value['from_date']) ? value['from_date'] : '';
                var to_date = (value['to_date']) ? value['to_date'] : '';
                var first = (value['first']) ? value['first'] : '';
                var second = (value['second']) ? value['second'] : '';
                var holiday = (value['holiday']) ? value['holiday'] : '';
                var breakfast = (value['breakfast']) ? value['breakfast'] : '';
                var extrabed = (value['extrabed']) ? value['extrabed'] : '';

                $("#rate_list").append('<tr id="rate_' + id + '">'
                    + '<td><input type="date" id="from_date' + id + '" class="form-control input-sm" value="' + from_date + '"></td>'
                    + '<td><input type="date" id="to_date' + id + '" class="form-control input-sm" value="' + to_date + '"></td>'
                    + '<td><input type="number" id="first' + id + '" class="form-control input-sm" value="' + first + '"></td>'
                    + '<td><input type="number" id="second' + id + '" class="form-control input-sm" value="' + second + '"></td>'
                    + '<td><input type="number" id="holiday' + id + '" class="form-control input-sm" value="' + holiday + '"></td>'
                    + '<td><select id="breakfast' + id + '" class="form-control input-sm" value="' + breakfast + '">'
                    + '<option value="1">Yes</option>'
                    + '<option value="0">No</option>'
                    + '</select></td>'
                    + '<td><input type="number" id="extrabed' + id + '" class="form-control input-sm" value="' + extrabed + '"></td>'
                    + '<td><a onclick="saveRate(' + id + ')" style="cursor: pointer"><span class="glyphicon glyphicon-floppy-disk"></span></a> | '
                    + '<a onclick="deleteRate(' + id + ')" style="cursor: pointer"><span class="glyphicon glyphicon-trash"></span></a></td>'
                    + '</tr>');
            });
        }
    }

    function rate(id) {
        $.ajax({
            url: '{{ url('admin/rate') }}/' + id,
            type: 'GET',
            success: function (result) {
                queryRateData(result);
            }
        });

    }

    function onAddRate() {
        var token = '{{ csrf_token() }}';
        var room_id = '{{ $select->id }}';
        var url = "{{ url('admin/rate') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                room_id: room_id,
                _token: token
            },
            success: function (result) {
                queryRateData(result);
            },
            error: function () {
                $("#rate_list").append('<tr>'
                    + '<td colspan="8" align="center">No data</td>'
                    + '</tr>');
            }
        });
    }

    function saveRate(id) {
        var token = '{{ csrf_token() }}';
        var from_date = $("#from_date" + id).val();
        var to_date = $("#to_date" + id).val();
        var first = $("#first" + id).val();
        var second = $("#second" + id).val();
        var holiday = $("#holiday" + id).val();
        var breakfast = $("#breakfast" + id).val();
        var extrabed = $("#extrabed" + id).val();
        var url = "{{ url('admin/rate') }}/" + id;
        var confirm = window.confirm('Are you sure to save?');
        if (confirm == true) {
            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    first: first,
                    second: second,
                    holiday: holiday,
                    breakfast: breakfast,
                    extrabed: extrabed,
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
                    alert('Save Rate failed!');
                }
            });
        }
    }

    function deleteRate(id) {
        var url = "{{ url('admin/rate') }}/" + id;
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
                        $('#rate_' + id).remove();
                    } else {
                        alert(result.message);
                    }
                }
                ,
                error: function () {
                    alert('Delete Rate failed!');
                }
            })
            ;
        }
    }

</script>