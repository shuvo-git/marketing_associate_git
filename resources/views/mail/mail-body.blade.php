@extends("layouts.app-mail")

@section('content')
<div class="col-lg-12">
    <blockquote class="quote-info">
        <p>Hi {{$Application['name']}},</p>
        <tr>
            <td>
                <h1>Registration Success</h1>
                <p></p>
                <p>Thanks for registering with Padma Bank</p>
                <p class="text-info">Your primary credentials are given below: </p>
                <hr/>
                <p><b>Username:</b> {{$Application['username']}}</p>
                <p><b>Password:</b> {{$Application['password']}}</p>
            </td>
        </tr>
    </blockquote>
</div>
<div class="col-lg-12">
    <blockquote class="quote-secondary">
        <tr>
            <td>
                <hr/>
                <h6>Regards, </h6>
                <p>Padma Marketing Associate Team</p>
            </td>
        </tr>
    </blockquote>
</div>

@stop