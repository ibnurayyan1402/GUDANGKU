<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gudang - Ujikom</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans">

    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-8">
                    <span class="text-lg font-bold text-blue-600 tracking-wider">WMS GUDANG</span>
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600">Dashboard</a>
                        <a href="{{ route('barang.index') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600">Master Barang</a>
                        <a href="{{ route('supplier.index') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600">Supplier</a>
                        <a href="{{ route('barang-masuk.index') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600">Barang Masuk</a>
                        <a href="{{ route('barang-keluar.index') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600">Barang Keluar</a>
                        <a href="{{ route('laporan.index') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600">Laporan</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-xs bg-slate-100 px-3 py-1.5 rounded-full font-medium text-slate-600">Petugas: {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-bold uppercase tracking-wider">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl shadow-sm text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-xl shadow-sm text-sm text-rose-800">
                {{ $errors->first() }}
            </div>
        @endif
    </div>

    <main class="py-6">
        @yield('content')
    </main>

</body>
</html>