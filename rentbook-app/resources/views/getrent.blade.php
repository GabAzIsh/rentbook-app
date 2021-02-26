<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blogy</title>

        <link rel="stylesheet" href="css/styles.css?v=1.0">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="bg-gray-200">
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                          placeholder="Post something!"></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $messege }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                    font-medium">Post</button>
            </div>
        </form>


    </div>
</div>
</body>
</html>
