<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Cloud Automation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 flex flex-col min-h-screen">

    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-2xl">🚀</span>
                <span class="text-xl font-bold text-gray-900 tracking-tight">Cloud Automation</span>
            </div>
            <div class="flex space-x-6 font-medium text-gray-600">
                <a href="/" class="hover:text-gray-900 transition">Home</a>
                <a href="/about" class="text-blue-600 hover:text-blue-700 transition">About Us</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-4xl w-full mx-auto px-4 py-16">
        <div class="bg-white p-8 sm:p-12 rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-6 flex items-center space-x-3">
                <span>📄</span>
                <span>About This Project</span>
            </h1>
            <div class="prose text-gray-600 text-lg leading-relaxed space-y-6">
                <p>
                    The main goal of this web application is to demonstrate a robust **Proof of Concept (PoC)** for setting up integrated Continuous Integration and Continuous Deployment workflows (**CI/CD**).
                </p>
                <p>
                    Whenever a software developer pushes modifications to the main branch, the pipeline automatically spins up an isolated virtual runner environment, resolves all system dependencies, and verifies runtime stability. Once tests pass seamlessly, the system instantly hot-swaps code artifacts into production via **Laravel Cloud** infrastructure without any system downtime.
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 mt-12 py-6 text-center text-gray-500 text-sm">
        <p>Web Server Management Assignment © 2026</p>
    </footer>

</body>
</html>
