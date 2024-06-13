<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-sky-700 rounded-lg hover:bg-sky-500 transition px-4 py-2 font-semibold']) }}>
    {{ $slot }}
</button>
