<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test task</title>
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="inputs">
    <form method="post" action="/send_message">
        {{csrf_field()}}

        <label for="name">Enter your name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">

        <label for="email">Enter your email</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}">

        <label for="message">Enter your message</label>
        <input type="text" name="message" id="message" value="{{ old('message') }}">

        <button type="submit" name="submit">Send</button>
    </form>
</div>

<div class="messages">
    <h2>Sent messages</h2>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Create date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ \Carbon\Carbon::parse($message->created_at)->format('m/d/Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
