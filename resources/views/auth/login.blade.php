<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKBPVS Login</title>
        <!-- Favicons -->
    <link href="{{ asset('sklogo.png') }}" rel="icon">
    <link href="{{ asset('sklogo.png') }}" rel="apple-touch-icon">
    @vite('resources/css/app.css') <!-- make sure Vite is set -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex justify-center items-center">
        <div class="shadow-lg rounded-lg flex overflow-hidden max-w-4xl w-full" style="background: linear-gradient(45deg, hsla(148, 64%, 11%, 1) 30%, hsla(146, 68%, 22%, 1) 71%, hsla(146, 92%, 10%, 1) 100%);">

            <!-- Left side -->
            <div class="w-1/2 bg-blue-100 flex flex-col justify-center items-center p-2"
            style="background-color: #00331a">
           <img src="{{ asset('sklogo.png') }}" alt="Logo" width="300px" height="300px">
           
           <div class="w-full text-center mt-4 px-4">
               <p class="text-white tracking-widest text-sm md:text-base font-medium">
                   SANGGUNIANG KABATAAN BALINTAWAK
               </p>
               <h4 class="text-white font-extrabold text-xl md:text-2xl tracking-wide mt-2">
                   PROFILING VERIFICATION SYSTEM
               </h4>
           </div>
       </div>
       

            <!-- Right side -->
            <!-- Right side -->
            <div class="w-1/2 flex items-center justify-center p-10 relative">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-8 w-full max-w-sm shadow-lg">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="{{ asset('logouser.png') }}" alt="Logo" width="100px" height="100px"
                            class="block mx-auto mb-4 object-contain">
                        <h2 class="text-white text-center font-bold text-xl mb-6">SKBPVS</h2>

                        <label class="block mb-2 text-sm font-medium text-white">Username</label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-300 p-2 rounded-md mb-4">

                        <label class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input type="password" name="password" required
                            class="w-full border border-gray-300 p-2 rounded-md mb-6">

                        <div class="text-center">
                            <button type="submit"
                                class="w-50 bg-white text-green p-2 rounded-md hover:bg-green-800 transition">
                                <strong>LOGIN</strong>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <script>
        < script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous">
    </script>
    </script>
</body>

</html>
