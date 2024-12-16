<!DOCTYPE html>
<html lang="en" class="dark">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Items</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<script>
		// Alterna entre os modos claro e escuro
		function toggleDarkMode() {
			document.documentElement.classList.toggle('dark');
		}
	</script>
</head>
<body class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 min-h-screen">
	<div class="container mx-auto p-6">
		<header class="flex items-center justify-between mb-6">
			<h1 class="text-2xl font-bold">Create a new item</h1>

			<button 
				onclick="toggleDarkMode()" 
				class="bg-gray-300 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded">
				<i data-lucide="sun-moon" class="w-6 h-6"></i>
			</button>
		</header>

		@if(session('success'))
			<div class="bg-green-100 dark:bg-green-800 text-green-900 dark:text-green-200 p-4 rounded mb-4">
				{{ session('success') }}
			</div>
		@endif

		@if($errors->any())
			<div class="bg-red-100 dark:bg-red-800 text-red-900 dark:text-red-200 p-4 rounded mb-4">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}" method="post" class="bg-white dark:bg-gray-900 p-6 rounded shadow-md">
			@csrf
			@if (isset($item))
				@method('PUT') <!-- Só precisa disso se for uma edição -->
			@endif
			<div class="mb-4">
				<label for="name" class="block text-sm font-medium">Name</label>
				<input type="text" name="name" id="name" 
					class="mt-1 block w-full p-2 border border-gray-300 dark:border-gray-700 rounded bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200" 
					@if (isset($item))
						value="{{$item->name}}"
					@endif
					/>
			</div>

			<button type="submit"
				class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
				{{ isset($item) ? 'Update' : 'Create' }} <!-- Muda o botão dependendo se estamos criando ou editando -->
			</button>
		</form>

		<h2 class="text-xl font-bold mt-8 mb-4">Items List</h2>

		<table class="table-auto w-full bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 rounded shadow-md">
			<thead class="bg-gray-200 dark:bg-gray-700">
				<tr>
					<th class="px-4 py-2 text-left">Name</th>
					<th class="px-4 py-2 text-left">Status</th>
					<th class="px-4 py-2 text-left">Created At</th>
					<th class="px-4 py-2 text-left">Options</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr class="border-t border-gray-300 dark:border-gray-700">
						<td class="px-4 py-2">{{ $item->name }}</td>
						<td class="px-4 py-2">
							{{ $item->status == 1 ? 'Available' : 'Unavailable' }}
						</td>
						<td class="px-4 py-2">{{ $item->created_at }}</td>
						<td class="px-4 py-2 flex gap-2">
							<form action=" {{route('items.edit', $item->id)}} " method="POST">
								@csrf @method('PUT')
								<button
									class="
										bg-sky-300
										dark:bg-sky-700
										text-gray-900
										dark:text-gray-100
										px-4
										py-2
										rounded
									"
								>E</button>
							</form>
							<form action=" {{ route('items.destroy', $item->id) }} " method="POST">
								@csrf @method('DELETE')
								<button
								class="
									bg-red-300
									dark:bg-red-700
									text-gray-900
									dark:text-gray-100
									px-4
									py-2
									rounded
								"
								>
									X
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>
