@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
          <h1>Create a new question:</h1>

            <form action="{{ route('questions.store') }}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="title">Description:</label>
                    <input type="text" class="form-control" name="description" required>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <h3><well>Posible respuestas:</well></h3>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label for="answer1">Answer 1:</label>
                            <input type="text" class="form-control" name="answer1" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label for="answer2">Answer 2:</label>
                            <input type="text" class="form-control" name="answer2" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <div class="form-group">
                            <label for="answer3">Answer 3:</label>
                            <input type="text" class="form-control" name="answer3" required>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success" value="Registrar">
            </form>
        </div>
    </div>

    @endsection
