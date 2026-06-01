<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cloud Automation</title>
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
                <a href="/home" class="text-blue-600 hover:text-blue-700 transition">Home</a>
                <a href="/about" class="hover:text-gray-900 transition">About Us</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-6xl w-full mx-auto px-4 py-12">
        <div class="text-center max-w-3xl mx-auto my-6">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                Welcome to <span class="text-blue-600">CI/CD Pipeline</span> Application
            </h1>
            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                This project has been successfully built, tested, and deployed using automated continuous integration pipelines straight to Laravel Cloud infrastructure.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 mt-12">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-xl mb-4">⚙️</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">GitHub Actions</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Automates the build and run workflow. It executes test suites cleanly every single time you push code.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-xl mb-4">☁️</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Laravel Cloud</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Fast, scalable, and fully managed cloud hosting that triggers automatic deployments from your repository branch.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-xl mb-4">✅</div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Green Pass Build</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Guarantees that your server environment is isolated, fully stable, and completely production-ready.</p>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 mt-12 py-6 text-center text-gray-500 text-sm">
        <p>Web Server Management Assignment © 2026</p>
    </footer>

</body>
</html>
