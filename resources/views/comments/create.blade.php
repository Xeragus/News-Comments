@extends('layout.main')
@section('content')
<div class="comments-create-wrapper">
    <div class="alert alert-danger" role="alert" style="display: none;">
    </div>
    <div class="alert alert-success" role="alert" style="display: none;">
    </div>
    <h3>Write a comment for the news #{{$news->id}}</h3>
    <form id="comments_create_form">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="comment">Description</label>
            <textarea class="form-control" id="comment" rows="3" name="comment" style="resize: none;"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    $('#comments_create_form').on('submit', function() {
        event.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: "/news/{{$news->id}}/comments",
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