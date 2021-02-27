<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Новая аренда</title>

        <link rel="stylesheet" href="css/styles.css?v=1.0">
{{--        <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
</head>

<body class="">
<div class="">
    <div class="">
        <form action="{{ route('createrent') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="book" class="sr-only">Книга</label>
                <select name="book" id="book">
                    @foreach($books as $book)
                    <option value=" {{ $book->title }} ">{{ $book->title }}</option>
                    @endforeach
                </select>
                @error('book')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="tenant" class="sr-only">Арендатор</label>
                <select name="tenant" id="tenant">
                @foreach($tenants as $tenant)
                    <option value=" {{ $tenant->name }} ">{{ $tenant->name }}</option>
                @endforeach
                </select>
                @error('tenant')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="count" class="sr-only">Количество</label>
                <input type="number" name="count" id="count"
                       class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('count')
                           border-red-500 @enderror" value="{{ old('count') }}">
                @error('count')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="leaseterm" class="sr-only">Срок аренды</label>
                <input type="date" name="leaseterm" id="leaseterm"
                       class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('leaseterm')
                           border-red-500 @enderror" value="">
                @error('leaseterm')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="bail" class="sr-only">Сумма залога</label>
                <input type="number" name="bail" id="bail"
                       class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Создать аренду</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
