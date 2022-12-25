<article 
	{{ $attributes->merge([
		'class' => "border-l-4 p-4 bg-blue-100 border-blue-500 text-blue-700", 
		'role' => "alert"
	]) }} 
>
	<h1 class="font-bold">{{ $title }}</h1>
	{{ $slot }}
</article>