@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
{{--            <div>{{ $visitors_today['total'] }}</div>--}}
            <div style="margin-top: 25px">
                <table class="table table-active">
                    <tr>
                        <td>ip</td>
                        <td>місто</td>
                        <td>регіон</td>
                        <td>країна</td>
                        <td>з</td>
                        <td>до</td>
                        <td>час</td>
                    </tr>
                    @foreach($visitors_today as $visitor)
                        <tr>
                            <td>{{ $visitor->ip }}</td>
                            <td>{{ $visitor->city }}</td>
                            <td>{{ $visitor->region }}</td>
                            <td>{{ $visitor->country }}</td>
                            <td>{{ $visitor->form }}</td>
                            <td><a href="/{{ $visitor->to }}" target="_blank">{{ $visitor->to }}</a> </td>
                            <td>{{ $visitor->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
                {{ $visitors_today->links() }}
            </div>
        </div>
    </div>
@endsection
