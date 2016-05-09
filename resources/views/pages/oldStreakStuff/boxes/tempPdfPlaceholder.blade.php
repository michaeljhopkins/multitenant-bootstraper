@extends('layouts.main')
@section('main')
    @foreach($threadArray as $boxKey => $threads)
        {{--{{ $boxKey = str_replace('agxzfm1haWxmb29nYWVyNgsSDE9yZ2FuaXphdGlvbiIQcmVjLWlsbG','',$boxKey) }}
        {{ $boxKey = str_replace('agxzfm1haWxmb29nYWVyNgsSDE9yZ2FuaXphdGlvbiI','',$boxKey) }}
        {{ $boxKey = str_replace('agxzfm1haWxmb29nYWVyLwsSDE9yZ2','',$boxKey) }}
        {{ $thread = str_replace('agxzfm1haWxmb29nYWVyNgsSDE9yZ2FuaXphdGlvbiIQcmVjLWlsbG','',$thread) }}
        {{ $thread = str_replace('agxzfm1haWxmb29nYWVyLwsSDE9yZ2FuaXphdGlvbiIQc','',$thread) }}
        {{ $thread = str_replace('agxzfm1haWxmb29nYWVyNgsSDE9yZ2FuaXphdGlvbiI','',$thread) }}
        {{ $thread = str_replace('agxzfm1haWxmb29nYWVyLwsSDE9yZ2','',$thread) }}--}}
        <div class="row">
            <div class="page-header">
                Box: {!! $boxKey !!}
            </div>
        </div>
        <div class="row">
            <div class="span10 offset2">
                <table class="table-responsive table table-hover">
                    <tbody>
                        @foreach($threads as $thread)
                            <tr>
                                <td>{!! $thread !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@stop
