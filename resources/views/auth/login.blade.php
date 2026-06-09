<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem SiGudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 to-slate-800 flex h-screen items-center justify-center font-sans">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-2xl border border-gray-100 relative overflow-hidden m-4">
        
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-indigo-600"></div>

        <div class="text-center mb-8 mt-2">
            
            <h2 class="text-3xl font-black text-slate-800 tracking-tight">SiGudang</h2>
            <p class="text-sm text-slate-400 mt-1">Kelola bisnis anda dengan mudah dan cepat</p>
        </div>

        @if($errors->any())
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-6 rounded-r-xl shadow-sm">
                <div class="flex items-center">
                    <p class="text-xs font-semibold text-rose-700">
                        {{ $errors->first() }}
                    </p>
                </div>
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-5">
    @csrf 
    
    @if($errors->any())
    <div class="p-4 mb-4 text-sm text-red-400 bg-red-950/30 border border-red-800/50 rounded-2xl">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div>
        <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Alamat Email</label>
        <div class="relative">
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-sm text-slate-700" 
                placeholder="Email Anda">
        </div>
    </div>

    <div>
        <label for="password" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Password</label>
        <div class="relative">
            <input type="password" name="password" id="password" required
                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl shadow-inner focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-sm text-slate-700" 
                placeholder="••••••">
        </div>
    </div>

    <div class="pt-2">
        <button type="submit" 
            class="w-full min-h-[50px] bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 px-4 rounded-2xl shadow-lg shadow-blue-500/20 transition duration-200 transform active:scale-[0.98] text-sm tracking-wide block text-center">
            Masuk ke Sistem
        </button>
    </div>
</form>