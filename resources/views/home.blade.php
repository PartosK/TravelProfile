@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Профиль пользователя: {{$user->name}}</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="row">
                                <div  class="col-md-4 col-sm-4">
                                   ФИО
                                </div>
                                <div  class="col-md-8 col-sm-8">
                                    <input placeholder="ФИО" class="form-control" type="text" id="fio" name="fio" value="{{$user->fio}}" >
                                    <button type="button" class="btn btn-default" id="editFio" name="editFio"><span
                                                class='glyphicon glyphicon-floppy-disk'
                                                aria-hidden='true'></span></button>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                Email
                                <br>
                                <a href="{{ route('editEmail') }}" class="btn btn-success">Добавить Email</a>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                Основной:<br>
                                <table class="table-bordered">
                                    @foreach($user->profileEmail as $email)
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label> <input type="radio" name="email"
                                                                   @if($email->main) {{'checked'}} @endif value="{{$email->id}}"> {{$email->email}}
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <form class="form-inline" method="GET"
                                                      action="{{ route('editEmail') }}">
                                                    <button type="submit" class="btn btn-default" name="id"
                                                            value='{{$email->id}}'><span
                                                                class='glyphicon glyphicon-edit'
                                                                aria-hidden='true'></span></button>
                                                </form>
                                                <form class="form-inline" method="POST"
                                                      action="{{ route('delEmail') }}">
                                                    <button type="submit" class="btn btn-default" name="delEmail"
                                                            value='{{$email->id}}'><span
                                                                class='glyphicon glyphicon-trash'
                                                                aria-hidden='true'></span>
                                                    </button>
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                            <div class="row">
                            <div class="col-md-4 col-sm-4">
                                Phone
                                <br>
                                <a href="{{ route('editPhone') }}" class="btn btn-success">Добавить Телефон</a>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                Основной:<br>
                                <table class="table-bordered">
                                    @foreach($user->profilePhone as $phone)
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label> <input type="radio" name="phone"
                                                                   @if($phone->main) {{'checked'}} @endif value="{{$phone->id}}"> {{$phone->phone}}
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <form class="form-inline" method="GET"
                                                      action="{{ route('editPhone') }}">
                                                    <button type="submit" class="btn btn-default" name="id"
                                                            value='{{$phone->id}}'><span
                                                                class='glyphicon glyphicon-edit'
                                                                aria-hidden='true'></span></button>
                                                </form>
                                                <form class="form-inline" method="POST"
                                                      action="{{ route('delPhone') }}">
                                                    <button type="submit" class="btn btn-default" name="delPhone"
                                                            value='{{$phone->id}}'><span
                                                                class='glyphicon glyphicon-trash'
                                                                aria-hidden='true'></span>
                                                    </button>
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>

                    </div>
                    <form class="form-inline" method="POST"
                          action="{{ route('delUser') }}">
                        <button type="submit" class="btn btn-danger" name="delUser"
                                value='{{$user->id}}'><span
                                    class='glyphicon glyphicon-trash'
                                    aria-hidden='true'></span>
                            Удалить пользователя
                        </button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/mainEmail.js') }}"></script>
    <script src="{{ asset('js/mainPhone.js') }}"></script>
    <script src="{{ asset('js/editFio.js') }}"></script>
@endsection
