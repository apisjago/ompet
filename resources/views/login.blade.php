<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
            },
            secondary: {
              50: '#f8fafc',
              100: '#f1f5f9',
              200: '#e2e8f0',
              300: '#cbd5e1',
              400: '#94a3b8',
              500: '#64748b',
              600: '#475569',
              700: '#334155',
              800: '#1e293b',
              900: '#0f172a',
            },
            accent: {
              50: '#fffbeb',
              100: '#fef3c7',
              200: '#fde68a',
              300: '#fcd34d',
              400: '#fbbf24',
              500: '#f59e0b',
              600: '#d97706',
              700: '#b45309',
              800: '#92400e',
              900: '#78350f',
            }
          }
        }
      }
    }
    
    function app() {
      return {
        showPassword: false,
        togglePassword() {
          this.showPassword = !this.showPassword;
        }
      }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
      feather.replace();
    });
  </script>
</head>
<body class="bg-gradient-to-br from-primary-700 to-primary-900 min-h-screen flex justify-center items-center p-4 font-poppins">
  
  <div class="w-full max-w-md" x-data="app()">
    <!-- Logo and decorative element -->
    <div class="mb-6 text-center">
    <div class="mx-auto w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 shadow-lg border-4 border-accent-400">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary-600">
        <path d="M12 2v20"></path>
        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
    </svg>
</div>
      <h1 class="text-3xl font-bold text-white drop-shadow-md">BanK BonK</h1>
      <p class="text-primary-100 text-sm mt-1">Sign in to continue your fucking journey</p>
    </div>
    
    <!-- Card login -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl border-t-4 border-accent-500">
      <h2 class="text-2xl font-bold text-secondary-800 mb-6 text-center">Login</h2>
      
      <!-- Form Login -->
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <!-- Input Email -->
        <div class="mb-5">
          <label for="email" class="block text-secondary-700 text-sm font-medium mb-2">Email</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
              </svg>
            </div>
            <input type="email" id="email" name="email" required value="{{ old('email') }}"
              class="w-full pl-10 pr-4 py-3 bg-secondary-50 border border-secondary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300" 
              placeholder="Masukkan Email PELIs!!">
          </div>
          @error('email')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
          @enderror
        </div>

        <!-- Input Password -->
        <div class="mb-6">
          <label for="password" class="block text-secondary-700 text-sm font-medium mb-2">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </div>
            <input 
              :type="showPassword ? 'text' : 'password'" 
              id="password" 
              name="password" 
              required
              class="w-full pl-10 pr-10 py-3 bg-secondary-50 border border-secondary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition duration-300" 
              placeholder="Masukkan Pw su!!">
            <button 
              type="button" 
              @click="togglePassword" 
              class="absolute inset-y-0 right-0 pr-3 flex items-center text-secondary-400 hover:text-primary-600 focus:outline-none"
              aria-label="Toggle password visibility">
              <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
              </svg>
              <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
              </svg>
            </button>
          </div>
          @error('password')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
          @enderror
        </div>

        <!-- Button Login -->
        <div class="mb-6">
          <button type="submit" class="w-full py-3 bg-accent-500 text-white text-lg font-semibold rounded-xl hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 transition duration-300 shadow-md">
            Masuk
          </button>
        </div>
      </form>
    </div>
    
  </div>

</body>
</html>