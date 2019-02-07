@extends('layout.main')
@section('content')
    <div class="news-create-wrapper">
        <div class="alert alert-danger" role="alert" style="display: none;">
        </div>
        <div class="alert alert-success" role="alert" style="display: none;">
        </div>
        <h3>Create news</h3>
        <form id="news_create_form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $('#news_create_form').on('submit', function() {
            event.preventDefault();
            let form = $(this);

            $.ajax({
                type: "POST",
                url: "/news",
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
    </script>
@endsection
