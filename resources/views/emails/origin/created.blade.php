<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> {{ $origin->project->name }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
     # New Origin Created

    Hello {{ $recipient->name }},

    A new origin has been created by **{{ $sender->name }}**.

    <div>
        **Origin Name:** {{ $origin->project->name }}
        **Created At:** {{ $origin->created_at->format('Y-m-d H:i') }}
    </div>

    Thanks,
    {{ config('app.name') }}
</body>
</html>
