@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-top: 20px">
        <div class="col-6 offset-2">
            <div class="card">
                <div class="card-header">
                    Перелік Категорій
                </div>
                <div class="card-body">
                    <table class="table table-light category-list">
                        <tbody id="sortable">
                            <tr>
                                <td>Slug</td>
                                <td>Українською</td>
                                <td>Російською</td>
                            </tr>
                            @foreach($categories as $category)
                                <tr class="category_items">
                                    <td id="category_id" hidden>{{ $category->id }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->title_ua }}</td>
                                    <td>{{ $category->title_ru }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-danger" id="change_position" onclick="save_category_position()">Зберегти</button>
                </div>
            </div>
        </div>

        <div class="col-3 ">
            <div class="card">
                <div class="card-header">
                    Створити категорію
                </div>
                <div class="card-body">
                   <form>
                       <input class="form-control" type="text" name="name_ua" placeholder="Назва українською">
                       <input class="form-control" type="text" name="name_ru" placeholder="Назва російською"><br>
                       <input class="form-control" type="text" name="color" placeholder="Колір мітки"><br>
                       <input class="btn btn-success" type="button" name="create_category" value="Створити">
                   </form>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    ...--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <script>
        let data = {};
        $('input[name=create_category]').on('click', function () {
            data._token = "{{ csrf_token() }}";
            data.title_ua = $('input[name=name_ua]').val();
            data.title_ru = $('input[name=name_ru]').val();
            data.color = $('input[name=color]').val();

            $.ajax({
                url: "{{ route('categories-create') }}",
                method: 'post',
                data: data,
                success: function (response) {
                    if(response.status === '201'){
                        $('input[name=name_ua]').val('');
                        $('input[name=name_ru]').val('');
                        $('input[name=color]').val('');
                        $('.category-list').append('<tr><td>'+response['data']['slug']+'</td><td>'+response['data']['title_ua']+'</td><td>'+response['data']['title_ru']+'</td></tr>')
                    }
                    if(response.status === '200'){
                        $('input[name=name_ua]').val('');
                        $('input[name=name_ru]').val('');
                        $('input[name=color]').val('');
                    }
                }
            });
        });

        $( function() {
            $('#change_position').hide();
            $( "#sortable" ).sortable({
                // start: function(event, ui) {
                //     alert('ok');
                //     var start_pos = ui.item.index();
                //     ui.item.data('start_pos', start_pos);
                // },
                // change: function(event, ui) {
                //     alert('ok');
                //     var start_pos = ui.item.data('start_pos');
                //     var index = ui.placeholder.index();
                //     if (start_pos < index) {
                //         $('#sortable li:nth-child(' + index + ')').addClass('highlights');
                //     } else {
                //         $('#sortable li:eq(' + (index + 1) + ')').addClass('highlights');
                //     }
                // },
                update: function(event, ui) {
                    $('#change_position').show();
                }
            });
            $( "#sortable" ).disableSelection();
        } );

        function save_category_position() {
            let categories = $('.category_items');
            let data = [];

            $.each(categories, function (k,v) {
                data.push($(v).find('#category_id').text());
            });

            $.ajax({
                url: "{{ route('change-position') }}",
                method: 'put',
                data: {"_token": "{{ csrf_token() }}", "data": data},
                success: function (response) {
                    if(response.status === 200){
                        location.reload();
                    }
                }
            })
        }
    </script>
@endsection
