<?php
    use Illuminate\Support\Facades\Input;

    $errors = collect($errors->all());

    if(Input::get('wrongpassword') == true) {
        $errors->push("Wrong password!");
    }
?>
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif