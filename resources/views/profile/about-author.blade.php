<x-guest-layout>

    <x-guest-navbar />

    <div class="w-full md:p-2">
        <div class=" bg-gray-200 rounded-xl py-2 px-4 mb-2 flex justify-between items-center md:rounded-lg md:flex-col md:gap-4">
            
            <div class="links w-1/2 flex justify-between items-center md:w-full">  
                <a href="https://github.com/enli0r/answerfinderL11"><i class="fa-brands fa-github"></i> Github</a>
                <a href="https://www.linkedin.com/in/milan19nikolic/" class="text-blue-500 hover:text-blue-700 transition"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
                <a href="https://www.instagram.com/_mniko/" class="text-red-400 hover:text-red-600 transition"><i class="fa-brands fa-instagram"></i> Instagram</a>
            </div>
            <a href="{{ asset('68-2020_Answer_finder.pdf') }}" class="navigation-link font-semibold uppercase text-sm text-sky-900">Seminarski_rad.pdf</a>
        </div>
    </div>
    


    <div class="flex w-full border rounded-xl shadow-xl md:flex-col-reverse md:p-2 md:border-none mb-10">
        <div class="w-[400px] md:w-full">
            <img src="/storage/uploads/images/my-img.jpeg" class="w-full h-full rounded-l-lg md:rounded-none md:rounded-b-lg">
        </div>

        
        <div class="flex justify-start items-center flex-col flex-1 p-4 bg-gray-200 rounded-r-lg md:rounded-none md:rounded-t-lg">
            <h1 class="text-[60px] uppercase font-bold text-sky-900 md:text-[40px]">Milan Nikolic</h1>
            <p class="text-gray-800">Full-Stack Web Developer</p>

            {{-- Technical skills --}}
            <div class="self-start mt-10">
                <h3 class="font-bold uppercase text-xl">Technical skills</h3>
                <hr class="border-gray-900">
                <ul class="mt-2">
                    <li class="text-black text-sm"><span class="font-bold">Programming Languages:</span> Programming Languages: PHP, JavaScript, C#, SQL</li>
                    <li class="text-black text-sm"><span class="font-bold">Frameworks & Libraries:</span> Laravel, Livewire, React, AlpineJS, jQuery</li>
                    <li class="text-black text-sm"><span class="font-bold">Frontend Technologies:</span> HTML, CSS, Sass, Bootstrap, Tailwind</li>
                    <li class="text-black text-sm"><span class="font-bold">Version Control:</span> Git</li>
                    <li class="text-black text-sm"><span class="font-bold">CMS & Tools:</span> WordPress, Elementor</li>
                </ul>
            </div>

            {{-- Education skills --}}
            <div class="self-start mt-6 w-full">
                <h3 class="font-bold uppercase text-xl">Education</h3>
                <hr class="border-gray-900 ">
                <div class="flex items-center mt-2 flex-col">
                    <div class="flex items-center justify-between w-full">
                        <p class="font-bold text-sm">Faculty of Technical Sciences, University of Kragujevac</p>
                        <p class="text-sm">Cacak, RS</p>
                    </div>

                    <div class="flex items-center justify-between w-full">
                        <p class="text-sm italic">Information Technology (Final year)</p>
                        <p class="text-sm italic">October 2020 - Present</p>
                    </div>
                </div>
            </div>

            {{-- Languages --}}
            <div class="self-start mt-6 w-full">
                <h3 class="font-bold uppercase text-xl">Education</h3>
                <hr class="border-gray-900 ">
                <div class="flex items-center mt-2 flex-col">
                    <div class="flex items-center justify-between w-full">
                        <p class="text-sm"><span class="font-bold">English:</span> Proficient (Cambridge University - B2 Level)</p>
                        <p class="text-sm italic">Assesed in 2019</p>
                    </div>

                    <div class="flex items-center justify-between w-full">
                        <p class="text-sm"><span class="font-bold">German:</span> German: Elementary (CEFR - A2 Level)</p>
                        <p class="text-sm italic">Assesed in 2019</p>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

</x-guest-layout>