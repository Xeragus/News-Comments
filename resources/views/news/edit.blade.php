@extends('layout.main')
@section('content')
    <div class="news-edit-wrapper">
        <div class="alert alert-danger" role="alert" style="display: none;">
        </div>
        <div class="alert alert-success" role="alert" style="display: none;">
        </div>
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Edit news: #{{$news->id}}</h3>
                <p>Upvotes <span class="badge badge-light">{{$news->num_upvotes}}</span></p>
            </div>
            <div class="">
                <a href="javascript:;" id="remove" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </div>
        </div>
        <form id="news_edit_form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$news->news_title}}">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url" value="{{$news->news_link}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;">{{$news->news_description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $('#news_edit_form').on('submit', function(event) {
            event.preventDefault();
            let form = $(this);

            $.ajax({
                type: "PUT",
                url: "/news/{{$news->id}}",
                data: form.serialize(),
                success: function(response) {
                    if (response.error) {
                        response.messages.forEach(function(message) {
                            $('.alert-danger').append('<p>' + message + '</p>');
                        });
                        $('.alert-danger').show();
                    } else {
                        response.messages.forEach(function(message) {
                            $('.alert-success').append('<p>' + message + '</p>');
                        });
                        $('.alert-success').show();
                    }
                }
            });
        });

        $('#remove').on('click', function(event) {
            event.preventDefault();

            $.ajax({
                type: "DELETE",
                url: "/news/{{$news->id}}",
                success: function(response) {

                }
            });
        });
    </script>
@endsection