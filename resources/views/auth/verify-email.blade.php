<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md text-center">
        <h2 class="text-xl font-semibold mb-4">Verify Your Email</h2>
        <p class="text-gray-600">We've sent a verification link to your email. Please check your inbox.</p>

        @if (session('status') == 'verification-link-sent')
            <p class="text-green-500 mt-2">A new verification link has been sent to your email address.</p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
            @csrf
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Resend Verification Email</button>
        </form>

        <form method="POST" action="" class="mt-4">
            @csrf
            <button type="submit" class="w-full bg-gray-600 text-white p-2 rounded">Log Out</button>
        </form>
    </div>
</body>

</html>
