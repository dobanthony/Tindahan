<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center py-4">

          <!-- Logo -->
          <h1 class="text-xl font-bold text-indigo-600">
            MyApp
          </h1>

          <!-- Desktop Navigation (Always visible on large screens) -->
          <nav class="hidden lg:flex space-x-6 items-center">
            <Link href="/" class="nav-link">Home</Link>
            <Link href="/login" class="nav-link">Login</Link>
            <Link
              href="/register"
              class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
            >
              Register
            </Link>
          </nav>

          <!-- Mobile/Tablet Hamburger (Hidden on desktop) -->
          <button
            @click="toggleMenu"
            class="lg:hidden focus:outline-none"
          >
            <svg
              v-if="!open"
              xmlns="http://www.w3.org/2000/svg"
              class="h-7 w-7 text-gray-700"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg
              v-else
              xmlns="http://www.w3.org/2000/svg"
              class="h-7 w-7 text-gray-700"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>

        </div>

        <!-- Mobile/Tablet Menu -->
        <div
          v-if="open"
          class="lg:hidden pb-3 space-y-2 animate-fade"
        >
          <Link href="/" class="mobile-link">Home</Link>
          <Link href="/login" class="mobile-link">Login</Link>
          <Link
            href="/register"
            class="block px-4 py-2 bg-indigo-600 text-white rounded-lg text-center"
          >
            Register
          </Link>
        </div>

      </div>
    </header>

    <!-- Page Content -->
    <main class="flex-1">
      <slot />
    </main>

    <footer class="py-4 text-center text-gray-500 text-sm">
      © {{ year }} MyApp. All rights reserved.
    </footer>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const open = ref(false)
const toggleMenu = () => (open.value = !open.value)

const year = new Date().getFullYear()
</script>

<style scoped>

@keyframes fade {
  0% { opacity: 0; transform: translateY(-5px); }
  100% { opacity: 1; transform: translateY(0); }
}

.animate-fade {
  animation: fade 0.2s ease-out;
}
</style>
