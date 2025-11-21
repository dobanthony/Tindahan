<template>
  <AppLayout>
    <section class="min-h-screen flex items-center justify-center bg-gray-50 px-6 py-16">
      <div class="max-w-4xl w-full text-center">

        <!-- 🟣 Hero Title -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 leading-tight mb-4">
          Manual POS System
        </h1>

        <!-- ✨ Subtitle -->
        <p class="text-gray-600 text-lg md:text-xl max-w-2xl mx-auto mb-10">
          A simple yet powerful Point-of-Sale system designed for small shops.  
          Manage inventory, handle transactions, track sales, and generate reports — all in one intuitive interface.
        </p>

        <!-- 🚀 Call to Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-14">
          <Link
            href="/login"
            class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition shadow-md"
          >
            Get Started
          </Link>

          <Link
            href="/register"
            class="px-8 py-3 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-100 transition"
          >
            Create Account
          </Link>
        </div>

        <!-- 🧾 Features Section -->
        <div class="grid md:grid-cols-3 gap-8 mt-10">

          <!-- Inventory Card -->
          <div class="p-6 bg-white shadow-sm rounded-xl border hover:shadow-md transition">
            <ArchiveBoxIcon class="w-12 h-12 text-indigo-600 mx-auto mb-4" />
            <h3 class="text-lg font-bold text-gray-800 mb-2">Inventory Tracking</h3>
            <p class="text-gray-600 text-sm">
              Add products, track stock quantity, and update inventory easily.
            </p>
          </div>

          <!-- Transactions Card -->
          <div class="p-6 bg-white shadow-sm rounded-xl border hover:shadow-md transition">
            <CreditCardIcon class="w-12 h-12 text-indigo-600 mx-auto mb-4" />
            <h3 class="text-lg font-bold text-gray-800 mb-2">Easy Transactions</h3>
            <p class="text-gray-600 text-sm">
              Fast and simple checkout process for smooth daily sales.
            </p>
          </div>

          <!-- Reports Card -->
          <div class="p-6 bg-white shadow-sm rounded-xl border hover:shadow-md transition">
            <ChartBarIcon class="w-12 h-12 text-indigo-600 mx-auto mb-4" />
            <h3 class="text-lg font-bold text-gray-800 mb-2">Sales Reports</h3>
            <p class="text-gray-600 text-sm">
              View daily, weekly, and monthly sales performance with clean summaries.
            </p>
          </div>

        </div>

      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { ArchiveBoxIcon, CreditCardIcon, ChartBarIcon } from '@heroicons/vue/24/outline'

</script>
