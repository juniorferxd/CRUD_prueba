<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <h1 class="text-2xl font-bold">Bienvenido, a mi CRUD!</h1>
                        <p class="mb-4">Soy un entusiasta de la tecnología y egresado de la Universidad Nacional
                            del Santa, donde estudie Ingeniería de Sistemas e Informática. Realice mis
                            practicas en la empresa BSD System, donde contribuí al desarrollo de un
                            sistema de asistencia basado en la web utilizando tecnologías como PHP,
                            Laravel y MySQL. Poseo fuertes habilidades de colaboración y me
                            especializo en análisis de software, diseño y múltiples lenguajes de
                            programación, incluido PHP y su framework Laravel.</p>

                        <p>Puede empezar a ver el CRUD pulsando arriba donde dice Posts</p>


                        <img src="{{ asset('images/foto_perfil.jpg') }}" alt="Foto de perfil" class="rounded-full w-32 h-32 mt-4 mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


