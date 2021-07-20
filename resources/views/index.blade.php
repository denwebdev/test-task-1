@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-4">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        @if (session()->get('status') === 'success')
                            <div class="alert alert-success">
                                <p>{{session()->get('message')}}</p>
                            </div>
                        @endif
                        @if (session()->get('status') === 'error')
                            <div class="alert alert-danger">
                                <p>{{session()->get('message')}}</p>
                            </div>
                        @endif
                        <form action="{{route('check')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="inn" class="form-label">ИНН</label>
                                <input type="text" class="form-control" id="inn" name="inn">
                            </div>
                            <button type="submit" class="btn btn-primary">Проверить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
