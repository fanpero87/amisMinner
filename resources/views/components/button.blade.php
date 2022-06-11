<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-sky-500/50 border rounded-md focus:outline-none']) }}>
    {{ $slot }}
</button>
