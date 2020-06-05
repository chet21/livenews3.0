@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-top: 25px">
        <div class="col-6 offset-2">
            <div class="card card-outline card-info">
                <table class="table table-light">
                    <tr>
                        <td></td>
                        <td>title ua</td>
                        <td>title ru</td>
                        <td>belong to category</td>
                    </tr>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                <input type="checkbox" name="tag_id" id="tag_id_{{$tag->id}}">
                            </td>
                            <td>{{ $tag->title_ua }}</td>
                            <td>{{ $tag->title_ru }}</td>
                            <td>
                                @foreach($tag->categories as $category)
                                    {{ $category->title_ua }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button id="save_relation" onclick="save_relation()">Зберегти</button>
            </div>
            {{ $tags->links() }}
        </div>
        <div class="col-3" id="categories">
            <div class="card card-outline card-info" style="width: 150px">
                <select name="category_id">
                    <option selected>---</option>
                    @foreach($categorise as $category)
                        <option value="{{ $category->id }}">{{ $category->title_ua }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <script>
        $('#categories').hide();
        $('#save_relation').hide();

        (function () {
            $('input[name=tag_id]').on('click', function () {
                let item = 0;
                $.each($('input[name=tag_id]'), function (k,v) {
                    if($(v).is(':checked')){
                        item++;
                    }
                });
                if(item > 0){
                    $('#save_relation').show();
                    $('#categories').show();
                }else{
                    $('#save_relation').hide();
                    $('#categories').hide();
                }
            })
        }());

        function save_relation() {
            let data = [];
            let category_id = $('select[name=category_id]').children("option:selected").val();

            $.each($('input[name=tag_id]'), function (k,v) {
                if($(v).is(':checked')){
                    let tag_id = $(v).attr('id').replace("tag_id_", "");
                    data.push({"categories_id": category_id, "tags_id": tag_id})
                }
            });

            $.ajax({
                url: "{{ route('save-tag-category-relation') }}",
                method: 'post',
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


