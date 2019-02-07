@extends('layout.main')
@section('content')
    <div class="comments-edit-wrapper">
        <form id="comments_edit_form">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $('#comments_edit_form').on('submit', function() {
            let form = $(this);

            $.ajax({
                type: "POST",
                url: "",
                data: form.serialize(),
                success: function(response) {
                    if (response.error) {

                    } else {

                    }
                }
            });
        });
    </script>
@endsection