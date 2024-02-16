{{-- Desktop  --}}
<aside class="relative h-screen w-64 hidden sm:block shadow-xl">
    {{-- <div class="p-6">
        <button onclick="window.location.href='/sites/manager/newBlog'"
            class="w-full bg-side cta-btn active-nav-link font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl nav-item flex items-center justify-center nav-item">
            <i class="fas fa-plus mr-3"></i> New Blog
        </button>
    </div> --}}

    <nav class="text-slate-600 text-base font-semibold pt-3">
        <a href="/sites/manager/dashboard"
            class="flex items-center {{ request()->is('sites/manager/dashboard') ? 'active-nav-link' : '' }} py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/sites/manager/newBlog"
            class="flex items-center {{ request()->is('sites/manager/newBlog') ? 'active-nav-link' : '' }} py-4 pl-6 nav-item">
            <i class="fas fa-plus mr-3"></i> New Blog
        </a>
        <a href="/sites/manager/allBlogs"
            class="flex items-center {{ request()->is('sites/manager/allBlogs') ? 'active-nav-link' : '' }} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            My Blogs
        </a>
        <a href="/sites/manager/blabla"
            class="flex items-center {{ request()->is('sites/manager/blabla') ? 'active-nav-link' : '' }} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            blabla
        </a>
    </nav>
</aside>
