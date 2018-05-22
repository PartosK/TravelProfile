@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление/Изменение Phone</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('editPhone') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ isset($phone->phone) ? $phone->phone  :  old('phone') }}" required autofocus>

                                    @if(isset($phone->id))
                                      <input type="hidden" name="id" value="{{ $phone->id }}" >
                                        @endif

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection