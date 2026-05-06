<x-layout>
    <div class="container mt-5">

        <div >

            <h1 class="fw-bold">
                Welcome, {{ auth()->user()->fullname  ?? 'User' }} 👋
            </h1>

            <p class="text-muted mb-1">
                You are successfully logged in.
            </p>

            <hr>

            <h4 class="mt-3">
                {{ \Carbon\Carbon::now()->format('F d, Y') }}

                <iframe width="110" height="200" src="https://www.myinstants.com/instant/tobol-19441/embed/" frameborder="0" scrolling="no"></iframe>
                <iframe width="110" height="200" src="https://www.myinstants.com/instant/iyot-sfx-86214/embed/" frameborder="0" scrolling="no"></iframe>
            </h4>

            <p class="text-secondary">
                Current Date
            </p>

            <div class="mt-4">
                <h5>
                    Current Time:
                </h5>

                <div class="d-flex justify-content-center mt-2">
                    {{-- Live Clock Widget --}}
                    
                </div>

            </div>

        </div>

    </div>
</x-layout>